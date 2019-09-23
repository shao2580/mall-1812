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
    Route::get('index','Admin\IndexController@index');		//首页
    Route::get('welcome','Admin\IndexController@welcome');  //首页图

    Route::get('list','Admin\IndexController@list');		//管理员列表
    Route::post('add','Admin\IndexController@add');          //管理员添加
});

Route::prefix('/vip')->middleware([])->group(function(){
    Route::get('vlist','Admin\UserController@vlist');     //会员列表
});

//后台登录
Route::prefix('/login')->group(function(){

    Route::get('login','Admin\LoginController@login');         //登录
    Route::any('logindo','Admin\LoginController@loginDo');     //执行登录
    Route::post('loginout','Admin\LoginController@loginOut');   //退出登录

    Route::any('login','Admin\LoginController@login');         //登录
    // Route::any('logindo','Admin\LoginController@loginDo');     //执行登录
    // Route::any('loginout','Admin\LoginController@loginOut');   //退出登录

});

//商品
Route::prefix('/goods')->middleware([])->group(function(){
    Route::get('list','Admin\GoodsController@list');     //商品列表
    Route::get('add','Admin\GoodsController@add');     //商品添加
    Route::post('doAdd','Admin\GoodsController@doAdd');     //执行添加
    Route::any('upload','Admin\GoodsController@upload');     //执行添加
});

//分类管理
Route::prefix('/category')->group(function(){
    Route::any('create','Admin\CategoryController@create');//分类添加页面
    Route::any('save','Admin\CategoryController@save');     //添加处理页面
    Route::any('list','Admin\CategoryController@list');     //列表展示页面
});

#专栏管理
Route::prefix('/fenlan')->group(function(){
    Route::get('add','FenlanController@add');//添加视图
    Route::post('doadd','FenlanController@doadd');//执行添加
    Route::get('lists','FenlanController@lists');//展示
    Route::post('del','FenlanController@del');//删除
    Route::get('update','FenlanController@update');//修改
    Route::post('doupdate','FenlanController@doupdate');//执行修改
});


/*前台首页*/
Route::prefix('/index')->group(function(){
    route::get('index','Index\IndexController@index');
});

 //登录页面
Route::prefix('/index')->group(function(){
    route::get('login','Index\LoginController@login');//登录页面
    route::post('loginDo','Index\LoginController@loginDo');//登录执行页面
    route::get('loginout','Index\LoginController@loginout');//退出

    route::get('register','Index\LoginController@register');//注册页面
    route::post('registerDo','Index\LoginController@registerDo');//注册执行页面
    route::post('checkphone','Index\LoginController@checkphone');//检查手机号是否存在
    route::any('send','Index\LoginController@send');//发送验证码
    route::any('index','Index\IndexController@index');

    route::any('cate','Index\IndexController@cate'); 

    route::any('top','Index\IndexController@top');

});

//分类页面
Route::prefix('/index')->group(function(){

    route::get('classify','Index\ClassifyController@classify');

    route::any('classify/{cate_id}','Index\ClassifyController@classify');

});

//商品详情
Route::prefix('/index')->group(function(){
    route::get('goods/{goods_id}','Index\GoodsController@goods');
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
    route::get('center','Index\CenterController@center');//我的信息
    route::get('order','Index\CenterController@order');//我的订单
    route::get('site','Index\CenterController@site');//我的地址
    route::get('siteSave','Index\CenterController@siteSave');//我的地址 省 市 区
    route::get('create','Index\CenterController@create');//我的地址 添加处理页面
});




