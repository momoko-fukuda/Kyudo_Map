<?php

namespace App\Model\Buttons;

use Illuminate\Database\Eloquent\Model;

class ReviewButton extends Model
{
    /**
     * reviewsテーブルとのリレーション
     */
    public function review()
    {
        return $this->belongsTo('App\Model\Review');
    }
     
    /**
     * dojosテーブルとのリレーション
     */
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
      
    /**
     * usersテーブルとのリレーション
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    
    /**
     * reviewbuttonにデータ挿入
     */
    protected $fillable = [ 'review_id', 'user_id'];
}
