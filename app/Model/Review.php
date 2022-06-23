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
     * HomeControllerでレビューデータを取得するモデルクラス
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
}
