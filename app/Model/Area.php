<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * areasテーブルのモデルクラス
 */
class Area extends Model
{
    /**
     * usersテーブルとのリレーション
     */
    public function users()
    {
        return $this->hasMany('App\Model\User');
    }
    
    /**
     * dojosテーブルとのリレーション
     */
    public function dojos()
    {
        return $this->hasMany('App\Model\Dojo');
    }
    
    /**
     * 都道府県データを全てとってくるモデルクラス
     */
    public static function getAllArea()
    {
        return self::query()->get();
    }
}
