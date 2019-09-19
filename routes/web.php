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

Route::get('/', function () {
    return view('welcome');
});

/*后台*/
Route::prefix('/admin')->group(function(){
    Route::any('index','Admin\IndexController@index');		//首页
    Route::any('index_v1','Admin\IndexController@indexV1'); //首页图
});





