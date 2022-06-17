<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewPhoto extends Photo
{
    public function review()
    {
        return $this->belongsTo('App\Model\Review');
    }
}
