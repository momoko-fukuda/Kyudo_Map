<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

/**
 * dojosテーブルのモデルクラス
 */
class Dojo extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'area_id',
        'address1',
        'address2',
        'lat',
        'lng',
        'tel',
        'url',
        'use_money',
        'use_age',
        'use_step',
        'use_personal',
        'use_group',
        'use_affiliation',
        'use_reserve',
        'facility_inout',
        'facility_makiwara',
        'facility_aircondition',
        'facility_matonumber',
        'facility_lockerroom',
        'facility_numberlimit',
        'facility_parking',
        'other',
        'holiday_mon',
        'holiday_tues',
        'holiday_wednes',
        'holiday_thurs',
        'holiday_fri',
        'holiday_satur',
        'holiday_sun',
        ];
    
    
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
     * use_buttonsテーブルとのリレーション
     */
    public function usebuttons()
    {
        return $this->hasMany('App\Model\Buttons\UseButton');
    }
    /**
     * review_buttonsテーブルとのリレーション
     */
    public function reviewbuttons()
    {
        return $this->hasMany('App\Model\Buttons\ReviewButton');
    }
    /**
     * favorite_buttonsテーブルとのリレーション
     */
    public function favoritebuttons()
    {
        return $this->hasMany('App\Model\Buttons\FavoriteButton');
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
