@extends('home.udai.udai');
	<!-- 顶部标题 -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
			 @section('content')
			<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">账户信息-个人资料</div>
					<div class="port b-r50" id="crop-avatar">
						<div class="img">
						<label for="photo">
						<img id="img"  src="" class="cover b-r50">
						</label>
						<form  id= "from1"  style="display:none"  action="/home/datum" enctype="multipart/form-data"  method="post"  class="user-setting__form" onsubmit="return false;">
					 		 {{ csrf_field() }}
					  			
						 <input type="file" value="上传" name="pic" id="photo" onchange="uploadimg()">
						</div>
						</form>
					</div>
					<form action="/home/datum" enctype="multipart/form-data"  method="post" class="user-setting__form" >
					  {{ csrf_field() }}
					  			
							
						<div class="user-form-group">
							<label for="user-id">用户名：</label>
							<input type="text" id="user-id" name="name"  value="" placeholder="请输入您的昵称">
						</div>
						<div class="user-form-group">
							<label name="status">等级：</label>
							<span class="select-box" style="width:150px;">
								<select class="select" name="status" size="1">
									<option value="0">普通会员</option>
								</select>
									<a href="agent_level.html">提升</a>
						</div>
						<div class="user-form-group">
							<label>性别：</label>
							<label><input type="radio" name="sex" value="0" ><i class="iconfont icon-radio"></i> 男士</label>
							<label><input type="radio" name="sex" value="1"><i class="iconfont icon-radio"></i> 女士</label>
							<label><input type="radio" name="sex" value="2"><i class="iconfont icon-radio"></i> 保密</label>
						</div>
						<div class="user-form-group">
							<label>生日：</label>
							<label><input type="text" class="datepicker" name="birth"  value="" placeholder="请选择您的出生日期"></label>
						</div>
						<div class="user-form-group">
							<input  style="background-color:#cb2126;width:120px;font-size:15px;border-radius:25px;border:1px solid #a1a1a1;padding:10px 20px; " value="确认"  type="submit" >
						</div>
					</form>
					<script src="js/zebra.datepicker.min.js"></script>
					<link rel="stylesheet" href="css/zebra.datepicker.css">
					<script>
						$('input.datepicker').Zebra_DatePicker({
							default_position: 'below',
							show_clear_date: false,
							show_select_today: false,
						});
					</script>
				</div>
			</div>
		</section>
	</div>
	<!-- 头像选择模态框 -->
	<link href="/home/css/cropper/cropper.min.css" rel="stylesheet">
	<link href="/home/css/cropper/sitelogo.css" rel="stylesheet">
	<script src="/home/js/cropper/cropper.min.js"></script>
	<script src="/home/js/cropper/sitelogo.js"></script>
	
	<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="/home/udai" class="r-item-hd">
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
					<img src="images/icons/footer_1.gif" alt="厂家直供">
				</div>
				<div class="tag-div">
					<img src="images/icons/footer_2.gif" alt="一件代发">
				</div>
				<div class="tag-div">
					<img src="images/icons/footer_3.gif" alt="美工活动支持">
				</div>
				<div class="tag-div">
					<img src="images/icons/footer_4.gif" alt="信誉认证">
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
	<script type="text/javascript">
		$.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

		function uploadimg(){
			var formData = new FormData();
			//abc 是临时文件的键 ,而$('#photo')则是值
			//这边的键是什么控制器的接收就是什么，而值则是点击图片的路径
			formData.append('abc',$('#photo')[0].files[0]);
			$.ajax({
				'url':'/home/datum',
				'type':'POST',
				'data':formData,
				'async':true,
				 'processData': false,
                 'contentType': false,
			success:function(data){
				// alert(data);
				$('#img').attr('src', '/uploads/'+data);
			 }
			});
		}
		
	</script>
</body>
</html>
@endsection