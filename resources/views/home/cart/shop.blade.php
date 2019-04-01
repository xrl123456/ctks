@extends('home.order.index')

@section('order_content')
<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车-确认支付 </div>
				<div class="shop-title">收货地址</div>
				<form action="/home/order/shoppay/{{ Session::get('home_user')['id'] }}" class="shopcart-form__box" method="post">
					{{ csrf_field() }} 
					<div class="addr-radio">

						@foreach($addres as $key => $value)
						
						<div class="radio-line radio-box ">
							<label class="radio-label ep" title="{{ $value->address }}（{{ $value->name }}）{{ $value->phone }}">
								<input name="addres" value="{{ $value->id }}" autocomplete="off" type="radio" id="shopradio"><i class="iconfont icon-radio"></i>
								{{ $value->address }}（{{ $value->name }}）{{ $value->phone }}
								 
							</label>
							<a href="" class="default">设为默认地址</a>
							<a href="" class="edit">修改</a>
						</div>
						@endforeach
					</div>
					<div class="add_addr"><a href="/home/addres/{{ Session::get('home_user')['id'] }}">添加新地址</a></div>
					<div class="shop-title">确认订单</div>
					<div class="shop-order__detail">
						<table class="table">
							<thead>
								<tr>
									<th width="120">编号</th>
									<th width="80"></th>
									<th width="300">商品信息</th>
									<th width="150">单价</th>
									<th width="200">数量</th>
									<th width="200">运费</th>
									<th width="80">总价</th>
								</tr>
							</thead>
							<tbody>
								@foreach($shops as $key=>$value)
									@foreach($value->addersand as $k=>$v)
								<tr>
									<td><input name="{{ $value->id }}" value="{{ $i++ }}" style="width:80px;border:#000;"></td>
									<th scope="row"><a href="item_show.html"><div class="img"><img src="/uploads/Goods/{{ $v->pic }}" alt="" class="cover"></div></a></th>
									<td>
										<div class="name ep3">{{ $v->gname }}</div>
										<div class="type c9">描述：{{ $v->goodsinfo }}</div>
									</td>
									<td>¥{{ $v->price }}</td>
									<td>{{ $value->number }}</td>
									<td>¥0</td>
									<td>¥{{ $value->oprice }}</td>
								</tr>
										@endforeach
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="shop-cart__info clearfix">
						<div class="pull-left text-left">
							
						</div>
						<div class="pull-right text-right">
							<div class="form-group">
								<label for="coupon" class="control-label">优惠券使用：</label>
								<select id="coupon" >
									<option value="-1" selected>------ 请选择可使用的优惠券 -------</option>
									<option value="1">-----亲~该商品暂无可用的优惠券哦-----</option>
								</select>
							</div>
							<script>
								$('#coupon').bind('change',function() {
									console.log($(this).val());
								})
							</script>
							<div class="info-line">优惠活动：<span class="c6">无</span></div>
							<div class="info-line">运费：<span class="c6">¥0.00</span></div>
							<div class="info-line"><span class="favour-value"></span>合计：<b class="fz18 cr">￥{{ Session::get('money') }}</b></div>
							<!-- <div class="info-line fz12 c9">（可获 <span class="c6">20</span> 积分）</div> -->
						</div>
					</div>
					<div class="shop-title">确认订单</div>
					<div class="pay-mode__box">
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="1" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<span class="fz16">余额支付</span><span class="fz14">（可用余额：¥88888.0）</span>
							</label>
							<div class="pay-value">支付<b class="fz16 cr">￥{{ Session::get('money') }}</b>元</div>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="2" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="images/icons/alipay.png" alt="支付宝支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">￥{{ Session::get('money') }}</b>元</div>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="3" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="images/icons/paywechat.png" alt="微信支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">￥{{ Session::get('money') }}</b>元</div>
						</div>
					</div>
					<div class="user-form-group shopcart-submit">
						<input type="submit" class="btn" value="继续支付" onclick="return dontshop()">
					</div>
				</form>
					<script>
						$(document).ready(function(){
							$(this).on('change','input',function() {
								$(this).parents('.radio-box').addClass('active').siblings().removeClass('active');
							})
						});

						$(document).ready(function(){
							$(this).on('change','input',function() {
								$(this).parents('.radio-box').addClass('active').siblings().removeClass('active');
							})
						});
						function dontshop(){
							var	radio = $("input[name='addres']:checked").val();
							var money =$("input[name='pay-mode']:checked").val();
							if(radio && money){

								return true;
							}else{
								alert('请选择收货信息或付款方式');
								return false;
							}
						}
					</script>
			</div>
		</section>
	</div>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="#" class="r-item-hd">
					<i class="iconfont icon-user" data-badge="0"></i>
					<div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="/home/shop" class="r-item-hd">
					<i class="iconfont icon-cart"></i>
					<div class="r-tip__box"><span class="r-tip-text">购物车</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="#" class="r-item-hd">
					<i class="iconfont icon-aixin"></i>
					<div class="r-tip__box"><span class="r-tip-text">我的收藏</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="#" class="r-item-hd">
					<i class="iconfont icon-liaotian"></i>
					<div class="r-tip__box"><span class="r-tip-text">联系客服</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="#" class="r-item-hd">
					<i class="iconfont icon-liuyan"></i>
					<div class="r-tip__box"><span class="r-tip-text">留言反馈</span></div>
				</a>
			</li>
			<li class="r-toolbar-item to-top">
				<i class="iconfont icon-top"></i>
				<div class="r-tip__box"><span class="r-tip-text">返回顶部</span></div>
			</li>
		</ul>
		<script>
			$(document).ready(function(){ $('.to-top').toTop({position:false}) });
		</script>
	</div>

@endsection
