<?php

namespace App\Http\Controllers;

use App\Model\Dojo;
use App\Model\Review;
use App\Model\User;
use App\Model\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mypage()
    {
        /**
         * 何を出したいか？
         * →userデータ
         * →dojoデータ(userで登録したarea_idとの紐づけ、かつ直近で更新されたもの+気になる・利用したボタンに該当した道場)
         * →reviewデータ（自分で投稿したもののみ）
         */
        
        $user = Auth::user();
        
        return view('users.mypage', compact('user'));
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
