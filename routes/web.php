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

// 练习
Route::prefix('/exercise')->group(function(){
    Route::any('login','ExerciseController@login');    
    Route::any('a','ExerciseController@a');    
});


#专栏管理
Route::prefix('/fenlan')->group(function(){
    Route::get('add','FenlanController@add');//添加视图
    Route::any('doadd','FenlanController@doadd');//执行添加
    Route::any('lists','FenlanController@lists');//展示
    Route::any('del','FenlanController@del');//删除
    Route::any('update','FenlanController@update');//修改
    Route::any('doupdate','FenlanController@doupdate');//执行修改
});

