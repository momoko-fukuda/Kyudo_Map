<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * reviewsテーブルのモデルクラス
 */
class Review extends Model
{

    
    
    /**
     * usersテーブルとのリレーション
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    
    /**
     * dojosテーブルとのリレーション
     */
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
    
    /**
     * reviews_photosテーブルとのリレーション
     */
    public function reviewphotos()
    {
        return $this->hasMany('App\Model\Photos\ReviewPhoto');
    }
    /**
     * review_buttonsテーブルとのリレーション
     */
    public function reviewbuttons()
    {
        return $this->hasMany('App\Model\Buttons\ReviewButton');
    }
    
    
    /**
     * HomeControllerでレビューデータを最新5件取得するモデルクラス
     * (home.blade.phpでreviewデータ表示)
     */
    public static function getReviewLast5()
    {
        return self::query()
         ->with(['dojo', 'user'])
         ->orderBy('created_at', 'desc')
         ->limit(5)
         ->get();
    }
    
    
    
    /**
     * DojoControllerで該当道場のレビューデータを全取得するモデルクラス
     */
    public function scopegetReview($query, $dojoId)
    {
        $query->with(['dojo', 'user'])
              ->where('dojo_id', $dojoId)
              ->orderBy('created_at', 'desc');
    }
    
    /**
     * DojoControllerで該当道場のレビューデータを最新5件取得するモデルクラス
     * (dojos/show.blade.phpでreviewデータ表示)
     */
    public static function scopegetDojoReviewLast5($query, $dojoId)
    {
        $query->with(['dojo', 'user'])
              ->where('dojo_id', $dojoId)
              ->orderBy('created_at', 'desc')
              ->limit(3);
    }
}
