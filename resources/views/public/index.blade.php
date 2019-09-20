<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>小米商城</title>
		<link rel="stylesheet" type="text/css" href="{{asset('index/css/style.css')}}">
	</head>
	<body>
	<!-- start header -->
		<header>
			<div class="top center">
				<div class="left fl">
					<ul>
						<li><a href="http://local.shop1812.com/index/index" target="_blank">小米商城</a></li>
						<li>|</li>
						<li><a href="https://www.miui.com/">MIUI</a></li>
						<li>|</li>
						<li><a href="http://www.miliao.com/">米聊</a></li>
						<li>|</li>
						<li><a href="https://app.tanwan.com/">游戏</a></li>
						<li>|</li>
						<li><a href="http://www.duokan.com/">多看阅读</a></li>
						<li>|</li>
						<li><a href="https://free.aliyun.com/">云服务</a></li>
						<li>|</li>
						<li><a href="http://bj.kuaijibo.com/">金融</a></li>
						<li>|</li>
						<li><a href="https://www.mi.com/">小米商城移动版</a></li>
						<li>|</li>
						<li><a href="">问题反馈</a></li>
						<li>|</li>
						<li><a href="https://kamisorishears.com/select-region/">Select Region</a></li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="right fr">
					<div class="gouwuche fr"><a href="{{url('index/cart')}}">购物车</a></div>
					<div class="fr">
						<ul>
							<li><a href="{{url('/index/login')}}" target="_blank">登录</a></li>
							<li>|</li>
							<li><a href="{{url('/index/register')}}" target="_blank" >注册</a></li>
							<li>|</li>
							<li><a href="{{url('/index/center')}}">个人中心</a></li>
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
					<li><a href="{{url('/index/classify')}}" target="_blank">小米手机</a></li>
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

@yield('content')

		<footer class="mt20 center">			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>
	</body>
</html>