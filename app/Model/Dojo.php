<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * dojosテーブルのモデルクラス
 */
class Dojo extends Model
{
    /**
     * areasテーブルとのリレーション
     */
    public function area()
    {
        return $this->belongsTo('App\Model\Area');
    }
    
    /**
     * usersテーブルとのリレーション
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    
    /**
     * businesshoursテーブルとのリレーション
     */
    public function businesshours()
    {
        return $this->hasMany('App\Model\BusinessHour');
    }
    
    /**
     * reviewsテーブルとのリレーション
     */
    public function reviews()
    {
        return $this->hasMany('App\Model\Review');
    }
    
    /**
     * dojophotosテーブルとのリレーション
     */
    public function dojophotos()
    {
        return $this->hasMany('App\Model\Photos\DojoPhoto');
    }
    
    
    /**
     * DojoControllerで使用
     * 道場検索時のデータ取得(dojos/index.blade.php)
     */
    public static function getDojoSearch()
    {
        return self::query()
            ->with('area')
            ->get();
    }
}
