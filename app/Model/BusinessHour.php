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
        'from',
        'to',
        ];
    
    
    
    /**
     * dojoテーブルとのリレーション
     */
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
    
    /**
     * 該当道場の営業時間抽出
     */
    public function scopegetBusinessHour($query, $dojoId)
    {
        $query->with('dojo')
              ->where('dojo_id', $dojoId);
    }
}
