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


// トップ画面と遷移（HomeController）
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('home.about');
Route::get('/role', 'HomeController@role')->name('home.role');
Route::get('/policy', 'HomeController@policy')->name('home.policy');
//お問合せフォームの送信
Route::get('/contact', 'HomeController@contact')->name('home.contact');
Route::post('/contact_send', 'HomeController@contact_send')->name('home.contact_send');


// 道場データ表示関連
Route::resource('dojos', 'DojoController');

// いいねボタン関連
Route::get('dojos/{dojo}/favoritebutton', 'ButtonController@favoritebutton');
Route::get('dojos/{dojo}/unfavoritebutton', 'ButtonController@unfavoritebutton');

Route::get('dojos/{dojo}/usebutton', 'ButtonController@usebutton');
Route::get('dojos/{dojo}/unusebutton', 'ButtonController@unusebutton');

Route::post('/reviewLike', 'ReviewController@like')->name('reviews.like');


// 口コミデータ関連
Route::get('dojos/{dojo}/reviews', 'ReviewController@index')->name('reviews.index');
Route::get('dojos/{dojo}/reviews/create', 'ReviewController@create')->name('reviews.create');
Route::post('dojos/{dojo}/reviews', 'ReviewController@store')->name('reviews.store');

Route::delete('mypage/reviewsdelete/{id}', 'UserController@review_destroy')->name('reviews.destroy');


// 画像関連
Route::get('dojos/{dojo}/photos', 'PhotoController@index')->name('photos.index');
Route::delete('dojos/{dojo}/photos/{photo}', 'PhotoController@destroy');


// マイページ関連
Route::get('mypage', 'UserController@mypage')->name('mypage');
Route::get('mypage/{user}/edit', 'UserController@edit')->name('mypage.edit');
Route::put('mypage/{user}', 'UserController@update')->name('mypage.update');
Route::get('mypage/{user}/delete', 'UserController@deleteview')->name('mypage.deleteview');
Route::delete('mypage/{user}', 'UserController@destroy')->name('mypage.delete');


//パスワードの更新
Route::get('mypage/{user}/password/edit', 'UserController@edit_password')->name('mypage.edit_password');
Route::put('mypage/{user}/password', 'UserController@update_password')->name('mypage.update_password');


// 認証関連
Auth::routes(['verify' => true]);
