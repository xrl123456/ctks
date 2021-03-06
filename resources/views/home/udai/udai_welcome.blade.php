@extends('home.udai.udai')
 @section('content')
	
			<div class="pull-right">
				<div class="user-center__info bgf">
					<div class="pull-left clearfix">
						<div class="port b-r50 pull-left">
							<img src="{{ $info->pic or '' }}" alt="用户名" class="cover b-r50">
							<a href="/home/setting" class="edit"><i class="iconfont icon-edit"></i></a>
						</div>
						<p class="name text-nowrap">您好！{{ $info->name or ''}}</p>
						<p class="money text-nowrap">余额：¥00.0</p>
						<p class="level text-nowrap">身份：普通会员 <a href="agent_level.html">提升</a></p>
					</div>
					<div class="pull-right user-nav">
						<a href="#" class="user-nav__but">
							<i class="iconfont icon-rmb fz40 cr"></i>
							<div class="c6">待支付  <span class="cr">{{ count($newshop) }}</span></div>
						</a>
						<a href="#" class="user-nav__but">
							<i class="iconfont icon-eval fz40 cr"></i>
							<div class="c6">待评价 <span class="c3">{{ count($shop3) }}</span></div>
						</a>
						<a href="#" class="user-nav__but">
							<i class="iconfont icon-star fz40 cr"></i>
							<div class="c6">收藏 <span class="c3">0</span></div>
						</a>
						<a href="#" class="user-nav__but">
							<i class="iconfont icon-quan fz40 cr"></i>
							<div class="c6">优惠券 <span class="cr">2</span></div>
						</a>
						<a href="/home/integral" class="user-nav__but">
							<i class="iconfont icon-jifen fz40 cr"></i>
							<div class="c6">积分 <span class="cr">{{ $info->info[0]->desc  or ''}}</span></div>
						</a>
						<a href="#" class="user-nav__but">
							<i class="iconfont icon-xiaoxi fz40 cr"></i>
							<div class="c6">消息 <span class="cr">2</span></div>
						</a>
					</div>
				</div>
				<div class="order-list__div bgf">
					<div class="user-title">
						我的订单<span class="c6"></span>
						<a href="#alls" class="pull-right"  aria-controls="alls">查看所有订单></a>
					</div>
					<div class="order-panel">
						<ul class="nav user-nav__title" role="tablist">
							<li role="presentation" class="nav-item active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">所有订单</a></li>
							<li role="presentation" class="nav-item "><a href="#pay" aria-controls="pay" role="tab" data-toggle="tab">待付款 <span class="cr">{{ count($newshop) }}</span></a></li>
							<li role="presentation" class="nav-item "><a href="#emit" aria-controls="emit" role="tab" data-toggle="tab">待发货 <span class="cr">{{ count($shop1) }}</span></a></li>
							<li role="presentation" class="nav-item "><a href="#take" aria-controls="take" role="tab" data-toggle="tab">待收货 <span class="cr">{{ count($shop2 )}}</span></a></li>
							<li role="presentation" class="nav-item "><a href="#eval" aria-controls="eval" role="tab" data-toggle="tab">待评价 <span class="cr">{{ count($shop3) }}</span></a></li>
						</ul>
							<!-- 显示所有的订单的  就是倒叙3条 -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="all">
								<table class="table text-center">
									<tr>
										<th width="380">商品信息</th>
										<th width="85">单价</th>
										<th width="85">数量</th>
										<th width="120">实付款</th>
										<th width="120">交易状态</th>
										<th width="120">交易操作</th>
									</tr>
									@foreach($testshop as $key=>$value)
									<!-- 这里放个判断 前面值显示三条 -->
									@foreach($value->addersand as $k=>$v)
							
									<!-- 再写个判断头一个订单的合起来 -->
									<tr class="order-item">
										<td>
											<label>
												<div class="num">
													<!-- <input type="checkbox"> -->
													{{ $value->updated_at }} 订单号: {{ $value->oid }}
												</div>
												<div class="card" id="">
													<div class="img"><img src="/uploads/Goods/{{ $v->pic }}" alt="" class="cover"></div>
													<div class="name ep2">{{ $v->gname }}</div>
													<div class="format">{{ $v->goodsinfo }}</div>
													
												</div>
											</label>
										</td>
										<td>￥{{ $v->price }}</td>
										<td>{{ $value->number }}</td>
										<td>￥{{ $value->oprice }}<br><span class="fz12 c6 text-nowrap">(含运费: ¥0.00)</span></td>
										<td class="state">
											<a class="but c6">
												@if(( $value->status) == 0 )
													等待付款
												@elseif(( $value->status) == 1)
													等待发货
												@elseif(( $value->status) == 2)
													已发货,等待收货
												@elseif(( $value->status) == 3)
													已收货,待评价
												@else
													订单完成，追加评价
												@endif
											</a>
											<!-- <a href="" class="but c9">订单详情</a> -->
										</td>
										<td class="order">
											@if($value->status == 3)
												<a href="#" class="but but-link">评价</a>
												@elseif($value->status == 1 ) 
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
												@elseif($value->status == 2)		
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
													<a href="/home/usershow/{{ $value->oid }}/edit" class="but but-primary" > 确认收货 </a>
												@else 
													<a href="/home/shop" class="but but-primary"> 立即付款 
												@endif
												</a>
											@if($value->status < 2) <a href="/home/order/del/{{ $value->id }}" class="but c3"  onclick="return confirm('亲~不再考虑一下嘛？')"> 取消订单 @else   @endif</a>
										</td>
									</tr>
							
									@endforeach
									@endforeach
								</table>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="pay">
								<table class="table text-center">
									<tr>
										<th width="380" >商品信息</th>
										<th width="85">单价</th>
										<th width="85">数量</th>
										<th width="120">实付款</th>
										<th width="120">交易状态</th>
										<th width="120">交易操作</th>
									</tr>
									
									@if(count($newshop))
									@foreach($newshop as $key=>$value)
									@foreach($value->addersand as $k=>$v)
										

									<tr class="order-item">
										<td>
											<label>
												<div class="num">
													<!-- <input type="checkbox"> -->
													{{ $value->updated_at }} 订单号: {{ $value->oid }}
												</div>
												<div class="card" id="">
													<div class="img"><img src="/uploads/Goods/{{ $v->pic }}" alt="" class="cover"></div>
													<div class="name ep2">{{ $v->gname }}</div>
													<div class="format">{{ $v->goodsinfo }}</div>
													
												</div>
											</label>
										</td>
										<td>￥{{ $v->price }}</td>
										<td>{{ $value->number }}</td>
										<td>￥{{ $value->oprice }}<br><span class="fz12 c6 text-nowrap">(含运费: ¥0.00)</span></td>
										<td class="state">
											<a class="but c6">
												@if(( $value->status) == 0 )
													等待付款
												@elseif(( $value->status) == 1)
													等待发货
												@elseif(( $value->status) == 2)
													已发货,等待收货
												@elseif(( $value->status) == 3)
													已收货,待评价
												@else
													订单完成，追加评价
												@endif
											</a>
											<!-- <a href="" class="but c9">订单详情</a> -->
										</td>

											<td class="order">
												@if($value->status == 3)
												<a href="#" class="but but-link">评价</a>
												@elseif($value->status == 1 ) 
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
												@elseif($value->status == 2)		
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
													<a href="/home/usershow/{{ $value->oid }}/edit" class="but but-primary" > 确认收货 </a>
												@else 
													<a href="/home/shop" class="but but-primary"> 立即付款 
												@endif
												</a>
											@if($value->status < 2) <a href="/home/order/del/{{ $value->id }}" class="but c3"  onclick="return confirm('亲~不再考虑一下嘛？')"> 取消订单 @else   @endif</a>
											</td>
										</tr>
						

								
									@endforeach
									@endforeach
									@else

									<tr class="order-empty">
										<td colspan='6'>
											<div class="empty-msg">最近没有任何订单，家里好像缺了点什么！<br><a href="/">要不瞧瞧去？</a></div>
										</td>
									@endif
									</tr>
								</table>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="emit">
								<table class="table text-center">
									<tr>
										<th width="380">商品信息</th>
										<th width="85">单价</th>
										<th width="85">数量</th>
										<th width="120">实付款</th>
										<th width="120">交易状态</th>
										<th width="120">交易操作</th>
									</tr>
									@if(count($shop1))
									@foreach($shop1 as $key=>$value)
									@foreach($value->addersand as $k=>$v)
									<tr class="order-item">
										<td>
											<label>
												<div class="num">
													<!-- <input type="checkbox"> -->
													{{ $value->updated_at }} 订单号: {{ $value->oid }}
												</div>
												<div class="card" id="">
													<div class="img"><img src="/uploads/Goods/{{ $v->pic }}" alt="" class="cover"></div>
													<!-- <div class="name ep2">{{ $v->gname }}</div> -->
													<!-- <div class="format">{{ $v->goodsinfo }}</div> -->
													
												</div>
											</label>
										</td>
										<td>￥{{ $v->price }}</td>
										<td>{{ $value->number }}</td>
										<td>￥{{ $value->oprice }}<br><span class="fz12 c6 text-nowrap">(含运费: ¥0.00)</span></td>
										<td class="state">
											<a class="but c6">
												@if(( $value->status) == 0 )
													等待付款
												@elseif(( $value->status) == 1)
													等待发货
												@elseif(( $value->status) == 2)
													已发货,等待收货
												@elseif(( $value->status) == 3)
													已收货,待评价
												@else
													订单完成，追加评价
												@endif
											</a>
											<!-- <a href="" class="but c9">订单详情</a> -->
										</td>
										<td class="order">
											@if($value->status == 3)
												<a href="#" class="but but-link">评价</a>
												@elseif($value->status == 1 ) 
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
												@elseif($value->status == 2)		
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
													<a href="/home/usershow/{{ $value->oid }}/edit" class="but but-primary" > 确认收货 </a>
												@else 
													<a href="/home/shop" class="but but-primary"> 立即付款 
												@endif
												</a>
											@if($value->status < 2) <a href="/home/order/del/{{ $value->id }}" class="but c3"  onclick="return confirm('亲~不再考虑一下嘛？')"> 取消订单 @else   @endif</a>
										</td>
									</tr>
									@endforeach
									@endforeach
									@else
										<tr class="order-empty">
										<td colspan='6'>
											<div class="empty-msg">最近没有任何订单，家里好像缺了点什么！<br><a href="/">要不瞧瞧去？</a></div>
										</td>
										</tr>
									@endif
									
								</table>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="take">
								<table class="table text-center">
									<tr>
										<th width="380">商品信息</th>
										<th width="85">单价</th>
										<th width="85">数量</th>
										<th width="120">实付款</th>
										<th width="120">交易状态</th>
										<th width="120">交易操作</th>
									</tr>
									@if(count($shop2))
									@foreach($shop2 as $key=>$value)
									@foreach($value->addersand as $k=>$v)
									<tr class="order-item">
										<td>
											<label>
												<div class="num">
													<!-- <input type="checkbox"> -->
													{{ $value->updated_at }} 订单号: {{ $value->oid }}
												</div>
												<div class="card" id="">
													<div class="img"><img src="/uploads/Goods/{{ $v->pic }}" alt="" class="cover"></div>
													<!-- <div class="name ep2">{{ $v->gname }}</div> -->
													<!-- <div class="format">{{ $v->goodsinfo }}</div> -->
													
												</div>
											</label>
										</td>
										<td>￥{{ $v->price }}</td>
										<td>{{ $value->number }}</td>
										<td>￥{{ $value->oprice }}<br><span class="fz12 c6 text-nowrap">(含运费: ¥0.00)</span></td>
										<td class="state">
											<a class="but c6">
												@if(( $value->status) == 0 )
													等待付款
												@elseif(( $value->status) == 1)
													等待发货
												@elseif(( $value->status) == 2)
													已发货,等待收货
												@elseif(( $value->status) == 3)
													已收货,待评价
												@else
													订单完成，追加评价
												@endif
											</a>
											<!-- <a href="" class="but c9">订单详情</a> -->
										</td>
										<td class="order">
											@if($value->status == 3)
												<a href="#" class="but but-link">评价</a>
												@elseif($value->status == 1 ) 
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
												@elseif($value->status == 2)		
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
													<a href="/home/usershow/{{ $value->oid }}/edit" class="but but-primary" > 确认收货 </a>
												@else 
													<a href="/home/shop" class="but but-primary"> 立即付款 
												@endif
												</a>
											@if($value->status < 2) <a href="/home/order/del/{{ $value->id }}" class="but c3"  onclick="return confirm('亲~不再考虑一下嘛？')"> 取消订单 @else   @endif</a>
										</td>
									</tr>
									@endforeach
									@endforeach
									@else
										<tr class="order-empty">
										<td colspan='6'>
											<div class="empty-msg">最近没有任何订单，家里好像缺了点什么！<br><a href="/">要不瞧瞧去？</a></div>
										</td>
										</tr>
									@endif
								</table>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="eval">
								<table class="table text-center">
									<tr>
										<th width="450">商品信息</th>
										<th width="85">单价</th>
										<th width="85">数量</th>
										<th width="120">实付款</th>
										<th width="120">交易状态</th>
										<th width="120">交易操作</th>
									</tr>
									@if(count($shop3))
									@foreach($shop3 as $key=>$value)
									@foreach($value->addersand as $k=>$v)
									<tr class="order-item">
										<td>
											<label>
												<div class="num">
													<!-- <input type="checkbox"> -->
													{{ $value->updated_at }} 订单号: {{ $value->oid }}
												</div>
												<div class="card" id="">
													<div class="img"><img src="/uploads/Goods/{{ $v->pic }}" alt="" class="cover"></div>
													<!-- <div class="name ep2">{{ $v->gname }}</div> -->
													<!-- <div class="format">{{ $v->goodsinfo }}</div> -->
													
												</div>
											</label>
										</td>
										<td>￥{{ $v->price }}</td>
										<td>{{ $value->number }}</td>
										<td>￥{{ $value->oprice }}<br><span class="fz12 c6 text-nowrap">(含运费: ¥0.00)</span></td>
										<td class="state">
											<a class="but c6">
												@if(( $value->status) == 0 )
													等待付款
												@elseif(( $value->status) == 1)
													等待发货
												@elseif(( $value->status) == 2)
													已发货,等待收货
												@elseif(( $value->status) == 3)
													已收货,待评价
												@else
													订单完成，追加评价
												@endif
											</a>
											<!-- <a href="" class="but c9">订单详情</a> -->
										</td>
										<td class="order">
											@if($value->status == 3)
												<a href="#" class="but but-link">评价</a>
												@elseif($value->status == 1 ) 
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
												@elseif($value->status == 2)		
													<a href="/home/usershow/{{ $value->id }}" class="but but-primary" > 查看订单 
													<a href="/home/usershow/{{ $value->oid }}/edit" class="but but-primary" > 确认收货 </a>
												@else 
													<a href="/home/shop" class="but but-primary"> 立即付款 
												@endif
												</a>
											@if($value->status < 2) <a href="/home/order/del/{{ $value->id }}" class="but c3"  onclick="return confirm('亲~不再考虑一下嘛？')"> 取消订单 @else   @endif</a>
										</td>
									</tr>
									@endforeach
									@endforeach
									@else
										<tr class="order-empty">
										<td colspan='6'>
											<div class="empty-msg">最近没有任何订单，家里好像缺了点什么！<br><a href="/">要不瞧瞧去？</a></div>
										</td>
										</tr>
									@endif
								</table>
							</div>

							
						</div>
					</div>
				</div>
				<div class="recommends">
					<div class="lace-title type-2">
						<span class="cr">爆款推荐</span>
					</div>
					<div class="swiper-container recommends-swiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-1_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-2_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-3_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-4_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-5_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-1_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-2_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img src="/home/images/temp/S-001-3_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-4_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-5_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-1_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-2_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-3_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-4_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-5_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-1_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-2_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-3_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-4_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-5_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-3_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-4_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-5_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img  src="/home/images/temp/S-001-5_s.jpg" alt="" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
							</div>
						</div>
					</div>
					<script>
						$(document).ready(function(){
							var recommends = new Swiper('.recommends-swiper', {
								spaceBetween : 40,
								autoplay : 5000,
							});
						});
					</script>
				</div>
			</div>
		</section>
	</div>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="/home/udai" class="r-item-hd">
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
	<!-- 底部信息 -->
	<div class="footer">
		<div class="footer-tags">
			<div class="tags-box inner">
				<div class="tag-div">
					<img  src="/home/images/icons/footer_1.gif" alt="厂家直供">
				</div>
				<div class="tag-div">
					<img  src="/home/images/icons/footer_2.gif" alt="一件代发">
				</div>
				<div class="tag-div">
					<img  src="/home/images/icons/footer_3.gif" alt="美工活动支持">
				</div>
				<div class="tag-div">
					<img  src="/home/images/icons/footer_4.gif" alt="信誉认证">
				</div>
			</div>
		</div>
		<div class="footer-links inner">
			<dl>
				<dt>U袋网</dt>
				<a href="#"><dd>企业简介</dd></a>
				<a href="#"><dd>加入U袋</dd></a>
				<a href="#"><dd>隐私说明</dd></a>
			</dl>
			<dl>
				<dt>服务中心</dt>
				<a href="#"><dd>售后服务</dd></a>
				<a href="#"><dd>配送服务</dd></a>
				<a href="#"><dd>用户协议</dd></a>
				<a href="#"><dd>常见问题</dd></a>
			</dl>
			<dl>
				<dt>新手上路</dt>
				<a href="#"><dd>如何成为代理商</dd></a>
				<a href="#"><dd>代销商上架教程</dd></a>
				<a href="#"><dd>分销商常见问题</dd></a>
				<a href="#"><dd>付款账户</dd></a>
			</dl>
		</div>
		<div class="copy-box clearfix">
			<ul class="copy-links">
				<a href="#"><li>网店代销</li></a>
				<a href="#"><li>U袋学堂</li></a>
				<a href="#"><li>联系我们</li></a>
				<a href="#"><li>企业简介</li></a>
				<a href="#"><li>新手上路</li></a>
			</ul>
			<!-- 版权 -->
			<p class="copyright">
				© 2005-2017 U袋网 版权所有，并保留所有权利<br>
				ICP备案证书号：闽ICP备16015525号-2&nbsp;&nbsp;&nbsp;&nbsp;福建省宁德市福鼎市南下村小区（锦昌阁）1栋1梯602室&nbsp;&nbsp;&nbsp;&nbsp;Tel: 18650406668&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 18650406668@qq.com
			</p>
		</div>
	</div>
</body>
</html>
@endsection