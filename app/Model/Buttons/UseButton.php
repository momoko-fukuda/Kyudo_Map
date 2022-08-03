<?php

namespace App\Model\Buttons;

use Illuminate\Database\Eloquent\Model;

/**
 * 道場データに対して利用したボタンの実装
 */
class UseButton extends Model
{

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
     * usebuttonテーブルの実装
     */
    public function scopegetUseButton($query, $dojoId, $userId)
    {
        $query->with(['dojo', 'user'])
              ->where('dojo_id', $dojoId)
              ->where('user_id', $userId);
    }
    
    /**
     * 該当userのデータを取ってくる
     */
    public function scopegetUseButtonUser($query, $user)
    {
        $query->with(['user', 'dojo'])
              ->where('user_id', $user->id);
    }
    
    
    /**
     * favoritebuttonにデータ挿入
     */
    protected $fillable = [ 'dojo_id', 'user_id'];
}
