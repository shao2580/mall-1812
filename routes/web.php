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

Route::prefix('/user')->middleware([])->group(function(){
    Route::any('list','Admin\UserController@userList');     //会员列表
});

Route::prefix('/login')->group(function(){
    Route::any('login','Admin\LoginController@login');         //登录
    Route::any('logindo','Admin\LoginController@loginDo');     //执行登录
    Route::any('loginout','Admin\LoginController@loginOut');   //退出登录
});



//登录页面
Route::prefix('/index')->group(function(){
    route::any('login','Index\LoginController@login');//登录页面
    route::any('register','Index\LoginController@register');//注册页面
});

//前台首页
Route::prefix('/index')->group(function(){
    route::any('index','Index\IndexController@index');
});

//分类页面
Route::prefix('/index')->group(function(){
    route::any('classify','Index\ClassifyController@classify');
});

//商品详情
Route::prefix('/index')->group(function(){
    route::any('goods','Index\GoodsController@goods');
});

//购物车页面
Route::prefix('/index')->group(function(){
    route::any('cart','Index\CartController@cart');
});

//个人中心
Route::prefix('/index')->group(function(){
    route::any('center','Index\CenterController@center');//我的信息
    route::any('order','Index\CenterController@order');//我的订单
});

