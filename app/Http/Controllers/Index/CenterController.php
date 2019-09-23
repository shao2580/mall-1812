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
    $u_id =session('u_id');
    $model =new OrderAddress;
    $model->address_name =$data['address_name'];
    $model->address_tel =$data['address_tel'];
    $model->address_mail =$data['address_mail'];
    $model->province =$data['province'];
    $model->city =$data['city'];
    $model->area =$data['area'];
    $model->address_detail =$data['address_detail'];
    $model->user_id =$u_id;
    $model->create_time =time();
    $res =$model->save();
    if ($res) {
        return \json_encode(['code'=>200,'msg'=>'添加成功']);
    }else{
        return json_encode(['code'=>200,'msg'=>'添加失败']);
    }
    
}

}