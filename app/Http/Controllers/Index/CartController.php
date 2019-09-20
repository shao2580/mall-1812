<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    //购物车页面
    public function cart()
    {
        //根据用户id查询商品id
        //$u_id=session('u_id');
        $u_id=7;
        $where=[
            ['u_id','=',$u_id],
            ['is_del','=',1]
        ];
        // dd($where);
        $data=DB::table('cart')
            ->join('goods','cart.goods_id','=','goods.goods_id')
            ->where($where)
            ->orderBy('cart_id')
            ->get();
        //print_r($data);exit;

        // 获取小计
        if(!empty($data)){
            foreach ($data as $k => $v) {
                $total=$v->shop_price*$v->buy_number;
                $data[$k]->total=$total;
            }
        }
        //print_r($data);exit;

        //获取商品件数
        $shopcount=DB::table('cart')->where($where)->count();
        return view('index.cart',compact('data','shopcount'));
    }

    //获取小计
    public function getSubTotal()
    {
        $goods_id=request()->goods_id;
        // echo $goods_id;exit;
        //获取商品价格
        $goodsWhere=[
            ['goods_id','=',$goods_id]
        ];
        $shop_price=DB::table('goods')->where($goodsWhere)->value('shop_price');
        // print_r($shop_price);die;
        //获取商品购买数量
        //根据用户id
        //$u_id=session('u_id');
        $u_id=7;
        $cartWhere=[
            ['goods_id','=',$goods_id],
            ['u_id','=',$u_id]
        ];
        $buy_number=DB::table('cart')->where($cartWhere)->value('buy_number');
        // print_r($buy_number);die;
        echo $shop_price*$buy_number;
    }

    //更改购买数量
    public function changeBuyNumber()
    {
        $goods_id=request()->goods_id;
        $buy_number=request()->buy_number;
        // echo $goods_id;
        // echo $buy_number;exit;
        //根据id查询商品库存
        $goods_number=DB::table('goods')->where('goods_id',$goods_id)->value('goods_number');
        // echo $goods_number;exit;
        //监测商品库存
        if($buy_number>$goods_number){
            echo "超过库存";die;
        }

        //获取用户id
        //$u_id=session('u_id');
        $u_id=7;
        $where=[
            'goods_id'=>$goods_id,
            'u_id'=>$u_id
        ];
        $updateInfo=[
            'buy_number'=>$buy_number
        ];
        $result=DB::table('cart')->where($where)->update($updateInfo);
        // dump($result);die;
        if($result){
            echo 1;
        }else{
            echo 2;
        }
    }

    //重新计算总价
    public function countTotal()
    {
        $goods_id=request()->goods_id;
        $goods_id=explode(',',$goods_id);
        // print_r($goods_id);exit;
        //获取用户id
        //$u_id=session('u_id');
        $u_id=7;
        $where=[
            'u_id'=>$u_id
        ];
        // print_r($where);exit;
        $info=DB::table('cart')
            ->select('shop_price','buy_number')
            ->join('goods','cart.goods_id','=','goods.goods_id')
            ->where($where)
            ->whereIn('cart.goods_id',$goods_id)
            ->get();
        // print_r($info);exit;
        $count=0;
        foreach ($info as $k => $v) {
            $count+=$v->shop_price*$v->buy_number;
        }
        echo $count;
    }

    //删除购物车
    public function cartDel()
    {
        $goods_id=request()->goods_id;
        // print_r($goods_id);die;
        //获取用户id
        //$u_id=session('u_id');
        $u_id=7;
        $where=[
            ['u_id','=',$u_id],
            //单删、批删用in
            ['goods_id','=',$goods_id]
        ];
        $updateWhere=[
            'is_del'=>2
        ];
        $res=DB::table('cart')->where($where)->update($updateWhere);
        if($res){
            return ['code'=>2000,'count'=>'删除成功'];
        }else{
            return ['code'=>2002,'count'=>'删除失败'];
        }
    }
}