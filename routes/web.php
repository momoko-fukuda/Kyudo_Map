<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// トップ画面
Route::get('/', 'HomeController@index');
// トップ画面からのそれぞれの遷移
Route::get('/about', 'HomeController@about');
Route::get('/role', 'HomeController@role');
Route::get('/policy', 'HomeController@policy');
Route::get('/mypage', 'HomeController@mypage');

// 道場データ表示関連
Route::resource('dojos', 'DojoController');

// 口コミデータ関連
Route::get('dojos/{dojo}/reviews/create', 'ReviewController@create');
Route::post('dojos/{dojo}/reviews', 'ReviewController@store');
Route::get('dojos/{dojo}/reviews/{review}', 'ReviewController@show');
Route::delete('dojos/{dojo}/reviews/{review}', 'ReviewController@destroy');

// 画像関連？


