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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(); //-- この行を追加
Route::resource('/articles', 'ArticleController')->except(['index','show'])->middleware('auth'); //-- この行を変更
Route::get('/', 'ArticleController@index')->name('articles.index'); //-- この行を編集
Route::resource('/articles', 'ArticleController')->only(['show']); //-- この行を変更
