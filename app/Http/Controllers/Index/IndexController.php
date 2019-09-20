<?php
namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    //前台首页
    public function index()
    {
        $data=DB::table('goods')->limit(5)->get();
        return view('index.index',compact('data'));
    }

}