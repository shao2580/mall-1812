<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Cart;

class GoodsController extends Controller
{

    //商品详情
    public function goods()
    {
        //接收商品id
        $goods_id=request()->goods_id;
        // dd($goods_id);
        //根据商品id查询一条商品数据
        $data=DB::table('goods')->where('goods_id','=',$goods_id)->first();
        //dd($data);
        return view('index.goods',compact('data'));
    }

    //添加购物车
    public function addcart()
    {
        //接受商品id  购买数量
        $goods_id=request()->goods_id;
        //echo $goods_id;die;
        $buy_number=1;
        //dd($goods_id);
        //根据用户id，商品id判断用户是否买过此商品
        //$u_id=session('u_id');
        $u_id=7;
        //dd($uid);
        $where=[
            'u_id'=>$u_id,
            'goods_id'=>$goods_id,
            'is_del'=>1
        ];
        // dd($where);
        $cartInfo=DB::table('cart')->where($where)->first();
        // print_r($cartInfo);die;
        if(!empty($cartInfo)){
            // echo "累加";die;
            //用户买过之后 判断库存 累加
            // print_r($cartInfo);die;
            $number=$cartInfo->buy_number;
            // echo $number;die;
            //根据id查询商品库存
            $goods_number=DB::table('goods')->where('goods_id',$goods_id)->value('goods_number');
            // echo $goods_number;exit;
            //监测商品库存
            if($buy_number+$number>$goods_number){
                $data=[
                    'code'=>'4001',
                    'message'=>'超出库存',
                    'data'=>[]
                ];
                die(json_encode($data,JSON_UNESCAPED_UNICODE));
            }
            // echo $buy_number;die;
            //没超库存执行修改数据
            $updateInfo=[
                //已加入购车的数量+将要购买数量
                'buy_number'=>$number+$buy_number
            ];
            // print_r($updateInfo);
            $result=Cart::where($where)->update($updateInfo);
        }else{
            //echo "添加";die;
            //没买过 判断库存 添加
            //根据id查询商品库存
            $goods_number=DB::table('goods')->where('goods_id',$goods_id)->value('goods_number');
            // echo $goods_number;exit;
            //监测商品库存
            if($buy_number>$goods_number){
                $data=[
                    'code'=>'4001',
                    'message'=>'超出库存',
                    'data'=>[]
                ];
                die(json_encode($data,JSON_UNESCAPED_UNICODE));
            }
            $info=[
                'goods_id'=>$goods_id,
                'buy_number'=>$buy_number,
                'u_id'=>$u_id,
               'create_time'=>time()
            ];
            // print_r($info);die;
            $result=Cart::insert($info);
        }
        if($result){
            $data=[
                'code'=>'4000',
                'message'=>'加入购物车成功',
                'data'=>[]
            ];
            die(json_encode($data,JSON_UNESCAPED_UNICODE));
        }else{
            $data=[
                'code'=>'4004',
                'message'=>'加入购物车失败',
                'data'=>[]
            ];
            die(json_encode($data,JSON_UNESCAPED_UNICODE));
        }
    }
}