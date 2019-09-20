<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ClassifyController extends Controller
{

	//分类页面
	public function classify()
	{
	    return view('index.classify');
	}



}