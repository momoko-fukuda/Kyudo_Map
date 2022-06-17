<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * reviewphotosテーブルのモデルクラス
 * photoクラスを継承
 */
class ReviewPhoto extends Photo
{
    /**
     * reviewsテーブルとのリレーション
     */
    public function review()
    {
        return $this->belongsTo('App\Model\Review');
    }
}
