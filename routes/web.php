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

<<<<<<< HEAD
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








=======
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
<<<<<<< HEAD


#专栏管理
Route::prefix('/fenlan')->group(function(){
    Route::get('add','FenlanController@add');//添加视图
    Route::any('doadd','FenlanController@doadd');//执行添加
    Route::any('lists','FenlanController@lists');//展示
    Route::any('del','FenlanController@del');//删除
    Route::any('update','FenlanController@update');//修改
    Route::any('doupdate','FenlanController@doupdate');//执行修改
});

=======
>>>>>>> zt-dev
>>>>>>> bcca214ef11ab59a43e502d9a2ceca4bd7fd6320
