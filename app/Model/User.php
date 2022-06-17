<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function area()
    {
        return $this->belongsTo('App\Model\Area');
    }
    public function dojo()
    {
        return $this->hasMany('App\Model\Dojo');
    }
    public function review()
    {
        return $this->hasMany('App\Model\Review');
    }
    public function userphoto()
    {
        return $this->hasMany('App\Model\Photos\UserPhoto');
    }
}
