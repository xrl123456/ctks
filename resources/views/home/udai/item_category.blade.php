@extends('home.tabfoot.tab')
@section('content')
</div>
	<!-- 内页导航栏 -->
	<div class="top-nav bg3">
		<div class="nav-box inner">
			<div class="all-cat">
				<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
			</div>
			<ul class="nva-list">
				<a href="/"><li>首页</li></a>
				<a href="#"><li>企业简介</li></a>
				<a href="#"><li>新手上路</li></a>
				<a href="/home/class_room"><li>U袋学堂</li></a>
				<a href="#"><li>企业账号</li></a>
				<a href="#"><li>诚信合约</li></a>
				<a href="#"><li>实时下架</li></a>
			</ul>
		</div>
	</div>
	<div class="content inner">
		<section class="filter-section clearfix">
			<ol class="breadcrumb">
				<li><a href="/">首页</a></li>
				<li class="active">商品筛选</li>
			</ol>
			<!-- --> 
		</section>
		<section class="item-show__div clearfix">
			<div class="pull-left">
				
				<div class="item-list__area clearfix">
				
					@foreach($goods as $k=>$v)
					@if($id == $v->tid)
					<div class="item-card">
						

						<a href="/home/item_show/{{ $v->id }}" class="photo">
							<img src="/uploads/Goods/{{ $v->pic }}" alt="锦瑟 原创传统日常汉服男绣花交领衣裳cp情侣装春夏款" class="cover">
							<div class="name">{{ $v->gname }}</div>
						</a>
						<div class="middle">
							<div class="price"><small>价格￥</small>{{ $v->price }}</div>
							<div class="sale"><a href="#">加入购物车</a></div>
						</div>
						
					</div>
					@endif
					@endforeach
				
				</div>
				
			</div>
			<div class="pull-right">
				
				<div class="desc-segments__content">
					<div class="lace-title">
						<span class="c6">爆款推荐</span>
					</div>
					<div class="picked-box">
						<a href="" class="picked-item"><img src="/home/images/temp/S-001.jpg" alt="" class="cover"><span class="look_price">¥134.99</span></a>
						<a href="" class="picked-item"><img src="/home/images/temp/S-002.jpg" alt="" class="cover"><span class="look_price">¥134.99</span></a>
						<a href="" class="picked-item"><img src="/home/images/temp/S-003.jpg" alt="" class="cover"><span class="look_price">¥134.99</span></a>
						<a href="" class="picked-item"><img src="/home/images/temp/S-004.jpg" alt="" class="cover"><span class="look_price">¥134.99</span></a>
						<a href="" class="picked-item"><img src="/home/images/temp/S-005.jpg" alt="" class="cover"><span class="look_price">¥134.99</span></a>
					
				</div>
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
	<!-- 底部信息 -->
	<div class="footer">
		<div class="footer-tags">
			<div class="tags-box inner">
				<div class="tag-div">
					<img src="/home/images/icons/footer_1.gif" alt="厂家直供">
				</div>
				<div class="tag-div">
					<img src="/home/images/icons/footer_2.gif" alt="一件代发">
				</div>
				<div class="tag-div">
					<img src="/home/images/icons/footer_3.gif" alt="美工活动支持">
				</div>
				<div class="tag-div">
					<img src="/home/images/icons/footer_4.gif" alt="信誉认证">
				</div>
			</div>
		</div>
		<div class="footer-links inner">
			<dl>
				<dt>U袋网</dt>
				<a href="temp_article/udai_article10.html"><dd>企业简介</dd></a>
				<a href="temp_article/udai_article11.html"><dd>加入U袋</dd></a>
				<a href="temp_article/udai_article12.html"><dd>隐私说明</dd></a>
			</dl>
			<dl>
				<dt>服务中心</dt>
				<a href="temp_article/udai_article1.html"><dd>售后服务</dd></a>
				<a href="temp_article/udai_article2.html"><dd>配送服务</dd></a>
				<a href="temp_article/udai_article3.html"><dd>用户协议</dd></a>
				<a href="temp_article/udai_article4.html"><dd>常见问题</dd></a>
			</dl>
			<dl>
				<dt>新手上路</dt>
				<a href="temp_article/udai_article5.html"><dd>如何成为代理商</dd></a>
				<a href="temp_article/udai_article6.html"><dd>代销商上架教程</dd></a>
				<a href="temp_article/udai_article7.html"><dd>分销商常见问题</dd></a>
				<a href="temp_article/udai_article8.html"><dd>付款账户</dd></a>
			</dl>
		</div>
		<div class="copy-box clearfix">
			<ul class="copy-links">
				<a href="agent_level.html"><li>网店代销</li></a>
				<a href="class_room.html"><li>U袋学堂</li></a>
				<a href="udai_about.html"><li>联系我们</li></a>
				<a href="temp_article/udai_article10.html"><li>企业简介</li></a>
				<a href="temp_article/udai_article5.html"><li>新手上路</li></a>
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