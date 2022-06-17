<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BisinessHour extends Model
{
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
}
