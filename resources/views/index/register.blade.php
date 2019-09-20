<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="./css/login.css">

	</head>
	<body>
		<form >
		<div class="regist">
			<div class="regist_center">
				<div class="regist_top">
					<div class="left fl">会员注册</div>
					<div class="right fr"><a href="./index" target="_self">小米商城</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="regist_main center">
					<div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="text" id="u_name" name="u_name" placeholder="请输入你的用户名"/><span>请不要输入汉字</span></div>
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" id="u_pwd" name="u_pwd" placeholder="请输入你的密码"/><span>请输入6位以上字符</span></div>
					
					<div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="u_pwds" placeholder="请确认你的密码"/><span>两次密码要输入一致哦</span></div>
					<div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;<input class="shurukuang" type="text" id="u_phone"  name="u_phone" placeholder="请填写正确的手机号"/>
						<input type="button" class="btn" value="发送验证码" id="send">
					</div>
					 
					<div class="username">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="text" id="code" name="code" placeholder="请输入接收的验证码"/><span></span></div>
				</div>
				<div class="regist_submit">
					<input class="submit" type="submit" name="submit" value="立即注册" >
				</div>
				
			</div>
		</div>
		</form>
	</body>
</html>
<script src="/js/jquery.min.js"></script>
<script>
$(function(){
			//手机验证
			$('input[name=u_phone]').blur(function(){
					//alert('asdsasd');
					var u_phone=$(this).val();
					$(this).next().empty();
            		var _this=$(this);
            		var reg=/^\w{1,13}$/;
            		if (u_phone==''){
	                $(this).after("<span style='color:red'>手机号不能为空!</span>");
		                return false;
		            }else if(!reg.test(u_phone)){
		                $(this).after("<span style='color:red'>请输入正确的手机格式！</span>");
		                return false;
		            }else{
	            	$.ajax({
                    url:"/index/checkphone",
                    method:'post',
                    data:{u_phone:u_phone},
                    dataType:'json',
                    success:function(res){
                        if(res.code==1){
                            _this.after('<span style="color:red">手机号已存在</span>')
                        }else if(res.code==2){
                            _this.after('<span style="color:green">手机号可用</span>')
                        }
                    }
                	});
	            	}
				});
			//验证密码
			$('input[name=u_pwd]').blur(function(){
		        var u_pwd=$(this).val();
		        $(this).next().empty();
		        var reg=/^\w{1,6}$/;
		        if(u_pwd==''){
		            $(this).after("<span style='color:red'>注册密码不能为空!</span>");
		            return false;
		        }else if(!reg.test(u_pwd)){
		            $(this).after("<span style='color:red'>注册密码格式不对!</span>");
		            return false;
		        }else{
		            $(this).after('<span style="color:green">密码可用</span>')
		        }
		    });
			 //验证确认密码
		    $('input[name=u_pwds]').blur(function(){
		        var u_pwds=$(this).val();
		        var u_pwd=$('input[name=u_pwd]').val();
		        $(this).next().empty();
		        var reg=/^\w{1,6}$/;
		        if(u_pwds==''){
		            $(this).after("<span style='color:red'>注册重复密码不能为空!</span>");
		            return false;
		        }else if(!reg.test(u_pwds)){
		            $(this).after("<span style='color:red'>注册重复密码格式不对!</span>");
		            return false;
		        }else if(u_pwd!=u_pwds){
		            $(this).after("<span style='color:red'>两次密码不符合!</span>");
		            return false;
		        }else{
		            $(this).after('<span style="color:green">密码可用</span>')
		        }
		    });

		    //用户名
		    $('input[name=u_name]').blur(function(){
		    	var u_name=$(this).val();
		    	$(this).next().empty();
		    	var reg=/^\w{1,6}$/;
		    	if(u_name==''){
		            $(this).after("<span style='color:red'>注册用户名不能为空!</span>");
		            return false;
		        }else if(!reg.test(u_name)){
		            $(this).after("<span style='color:red'>用户名应为六位以内字母!</span>");
		            return false;
		        }else{
		            $(this).after('<span style="color:green">用户名可用</span>')
		        }

		    });

		   	//提交、
			$(".submit").click(function(){
	            //获取用户名
	            var u_name=$("#u_name").val();
	            var u_pwd=$('#u_pwd').val();
	            var u_phone=$('#u_phone').val();
	            var code=$('#code').val();
	            $.post( 
	                "{{url('/index/registerDo')}}", 
	                {u_name:u_name,u_pwd:u_pwd,u_phone:u_phone,code:code},
	                function(res){
	                   // console.log(res);
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
	        });
			
			//z验证码
			$('#send').click(function(){

	            var u_phone=$('#u_phone').val();
	            var send=$('#send').val();
	            
	            // console.log(tel);return;
	            reg=/^1[3456789]\d{9}$/;
	            if(u_phone==''){
	                alert("手机号不能为空");
	                return false;
	            }else if(!(reg.test(u_phone))){
	                alert("手机号格式有误");
	                return false;
	            }

	            $.post({
	                url:"/index/send",
	                data:{u_phone:u_phone},
	                dataType:'json',
	                success:function(res){
	                    console.log(res);
	                }
	            });
            });
	
	});
	
	 

</script>