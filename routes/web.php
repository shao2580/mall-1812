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

//后台登录
Route::prefix('/login')->group(function(){
    Route::any('login','Admin\LoginController@login');         //登录
    // Route::any('logindo','Admin\LoginController@loginDo');     //执行登录
    // Route::any('loginout','Admin\LoginController@loginOut');   //退出登录
});

//商品
Route::prefix('/goods')->middleware([])->group(function(){
    Route::any('list','Admin\GoodsController@list');     //商品列表
    Route::any('add','Admin\GoodsController@add');     //商品添加
    Route::any('doAdd','Admin\GoodsController@doAdd');     //执行添加
    Route::any('upload','Admin\GoodsController@upload');     //执行添加
});

//分类管理
Route::prefix('/category')->group(function(){
    Route::any('create','Admin\CategoryController@create');//分类添加页面
    Route::any('save','Admin\CategoryController@save');     //添加处理页面
    Route::any('list','Admin\CategoryController@list');     //列表展示页面
    // Route::any('loginout','Admin\LoginController@loginOut');   //退出登录
});


//前台
//登录页面
Route::prefix('/index')->group(function(){
    route::any('login','Index\LoginController@login');//登录页面
    route::any('loginDo','Index\LoginController@loginDo');//登录执行页面
    route::any('loginout','Index\LoginController@loginout');//退出

    route::any('register','Index\LoginController@register');//注册页面
    route::any('registerDo','Index\LoginController@registerDo');//注册执行页面
    route::any('checkphone','Index\LoginController@checkphone');//检查手机号是否存在
    route::any('send','Index\LoginController@send');//检查手机号是否存在


});

//前台首页
Route::prefix('/index')->group(function(){
    route::any('index','Index\IndexController@index');
    route::any('top','Index\IndexController@top');
});

//分类页面
Route::prefix('/index')->group(function(){
    route::any('classify/{cate_id}','Index\ClassifyController@classify');
});

//商品详情
Route::prefix('/index')->group(function(){
    route::any('goods/{goods_id}','Index\GoodsController@goods');
    //添加购物车
    route::post('addcart','Index\GoodsController@addcart');
});

//购物车页面
Route::prefix('/index')->group(function(){
    route::get('cart','Index\CartController@cart');
    route::post('getSubTotal','Index\CartController@getSubTotal');//获取小计
    route::post('changeBuyNumber','Index\CartController@changeBuyNumber');//更改购买数量
    route::post('countTotal','Index\CartController@countTotal');//获取商品总价
    route::post('cartDel','Index\CartController@cartDel');//删除购物车
});

//个人中心
Route::prefix('/index')->group(function(){
    route::any('center','Index\CenterController@center');//我的信息
    route::any('order','Index\CenterController@order');//我的订单
    route::any('site','Index\CenterController@site');//我的地址
    route::any('siteSave','Index\CenterController@siteSave');//我的地址 省 市 区
    route::any('create','Index\CenterController@create');//我的地址 添加处理页面
});
