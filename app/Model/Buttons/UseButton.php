<?php

namespace App\Model\Buttons;

use Illuminate\Database\Eloquent\Model;

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
        $query->where('dojo_id', $dojoId)
                ->where('user_id', $userId);
    }
    /**
     * favoritebuttonにデータ挿入
     */
    protected $fillable = [ 'dojo_id', 'user_id'];
}
