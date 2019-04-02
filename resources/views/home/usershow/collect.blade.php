@extends('home.udai.udai')
@section('content')
	

<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">订单中心-我的收藏</div>
					<div class="collection-list__area clearfix">
					@foreach($collects as $key=>$value)
						<div class="item-card">
							<a href="item_show.html" class="photo">
								<img src="/uploads/Goods/{{ $value->usercollect->pic }}" alt="{{ $value->usercollect->gname }}" class="cover">
								<div class="name">{{ $value->usercollect->gname }}</div>
							</a>
							<div class="middle">
								<div class="price"><small>￥</small>{{ $value->usercollect->price }}</div>
								<div class="sale"><a href="/home/collect/del/{{ $value->id }}">取消收藏</a></div>
							</div>
						</div>
					@endforeach
					</div>

					<div class="page text-right clearfix ">
						<a class="disabled">上一页</a>
						<a class="select">1</a>
						<a href="">2</a>
						<a href="">3</a>
						<a class="" href="">下一页</a>
						<a class="disabled">1/3页</a>
					</div>
				</div>
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

@endsection