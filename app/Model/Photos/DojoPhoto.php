<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * dojophotosテーブルとのリレーション
 * photoクラスを継承
 */
class DojoPhoto extends Photo
{
    /**
     * 道場テーブルとのリレーション
     */
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
}

