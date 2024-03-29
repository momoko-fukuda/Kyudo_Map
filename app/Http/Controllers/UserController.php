<?php

namespace App\Http\Controllers;

// 使用するモデル
use App\Model\Dojo;
use App\Model\Review;
use App\Model\User;
use App\Model\Area;
use App\Model\Buttons\FavoriteButton;
use App\Model\Buttons\UseButton;
use App\Model\Buttons\ReviewButton;
use App\Model\Photos\DojoPhoto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * 主にmypageやlogin周り
 */
class UserController extends Controller
{
    /**
     * middleware設定
     * (ログインしてない場合、マイページ使用不可)
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mypage()
    {
        $user = Auth::user();
        $area =$user->area;

        
        //投稿した口コミ一覧をとってくる
        $reviews = Review::getuserReview($user)
                         ->get();
        
        //参考になったボタンを押した口コミ投稿をとってくる
        $favoriteReviews = ReviewButton::getReviewButtonUser($user)
                                         ->get();
        
        //お気に入りボタンを押した道場をとってくる
        $favoriteDojos = FavoriteButton::getFavoriteButtonUser($user)
                                       ->get();
        
        //利用したボタンを押した道場をとってくる
        $useDojos = UseButton::getUseButtonUser($user)
                             ->get();
        
        //更新順に活動地域の道場をとってくる
        $latestDojos = Dojo::getLatestDojo($area)
                           ->get();
    
        
        
        return view('users.mypage', compact(
            'user',
            'reviews',
            'favoriteReviews',
            'favoriteDojos',
            'useDojos',
            'latestDojos'
        ));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        $areas = Area::getAllArea();
        
        return view('users.edit', compact('user', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->email.',email'],
            'area_id' => ['required', 'integer'],
            'img' => ['nullable','max:10000', 'mimes:jpeg,png,jpg,gif']
            ], [
                'name.max' => 'ユーザー名は255文字以内で入力してください',
                'email.max' => '登録するメールアドレスは255文字以内で入力してください',
                'email.unique' => 'このメールアドレスは既に別のアカウントで登録されております',
                'img.max' => '写真データの容量が上限を越してます。（上限10MBまで）'
                ]);
       
        $user = Auth::user();

        User::updateUser($user, $request);
        
        return redirect()->route('mypage');
    }
    
    /**
     * パスワードの更新画面処理
     */
    public function edit_password()
    {
        $user = Auth::user();
        return view('users.edit_password', compact('user'));
    }
    
    
    /**
     * パスワードの更新処理
     */
    public function update_password(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
            ], [
                'password.min' => '英数字8文字以上のパスワードを設定してください',
                ]);

        User::updatePassword($request, $user);

        return redirect()->route('mypage')
                         ->with('status', 'パスワードの変更が完了しました');
    }
    
    /**
     * ユーザー削除のページ遷移
     */
    public function deleteview()
    {
        $user = Auth::user();
        return view('users.delete', compact('user'));
    }
    
    /**
     * Remove the specified resource from storage.
     * ユーザー削除処理
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id = Auth::id();
        Auth::logout();
        User::find($id)->forceDelete();

        return redirect('/');
    }
    
    /**
     * マイページの投稿した口コミ削除処理
     * (写真も一緒に)
     */
    public function review_destroy($id)
    {
        // S3にある写真データ削除
        DojoPhoto::deletereviewPhotos($id);

        $review = Review::find($id);
        $review->delete();
        
        return redirect()->route('mypage')
                         ->with('status', '投稿した口コミを削除しました。');
    }
}
