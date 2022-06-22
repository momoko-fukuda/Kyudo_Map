<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 使用するモデル
use App\Model\Dojos;
use App\Model\Review;
use App\Model\Area;
use App\Model\User;
use App\Model\Photos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->area = new Area();
        $this->review = new Review();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 都道府県テーブルの全データを取得する
        $areas = $this->area->get();
        //reviewテーブルの全データを取得する
        $reviews = $this->review->get();
        return view('homes.home', compact('areas', 'reviews'));
    }
    
    public function about()
    {
        return view('homes.about');
    }
    
    public function role()
    {
        return view('homes.role');
    }
    
    public function policy()
    {
        return view('homes.policy');
    }
}
