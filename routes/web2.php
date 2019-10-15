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

//home
Route::get('/', 'StatusController@index');
// 認証不要
Route::get('cart', 'StatusController@cartGet');
Route::post('cart', 'StatusController@cartPost');
Route::get('cart/empty', 'StatusController@empty');
Route::get('cart/buy', function(){
  return view('cart.buy');
});
Route::post('cart/buy', 'StatusController@buyComplete');

//通常の認証
// Route::group(['prefix' => 'auth'], function() {
//
// });
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');

Route::get('auth/logout', 'Auth\LoginController@logout');

// 管理者用ルート
// 商品内容の編集
Route::get('/edit/{id}', 'Admin\AdminController@editGet');
Route::post('/edit/{id}', 'Admin\AdminController@editPost');
// 画像の追加
Route::get('/upload/{id}/{name}', 'Admin\AdminController@uploadGet');
Route::post('/upload/{id}/upload', 'Admin\AdminController@uploadPost');
// 商品の削除
Route::delete('/destroy/{id}', 'Admin\AdminController@destroy');
// 商品の新規追加
Route::get('/create', 'Admin\AdminController@create');
Route::post('/create', 'Admin\AdminController@store');
// サイトの確認
Route::get('admin', 'Admin\AdminController@confirmIndex');

//管理者のみアクセス制限
Route::group(['middleware' => 'admin_auth'], function() {
  Route::get('/admin/home', 'Admin\AdminController@index');
});
