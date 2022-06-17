<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * businesshoursテーブルとのリレーション
 */
class BusinessHour extends Model
{
    /**
     * dojoテーブルとのリレーション
     */
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
}
