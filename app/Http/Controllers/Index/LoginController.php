<?php
namespace App\Http\Controllers\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{

    //登录页面
    public function login()
    {
        return view('index.login');
    }
    //登录执行页面
    public function loginDo()
    {
        $u_name=request()->u_name;
        $u_pwd=md5(request()->u_pwd);
         $where=[
            'u_name'=>$u_name
        ];
        $userInfo=DB::table('user')->where($where)->first();
        $en_pwd=$userInfo->u_pwd;
         if($u_pwd!=$en_pwd){
             //echo "用户错误1";
            return ['code'=>0,'count'=>'用户或密码错误'];
        }else{
             //echo "用户正确";
            $u_id=$userInfo->u_id;
            $u_name=$userInfo->u_name;
            if($userInfo->u_pwd==$u_pwd){
               //  echo "密码正确";
                session(['u_id'=>$u_id]);
                session(['u_name'=>$u_name]);
                return ['code'=>1,'count'=>'登陆成功'];
            }else{
               //  echo "密码错误";
                return ['code'=>0,'count'=>'用户或密码错误'];
            }

        }


    }

    //退出
    public function loginout ()
    {
        request()->session()->forget('u_id');
        return redirect('index/index');
        
    }

    //注册页面
    public function register()
    {
        return view('index.register');
    }

    //注册执行页面
    public function registerDo ()
    {
        // $u_name = request()->u_name;
        // $u_pwd = request()->u_pwd;
        // $u_phone = request()->u_phone;
        $data=request()->all();
         $code=$data['code'];
        $time = time();
        $u_pwd = md5($data['u_pwd']);
         if(empty($data['u_name']) || empty($data['u_pwd']) || empty($data['u_phone']) || empty($data['code'])){
            die('缺少参数');
        }
        if($code != Redis::get('code')){
            echo json_encode(['msg'=>'输入验证码不正确，请重新输入','code'=>3]);
        }
        unset($data['$code']);

        $data = [
            'u_name' => $data['u_name'],
            'u_pwd' =>  $u_pwd,
            'u_phone' => $data['u_phone'],
            'created_at' => $time
        ];
        $res=DB::table('user')->insert($data);
       if($res){
        Redis::del('code');
            return ['code'=>1,'count'=>'注册成功'];
        }else{
            return ['code'=>2,'count'=>'注册失败'];
        }


         
    }

    //检查手机号是否存在
    public function checkphone(){
        $u_phone=request()->u_phone;
        // dd($u_phone);
         
        $res=DB::table('user')->where('u_phone',$u_phone)->first();
         
        if($res){
            return ['code'=>1,'msg'=>'对'];
        }else{
            return ['code'=>2,'msg'=>'错'];
        }
    }

    //发送验证码
    public function send ()
    {
          $u_phone=request()->u_phone;
        //dd($tel);
        $code=rand(1000,9000);
        // $host = "http://yzxtz.market.alicloudapi.com";
        // $path = "/yzx/notifySms";
          $host = "http://dingxin.market.alicloudapi.com";
         $path = "/dx/sendSms";

        $method = "POST";
        //$appcode = "78477519dadc4eadbe0b0aa25e8eacd6";
          $appcode = "2b506cccc1cb48b7a9981c8f2a3abafd";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        //$querys = "phone=$u_email&templateId=TP18040316&variable=num%3A$code%2Cmoney%3A888";
        $querys = "mobile=".$u_phone."&param=code%3A".$code."&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        //var_dump(curl_exec($curl));

        Redis::set('code',$code);

        return (curl_exec($curl));
    }
}