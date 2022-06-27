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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $areas = Area::getAllArea();
        
        return view('dojos.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>['nullable', 'integer'],
            'name'=>['required', 'string', 'max:50'],
            'area_id'=>['required','integer'],
            'address1'=>['required', 'string', 'max:250'],
            'address2'=>['required', 'string', 'max:250'],
            'lat'=>['nullable', 'float'],
            'lng'=>['nullable', 'float'],
            'tel'=>['required', 'string', 'max:20'],
            'url'=>['nullable', 'string', 'max:250'],
            'use_money'=> ['nullable', 'string', 'max:250'],
            'use_age' => ['nullable', 'integer'],
            'use_step' => ['nullable', 'string', 'max:5'],
            'use_personal'=> ['nullable', 'string', 'max:5'],
            'use_group'=> ['nullable', 'string', 'max:5'],
            'use_affiliation'=> ['nullable', 'string', 'max:5'],
            'use_reserve'=> ['nullable', 'string', 'max:5'],
            'facility_inout'=> ['nullable', 'string', 'max:5'],
            'facility_makiwara'=> ['nullable', 'string', 'max:5'],
            'facility_aircondition'=> ['nullable', 'string', 'max:5'],
            'facility_matonumber'=> ['nullable', 'integer'],
            'facility_lockerroom'=>['nullable', 'string', 'max:5'],
            'facility_numberlimit'=>['nullable', 'string', 'max:20'],
            'facility_parking'=> ['nullable', 'string', 'max:20'],
            'other'=> ['nullable', 'string', 'max:255'],
            ]);
        
        
        
        // $area = Area::getAllArea();
        
        $dojo = new Dojo;
        $dojo->user_id = Auth::id();
        $dojo->name = $request->name;
        $dojo->area_id = $area->id;
        $dojo->address1 = $request->address1;
        $dojo->address2 = $request->address2;
        $dojo->lat = $request->lat;
        $dojo->lng = $request->lng;
        $dojo->tel = $request->tel;
        $dojo->url = $request->url;
        $dojo->use_money = $request->use_money;
        $dojo->use_age = $request->use_age;
        $dojo->use_step = $request->use_step;
        $dojo->use_personal = $request->use_personal;
        $dojo->use_group = $request->use_group;
        $dojo->use_affiliation = $request->use_affiliation;
        $dojo->use_reserve = $request->use_reserve;
        $dojo->facility_inout = $request->facility_inout;
        $dojo->facility_makiwara = $request->facility_makiwara;
        $dojo->facility_aircondition = $request->facility_airconditio;
        $dojo->facility_matonumber = $request->facility_matonumber;
        $dojo->facility_lockerroom = $request->facility_lockerroom;
        $dojo->facility_numberlimit = $request->facility_numberlimit;
        $dojo->facility_parking = $request->facility_parking;
        $dojo->other = $request->other;
        $dojo->save();
        
        return redirect()->route('dojos.show', ['id' => $dojo->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $dojo
     * @return \Illuminate\Http\Response
     */
    public function show(Dojo $dojo)
    {
        $dojo = Dojo::find($id);
        $businesshours = $dojo->businesshour;
        $dojophotos = $dojo->dojophoto;
        
        return view('dojos.show', compact('dojo', 'businesshours', 'dojophotos'));
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
