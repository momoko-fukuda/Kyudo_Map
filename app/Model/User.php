<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Overtrue\LaravelFavorite\Traits\Favoriter;
use Illuminate\Support\Facades\Auth;

/**
 * usersテーブルのモデルクラス
 */
class User extends Authenticatable
{
    use Notifiable, Favoriter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'area_id', 'password',
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

    /**
     * areasテーブルとのリレーション
     */
    public function area()
    {
        return $this->belongsTo('App\Model\Area');
    }
    
    /**
     * dojosテーブルとのリレーション
     */
    public function dojos()
    {
        return $this->hasMany('App\Model\Dojo');
    }
    

    
    /**
     * reviewsテーブルとのリレーション
     */
    public function reviews()
    {
        return $this->hasMany('App\Model\Review');
    }
    
    /**
     * user_photosテーブルとのリレーション
     */
    public function userphotos()
    {
        return $this->hasMany('App\Model\Photos\UserPhoto');
    }
    
    /**
     * use_buttonsテーブルとのリレーション
     */
    public function usebuttons()
    {
        return $this->hasMany('App\Model\Buttons\UseButton');
    }
    /**
     * review_buttonsテーブルとのリレーション
     */
    public function reviewbuttons()
    {
        return $this->hasMany('App\Model\Buttons\ReviewButton');
    }
    /**
     * favorite_buttonsテーブルとのリレーション
     */
    public function favoritebuttons()
    {
        return $this->hasMany('App\Model\Buttons\FavoriteButton');
    }
    
    
    
    
    
    /**
     * ユーザーがお気に入りしたdojoを全てとってきている
     */
    public static function getFavorite()
    {
        $user = Auth::user();
        return $user->favorites(Dojo::class)->get();
    }
}
