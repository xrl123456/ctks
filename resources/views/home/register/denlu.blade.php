<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="/home/favicon.ico">
	<link rel="stylesheet" href="/home/css/iconfont.css">
	<link rel="stylesheet" href="/home/css/global.css">
	<link rel="stylesheet" href="/home/css/bootstrap.min.css">
	<link rel="stylesheet" href="/home/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/home/css/login.css">
	<script src="/home/js/jquery.1.12.4.min.js" charset="UTF-8"></script>
	<script src="/home/js/bootstrap.min.js" charset="UTF-8"></script>
	<script src="/home/js/jquery.form.js" charset="UTF-8"></script>
	<script src="/home/js/global.js" charset="UTF-8"></script>
	<script src="/home/js/login.js" charset="UTF-8"></script>
	<title>U袋网 - 登录 / 注册</title>
</head>

<body>
	<div class="public-head-layout container">
		<a class="logo" href="/home/index"><img src="/home/images/icons/logo.jpg" alt="U袋网" class="cover"></a>
	</div>
	<div style="background:url(images/login_bg.jpg) no-repeat center center; ">
		<div class="login-layout container">
			<div class="form-box login">
				<div class="tabs-nav">
					<h2>欢迎登录U袋网平台</h2>
				</div>
				<div class="tabs_container">
					<form class="tabs_form" action="/home/login" method="post" id="login_form">
						{{ csrf_field() }}
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								</div>
								<input class="form-control" name="name" value="{{ old('name') }}"  required placeholder="账号名"  type="text">
							</div>
						</div>
						<!-- <div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
								</div>
								<input class="form-control phone" name="phone" id="login_phone" required placeholder="手机号" maxlength="11" autocomplete="off" type="text">
							</div>
						</div> -->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
								</div>
								<input class="form-control password" name="password" id="login_pwd" placeholder="请输入密码" autocomplete="off" type="password">
								<div class="input-group-addon pwd-toggle" title="显示密码"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></div>
							</div>
						</div>
						<div class="checkbox">
	                        <!-- <label>
	                        	<input checked="" id="login_checkbox" type="checkbox"><i></i> 
	                        </label> -->
	                        <a href="javascript:;" class="pull-right" id="resetpwd">忘记密码？</a>
	                    </div>

	                    <!-- 显示跳转信息 开始 -->
		                
		                <!-- 显示跳转信息 开始 -->
		                @if (count($errors) > 0)
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif  
                		<!-- 结束 -->

	                    <!-- 错误信息 -->
						<div class="form-group">
							<div class="error_msg" id="login_error">
								


							</div>
						</div>
	                    <input style="background-color:#cb2126;width:100%;font-size:20px;border-radius:25px;border:2px solid #a1a1a1;padding:10px 40px; "  type="submit"><br>
	                    <p class="text-center">没有账号？<a href="/home/register?p=register" id="register">免费注册</a></p>
                    </form>

                    <div class="tabs_div">
	                    <div class="success-box">
	                    	<div class="success-msg">
								<i class="success-icon"></i>
	                    		<p class="success-text">登录成功</p>
	                    	</div>
	                    </div>
	                    <div class="option-box">
	                    	<div class="buts-title">
	                    		现在您可以
	                    	</div>
	                    	<div class="buts-box">
	                    		<a role="button" href="index.html" class="btn btn-block btn-lg btn-default">继续访问商城</a>
								<a role="button" href="udai_welcome.html" class="btn btn-block btn-lg btn-info">登录会员中心</a>
	                    	</div>
	                    </div>
                    </div>
                </div>
			</div>
			
			<div class="form-box resetpwd">
  				<div class="tabs-nav clearfix">
  					<h2>找回密码<a href="javascript:;" class="pull-right fz16" id="pwdlogin">返回登录</a></h2>
  				</div>
  				<div class="tabs_container">
					<form class="tabs_form" action="" method="post" id="resetpwd_form">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								</div>
								<input class="form-control" name="name" value="{{ old('name') }}"  required placeholder="账号名"  type="text">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
								</div>
								<input class="form-control phone" name="phone" id="resetpwd_phone" required placeholder="手机号" maxlength="11" autocomplete="off" type="text">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input class="form-control" name="sms" id="resetpwd_sms" placeholder="输入验证码" type="text">
								<span class="input-group-btn">
									<button class="btn btn-primary getsms" type="button">发送短信验证码</button>
								</span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
								</div>
								<input class="form-control password" name="password" id="resetpwd_pwd" placeholder="新的密码" autocomplete="off" type="password">
								<div class="input-group-addon pwd-toggle" title="显示密码"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></div>
							</div>
						</div>
	                    <!-- 错误信息 -->
						<div class="form-group">
							<div class="error_msg" id="resetpwd_error"></div>
						</div>
	                    <button class="btn btn-large btn-primary btn-lg btn-block submit" id="resetpwd_submit" type="button">重置密码</button>
                    </form>
                    <div class="tabs_div">
	                    <div class="success-box">
	                    	<div class="success-msg">
								<i class="success-icon"></i>
	                    		<p class="success-text">密码重置成功</p>
	                    	</div>
	                    </div>
	                    <div class="option-box">
	                    	<div class="buts-title">
	                    		现在您可以
	                    	</div>
	                    	<div class="buts-box">
	                    		<a role="button" href="index.html" class="btn btn-block btn-lg btn-default">继续访问商城</a>
								<a role="button" href="login.html" class="btn btn-block btn-lg btn-info">返回登陆</a>
	                    	</div>
	                    </div>
                    </div>
                </div>
			</div>
			<script>
				$(document).ready(function() {
					// 判断直接进入哪个页面 例如 login.php?p=register
					switch($.getUrlParam('p')) {
						case 'register': $('.register').show(); break;
						case 'resetpwd': $('.resetpwd').show(); break;
						default: $('.login').show();
					};
					// 发送验证码事件
					$('.getsms').click(function() {
						var phone = $(this).parents('form').find('input.phone');
						var error = $(this).parents('form').find('.error_msg');
						switch(phone.validatemobile()) {
							case 0:
								// 短信验证码的php请求
								error.html(msgtemp('验证码 <strong>已发送</strong>','alert-success'));
								$(this).rewire(60);
							break;
							case 1: error.html(msgtemp('<strong>手机号码为空</strong> 请输入手机号码',    'alert-warning')); break;
							case 2: error.html(msgtemp('<strong>手机号码错误</strong> 请输入11位数的号码','alert-warning')); break;
							case 3: error.html(msgtemp('<strong>手机号码错误</strong> 请输入正确的号码',  'alert-warning')); break;
						}
					});
					// 以下确定按钮仅供参考
					$('.submit').click(function() {
						var form = $(this).parents('form')
						// var phone = form.find('input.phone');
						var pwd = form.find('input.password');
						var error = form.find('.error_msg');
						var success = form.siblings('.tabs_div');
						var options = {
							beforeSubmit: function () {
								console.log('喵喵喵')
							},
							success: function (data) {
								console.log(data)
							}
						}
						
						// 验证密码复杂度参考这个
						switch(pwd.validatepwd()) {
							case 1: error.html(msgtemp('<strong>密码不能为空</strong> 请输入密码',    'alert-warning')); return; break;
							case 2: error.html(msgtemp('<strong>密码过短</strong> 请输入6位以上的密码','alert-warning')); return; break;
							case 3: error.html(msgtemp('<strong>密码过于简单</strong><br>密码需为字母、数字或特殊字符组合',  'alert-warning')); return; break;
						}
						form.ajaxForm(options);
						// 请求成功执行类似这样的事件
						// form.fadeOut(150,function() {
						// 	success.fadeIn(150);
						// });
					})
				});
			</script>
		</div>
	</div>
	<div class="footer-login container clearfix">
		<ul class="links">
			<a href=""><li>网店代销</li></a>
			<a href=""><li>U袋学堂</li></a>
			<a href=""><li>联系我们</li></a>
			<a href=""><li>企业简介</li></a>
			<a href=""><li>新手上路</li></a>
		</ul>
		<!-- 版权 -->
		<p class="copyright">
			© 2005-2017 U袋网 版权所有，并保留所有权利<br>
			ICP备案证书号：闽ICP备16015525号-2&nbsp;&nbsp;&nbsp;&nbsp;福建省宁德市福鼎市南下村小区（锦昌阁）1栋1梯602室&nbsp;&nbsp;&nbsp;&nbsp;Tel: 18650406668&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 18650406668@qq.com
		</p>
	</div>
</body>
</html>