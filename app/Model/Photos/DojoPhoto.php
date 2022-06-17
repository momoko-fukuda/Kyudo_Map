<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DojoPhoto extends Photo
{
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
}

