<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
   	//后台主页
    public function index()
    {
    	return view('admin.index.index');
    }
    //后台主页图
	public function welcome()
    {
    	return view('admin.index.welcome');
    }

    //管理员列表
    public function list()
    {
    	return view('admin.admin.list');
    }
    
    public function add()
    {
    	return view('admin.admin.add');
    }



}
