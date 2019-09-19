<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class FenlanController extends Controller
{
    /**
     * 分栏添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function add()
    {
//        echo 1;die;
        $info=DB::table('lan')->get()->toArray();
//        dd($info);
        return view('/fenlan/add',['info'=>$info]);
    }

    /**
     * 分栏执行添加
     * @return bool|false|float|int|string
     */
    public function doadd()
    {
        $data=request()->input();
        //dd($data);
        $data['create_time']=time();
        $res=DB::table('fenlan')->insert($data);
        //dd($res);
        if($res){
            return json_encode(['msg'=>'添加品牌成功❤❤❤','code'=>1]);

        } else{
            return json_encode(['msg'=>'添加品牌失败❤❤❤','code'=>2]);
        }

    }

    /**
     * 分栏展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function lists()
    {

        $s = $_GET['s']??'';

        if (empty($s)){
            $where = [
                'status' => 1
            ];
        }else{
            $where = [
                ['status' ,'=' , 1] ,
                ['s_name','like',"%$s%"]
            ];
        }

        $res=DB::table('fenlan')
            ->join('lan','fenlan.lan_id','=','lan.lan_id')
            ->where($where)
            ->paginate(5);
//            ->toArray();
        //dd($res);
        return view('/fenlan/lists',compact('res','s'));
    }

    /**
     * 删除
     * @return bool|false|float|int|string
     */
    public function del()
    {
        $id=request()->s_id;
        //dd($id);
        $res=DB::table('fenlan')->where('s_id',$id)->update(['status'=>2]);
        //dd($res);
        if($res){
            return json_encode(['msg'=>'删除品牌成功❤❤❤','code'=>1]);
        }else{
            return json_encode(['msg'=>'删除品牌失败❤❤❤','code'=>2]);
        }
    }

    /**
     * 分栏修改
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function update()
    {
        $id=request()->id;
        //dd($id);
        $info=DB::table('lan')->get()->toArray();
        $res=DB::table('fenlan')
            ->join('lan','fenlan.lan_id','=','lan.lan_id')
            ->where('fenlan.s_id',$id)
            ->first();
        //dd($res);
        return view('/fenlan/update',['info'=>$info,'res'=>$res]);

    }

    /**
     * 执行分栏修改
     * @return bool|false|float|int|string
     */
    public function doupdate()
    {
        $id=request()->s_id;
        $data=request()->input();
        $res=DB::table('fenlan')->where('s_id',$id)->update($data);
        if($res){
            return json_encode(['msg'=>'修改品牌成功❤❤❤','code'=>1]);
        }else{
            return json_encode(['msg'=>'修改品牌失败❤❤❤','code'=>2]);
        }
    }
}
