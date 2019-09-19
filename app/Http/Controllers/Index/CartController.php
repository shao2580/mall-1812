<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CartController extends Controller
{

//购物车页面
public function cart()
{
    return view('index.cart');
}

}