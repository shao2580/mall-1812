
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>小米商城-个人中心</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
	</head>
	<body>
	<!-- start header -->
		<header>
			<div class="top center">
				<div class="left fl">
					<ul>
						<li><a href="http://www.mi.com/" target="_blank">小米商城</a></li>
						<li>|</li>
						<li><a href="">MIUI</a></li>
						<li>|</li>
						<li><a href="">米聊</a></li>
						<li>|</li>
						<li><a href="">游戏</a></li>
						<li>|</li>
						<li><a href="">多看阅读</a></li>
						<li>|</li>
						<li><a href="">云服务</a></li>
						<li>|</li>
						<li><a href="">金融</a></li>
						<li>|</li>
						<li><a href="">小米商城移动版</a></li>
						<li>|</li>
						<li><a href="">问题反馈</a></li>
						<li>|</li>
						<li><a href="">Select Region</a></li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="right fr">
					<div class="gouwuche fr"><a href="./dingdanzhongxin.html">我的订单</a></div>
					<div class="fr">
						<ul>
							<li><a href="./login.html" target="_blank">登录</a></li>
							<li>|</li>
							<li><a href="./register.html" target="_blank" >注册</a></li>
							<li>|</li>
							<li><a href="#top">个人中心</a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</header>
	<!--end header -->
	<!-- start banner_x -->
		<div class="banner_x center">
			<a href="./index.html" target="_blank"><div class="logo fl"></div></a>
			<a href=""><div class="ad_top fl"></div></a>
			<div class="nav fl">
				<ul>
					<li><a href="">小米手机</a></li>
					<li><a href="">红米</a></li>
					<li><a href="">平板·笔记本</a></li>
					<li><a href="">电视</a></li>
					<li><a href="">盒子·影音</a></li>
					<li><a href="">路由器</a></li>
					<li><a href="">智能硬件</a></li>
					<li><a href="">服务</a></li>
					<li><a href="">社区</a></li>
				</ul>
			</div>
			<div class="search fr">
				<form action="" method="post">
					<div class="text fl">
						<input type="text" class="shuru"  placeholder="小米6&nbsp;小米MIX现货">
					</div>
					<div class="submit fl">
						<input type="submit" class="sousuo" value="搜索"/>
					</div>
					<div class="clear"></div>
				</form>
				<div class="clear"></div>
			</div>
		</div>
<!-- end banner_x -->
<!-- self_info -->
	<div class="grzxbj">
		<div class="selfinfo center">
		<div class="lfnav fl">
			<div class="ddzx">订单中心</div>
			<div class="subddzx">
				<ul>
					<li><a href="{{url('/index/order')}}" >我的订单</a></li>
					<li><a href="">意外保</a></li>
					<li><a href="">团购订单</a></li>
					<li><a href="">评价晒单</a></li>
				</ul>
			</div>
			<div class="ddzx">个人中心</div>
			<div class="subddzx">
				<ul>
					<li><a href="{{url('/index/center')}}" style="color:#ff6700;font-weight:bold;">我的个人中心</a></li>
					<li><a href="">消息通知</a></li>
					<li><a href="">优惠券</a></li>
					<li><a href="">收货地址</a></li>
				</ul>
			</div>
		</div>
		<div class="rtcont fr">
		<div class="grzlbt ml40">添加地址|<a href="">地址管理</a><span>
			<div class="subgrzl ml40"><span>昵称</span><input type="text" name="address_name" class="address_name"></div>
			<div class="subgrzl ml40"><span>手机号</span><input type="text" name="address_tel" class="address_tel"></div>
			<div class="subgrzl ml40"><span>邮编</span><input type="text" name="address_mail" class="address_mail"></div>
            <div class="subgrzl ml40"><span>收货地址</span>
               
                    <select name="province" lay-verify="required" class="province" id="province">
                        <option value="0">--请选择--</option>
						@foreach($siteInfo as $v)
                                <option value="{{$v['id']}}">{{$v['name']}}</option>
						@endforeach
                       
                    </select>

                    <select name="city" lay-verify="required" class="city" id="city">
                        <option value="">--请选择--</option>
                    </select>

                    <select name="area" lay-verify="required" class="area" id="area">
                        <option value="">--请选择--</option>
                    </select>
            </div>
            <div class="subgrzl ml40"><span>详情地址</span><input type="text" name="address_detail" class="address_detail"></div>
			<div class="ml40"><span><input type="submit" value="保存" class="sub"></span></div>
		</div>
		<div class="clear"></div>
		</div>
	</div>
<!-- self_info -->
		
		<footer class="mt20 center">			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>
	</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<script>
    $(function(){
		//获取市
        $(".province").change(function(){
            var _this =$(this);
        	var id = _this.val();  //获取下拉菜单的value值
			$.post(
                "./siteSave",
                {id:id},
                function(res){
					console.log(res);
					var city=res.data;
                    var _option = "<option></option>";
                    for(var i in city){
                    	_option+="<option value='"+city[i].id+"'>"+city[i].name+"</option>";
                    }
                    _this.next('select').html(_option);
                },
                'json'
            )
        });

		//获取县区
		$(".city").change(function(){
            var _this =$(this);
        	var id = _this.val();  //获取下拉菜单的value值
			$.post(
                "./siteSave",
                {id:id},
                function(res){
					console.log(res);
					var area=res.data;
                    var _option = "<option></option>";
                    for(var i in area){
                    	_option+="<option value='"+area[i].id+"'>"+area[i].name+"</option>";
                    }
                    _this.next('select').html(_option);
                },
                'json'
            )
        });

		//提交
		$(".sub").click(function(){
			var address_name =$(".address_name").val();//获取名称
			if (address_name == '') {
				alert('昵称不可为空');return;
			}
			var address_tel =$(".address_tel").val();//获取电话
			if (address_tel == '') {
				alert('电话号码不能为空');return;
			}
			var address_mail =$(".address_mail").val();//获取邮编
			var province =$(".province").val();//获取城市
			var city =$(".city").val();//获取市
			var area =$(".area").val();//获取县区
			var address_detail =$(".address_detail").val();//获取详情地址
			$.post(
				'./create',
				{address_name:address_name,address_tel:address_tel,address_mail:address_mail,province:province,city:city,area:area,address_detail:address_detail},
				'json',
				function(res){
					console.log(res);
					if (res.code == 200) {
						alert(res.msg);
						location.href ='./site';
					}else{
						alert(res.msg);
					}
				} 
			);

		});
    });
</script>