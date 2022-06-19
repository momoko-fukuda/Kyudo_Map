<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homes.home');
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
