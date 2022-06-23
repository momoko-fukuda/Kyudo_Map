<?php

namespace App\Http\Controllers;

// 使用するモデル
use App\Model\Dojo;
use App\Model\Review;
use App\Model\BusinessHour;
use App\Model\Area;
use App\Model\User;
use App\Model\Photo;

use Illuminate\Http\Request;

/**
 * 道場検索、詳細画面、道場新規登録のクラスコントローラ
 */
class DojoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // dojosデータを取得
        $dojos = Dojo::getDojoSearch();
        // dojoデータのarea_idごとにパラメータ値を変更する(例：dojos?area_id=1)
        $area_id = $request->area_id;
        // dojosデータのaddress1ごとにパラメータ値を変更する(例：dojos?address1=帯広)
        $address1 = $request->address1;
        // その他詳細条件のパラメータ変数をつくっておく（年齢制限/段制限/個人利用制限など…）
        $freetext = $request->freetext;
        $conditions = $request->conditions;
        
        
        return view('dojos.index', compact('dojos', 'area_id', 'address1', 'freetext', 'conditions'));
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
     * @param  int  $dojo
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
     * @param  int  $dojo
     * @return \Illuminate\Http\Response
     */
    public function edit(Dojo $dojo)
    {
        // データ処理
        return view('dojos.edit', compact('dojo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $dojo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dojo $dojo)
    {
        //データ登録
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $dojo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dojo $dojo)
    {
        //データ削除
    }
}
