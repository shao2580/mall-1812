<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Area;
use App\Model\OrderAddress;
use DB;
class CenterController extends Controller
{

//个人中心
public function center()
{
    return view('index.center');
}



//我的订单
public function order()
{
    return view('index.order');
}


//我的地址
public function site()
{
    $siteInfo =Area::where(['pid'=>0])->get()->toArray();
    return view('index/site',['siteInfo'=>$siteInfo]);
}

//获取市县
public function siteSave()
{
     $id=request()->id;
     if (empty($id)){
        die;
    }
    $data=DB::table('area')->where('pid',$id)->get()->toArray();
    return ['data'=>$data,'code'=>1];
}

public function create()
{
    $data =request()->input();
    $res =OrderAddress::create($data);
    dd($res);
    
}

}