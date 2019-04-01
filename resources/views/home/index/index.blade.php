@extends('home.tabfoot.tab')
@section('content')
	<!-- 首页导航栏 -->
	<div class="top-nav bg3">
		<div class="nav-box inner">
			<div class="all-cat">
				<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
				
				<div class="cat-list__box">
					@foreach($data as $k=>$v)
					@if($v->cname != '积分商品' && $v->cname != '爆款类')
					<div class="cat-box">
						<div class="title">
						<a href="/home/item_categoryl/{{ $v->id }}"><i class="iconfont icon-skirt ce">{{ $v->cname }}</i></a>
						</div>

						<div class="cat-list__deploy">
						
							<div class="deploy-box">
							
								<div class="genre-box clearfix">
								@foreach($v['sub'] as $kk=>$vv)
									<a href="/home/item_categoryl/{{ $vv->id }}"><span class="title">　 {{ $vv->cname }} ：</span></a>

									<div class="genre-list">
										@foreach($vv['sub'] as $kkk=>$vvv)
										<a href="/home/item_categoryl/{{ $vvv->id }}">{{ $vvv->cname }}</a>
										@endforeach
									</div>
									@endforeach
								</div>
								
							</div>
							
						</div>
						
					</div>
					@endif
					@endforeach
				</div>

			</div>
			<ul class="nva-list">
				<a href="/"><li class="active">首页</li></a>
				<a href="#"><li>企业简介</li></a>
				<a href="#"><li>新手上路</li></a>
				<a href="/home/class_room"><li>U袋学堂</li></a>
				<a href="#"><li>企业账号</li></a>
				<a href="#"><li>诚信合约</li></a>
				<a href="#"><li>实时下架</li></a>
			</ul>
			<div class="user-info__box">
				<div class="login-box">
					
						
				@if( Session::get('home_user')['name'])
				<!-- 已登录 -->
					<div class="avt-port">
						<img src="{{ $users->pic or '' }}" alt="欢迎来到U袋网" class="cover b-r50">
				</div>
				 <div class="name c6">Hi~ <span class="cr"> {{Session::get('home_user')['name']}}</span></div>
					
						
					<div class="point c6" >积分:<span id="badge">{{ $infoadd[0]->desc < 1?'10': $infoadd[0]->desc }}</span></div>
						<div class="report-box">
						<span class="badge">{{ $infoadd[0]->addr>6?'20':'10'}}</span>
						<input type="text" value="{{ $infoadd[0]->addr or '' }}"  id="addr" name="addr" hidden>
						<button  id="buts" class="btn btn-info btn-block" onclick="block()">已签到第{{ $infoadd[0]->addr or ''}}天</button>
						<!-- <a class="btn btn-primary btn-block" href="#" role="button">签到领积分</a> -->
					</div>
				@else
				<!-- 未登录 -->
				<div class="name c6">Hi~ 你好</div>
				<div class="point c6"><a href="/home/denlu">点此登录</a>，发现更多精彩</div>
				@endif
					
					
					
					
				
				</div>
				<div class="agent-box">
					<a href="#" class="agent">
						<i class="iconfont icon-fushi"></i>
						<p>申请网店代销</p>
					</a>
					<a href="javascript:;" class="agent">
						<i class="iconfont icon-agent"></i>
						<p><span class="cr">9527</span>位代销商</p>
					</a>
				</div>
				<div class="verify-qq">
					<div class="title">
						<i class="fake"></i>
						<span class="fz12">真假QQ客服验证-远离骗子</span>
					</div>
					<form class="input-group">
						<input class="form-control" placeholder="输入客服QQ号码" type="text">
						<span class="input-group-btn">
							<button class="btn btn-primary submit" id="verifyqq" type="button">验证</button>
						</span>
					</form>
					<script>

						
						$(function() {
							$('#verifyqq').click(function() {
								DJMask.open({
								　　width:"400px",
								　　height:"150px",
								　　title:"U袋网提示您：",
								　　content:"<b>该QQ不是客服-谨防受骗！</b>"
							　　});
							});
						});

						
					</script>
					<script type="text/javascript">
					$.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               	 });
					// 积分操作
					function block(){
							var add = $("#addr").val();
							//总积分
							var badge = $('#badge').html();
							//签到的积分
							var inte= $('.badge').html();
							//签到后总积分
							var stor = Number(badge) + Number(inte) 
							$.get('/home/userget',{add:add,badge:badge,inte:inte},function(res){
								// alert(res);
								if(res){
								$('#addr').attr('value',res);
								$('#buts').html('已签到第'+res+'天');
								$('#badge').html(stor);
								}else{
									$('#buts').html('已签到');
								}
							});
						}
					</script>
				</div>
				<div class="tags">
					<div class="tag"><i class="iconfont icon-real fz16"></i> 品牌正品</div>
					<div class="tag"><i class="iconfont icon-credit fz16"></i> 信誉认证</div>
					<div class="tag"><i class="iconfont icon-speed fz16"></i> 当天发货</div>
					<div class="tag"><i class="iconfont icon-tick fz16"></i> 人工质检</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 顶部轮播 -->
    <div class="swiper-container banner-box">
        <div class="swiper-wrapper">
        @foreach($lbts as $k =>$v)
      	
           <div class="swiper-slide"><a href="item_show.html"><img src="/uploads/{{ $v->pic }}" class="cover"></a></div>
         
		@endforeach


           <!--  <div class="swiper-slide"><a href="item_show.html"><img src="/home/images/temp/banner_1.jpg" class="cover"></a></div>
            <div class="swiper-slide"><a href="item_show.html"><img src="/home/images/temp/banner_2.jpg" class="cover"></a></div>
            <div class="swiper-slide"><a href="item_category.html"><img src="/home/images/temp/banner_3.jpg" class="cover"></a></div>
            <div class="swiper-slide"><a href="item_show.html"><img src="/home/images/temp/banner_4.jpg" class="cover"></a></div>
            <div class="swiper-slide"><a href="item_sale_page.html"><img src="/home/images/temp/banner_5.jpg" class="cover"></a></div> -->

        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- 首页楼层导航 -->
   
	<nav class="floor-nav visible-lg-block">
	<span class="scroll-nav active">爆款</span>
	 @foreach($data as $k=>$v)
	 	@if($v->cname != '积分商品' && $v->cname != '爆款类')
		<span class="scroll-nav active">{{ $v->cname }}</span>
		@endif
		@endforeach
	</nav>

	<!-- 楼层内容 -->
	 
	<div class="content inner" style="margin-bottom: 40px;">
	
		<section class="scroll-floor floor-1 clearfix">
			<div class="pull-left"style ="overflow :hidden">

				<div class="floor-title">
					<i class="iconfont icon-tuijian fz16">爆款</i> 
					<a href="" class="more"><i class="iconfont icon-more">商品</i></a>
				</div>
				
				<div class="con-box">
					<a class="left-img hot-img" href="">
						<img src="/home/images/floor_1.jpg" alt="" class="cover">
					</a>
					
					<div class="right-box hot-box">
					@foreach($goods as $key=>$value)
					@foreach($v['sub'] as $kk=>$vv)
					@if($vv->pid == $value->tid && $vv->cname = '爆款')
					@if($value->status == 0)
						
						<a href="/home/item_show/{{ $value->id }}" class="floor-item">
							<div class="item-img hot-img">
								<img src="/uploads/Goods/{{ $value->pic }}" alt="纯色圆领短袖T恤活a动衫弹" class="cover">
							</div>
							<div class="price clearfix">
								<span class="pull-left cr fz16">￥{{ $value->price }}</span>
								<span class="pull-right c6">价格</span>
							</div>
							<div class="name ep" title="纯色圆领短袖T恤活a动衫弹力柔软">{{$value->gname}}</div>
						</a>
						@endif	
						@endif
				@endforeach
				@endforeach
					</div>
			
				</div>
				
			</div>
			<div class="pull-right">
				<div class="floor-title">
					<i class="iconfont icon-horn fz16"></i> 平台公告
					<a href="udai_notice.html" class="more"><i class="iconfont icon-more"></i></a>
				</div>
				<div class="con-box">
					<div class="notice-box bgf5">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								@foreach($Bbs as $k =>$v)
								<a class="swiper-slide ep" href="/home/bbs/index/{{ $v->id }}">{!! $v->title !!}</a>
								@endforeach
							</div>
						</div>
					</div>
					
					<div class="buts-box bgf5">
						<div class="but-div">
							<a href="#">
								<i class="but-icon"></i>
								<p>物流查询</p>
							</a>
						</div>
						<div class="but-div">
							<a href="#">
								<i class="but-icon"></i>
								<p>热卖专区</p>
							</a>
						</div>
						<div class="but-div">
							<a href="#">
								<i class="but-icon"></i>
								<p>满减专区</p>
							</a>
						</div>
						<div class="but-div">
							<a href="#">
								<i class="but-icon"></i>
								<p>折扣专区</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		
		</section>

		@foreach($data as $k=>$v)
			@if($v->cname != '积分商品' && $v->cname != '爆款类')
		<section class="scroll-floor floor-{{ $i++}}">
			<div class="floor-title">
				<i class="iconfont icon-skirt fz16">{{ $v->cname }}</i>

				<div class="case-list fz0 pull-right">
					@foreach($v['sub'] as $kk=>$vv)
					<a href="/home/item_categoryl/{{ $vv->id }}">{{ $vv->cname }}</a>
					
					@endforeach
				</div>
			</div>
			<div class="con-box">
				<a class="left-img hot-img" href="">
					<img src="/home/images/floor_{{$c++}}.jpg" alt="" class="cover">
				</a>
				
				<div class="right-box" style ="overflow :hidden" >
				@foreach($goods as $key=>$value)
					@if($vv->pid == $value->tid)
					@if($value->status !=1)
					
					<a href="/home/item_show/{{ $value->id }}" class="floor-item">
						<div class="item-img hot-img">
							<img src="/uploads/Goods/{{ $value->pic }}" alt="纯色圆领短袖T恤活a动衫弹力柔软" class="cover">
						</div>
						<div class="price clearfix" >
							<span class="pull-left cr fz16">￥{{ $value->price }}</span>
							<span class="pull-right c6">价格</span>
						</div>
						<div class="name ep" title="纯色圆领短袖T恤活a动衫弹力柔软">{{ $value->gname }}</div>

					</a>
			
						@endif
						@endif
					@endforeach
						@endif
					
				</div>
		</section>

		@endforeach
		</div>
		
	</div>
	
	<script>
		$(document).ready(function(){ 
			// 顶部banner轮播
			var banner_swiper = new Swiper('.banner-box', {
				autoplayDisableOnInteraction : false,
				pagination: '.banner-box .swiper-pagination',
				paginationClickable: true,
				autoplay : 5000,
			});
			// 新闻列表滚动
			var notice_swiper = new Swiper('.notice-box .swiper-container', {
				paginationClickable: true,
				mousewheelControl : true,
				direction : 'vertical',
				slidesPerView : 10,
				autoplay : 2e3,
			});
			// 楼层导航自动 active
			$.scrollFloor();
			// 页面下拉固定楼层导航
			$('.floor-nav').smartFloat();
			$('.to-top').toTop({position:false});
		});
	</script>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="/home/udai" class="r-item-hd">
					<i class="iconfont icon-user"></i>
					<div class="r-tip__box"><span class="r-tip-text"></span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="/home/shop" class="r-item-hd">
					<i class="iconfont icon-cart" data-badge="10"></i>
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
			@foreach($links as $k =>$v)
				<a href="{{ $v->lurl }}"><li>{{ $v->lname }}</li></a>
			@endforeach
			</ul>
			<!-- 版权 -->
			@foreach($webs as $v => $k)
			<p class="copyright">

				详情：{{ $k->name }}<br>
				备案号：{{ $k->filing }}&nbsp;&nbsp;&nbsp;&nbsp;地址：{{ $k->url }}&nbsp;&nbsp;&nbsp;&nbsp;Tel: {{ $k->phone }}&nbsp;&nbsp;&nbsp;&nbsp;E-mail: {{ $k->email }}
			</p>
			@endforeach
		</div>
	</div>
</body>
</html>
@endsection
