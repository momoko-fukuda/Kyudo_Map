<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dojo extends Model
{
    public function area()
    {
        return $this->belongsTo('App\Model\Area');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    public function bisinesshour()
    {
        return $this->hasMany('App\Model\BisinessHour');
    }
    public function review()
    {
        return $this->hasMany('App\Model\Review');
    }
    public function dojophoto()
    {
        return $this->hasMany('App\Model\Photos\DojoPhoto');
    }
}
