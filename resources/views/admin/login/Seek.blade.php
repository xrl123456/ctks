
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">

<title>商城-后台管理系统登录</title>

</head>

<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>后台管理--邮箱找回密码</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/admins/seek" method="post">
                	{{ csrf_field() }}
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="name" value="{{ old('name') }}" class="mws-login-username required" placeholder="请输入您的账号名">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="email" name="email" value="{{ old('email') }}" class="mws-login-password required" placeholder="请输入您的注册邮箱">
                        </div>
                    </div>
                   <!--  <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">记住账号</label> 
                            </li>
                            <a href="/admins/login/" style="float:right;">忘记密码</a>
                        </ul>
                    </div> -->
                    <div>
                    	@if (count($errors) > 0)
					    <div class="mws-form-message error">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					</div>
                    <div class="mws-form-row">
                        <input type="submit" value="确认" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script href="/admin/js/libs/jquery-1.8.3.min.js"></script>
    <script href="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script href="/admin/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script href="/admin/jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script href="/admin/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script href="/admin/js/core/login.js"></script>

</body>
</html>
