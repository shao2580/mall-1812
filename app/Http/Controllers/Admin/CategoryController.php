<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use DB;
class CategoryController extends Controller
{
   
//添加页面
public function create()
{
    $data =Category::get()->toArray();
    $info =Category::createTree($data);
    return view('admin.category.create',['info'=>$info]);
}

//添加处理页面
// public function save()
// {
//     $data =request()->post();
    
    
// }


//分类列表展示
public function list()
{
    $data =Category::get()->toArray();
    $info =Category::createTree($data);
    return view('admin.category.list',['info'=>$info]);
}
}
