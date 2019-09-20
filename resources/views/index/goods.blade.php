@extends('public.index')
@section('content')
	
	<!-- xiangqing -->
	<form action="post" method="">
	<div class="xiangqing">
		<div class="neirong w">
			<div class="xiaomi6 fl">小米6</div>
			<nav class="fr">
				<li><a href="">概述</a></li>
				<li>|</li>
				<li><a href="">变焦双摄</a></li>
				<li>|</li>
				<li><a href="">设计</a></li>
				<li>|</li>
				<li><a href="">参数</a></li>
				<li>|</li>
				<li><a href="">F码通道</a></li>
				<li>|</li>
				<li><a href="">用户评价</a></li>
				<div class="clear"></div>
			</nav>
			<div class="clear"></div>
		</div>	
	</div>
	
	<div class="jieshao mt20 w">
		<div class="left fl"><img src="/uploads/{{$data->goods_img}}" alt="" width="560"></div>
		<input type="hidden" id="goods_id" value="{{$data->goods_id}}">
		<div class="right fr">
			<div class="h3 ml20 mt20">{{$data->goods_name}}</div>
			<div class="jianjie mr40 ml20 mt10">{{$data->description}}</div>
			<div class="jiage ml20 mt10">{{$data->shop_price}}元</div>
			<div class="ft20 ml20 mt20">选择版本</div>
			<div class="xzbb ml20 mt10">
				<div class="banben fl">
					<a>
						<span>全网通版 6GB+64GB </span>
						<span>2499元</span>
					</a>
				</div>
				<div class="banben fr">
					<a>
						<span>全网通版 6GB+128GB</span>
						<span>2899元</span>
					</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="ft20 ml20 mt20">选择颜色</div>
			<div class="xzbb ml20 mt10">
				<div class="banben">
					<a>
						<span class="yuandian"></span>
						<span class="yanse">亮黑色</span>
					</a>
				</div>
				
			</div>
			<div class="xqxq mt20 ml20">
				<div class="top1 mt10">
					<div class="left1 fl">小米6 全网通版 6GB内存 64GB 亮黑色</div>
					<div class="right1 fr">2499.00元</div>
					<div class="clear"></div>
				</div>
				<div class="bot mt20 ft20 ftbc">总计：2499元</div>
			</div>
			<div class="xiadan ml20 mt20">
				<input class="jrgwc"  type="button" name="jrgwc" value="立即选购" />
				<input class="jrgwc sub" type="button" name="jrgwc" value="加入购物车" />
			</div>
		</div>
		<div class="clear"></div>
	</div>
	</form>

	<script src="{{asset('/js/jquery.min.js')}}"></script>
	<script>
		$(function(){
			//点击加入购物车
			$(document).on('click','.sub',function(){
				var goods_id=$('#goods_id').val();
				//alert(goods_id);
				//把商品id 购买数量传给控制器

				$.post(
					"{{url('/index/addcart')}}",
					{goods_id:goods_id},
					function(res){
						// console.log(res);
						if(res.code==4000){
							alert(res.message);
							location.href='/index/cart';
						}else{
							alert(res.message);
						}
					},
					'json'
				);

			});

		})
	</script>

@endsection

