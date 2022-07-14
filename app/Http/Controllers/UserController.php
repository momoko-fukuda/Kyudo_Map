<?php

namespace App\Http\Controllers;

// 使用するモデル
use App\Model\Dojo;
use App\Model\Review;
use App\Model\User;
use App\Model\Photo;
use App\Model\Buttons\FavoriteButton;
use App\Model\Buttons\UseButton;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function mypage(Dojo $dojo)
    {
        $user = Auth::user();
        $area =$user->area;

        
        //投稿した口コミ一覧をとってくる
        $reviews = Review::getuserReview($user)
                         ->get();
        
        //参考になったボタンを押した口コミ投稿をとってくる
        $favoriteReviews = $user->favorites(Review::class)
                                ->get();
        
        //お気に入りボタンを押した道場をとってくる
        $favoriteDojos = FavoriteButton::getFavoriteButtonUser($user)
                                       ->get();
        
        //利用したボタンを押した道場をとってくる
        $useDojos = UseButton::getUseButtonUser($user)
                             ->get();
        
        //更新日が1か月以内の道場をとってくる
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

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\User  $user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(User $user)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        
        return view('users.edit', compact('user'));
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
        $userr = Auth::user();
        
        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email =$request->input('email') ? $request->input('email'): $user->email;
        $user->area_id = $request->input('area_id') ? $request->input('area_id') : $user->area_id;
        $user->update();
        
        return redirect()->route('users.mypage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //データ削除
    }
}
