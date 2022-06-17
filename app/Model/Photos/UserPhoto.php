<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * userphotosテーブルのモデルクラス
 */
class UserPhoto extends Model
{
    /**
     * usersテーブルとのリレーション
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    
}

