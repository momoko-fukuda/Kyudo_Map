<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * dojophotosテーブルとのリレーション
 * photoクラスを継承
 */
class DojoPhoto extends Photo
{
    protected $fillable =['dojo_id', 'img',];
    
    
    /**
     * 道場テーブルとのリレーション
     */
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
}
