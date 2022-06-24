<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Model\Area;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * 新規登録画面のクラスコントローラ
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * area_id 追加（活動エリア）
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'area_id' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * area_id 追加（活動エリア）
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'area_id' => $data['area_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    /**
     * registerの登録画面上で、areasテーブルデータ（都道府県データ）を
     * 取ってきて、viewに$areasの変数(データ)を渡す。
     */
    public function showRegistrationForm()
    {
        // 都道府県テーブルの全データを取得する
        $areas = Area::getAllArea();
       
        return view('auth.register', compact('areas'));
    }
}
