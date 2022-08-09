<?php

namespace App\Http\Controllers;

// 使用するモデル
use App\Model\Dojo;
use App\Model\Review;
use App\Model\Area;
use App\Model\User;
use App\Model\Photos;
use App\Mail\ContactForm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * ホーム画面、
 * アプリ説明画面、
 * プライバシーポリシー画面、
 * 利用規約画面のクラスコントローラ
 */
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *　ホーム画面
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Dojo $dojo)
    {
        $reviews = Review::getReviewLast5();
        $user = Auth::user();

        return view('homes.home', compact('reviews', 'user', 'dojo'));
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
    
    
    /**
     * お問合せフォーム画面
     */
    public function contact()
    {
        return view('homes.contact');
    }
    /**
     * お問合せフォームメール送信処理
     */
    public function contact_send(Request $request)
    {
        $request->validate([
            'contacttype'=> 'required',
            'name' => 'required',
            'email'=> 'required|email',
            'contact' => 'required',
            'check_agree' => 'required'
            ]);
            
        ContactForm::contactSend($request);
        
        return redirect('/contact')->with(
            'success',
            'お問合せを受け付けました。'
        );
    }
}
