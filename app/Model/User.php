<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;

/**
 * usersテーブルのモデルクラス
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    
    /**
     * メールの日本語化(新規登録時)
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }
    
    /**
     * メールの日本語化(パスワードリセット時)
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'area_id',
        'password',
        'img'
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
     * dojophotosテーブルとのリレーション
     */
    public function dojophotos()
    {
        return $this->hasMany('App\Model\photos\DojoPhoto');
    }


    /**
     * ユーザーがお気に入りしたdojoを全てとってきている
     */
    public static function getFavorite()
    {
        $user = Auth::user();
        return $user->favorites(Dojo::class)->get();
    }
    
    /**
     * ユーザー情報の編集時にデータ格納するコード
     */
    public static function updateUser($user, $request)
    {
        $user->fill($request->only(['name', 'email', 'area_id']));
        
        $file = $request->file('img');
        
        if ($file) {
            $oldfile = $user->img;
            Storage::disk('s3')->delete($oldfile);
            
            $path = Storage::disk('s3')->putFile('/user-test', $file, 'public');
            $user->img = $path;
        }

        $user->update();
    }
    /**
     * パスワード更新処理のコード
     */
    public static function updatePassword($request, $user)
    {
        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return redirect()->route('mypage.edit_password', $user->id);
        }
    }
}
