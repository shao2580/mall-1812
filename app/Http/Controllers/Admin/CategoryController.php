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

// 添加处理页面
public function save()
{
    $data =request()->input();
    $model =new Category;
    $model->cate_name =$data['cate_name'];
    $model->parent_id =$data['parent_id'];
    $model->is_show =$data['is_show'];
    $model->is_nav_show =$data['is_nav_show'];
    $model->addtime =time();
    $res =$model->save();
    if ($res) {
        echo '<script>alert("添加成功");window.location.href="./list";</script>';
    }else{
        echo '<script>alert("添加失败");window.location.href="./create";</script>';
    }
    
    
}


//分类列表展示
public function list()
{
    $data =Category::get()->toArray();
    $info =Category::createTree($data);
    return view('admin.category.list',['info'=>$info]);
}
}
