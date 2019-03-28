@extends('home.udai.udai')
 @section('content')

<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">账户信息-收货地址</div>
					<form action="/home/addres" class="user-addr__form form-horizontal" method="POST" role="form">
						{{ csrf_field() }}
						<p class="fz18 cr">新增收货地址<span class="c6" style="margin-left: 20px"></span></p>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">收货人姓名：</label>
							<div class="col-sm-6">
								<input class="form-control" id="name" name="name" placeholder="请输入收货人姓名" type="text">
							</div>
						</div>
						<div class="form-group">
							<label for="details" class="col-sm-2 control-label"><br/>收货地址：</label>
							<div class="col-sm-10">
								<div class="addr-linkage">
									<!-- <select name="province"></select>
									<select name="city"></select>
									<select name="area"></select>
									<select name="town"></select> -->
								</div>
								<input class="form-control" id="details" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码等信息" maxlength="30" type="text" name="address">
							</div>
						</div>
						
						<div class="form-group">
							<label for="mobile" class="col-sm-2 control-label">手机号码：</label>
							<div class="col-sm-6">
								<input class="form-control" id="mobile" placeholder="请输入手机号码" type="text" name="phone">
							</div>
						</div>
						<div class="form-group">
							<label for="phone" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<input class="form-control" id="phone" placeholder="" type="text" style="display:none;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-6">
								<div class="checkbox">
									<label><input type="" style="display:none;"><i></i></label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-6">
								<input type="submit" class="but"></button>
							</div>
						</div>
					
					</form>
					<p class="fz18 cr">已保存的有效地址</p>

					<div class="table-thead addr-thead">
						<div class="tdf1">收货人</div>
						<!-- <div class="tdf2">所在地</div> -->
						<div class="tdf3"><div class="tdt-a_l">详细地址</div></div>
						<!-- <div class="tdf1">邮编</div> -->
						<div class="tdf1">电话/手机</div>
						<div class="tdf1">操作</div>
						<div class="tdf1"></div>
					</div>
					@foreach($address as $key=>$value)
					<div class="addr-list">
						<div class="addr-item">
							<div class="tdf1">{{ $value->name }}</div>
							<div class="tdf3 tdt-a_l">{{ $value->address }}</div>
							<!-- <div class="tdf3 tdt-a_l">浦下村74号</div> -->
							<!-- <div class="tdf1">350111</div> -->
							<div class="tdf1">{{ $value->phone }}</div>
							<div class="tdf1 order">
								<button class="default"><a type="submit" href="udai_address_edit.html">修改</a></button>
								<form action="/home/addres/{{ $value->id }}"  method="post"  style="display: inline;">
				                {{  csrf_field() }}
				                {{ method_field('DELETE')}}
				                | <input type="submit" value="删除" class="default active"  onclick="return confirm('数据无价谨慎操作')">
				                </form>
							</div>
							<div class="tdf1">
								<a href="" class="default active">默认地址</a>
							</div>
						</div>
					@endforeach
						</div>

					</section>
				</div>

					
				
</div>
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
</body>
</html>
@endsection
