<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class GoodsController extends Controller
{

//商品详情
public function goods()
{
    return view('index.goods');
}

}