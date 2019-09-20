<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>我的购物车-小米商城</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
	</head>
	<body>
	<!-- start header -->
	<!--end header -->

<!-- start banner_x -->
		<div class="banner_x center">
			<a href="./index.html" target="_blank"><div class="logo fl"></div></a>
			
			<div class="wdgwc fl ml40">我的购物车</div>
			<div class="wxts fl ml20">温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</div>
			<div class="dlzc fr">
				<ul>
					<li><a href="./login.html" target="_blank">登录</a></li>
					<li>|</li>
					<li><a href="./register.html" target="_blank">注册</a></li>	
				</ul>
				
			</div>
			<div class="clear"></div>
		</div>
		<div class="xiantiao"></div>
		<div class="gwcxqbj" style="height: 80%">
			<div class="gwcxd center">
				<div class="top2 center">
					<div class="sub_top fl">
						<input type="checkbox" value="quanxuan" class="quanxuan" id="allbox"/>全选
					</div>
					<div class="sub_top fl">商品名称</div>
					<div class="sub_top fl" style="margin-left: 290px">单价</div>
					<div class="sub_top fl">数量</div>
					<div class="sub_top fl">小计</div>
					<div class="sub_top fr">操作</div>
					<div class="clear"></div>
				</div>
				<div class="content2 center">
					<div class="sub_content fl ">
						<input type="checkbox" value="quanxuan" class="quanxuan" />
					</div>
					<div class="sub_content fl"><img src="./image/gwc_xiaomi6.jpg"></div>
					<div class="sub_content fl ft20">小米6全网通6GB内存+64GB 亮黑色</div>
					<div class="sub_content fl ">2499元</div>
					<div class="sub_content fl">
						<input class="shuliang" type="number" value="1" step="1" min="1" >
					</div>
					<div class="sub_content fl">2499元</div>
					<div class="sub_content fl"><a href="">×</a></div>
					<div class="clear"></div>
				</div>
				<div class="content2 center">
					<div class="sub_content fl ">
						<input type="checkbox" value="quanxuan" class="quanxuan" />
					</div>
					<div class="sub_content fl"><img src="./image/gwc_xiaomi6.jpg"></div>
					<div class="sub_content fl ft20">小米6全网通6GB内存+64GB 亮黑色</div>
					<div class="sub_content fl ">2499元</div>
					<div class="sub_content fl">
						<input class="shuliang" type="number" value="1" step="1" min="1" >
					</div>
					<div class="sub_content fl">2499元</div>
					<div class="sub_content fl"><a href="">×</a></div>
					<div class="clear"></div>
				</div>

				@if($data)
				@foreach($data as $v)
				<div class="content2 center">
					<div class="sub_content fl" goods_id="{{$v->goods_id}}">
						<input type="checkbox" value="quanxuan" class="quanxuan box"/>
					</div>
					<div class="sub_content fl"><img src="/uploads/{{$v->goods_img}}" style="width: 80px"></div>
					<div class="sub_content fl ft20">{{$v->goods_name}}</div>
					<div class="sub_content fl" style="width: 100px;">{{$v->shop_price}}元</div>

					<div class="sub_content fl" style="width: 85px;margin-left: 60px" goods_number="{{$v->goods_number}}" goods_id="{{$v->goods_id}}">
						<input type="button" class="less" value="-" style="width: 20px;height:30px" />
						<input type="text" style="width: 30px;height: 30px; font-size: 15px;" value="{{$v->buy_number}}" class="buy_number" />
						<input type="button" class="add" value="+" style="width: 20px;height:30px" />
					</div>

					<div class="sub_content fl" style="width: 100px;margin-left: 80px">{{$v->total}}元</div>
					<div class="sub_content fl" style="margin-left: 100px" goods_id="{{$v->goods_id}}"><a href="javacript:;" class="del">×</a></div>
					<div class="clear"></div>
				</div>
				@endforeach
				@endif

			</div>
			<div class="jiesuandan mt20 center">
				<div class="tishi fl ml20">
					<ul>
						<li><a href="{{url('/index/index')}}">继续购物</a></li>
						<li>|</li>
						<li>
							共<span> @if($shopcount=='') 0 @else {{$shopcount}} @endif </span>件商品
						</li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="jiesuan fr">
					<div class="jiesuanjiage fl">合计（不含运费）：<span id="count">0.00元</span></div>
					<div class="jsanniu fr"><input class="jsan" type="submit" name="jiesuan"  value="去结算"/></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>

	<script src="{{asset('/js/jquery.min.js')}}"></script>
	<script>
		$(function(){
			//全选
			$('#allbox').click(function(){
				var status=$(this).prop('checked');
				// console.log(status);
				$('.box').prop('checked',status);

				//调用获取商品总价方法
				countTotal();
			});

			//点击+号
			$(document).on('click','.add',function(){
				_this=$(this);
				var buy_number=parseInt(_this.prev('input').val());
				// alert(buy_number);
				//获取库存
				var goods_number=_this.parents('div').attr('goods_number');
				// alert(goods_number);
				//控制器改变购买数量
				var goods_id=_this.parents('div').attr('goods_id');
				// alert(goods_id);
				//判断是否大于库存
				if(buy_number>=goods_number){
					//把+失效
					_this.prop('disabled',true);
				}else{
					buy_number+=1;
					_this.prev('input').val(buy_number);
					_this.parent().children('input').first().prop('disabled',false);
				}

				//更改购买数量
				changeBuyNumber(goods_id,buy_number);

				//获取小计
				getSubTotal(goods_id,_this);

				//给当前复选框选中
				boxChecked(_this);

				//重新计算总价
				countTotal();
			});

			//点击-号
			$(document).on('click','.less',function(){
				_this=$(this);
				var buy_number=parseInt(_this.next('input').val());
				// console.log(buy_number);
				var goods_number=_this.parents('div').attr('goods_number');
				// console.log(goods_number);
				//控制器改变购买数量
				var goods_id=_this.parents('div').attr('goods_id');
				// console.log(goods_id);
				//购买数量<=1
				if(buy_number<=1){
					//把-失效
					_this.prop('disabled',true);
				}else{
					buy_number-=1;
					_this.next('input').val(buy_number);
					_this.parent().children('input').last().prop('disabled',false);
				}

				//更改购买数量
				changeBuyNumber(goods_id,buy_number);

				//获取小计
				getSubTotal(goods_id,_this);

				//给当前复选框选中
				boxChecked(_this);

				//重新计算总价
				countTotal();
			});

			//购买数量 失去焦点
			$(document).on('blur','.buy_number',function(){
				var _this=$(this);
				//改变购买数量
				var buy_number=_this.val();
				var goods_number=_this.parents('div').attr('goods_number');
				//验证
				var reg=/^\d{1,}$/;
				if(buy_number==''||buy_number<=1||!reg.test(buy_number)){
					_this.val(1);
				}else if(parseInt(buy_number)>=parseInt(goods_number)){
					_this.val(goods_number);
				}else{
					_this.val(parseInt(buy_number));
				}

				//控制器改变购买数量
				var goods_id=_this.parents('div').attr('goods_id');
				changeBuyNumber(goods_id,buy_number);

				//复选框选中
				boxChecked(_this);

				//改变小计
				getSubTotal(goods_id,_this);

				//获取商品总价
				countTotal();
			});

			//点击复选框
			$(document).on('click','.box',function(){
				//调用获取商品总价方法
				countTotal();
			});

			//给当前复选框选中
			function boxChecked(_this)
			{
				_this.parents('div').parents('div').first('div').find("input[type='checkbox']").prop('checked',true);
			}

			//获取小计
			function getSubTotal(goods_id,_this)
			{
				$.post(
					"{{url('/index/getSubTotal')}}",
					{goods_id:goods_id},
					function(res){
						// console.log(res);
						_this.parent().next('div').text(res+'元');
					}
				);
			}

			//更改购买数量
			function changeBuyNumber(goods_id,buy_number)
			{
				$.ajax({
					url:"/index/changeBuyNumber",
					method:'post',
					data:{goods_id:goods_id,buy_number:buy_number},
					dataType:'json',
					async:false
				}).done(function(res){
					// console.log(res);
					if(res==2){
						alert('未更改数量');
						{{--location.href="{{url('/index/cart')}}"--}}
					}
				});
			}

			//重新计算总价
			function countTotal()
			{
				//获取所有选中的复选框 对应的商品id
				var _box=$('.box');
				//console.log(_box);
				var goods_id='';
				_box.each(function(index){
					// console.log(index);
					if($(this).prop('checked')==true){
						goods_id+=$(this).parents('div').attr('goods_id')+',';
					}
				});
				//去掉最后一个‘,’
				goods_id=goods_id.substr(0,goods_id.length-1);
				//console.log(goods_id);
				//把商品id传给控制器 获取商品总价
				$.post(
					"{{url('/index/countTotal')}}",
					{goods_id:goods_id},
					function(res){
						 //console.log(res);
						$('#count').text(res+"元");
					}
				);
			}

			//点击删除
			$(document).on('click','.del',function(){
				_this=$(this);
				// console.log(_this);
				var goods_id=_this.parents().attr('goods_id');
				//alert(goods_id);
				$.post(
					"{{url('/index/cartDel')}}",
					{goods_id:goods_id},
					function(res){
						// console.log(res);
						if(res.code==2000){
							//把当前一行元素移除
							_this.parents().parents().first('dev').remove();
							//获取商品总价
							countTotal();
						}else{
							alert('删除失败');
						}
					}
				);
			})

		})
	</script>
	<!-- footer -->
	<footer class="center">

			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div>
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>

	</body>
</html>
