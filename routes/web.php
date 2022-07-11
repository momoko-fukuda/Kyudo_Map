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


// 道場データ表示関連
Route::resource('dojos', 'DojoController');

// いいねボタン関連
Route::get('dojos/{dojo}/favoritebutton', 'ButtonController@favoritebutton');
Route::get('dojos/{dojo}/unfavoritebutton', 'ButtonController@unfavoritebutton');

Route::get('dojos/{dojo}/usebutton', 'ButtonController@usebutton');
Route::get('dojos/{dojo}/unusebutton', 'ButtonController@unusebutton');





// 口コミデータ関連
Route::get('dojos/{dojo}/reviews', 'ReviewController@index')->name('reviews.index');
Route::get('dojos/{dojo}/reviews/create', 'ReviewController@create')->name('reviews.create');
Route::post('dojos/{dojo}/reviews', 'ReviewController@store')->name('reviews.store');
Route::delete('dojos/{dojo}/reviews/{review}', 'ReviewController@destroy')->name('reviews.destroy');

// 画像関連(review_photosのデータも合わせて表示させる際はこの内容で問題ないのか？ここがおかしい)
Route::get('dojos/{dojo}/photos', 'PhotoController@index')->name('photos.index');
Route::delete('dojos/{dojo}/photos/{photo}', 'PhotoController@destroy');


// マイページ関連
Route::get('users/mypage', 'UserController@mypage')->name('mypage');
Route::get('users/mypage/edit', 'UserController@edit')->name('mypage.edit');
Route::put('users/mypage', 'UserController@update')->name('mypage.update');
Route::delete('users/mypage', 'UserController@destroy')->name('mypage.delete');

// 認証関連
Auth::routes();
