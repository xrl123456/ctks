@extends('home.udai.udai')
@section('content')
			<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">账户信息-修改登陆密码</div>
					<div class="step-flow-box">
						<div class="step-flow__bd">
							<div class="step-flow__li step-flow__li_done">
							  <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
							  <p class="step-flow__title-top">输入旧密码</p>
							</div>
							<div class="step-flow__line step-flow__li_done">
							  <div class="step-flow__process"></div>
							</div>
							<div class="step-flow__li step-flow__li_done">
							  <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
							  <p  class="step-flow__title-top">重置登陆密码</p>
							</div>
							<div class="step-flow__line step-flow__li_done">
							  <div class="step-flow__process"></div>
							</div>
							<div class="step-flow__li step-flow__li_done">
							  <div class="step-flow__state"><i class="iconfont icon-ok"></i></div>
							  <p class="step-flow__title-top">完成</p>
							</div>
						</div>
					</div>
					<div class="modify-success__box text-center">
						<div class="icon b-r50"><i class="iconfont icon-checked cf fz24"></i></div>
						<div class="text c6">登陆密码设置成功！</div>
						<a href="/home/denlu" class="btn"><span id="sec">3</span> 秒后跳转至登陆页面，如果浏览器未跳转请点击这里</a>
					</div>
					<script>
						$(document).ready(function(){
							var time = 3;
							window.setInterval(function(){
								$('#sec').html(time--);
								if (time < 0) {window.location.href = '/home/denlu'}
							}, 1000);
						});
					</script>
				</div>
			</div>
		</section>
	</div>
	<!-- 右侧菜单 -->
	@endsection
	