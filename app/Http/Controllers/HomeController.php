<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// 使用するモデル
use App\Model\Dojo;
use App\Model\Review;
use App\Model\Area;
use App\Model\User;
use App\Model\Photos;

/**
 * ホーム画面、アプリ説明画面、プライバシーポリシー画面、利用規約画面のクラスコントローラ
 */
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *　ホーム画面
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reviews = Review::getReviewLast5();

        return view('homes.home', compact('reviews'));
    }
    

    
    
    /**
     * 弓道のTEBIKIとは？の画面
     */
    public function about()
    {
        return view('homes.about');
    }
    
    /**
     * 利用規約の画面
     */
    public function role()
    {
        return view('homes.role');
    }
    
    /**
     * プライバシーポリシーの画面
     */
    public function policy()
    {
        return view('homes.policy');
    }
}
