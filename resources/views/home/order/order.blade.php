@extends('home.order.index')

@section('order_content')
              
<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车-确认支付 </div>
				<div class="shop-title">收货地址</div>
				<form action="" class="shopcart-form__box">
					<div class="addr-radio">
						<div class="radio-line radio-box active">
							<label class="radio-label ep" title="福建省 福州市 鼓楼区 温泉街道 五四路159号世界金龙大厦20层B北 福州rpg.blue网络 （喵喵喵 收） 153****9999">
								<input name="addr" checked="" value="0" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								福建省 福州市 鼓楼区 温泉街道
								五四路159号世界金龙大厦20层B北 福州rpg.blue网络
								（喵喵喵 收） 153****9999
							</label>
							<a href="javascript:;" class="default">默认地址</a>
							<a href="udai_address_edit.html" class="edit">修改</a>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep" title="福建省 福州市 鼓楼区 温泉街道 五四路159号世界金龙大厦20层B北 福州rpg.blue网络 （taroxd 收） 153****9999">
								<input name="addr" value="1" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								福建省 福州市 鼓楼区 温泉街道
								五四路159号世界金龙大厦20层B北 福州rpg.blue网络
								（taroxd 收） 153****9999
							</label>
							<a href="" class="default">设为默认地址</a>
							<a href="udai_address_edit.html" class="edit">修改</a>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep" title="福建省 福州市 鼓楼区 温泉街道 五四路159号世界金龙大厦20层B北 福州rpg.blue网络 （喵污喵⑤ 收） 153****9999">
								<input name="addr" value="2" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								福建省 福州市 鼓楼区 温泉街道
								五四路159号世界金龙大厦20层B北 福州rpg.blue网络
								（喵污喵⑤ 收） 153****9999
							</label>
							<a href="" class="default">设为默认地址</a>
							<a href="udai_address_edit.html" class="edit">修改</a>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep" title="福建省 福州市 鼓楼区 温泉街道 五四路159号世界金龙大厦20层B北 福州rpg.blue网络 （浴巾打码女 收） 153****9999">
								<input name="addr" value="2" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								福建省 福州市 鼓楼区 温泉街道
								五四路159号世界金龙大厦20层B北 福州rpg.blue网络
								（浴巾打码女 收） 153****9999
							</label>
							<a href="" class="default">设为默认地址</a>
							<a href="" class="edit">修改</a>
						</div>
					</div>
					<div class="add_addr"><a href="udai_address.html">添加新地址</a></div>
					<div class="shop-title">确认订单</div>
					<div class="shop-order__detail">
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
									<th scope="row"><a href="/home/item_show/{{ $goods_info->id }}><div class="img"><img src="/uploads/Goods/{{ $goods_info->pic }}" alt="" class="cover" style="width:230px;height:240px;"></div></a></th>
									<td>
										<div class="name ep3">{{ $goods_info->gname }}</div>
										<div class="type c9">-------<!-- 尺码样式 --></div>
									</td>
									<td>¥ {{ $goods_info->price }}</td>
									<td>￥ {{ Session::get('goodsnumber') }}</td>
									<td>¥ 0</td>
									<td>¥{{ ($goods_info->price * Session::get('goodsnumber')) }}</td>
								
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
							<div class="info-line"><span class="favour-value">已优惠 ¥0.0</span>合计：<b class="fz18 cr">¥{{ ($goods_info->price * Session::get('goodsnumber')) }}</b></div>
							<div class="info-line fz12 c9">（可获 <span class="c6">20</span> 积分）</div>
						</div>
					</div>
					<div class="shop-title">确认订单</div>
					<div class="pay-mode__box">
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="1" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<span class="fz16">余额支付</span><span class="fz14">（可用余额：¥88.0）</span>
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{ ($goods_info->price * Session::get('goodsnumber')) }}</b>元</div>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="2" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="/home/images/icons/alipay.png" alt="支付宝支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{ ($goods_info->price * Session::get('goodsnumber')) }}</b>元</div>
						</div>
						<div class="radio-line radio-box">
							<label class="radio-label ep">
								<input name="pay-mode" value="3" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="/home/images/icons/paywechat.png" alt="微信支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{ ($goods_info->price * Session::get('goodsnumber')) }}</b>元</div>
						</div>
					</div>
					<div class="user-form-group shopcart-submit">
						<button type="submit" class="btn">继续支付</button>
					</div>
					<script>
						$(document).ready(function(){
							$(this).on('change','input',function() {
								$(this).parents('.radio-box').addClass('active').siblings().removeClass('active');
							})
						});
					</script>
				</form>
			</div>
		</section>
	</div>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="udai_welcome.html" class="r-item-hd">
					<i class="iconfont icon-user" data-badge="0"></i>
					<div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="udai_shopcart.html" class="r-item-hd">
					<i class="iconfont icon-cart"></i>
					<div class="r-tip__box"><span class="r-tip-text">购物车</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="udai_collection.html" class="r-item-hd">
					<i class="iconfont icon-aixin"></i>
					<div class="r-tip__box"><span class="r-tip-text">我的收藏</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="" class="r-item-hd">
					<i class="iconfont icon-liaotian"></i>
					<div class="r-tip__box"><span class="r-tip-text">联系客服</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="issues.html" class="r-item-hd">
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