<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
    public function reviewphoto()
    {
        return $this->hasMany('App\Model\Photos\ReviewPhoto');
    }
}
