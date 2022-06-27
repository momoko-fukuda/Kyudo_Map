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
        'holiday',
        'from',
        'to'
        ];
    
    
    
    /**
     * dojoテーブルとのリレーション
     */
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
}
