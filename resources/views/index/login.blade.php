<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>会员登录</title>
		<link rel="stylesheet" type="text/css" href="./css/login.css">
		
	</head>
	<body>
		<!-- login -->
		<div class="top center">
			<div class="logo center">
				<a href="./index" target="_blank"><img src="./image/mistore_logo.png" alt=""></a>
			</div>
		</div>
		<form  method="" action="" class="form center"> 
		<div class="login">
			<div class="login_center">
				<div class="login_top">
					<div class="left fl">会员登录</div>
					<div class="right fr">您还不是我们的会员？<a href="./register" target="_self">立即注册</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="login_main center">
					<div class="username">用户名:&nbsp;<input class="shurukuang" type="text" id="u_name" placeholder="请输入你的用户名"/></div>
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;<input class="shurukuang" type="password" id="u_pwd" placeholder="请输入你的密码"/></div>
					 
				</div>
				 
					<button class="submit">登录</button>
				 
				
			</div>
		</div>
		</form>
		<footer>
			<div class="copyright">简体 | 繁体 | English | 常见问题</div>
			<div class="copyright">小米公司版权所有-京ICP备10046444-<img src="./image/ghs.png" alt="">京公网安备11010802020134号-京ICP证110507号</div>

		</footer>
	</body>
</html>
<script src="/js/jquery.min.js"></script>
<script>
    $(function(){
        //点击获取
        $(".submit").click(function(){
            //获取用户名
            var u_name=$("#u_name").val();
            var u_pwd=$('#u_pwd').val();
            //验证
            if(u_name==''){
                alert('账号必填');
                return false;
            }
            if(u_pwd==''){ 
                alert('密码必填');
                return false;
            }
            $.post( 
                "{{url('/index/loginDo')}}", 
                {u_name:u_name,u_pwd:u_pwd},
                function(res){
                    console.log(res);
                    if(res.code==1){
                        alert(res.count);
                        location.href="{{url('/index/index')}}"
                    }else{
                        alert(res.count); 
                        return false;
                    }
                  },
                 'json'
           );
             return false;
        })
    });
</script>