<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * businesshoursテーブルとのリレーション
 */
class BusinessHour extends Model
{
    protected $fillable = [
        'dojo_id',
        'from1',
        'to1',
        'from2',
        'to2',
        'from3',
        'to3',
        'from4',
        'to4',
        'from5',
        'to5',
        ];
    
    
    
    /**
     * dojoテーブルとのリレーション
     */
    public function dojo()
    {
        return $this->hasOne('App\Model\Dojo');
    }
    
    
    /**
     * businesshoursテーブルのデータ格納
     */
    public static function createBusinessHour(
        $businesshour,
        $dojo,
        $request
    ) {
        $newBusinesshour = $businesshour->fill($request->all());
        
        $dojo->businesshour()->save($newBusinesshour);
    }
    /**
     * businesshoursテーブルのデータ更新
     */
    public static function updateBusinessHour(
        $businesshour,
        $dojo,
        $request
    ) {
        $dojo->businesshour->fill($request->all())->update();
    }
    
    
    /**
     * 該当道場の営業時間抽出
     */
    public function scopegetBusinessHour($query, $dojoId)
    {
        $query->where('dojo_id', $dojoId);
    }
}
