<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * ログイン画面のクラスコントローラ
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * login rememberme時の動作
     */
    protected function authenticated(Request $request, $user)
    {
        $params = $request->all();
        if (Auth::attempt(['email'=>$params['email'],
                          'password'=>$params['password']])) {
            if (isset($params['remember'])&& $params['remember'] === 'on') {
                Auth::attempt(['email'=>$params['email'], 'password'=> $params['password']], true);
            } else {
                Auth::attempt(['email'=>$params['email'], 'password'=>$params['password']], false);
            }
        }
    }
}
