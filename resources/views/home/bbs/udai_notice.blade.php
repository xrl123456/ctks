@extends('home.tabfoot.tab')
@section('content')
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
		<section class="panel__div panel-message__div clearfix">
			<div class="filter-value">
				<div class="filter-title">平台公告</div>
			</div>
			<div class="pull-left">
				<div class="msg-list">
					@foreach($bbsfen as $k => $b)
					
								{{ $b->cname }}

					@foreach($Bbs as $k =>$v)
						@if($b->id==$v->cates)
								<a class="swiper-slide ep" href="/home/bbs/index/{{ $v->id }}">{{ $v->name }}</a>
						@endif
					@endforeach
					@endforeach
				</div>
				
			
                
			</div>
			<div class="message-box pull-right">
				<div class="head-div clearfix posr">
					<div class="title">{!! $data->name !!}</div>
					<div class="time pull-right">发布时间 {{ $data->created_at }} </div>
				</div>
				<div class="html-code">
					<p>
						{!! $data->content !!}

					</p>
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
