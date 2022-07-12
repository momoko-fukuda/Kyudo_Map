<?php

namespace App\Model\Photos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * dojophotosテーブルとのリレーション
 * photoクラスを継承
 */
class DojoPhoto extends Model
{
    protected $fillable =['dojo_id', 'user_id', 'review_id', 'img',];
    
    
    /**
     * 道場テーブルとのリレーション
     */
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
    
    /**
     * userテーブルとのリレーション
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    /**
     * reviewsテーブルとのリレーション
     */
    public function review()
    {
        return $this->belongsTo('App\Model\Review');
    }
    
    /**
     * 道場写真データの格納
     * dojos/createで使用
     */
    public static function createDojoPhotos($request, $dojo)
    {
        $files = $request->file('img');
         
        if ($files) {
            foreach ($files as $file) {
                $dojophoto = new DojoPhoto();
                $dojophoto->dojo_id = $dojo->id;
                $dojophoto->user_id = $dojo->user_id;

                $path = Storage::disk('s3')->putFile('/test', $file, 'public');
            
                $dojophoto->img =Storage::disk('s3')->url($path);

                $dojophoto->save();
            }
        }
    }
    /**
     * 道場写真データの格納
     * reviews/createで使用
     */
    public static function createReviewDojoPhotos($request, $review)
    {
        $files = $request->file('img');
         
        if ($files) {
            foreach ($files as $file) {
                $dojophoto = new DojoPhoto();
                $dojophoto->dojo_id = $review->dojo_id;
                $dojophoto->user_id = $review->user_id;
                $dojophoto->review_id = $review->id;

                $path = Storage::disk('s3')->putFile('/test', $file, 'public');
            
                $dojophoto->img =Storage::disk('s3')->url($path);

                $dojophoto->save();
            }
        }
    }
    
    
    /**
     * DojoControllerで該当道場の写真データを全取得するモデルクラス
     */
    public function scopegetDojoPhotos($query, $dojo)
    {
        $query->with(['dojo'])
              ->where('dojo_id', $dojo->id)
              ->orderBy('created_at', 'desc');
    }
    
    
    /**
     * DojoControllerで該当道場の写真データを最新5枚取得するモデルクラス
     */
    public function scopelimitGetDojoPhotos5($query, $dojoId)
    {
        $query->with(['dojo'])
              ->where('dojo_id', $dojoId)
              ->orderBy('created_at', 'desc')
              ->limit(5);
    }
}
