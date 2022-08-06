<?php

namespace App\Model;

use App\Model\Buttons\ReviewButton;
use Illuminate\Database\Eloquent\Model;

/**
 * reviewsテーブルのモデルクラス
 */
class Review extends Model
{
    protected $fillable = [
        'user_id',
        'dojo_id',
        'title',
        'body',
        ];
    
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
     * dojo_photosテーブルとのリレーション
     */
    public function dojophotos()
    {
        return $this->hasMany('App\Model\Photos\DojoPhoto');
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
         ->withcount('reviewbuttons')
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
              ->withcount('reviewbuttons')
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
              ->withcount('reviewbuttons')
              ->where('dojo_id', $dojoId)
              ->orderBy('created_at', 'desc')
              ->limit(3);
    }
    
    
    /**
     * ReviewControllerのstoreで使用
     * reviewデータを格納する
     */
    public static function createReview($review, $request)
    {
        $review->fill($request->all())->save();
    }
    
    /**
     * 該当userの投稿した口コミを取得する
     */
    public static function scopegetuserReview($query, $user)
    {
        $query->with(['user', 'dojophotos', 'dojo'])
              ->withcount('reviewbuttons')
               ->where('user_id', $user->id)
               ->orderBy('created_at', 'desc');
    }
    
    /**
     * いいねされているかどうかを判定するメソッド
     */
    public function isLikedBy($user):bool
    {
        return ReviewButton::where('user_id', $user->id)
                  ->where('review_id', $this->id)
                  ->first() !==null;
    }
}
