<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Category;
use App\Model\Goods;
use Illuminate\Support\Str;

class GoodsController extends Controller
{
    //商品列表
    public function list()
    {
        // echo 1;
        $data = Goods::join("category", "goods.cate_id", "=", "category.cate_id")->get();


        return view('admin.goods.list', ['data' => $data]);
    }

    //添加页面
    public function add()
    {
        $data = Category::get();
        $data = Goods::createTree($data);
        return view('admin.goods.add', ['data' => $data]);
    }

    //执行添加
    public function doAdd(Request $request)
    {
        $data = $request->input();
        // dd($data);
        $res = Goods::insert($data);
        // dd($res);
        if ($res) {
            return \redirect('/goods/list');
        }
    }

    public function upload(Request $request){
        
        $file = $request->file('file');
        $path_name = Str::random(30).'.'.$file->getClientOriginalExtension();
        $dir = date("Ymd");
        $path = $file->storeAs($dir,$path_name);

        return response() -> json(['code'=>0,'path'=>$dir.DIRECTORY_SEPARATOR.$path_name]);
    }
}
