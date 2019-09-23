<?php
namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Category;

class IndexController extends Controller
{

    //前台首页 商品查询
    public function index()
    {
        $data=DB::table('goods')->limit(5)->get();
        $res =Category::where(['is_nav_show'=>1])->get();
        return view('index.index',compact('data','res'));
    }

  
}
