<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="/home/favicon.ico">
	<link rel="stylesheet" href="/home/css/iconfont.css">
	<link rel="stylesheet" href="/home/css/global.css">
	<link rel="stylesheet" href="/home/css/bootstrap.min.css">
	<link rel="stylesheet" href="/home/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/home/css/swiper.min.css">
	<link rel="stylesheet" href="/home/css/styles.css">
	<script src="/home/js/jquery.1.12.4.min.js" charset="UTF-8"></script>
	<script src="/home/js/bootstrap.min.js" charset="UTF-8"></script>
	<script src="/home/js/swiper.min.js" charset="UTF-8"></script>
	<script src="/home/js/global.js" charset="UTF-8"></script>
	<script src="/home/js/jquery.DJMask.2.1.1.js" charset="UTF-8"></script>
	<title>U袋网</title>
 	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<!-- 顶部tab -->
	<div class="tab-header">
		<div class="inner">
			@if( Session::get('home_user')['name'])
			<div class="pull-left">
				<div class="pull-left">嗨，<font color="#f0c">
				
				 {{Session::get('home_user')['name']}}
				

				</font> 欢迎来到 <span class="cr"> U袋网 </span></div>
				<a href="temp_article/udai_article4.html">帮助中心</a>
				
			</div>
			<div class="pull-right">
				
				<a href="/home/dropOut"><span class="cr">退出</span></a>
                <a href="/home/udai">我的U袋</a>
				<a href="#">我的订单</a>
				<a href="/home/integral">积分平台</a>
			</div>          
			@else
			<div class="pull-left">
				<div class="pull-left">嗨，<font color="#f0c"> </font> 欢迎来到 <span class="cr"> U袋网 </span></div>
				<a href="/home/denlu"><span class="cr">登录</span></a>
				<a href="/home/register?p=register">注册</a>
			@endif
				
			</div>
		</div>
	</div>
	<!-- 搜索栏 -->
	<div class="top-search">
		<div class="inner">
			<a class="logo" href="/"><img src="/home/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
			<div class="search-box">
				<form class="input-group">
					<input placeholder="Ta们都在搜U袋网" type="text">
					<span class="input-group-btn">
						<button type="button">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</span>
				</form>
				<p class="help-block text-nowrap">
					<a href="">连衣裙</a>
					<a href="">裤</a>
					<a href="">衬衫</a>
					<a href="">T恤</a>
					<a href="">女包</a>
					<a href="">家居服</a>
					<a href="">2017新款</a>
				</p>
			</div>
			@if( Session::get('home_user')['name'])
			<div class="cart-box">
				<a href="/home/shop" class="cart-but">

					<i class="iconfont icon-shopcart cr fz16"></i>购物车<font color="red" id="shopcart">{{ (Session::get('shopcart') ? Session::get('shopcart') : '0')  }}</font>件
				</a>
			</div>
			@else
			<div>
			</div>
			@endif
		</div>
	</div>
@section('content')

            
@show