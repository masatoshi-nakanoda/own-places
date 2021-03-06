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

// トップページ
Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', function () {
    return view('map.map');
});

Route::get('/thankyou', function () {
    return view('thankyou');
});

// 投稿一覧ページ
Route::get('place', 'PlacesController@all')->name('places.all');
Route::get('place_detail/{id}', 'PlacesController@show')->name('places.show');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('passwords.reset');

// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    
    Route::group(['prefix' => 'home/{id}'], function (){
        Route::get('likes', 'UsersController@likes')->name('users.likes');
        Route::get('delete', 'UsersController@userdelete')->name('users.delete');
        Route::delete('dell', 'UsersController@destroy')->name('users.destroy');
    });
    
    Route::group(['prefix' => 'place_detail/{id}'], function () {
        Route::post('like', 'LikesController@store')->name('likes.like');
        Route::delete('nolike', 'LikesController@destroy')->name('likes.nolike');
    });
    
    Route::get('/home', 'PlacesController@index')->name('places.index');
    Route::post('places','PlacesController@store')->name('places.store');
    Route::put('places/{id}','PlacesController@update')->name('places.update');
    Route::delete('places/{id}', 'PlacesController@destroy')->name('places.destroy');
    Route::get('places/create','PlacesController@create')->name('places.create');
    Route::get('places/{id}/edit','PlacesController@edit')->name('places.edit');
});


