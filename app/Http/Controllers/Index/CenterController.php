<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}