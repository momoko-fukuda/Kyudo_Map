<?php

namespace App\Http\Controllers;

// 使用するモデル
use App\Model\Dojos;
use App\Model\Reviews;
use App\Model\BusinessHour;
use App\Model\Area;
use App\Model\User;
use App\Model\Photos;

use Illuminate\Http\Request;

class DojoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dojos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dojos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //データ登録設定
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dojo $dojo)
    {
        // データ処理内容
        return view('dojos.show', compact('dojo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dojo $dojo)
    {
        // データ処理
        return view('dojos.edit',compact('dojo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dojo $dojo)
    {
        //データ登録
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dojo $dojo)
    {
        //データ削除
    }
}
