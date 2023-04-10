<?php


use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 商品一覧表示
Route::get('/plist','ProductController@showList')->name('showList');
// 検索結果
Route::get('/psearch', 'ProductController@search')->name('search');


// 商品新規登録画面
// 入力
Route::get('/pregist','ProductController@create')->name('create');
// 完了
Route::post('/plist', 'ProductController@store')->name('store');



//商品詳細画面
Route::get('/pdetail/{id}', 'ProductController@detail')->name('detail');



// 商品編集画面
Route::get('/pedit/{id}', 'ProductController@edit')->name('edit');
// 商品更新処理
Route::put('/update/{id}', 'ProductController@update')->name('update');

// 商品の削除処理
Route::delete('/destroy/{id}', 'ProductController@destroy')->name('destroy');
