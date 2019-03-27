
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
            <h1>后台管理登录-密码修改</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/admins/seek/{{ $id }}" method="post">
                	{{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="password" value="" class="mws-login-password required" placeholder="请输入新的密码">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="repassword" value="{{ old('password') }}" class="mws-login-password required" placeholder="请确认新密码">
                        </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
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
                    </div>
                    
                    <div class="mws-form-row">
                        <input type="submit" value="确认修改" class="btn btn-success mws-login-button">
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
