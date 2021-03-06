<?php

namespace App\Model\Buttons;

use Illuminate\Database\Eloquent\Model;

class FavoriteButton extends Model
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
     * favoritebuttonのデータを持ってくる
     */
    public function scopegetFavoriteButton($query, $dojoId, $userId)
    {
        $query->with(['dojo', 'user'])
              ->where('dojo_id', $dojoId)
              ->where('user_id', $userId);
    }
    /**
     * 該当userが押したfavoritebuttonのデータをもってくる
     */
    public function scopegetFavoriteButtonUser($query, $user)
    {
        $query->with(['user'])
               ->where('user_id', $user->id);
    }
     
    /**
     * favoritebuttonにデータ挿入
     */
    protected $fillable = [ 'dojo_id', 'user_id'];
}
