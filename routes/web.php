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

//分类管理
Route::prefix('/category')->group(function(){
    Route::any('create','Admin\CategoryController@create');//分类添加页面
    Route::any('save','Admin\CategoryController@save');     //添加处理页面
    Route::any('list','Admin\CategoryController@list');     //列表咋还是女孩页面
    // Route::any('loginout','Admin\LoginController@loginOut');   //退出登录
});

 

//前台
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
    route::any('site','Index\CenterController@site');//我的地址
    route::any('siteSave','Index\CenterController@siteSave');//我的地址 省 市 区
    route::any('create','Index\CenterController@create');//我的地址 添加处理页面
});

