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

// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/home', 'PlacesController@index')->name('places.index');
    Route::resource('places', 'PlacesController');
    
    Route::group(['prefix' => 'home/{id}'], function (){
       Route::get('likes', 'UsersController@likes')->name('users.likes'); 
    });
    
    Route::group(['prefix' => 'place_detail/{id}'], function () {
        Route::post('like', 'LikesController@store')->name('likes.like');
        Route::delete('nolike', 'LikesController@destroy')->name('likes.nolike');
    });
    
    
    
    
    
    // Route::post('places','PlacesController@store')->name('places.store');
    // Route::put('places/{id}','PlacesController@update')->name('places.update');
    // Route::delete('places/{id}', 'PlacesController@destroy')->name('places.destroy');
    // Route::get('places/create','PlacesController@create')->name('places.create');
    // Route::get('places/{id}/edit','PlacesController@edit')->name('places.edit');
});
