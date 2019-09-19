<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
   	//后台主页
    public function index()
    {
    	echo '1';
    	return view('admin.index.index');
    }

}
