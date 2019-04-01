@extends('home.udai.udai')
@section('content')
	

	<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">订单中心-订单2669901385864042</div>
					<div class="order-info__box">
						<div class="order-addr">收货信息：<span class="c6">{{ $addres->name }} <font color="orange">{{ $addres->phone }}</font> &nbsp; {{ $addres->address }}</span></div>
						<div class="order-info">
							订单信息
							<table>
								@foreach($orderlist as $key =>$value )
								<tr>
									<td>订单编号：{{ $value->oid }}</td>
									<!-- <td>支付宝交易号：20175215464616164616</td> -->
									<td>创建时间：{{ $value->created_at }}</td>
								</tr>
								<tr>
									<!-- <td>付款时间：</td> -->
									<!-- <td>成交时间：2017-09-20 08:25:45</td> -->
									<td></td>
								</tr>
								@endforeach
							</table>
						</div>
						<div class="table-thead">
							<div class="tdf3">商品</div>
							<div class="tdf1">状态</div>
							<div class="tdf1">数量</div>
							<div class="tdf1">单价</div>
							<div class="tdf2">优惠</div>
							<div class="tdf1">总价</div>
							<div class="tdf1">运费</div>
						</div>
						@foreach($orderlist as $key=>$value)
						@foreach($value->addersand as $k=>$v)						
						<div class="order-item__list">
							<div class="item">
								<div class="tdf3">
									<a href="item_show.html"><div class="img"><img src="/home/images/temp/M-003.jpg" alt="" class="cover"></div>
									<div class="ep2 c6">{{ $v->gname }} </div></a>
									<div class="attr ep">{{ $v->goodsinfo }}  尺码：均码</div>
								</div>
								<div class="tdf1" >
									<!-- 状态   -->
									@if(( $value->status) == 0 )
										<a href="/home/shop" class="but but-primary">等待付款</a>
									@elseif(( $value->status) == 1)
										等待发货
									@elseif(( $value->status) == 2)
										已发货,等待收货
									@elseif(( $value->status) == 3)
										已收货,待评价
									@else
										订单完成，追加评价
									@endif
									
									
								</div>
								<div class="tdf1">{{ $value->number }}</div>
								<div class="tdf1">¥{{ $v->price }}</div>
								<div class="tdf2">
									<div class="ep2">该商品暂无<br>可参加的优惠</div>
								</div>
								<div class="tdf1">¥{{ $value->oprice }}</div>
								<div class="tdf1">
									<div class="ep2">包邮</div>
								</div>
							</div>

						@endforeach
						@endforeach
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="#" class="r-item-hd">
					<i class="iconfont icon-user" data-badge="0"></i>
					<div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="/home/shop" class="r-item-hd">
					<i class="iconfont icon-cart"></i>
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
		<script>
			$(document).ready(function(){ $('.to-top').toTop({position:false}) });
		</script>
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