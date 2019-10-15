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

//ユーザーの登録・認証（prefix、namespace使用）
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
  Route::get('register', 'RegisterController@showRegistrationForm');
  Route::post('register', 'RegisterController@register');

  Route::get('login', 'LoginController@showLoginForm');
  Route::post('login', 'LoginController@login');

  Route::get('logout', 'LoginController@logout');
});

// 管理者用ルート
//管理者のみアクセス制限
Route::group(['namespace' => 'Admin', 'middleware' => 'admin_auth'], function() {
  // 管理者用ホーム
  Route::get('/admin/home', 'AdminController@index');

  // 商品内容の編集
  Route::get('/edit/{id}', 'AdminController@editGet');
  Route::post('/edit/{id}', 'AdminController@editPost');
  // 画像の追加
  Route::get('/upload/{id}/{name}', 'AdminController@uploadGet');
  Route::post('/upload/{id}/upload', 'AdminController@uploadPost');
  // 商品の削除
  Route::delete('/destroy/{id}', 'AdminController@destroy');
  // 商品の新規追加
  Route::get('/create', 'AdminController@create');
  Route::post('/create', 'AdminController@store');
  // サイトの確認
  Route::get('admin', 'AdminController@confirmIndex');

});
