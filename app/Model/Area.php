<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function user()
    {
        return $this->hasMany('App\Model\User');
    }
    
    public function dojo()
    {
        return $this->hasMany('App\Model\Dojo');
    }
}
