<?php
namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    //前台首页
    public function index()
    {
        $data=DB::table('goods')->limit(5)->get();
        $cateData = Category::where('parent_id',0)->with('son')->get();
        // dd($cateData);
        
        return view('index.index',['data'=>$data,'cateData'=>$cateData]);
    }


   

}
