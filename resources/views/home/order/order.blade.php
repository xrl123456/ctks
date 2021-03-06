@extends('home.order.index')


@section('order_content')
<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车-确认支付 </div>
				@if(Session::get('home_user')['name'])
				<div class="shop-title">收货地址</div>
				@else
				<a href="/home/denlu"><span class="cr"><h3>添加收货地址,请登录</h3></span></a>
				@endif

				<form action="/home/order" class="shopcart-form__box" method="post" enctype="multipart/form-data">
					{{ csrf_field() }} 
					<div class="addr-radio">
						@foreach($addres as $key => $value)
						@if($value->status ==1)
						<div class="radio-line radio-box  active">
						@else
						<div class="radio-line radio-box  ">
						@endif
							<label class="radio-label ep" title="{{ $value->address }}（{{ $value->name }}）{{ $value->phone }}">
								@if($value->status ==1)
								<input name="addres" value="{{ $value->id }}" autocomplete="off" type="radio" id="shopradio" checked/><i class="iconfont icon-radio"></i>
								@else
								<input name="addres" value="{{ $value->id }}" autocomplete="off" type="radio" id="shopradio" ><i class="iconfont icon-radio"></i>
								@endif

								{{ $value->address }}（{{ $value->name }}）{{ $value->phone }}
								 
							</label>
							<!-- <a href="" class="default">设为默认地址</a> -->
							<a href="/home/addres/{{ $value->id }}/edit" class="edit">修改</a>
						</div>
						@endforeach
					</div>
					@if(Session::get('home_user')['name'])
					<div class="add_addr"><a href="/home/addres/{{ $goods_info->id }}">添加新地址</a></div>
					<div class="shop-title">确认订单</div>
					<div class="shop-order__detail">
					@else
					
					@endif
					
						<table class="table">
							<thead>
								<tr>
									<th width="120"></th>
									<th width="300">商品信息</th>
									<th width="150">单价</th>
									<th width="200">数量</th>
									<th width="200">运费</th>
									<th width="80">总价</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row"><a href="/home/item_show/{{ $goods_info->id }}><div class="img"><img src="/uploads/Goods/{{ $goods_info->pic }}" alt="" class="cover" style="width:160px;height:160px;"></div></a></th>
									<td>
										<div class="name ep3">{{ $goods_info->gname }}</div>
										<div class="type c9">-------<!-- 尺码样式 --></div>
									</td>
									<td id="price">¥ {{ $goods_info->price }}</td>
									<td id="price"> {{ Session::get('goodsshow')['shopnum'] }}</td>
									<td>¥ 0</td>
									<td>¥{{ ($goods_info->price * Session::get('goodsshow')['shopnum']) }}</td>
								
							</tbody>
						</table>
					</div>
					<div class="shop-cart__info clearfix">
						<div class="pull-left text-left">
							<div class="info-line text-nowrap">购买时间：<span class="c6">2017年09月14日 17:31:05</span></div>
							<div class="info-line text-nowrap">交易类型：<span class="c6">担保交易</span></div>
							<div class="info-line text-nowrap">交易号：<span class="c6">1001001830267490496</span></div>
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
							<div class="info-line"><span class="favour-value">已优惠 ¥0.0</span>合计：<b class="fz18 cr">¥{{ ($goods_info->price * Session::get('goodsshow')['shopnum']) }}</b></div>
							<div class="info-line fz12 c9">（可获 <span class="c6">20</span> 积分）</div>
						</div>
					</div>
					<div class="shop-title">确认订单</div>
					<div class="pay-mode__box" id="shopbutton">
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="1" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<span class="fz16">余额支付</span><span class="fz14">（可用余额：¥88.0）</span>
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{ ($goods_info->price * Session::get('goodsshow')['shopnum']) }}</b>元</div>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="2" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="/home/images/icons/alipay.png" alt="支付宝支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{ ($goods_info->price * Session::get('goodsshow')['shopnum']) }}</b>元</div>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="3" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="/home/images/icons/paywechat.png" alt="微信支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{ ($goods_info->price * Session::get('goodsshow')['shopnum']) }}</b>元</div>
						</div>
					</div>
					<div class="user-form-group shopcart-submit">
						<input type="submit" class="btn" id="buttonshop" value="继 续 支 付" style="width: 200px;height:40px;" onclick="return shopping()">
					</div>
					<script>
						$(document).ready(function(){
							$(this).on('change','input',function() {
								$(this).parents('.radio-box').addClass('active').siblings().removeClass('active');
							})
						});
						function shopping(){
							var	radio = $("input[name='addres']:checked").val();
							// document.('#shopradio').prop('checked');
							 // $('#shopradio').parents('.radio-box').addClass('active').removeClass('active').prop("checked");
							var money =$("input[name='pay-mode']:checked").val();
						
							
							if(radio && money){

								return true;
							}else{
								alert('请选择收货信息或付款方式');
								return false;
								// $()

							}
						}
					</script>
				</form>
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