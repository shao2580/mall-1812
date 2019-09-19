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
Route::prefix('/admin')->middleware([])->group(function(){
    Route::any('index','Admin\IndexController@index');		//首页
    Route::any('welcome','Admin\IndexController@welcome');  //首页图

    Route::any('list','Admin\IndexController@list');		//管理员列表
    Route::any('add','Admin\IndexController@add');          //管理员添加
});

Route::prefix('/vip')->middleware([])->group(function(){
    Route::any('vlist','Admin\UserController@vlist');     //会员列表
});

Route::prefix('/login')->group(function(){
    Route::any('login','Admin\LoginController@login');         //登录
    Route::any('logindo','Admin\LoginController@loginDo');     //执行登录
    Route::any('loginout','Admin\LoginController@loginOut');   //退出登录
});

/*前台*/
Route::prefix('index')->group(function(){    
    //不用登陆
    Route::namespace('Index')->group(function(){  
        Route::any('index','IndexController@index');             //主页
    });

    //登陆 注册
    Route::middleware([])->namespace('Index')->group(function(){   
         Route::any('login','IndexController@login');                 //登录
         Route::any('register_1','IndexController@registerV1');       //注册1
         Route::any('register_2','IndexController@registerV2');       //注册2
    });

    //登陆
    Route::middleware([])->namespace('Index')->group(function(){   
        Route::any('userinfo','UserController@userinfo');   //个人资料
        Route::any('password','UserController@password');   //修改密码
        Route::any('email','UserController@email');         //修改邮箱
    }); 
}); 








