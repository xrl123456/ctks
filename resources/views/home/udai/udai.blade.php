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

</head>
<body>
	<!-- 顶部tab -->
	<div class="tab-header">
		<div class="inner">
			@if( Session::get('home_user')['name'])
			<div class="pull-left">

				<div class="pull-left">嗨，<font color="#f0c">{{ Session::get('home_user')['name'] }}</font> 欢迎来到 <span class="cr"> U袋网 </span></div>

				<a href="temp_article/udai_article4.html">帮助中心</a>
				
			</div>
			<div class="pull-right">
				<a href="/home/dropOut"><span class="cr">退出</span></a>
                <a href="/home/udai">我的U袋</a>
				<a href="udai_order.html">我的订单</a>
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
	<!-- 顶部标题 -->
	<div class="bgf5 clearfix">
		<div class="top-user">
			<div class="inner">
				<a class="logo" href="/"><img src="/home/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
				<div class="title">个人中心</div>
			</div>
		</div>
	</div>
	<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="pull-left bgf">
				<a href="/home/udai" class="title">U袋欢迎页</a>
				<dl class="user-center__nav">
					<dt>帐户信息</dt>
					<a href="/home/setting"><dd>个人资料</dd></a>
					<a href="udai_treasurer.html"><dd>资金管理</dd></a>
					<a href="udai_integral.html"><dd>积分平台</dd></a>
					<a href="/home/addres/{{ Session::get('home_user')['id'] }}"><dd>收货地址</dd></a>
					<a href="udai_coupon.html"><dd>我的优惠券</dd></a>
					<a href="udai_paypwd_modify.html"><dd>修改支付密码</dd></a>
					<a href="udai_pwd_modify.html"><dd>修改登录密码</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>订单中心</dt>
					<a href="udai_order.html"><dd>我的订单</dd></a>
					<a href="udai_collection.html"><dd>我的收藏</dd></a>
					<a href="udai_refund.html"><dd>退款/退货</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>服务中心</dt>
					<a href="udai_mail_query.html"><dd>物流查询</dd></a>
					<a href=""><dd>数据自助下载</dd></a>
					<a href="temp_article/udai_article1.html"><dd>售后服务</dd></a>
					<a href="temp_article/udai_article2.html"><dd>配送服务</dd></a>
					<a href="temp_article/udai_article3.html"><dd>用户协议</dd></a>
					<a href="temp_article/udai_article4.html"><dd>常见问题</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>新手上路</dt>
					<a href="temp_article/udai_article5.html"><dd>如何成为代理商</dd></a>
					<a href="temp_article/udai_article6.html"><dd>代销商上架教程</dd></a>
					<a href="temp_article/udai_article7.html"><dd>分销商常见问题</dd></a>
					<a href="temp_article/udai_article8.html"><dd>付款账户</dd></a>
				</dl>
				<dl class="user-center__nav">
					<dt>U袋网</dt>
					<a href="temp_article/udai_article10.html"><dd>企业简介</dd></a>
					<a href="temp_article/udai_article11.html"><dd>加入U袋</dd></a>
					<a href="temp_article/udai_article12.html"><dd>隐私说明</dd></a>
				</dl>
			</div>
	 <!-- 开始 -->
            @section('content')

            
            @show
            <!-- 结束 -->
                