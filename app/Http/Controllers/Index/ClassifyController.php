<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class ClassifyController extends Controller
{

	//分类页面
	public function classify()
	{
		// $cate_id=request()->cate_id;
		// $info =Category::where(['cate_id'=>$cate_id])->get();
		// dd($info);
		$res =Category::where(['is_nav_show'=>1])->get();
	    return view('index.classify',['res'=>$res]);
	}



}