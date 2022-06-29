<?php

namespace App\Model\Buttons;

use Illuminate\Database\Eloquent\Model;

class UseButton extends Model
{
    
    protected $fillable =[
        'id',
        'dojo_id',
        'user_id',
        'created_at',
        'updated_at'
        ];
    
    
    /**
     * dojosテーブルとのリレーション
     */
     public function dojo()
     {
         return $this->belongsTo('App\Model\Dojo');
     }
     
     /**
      * usersテーブルとのリレーション
      */
      public function user()
      {
          return $this->belongsTo('App\Model\User');
      }
      
    
}
