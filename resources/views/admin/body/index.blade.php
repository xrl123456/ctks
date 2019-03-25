<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/page_page.css" media="screen" >
<title>MWS Admin - Form Layouts</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

	<!-- Themer (Remove if not needed) -->  
	<div id="mws-themer">
        <div id="mws-themer-content">
        	<div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle">
                <i class="icon-bended-arrow-left"></i> 
                <i class="icon-bended-arrow-right"></i>
            </div>
        	<div id="mws-theme-presets-container" class="mws-themer-section">
	        	<label for="mws-theme-presets">Color Presets</label>
            </div>
            <div class="mws-themer-separator"></div>
        	<div id="mws-theme-pattern-container" class="mws-themer-section">
	        	<label for="mws-theme-patterns">Background</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
	            <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
            </div>
        </div>
        <div id="mws-themer-css-dialog">
        	<form class="mws-form">
            	<div class="mws-form-row">
		        	<div class="mws-form-item">
                    	<textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="/admin/images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
          
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            

                @if( Session::get('admin_user'))    
                <div id="mws-user-photo">
                    <img src="/uploads/{{ Session::get('admin_user')['face'] }}" alt="User Photo" style="width:30px;height:30px;">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions" style="width:120px;">
                    <div id="mws-username">
                        Hello, {{ Session::get('admin_user')['name'] }}
                    </div>
                    <ul>
                        <li><a href="/admins/seek/{{ Session::get('admin_user')['id'] }}/edit">修改密码</a></li>
                        <li><a href="/admins/login/{{ Session::get('admin_user')['id'] }}" onclick="alert('确定要退出？')">退出</a></li>
                    </ul>
                @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- 搜索栏 -->
        	<!-- <div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div> -->
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i>用户管理</a>
                        <ul>
                            <li><a href="/admins/users">用户列表</a></li>
                         
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-list"></i>分类管理</a>
                        <ul>
                           
                            <li><a href="/admins/goods">分类列表</a></li>
                             <li><a href="/admins/goods/create">添加分类</a></li>
                           
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-shopping-cart"></i>商品管理</a>
                        <ul>
                            <li><a href="/admins/goodsgo">商品列表</a></li>
                            <li><a href="/admins/goodsgo/create">商品添加</a></li>
                            
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-IE"></i>友情链接</a>
                        <ul>
                            <li><a href="/admins/links">链接管理</a></li>
                            <li><a href="/admins/links/create">添加链接</a></li>
                        </ul>
                    </li>
                   <li class="active">
                        <a href="#"><i class="icon-bullhorn"></i>公告管理</a>
                        <ul>
                            <li><a href="/admins/bbs">公告列表</a></li>
                            <li><a href="/admins/bbs/create">公告添加</a></li>
                        </ul>
                    </li>
                    
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>轮播图管理</a>
                        <ul>
                            <li><a href="/admins/lbts">轮播图列表</a></li>
                            <li><a href="/admins/lbts/create">轮播图添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>网站管理</a>

                        <ul>
                            <li><a href="/admins/guanli">网站列表</a></li>
                            <li><a href="/admins/guanli/create">网站管理添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>用户管理</a>

                        <ul>
                            <li><a href="/admins/super">人员列表</a></li>
                            <li><a href="/admins/super/create">人员添加</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
              <!-- 显示跳转信息 开始 -->
                @if (session('success'))
                    <div class="mws-form-message success" style="height:30px;">
                        {{ session('success') }}
                    </div>
                @endif  
            <!-- 结束-->
                <!-- 显示跳转信息 开始 -->
                @if (session('error'))
                    <div class="mws-form-message error">
                        {{ session('error') }}
                    </div>
                @endif    
                <!-- 结束 -->
                
    

            <!-- 开始 -->
            @section('content')

            
            @show
            <!-- 结束 -->
                
            	
                
            
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
           <!--  <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div> -->
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admin/plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admin/js/core/themer.js"></script>
    <script src="/admin/js/core/jquery-1.7.2.min.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script>
        //获取对象
        $('button').click(function(){
        //获取input里面的值
        var keyword =$('#keyword').val();
        // console.log(keyword);
        //将搜索的内容重置为原来的颜色
        $('td').css('color','black').parent().css('backgroundColor','white');
        //将搜索的内容显示出来
        $('td:contains('+keyword+')').css('color','red').parent().css('backgroundColor','#ccc');
        });
    </script> 
</body>
    <script>

    </script>
</html>
