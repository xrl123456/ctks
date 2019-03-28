@extends('home.udai.udai')
@section('content')

<div class="pull-right">
				<div class="user-content__box clearfix bgf">
					<div class="title">账户信息-积分平台</div>
					<ul class="nav user-nav__title" role="tablist">
						<li role="presentation" class="nav-item active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">我的积分</a></li>
						<li role="presentation" class="nav-item "><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab">积分明细</a></li>
					</ul>
					<div class="integral-box clearfix bgf5">
						<div class="integral-total">
							<div class="fz16">可用的积分</div>
							<b class="num">{{ $user->info[0]->desc or 0}}</b>
						</div>
						<div class="integral-desc">
							<b class="cr fz16">积分使用规则：</b><br>
							<span class="c3">1、如何获得积分？</span>
							<ul>
								<li>1) 积分可以通过在购买商品获得，积分会在确认收货的时候增加。</li>
								<li>2) 通过签到获得：每次签到可获得 3 积分</li>
							</ul>
							<span class="c3">2、如何使用积分？</span>
							<ul><li>可使用积分兑换商品</li></ul>
						</div>
					</div>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="list">
							<p class="fz18 cr">商品兑换</p>
							<ul class="nav user-nav__title" role="tablist">
								<li role="presentation" class="nav-item active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">全部</a></li>
								<li role="presentation" class="nav-item "><a href="#usable" aria-controls="usable" role="tab" data-toggle="tab">可兑换</a></li>
							</ul>
							<div class="table-thead">
								<div class="tdf3">商品信息</div>
								<div class="tdf2">商品描述</div>
								<div class="tdf2">所需积分</div>
								<div class="tdf1">操作</div>
							</div>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="all">
									<div class="integral-item__list">
										
										@foreach($data as $k=>$v)
											@foreach($v['sub'] as $kk=>$vv)
											
											@foreach($goods as $key=>$value)
											@if($vv->cname =='积分品')
											@if($vv->pid == $value->tid)
												
												
												
										<div class="integral-item">
											<div class="tdf3">
												<a class="integral-item__info" href="">
													<div class="img"><img src="/uploads/Goods/{{ $value->pic }}" alt="" class="cover"></div>
													<div class="name ep2">{{$value->gname}}</div>
													<div class="type">颜色分类：深棕色 尺码：均码</div>
												</a>
											</div>
											<div class="tdf2"><span class="c9">
											{{$value->goodsinfo}}</span></div>
											<div class="tdf2"><span class="cr">{{$value->price}}</span></div>
											<div class="tdf1">
												@if($value->price > $user->info[0]->desc )
												<a class="but disabled" href="#" role="button">积分不够</a>
												@else
												<a class="but" href="#" role="button">兑换</a>
												@endif
												
												
											</div>
										</div>
											@endif
											@endif
											@endforeach
										
										@endforeach
										@endforeach
										
										<!-- <div class="integral-item">
											<div class="tdf3">
												<a class="integral-item__info" href="">
													<div class="img"><img src="images/temp/M-002.jpg" alt="" class="cover"></div>
													<div class="name ep2">霜天月明 原创日常汉服男云纹绣花单大氅传统礼服外套</div>
													<div class="type">颜色分类：深棕色 尺码：均码</div>
												</a>
											</div>
											<div class="tdf2"><span class="c9">¥1269.90</span></div>
											<div class="tdf2"><span class="cr">2000</span></div>
											<div class="tdf1">
												<a class="but disabled" href="#" role="button">积分不够</a>
											</div>
										</div>
										 -->
									</div>
									<div class="page text-right clearfix">
										<a class="disabled">上一页</a>
										<a class="select">1</a>
										<a href="">2</a>
										<a href="">3</a>
										<a class="" href="">下一页</a>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="usable">
									<div class="integral-item__list">
										<div class="integral-item">
											<div class="tdf3">
												<a class="integral-item__info" href="">
													<div class="img"><img src="images/temp/S-001.jpg" alt="" class="cover"></div>
													<div class="name ep2">锦瑟 原创传统日常汉服男绣花交领衣裳cp情侣装春夏款</div>
													<div class="type">颜色分类：深棕色 尺码：均码</div>
												</a>
											</div>
											<div class="tdf2"><span class="c9">¥269.90</span></div>
											<div class="tdf2"><span class="cr">500</span></div>
											<div class="tdf1">
												<a class="but" href="#" role="button">兑换</a>
											</div>
										</div>
										<div class="integral-item">
											<div class="tdf3">
												<a class="integral-item__info" href="">
													<div class="img"><img src="images/temp/S-002.jpg" alt="" class="cover"></div>
													<div class="name ep2">霜天月明 原创日常汉服男云纹绣花单大氅传统礼服外套</div>
													<div class="type">颜色分类：深棕色 尺码：均码</div>
												</a>
											</div>
											<div class="tdf2"><span class="c9">¥1269.90</span></div>
											<div class="tdf2"><span class="cr">2000</span></div>
											<div class="tdf1">
												<a class="but disabled" href="#" role="button">积分不够</a>
											</div>
										</div>
										
									</div>
									<div class="page text-right clearfix">
										<a class="disabled">上一页</a>
										<a class="select">1</a>
										<a href="">2</a>
										<a href="">3</a>
										<a class="" href="">下一页</a>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="detail">
							<div class="table-thead">
								<div class="tdf3">来源/用途</div>
								<div class="tdf2">积分变化</div>
								<div class="tdf2">日期</div>
								<div class="tdf1">备注</div>
							</div>
							<div class="integral-item__list">
								<div class="integral-item">
									<div class="tdf3">
										<a class="integral-item__info" href="">
											<div class="img"><img src="images/temp/M-001.jpg" alt="" class="cover"></div>
											<div class="name ep2">锦瑟 原创传统日常汉服男绣花交领衣裳cp情侣装春夏款</div>
											<div class="type">颜色分类：深棕色 尺码：均码</div>
										</a>
									</div>
									<div class="tdf2">
										<b class="fz24 cg">+200</b>
									</div>
									<div class="tdf2"><span class="c6">2017年4月12日 15:13:14</span></div>
									<div class="tdf1">
										<span class="c6">交易获得</span>
									</div>
								</div>
								<div class="integral-item">
									<div class="tdf3">
										<a class="integral-item__info" href="">
											<div class="img"><img src="images/temp/M-002.jpg" alt="" class="cover"></div>
											<div class="name ep2">锦瑟 原创传统日常汉服男绣花交领衣裳cp情侣装春夏款</div>
											<div class="type">颜色分类：深棕色 尺码：均码</div>
										</a>
									</div>
									<div class="tdf2">
										<b class="fz24 cr">-1500</b>
									</div>
									<div class="tdf2"><span class="c6">2017年4月12日 15:13:14</span></div>
									<div class="tdf1">
										<span class="c6">兑换消耗</span>
									</div>
								</div>
								<div class="integral-item">
									<div class="tdf3">
										<a class="integral-item__info" href="">
											<div class="img"><img src="images/temp/M-003.jpg" alt="" class="cover"></div>
											<div class="name ep2">锦瑟 原创传统日常汉服男绣花交领衣裳cp情侣装春夏款</div>
											<div class="type">颜色分类：深棕色 尺码：均码</div>
										</a>
									</div>
									<div class="tdf2">
										<b class="fz24 cg">+300</b>
									</div>
									<div class="tdf2"><span class="c6">2017年4月12日 15:13:14</span></div>
									<div class="tdf1">
										<span class="c6">交易获得</span>
									</div>
								</div>
								<div class="integral-item">
									<div class="tdf3">
										<a class="integral-item__info" href="">
											<div class="img"><img src="images/temp/M-004.jpg" alt="" class="cover"></div>
											<div class="name ep2">锦瑟 原创传统日常汉服男绣花交领衣裳cp情侣装春夏款</div>
											<div class="type">颜色分类：深棕色 尺码：均码</div>
										</a>
									</div>
									<div class="tdf2">
										<b class="fz24 cg">+250</b>
									</div>
									<div class="tdf2"><span class="c6">2017年4月12日 15:13:14</span></div>
									<div class="tdf1">
										<span class="c6">交易获得</span>
									</div>
								</div>
								<div class="integral-item">
									<div class="tdf3">
										<a class="integral-item__info" href="">
											<div class="img"><img src="images/temp/M-005.jpg" alt="" class="cover"></div>
											<div class="name ep2">锦瑟 原创传统日常汉服男绣花交领衣裳cp情侣装春夏款</div>
											<div class="type">颜色分类：深棕色 尺码：均码</div>
										</a>
									</div>
									<div class="tdf2">
										<b class="fz24 cg">+450</b>
									</div>
									<div class="tdf2"><span class="c6">2017年4月12日 15:13:14</span></div>
									<div class="tdf1">
										<span class="c6">交易获得</span>
									</div>
								</div>
								<div class="integral-item">
									<div class="tdf3">
										<a class="integral-item__info" href="">
											<div class="img"><img src="images/temp/M-006.jpg" alt="" class="cover"></div>
											<div class="name ep2">锦瑟 原创传统日常汉服男绣花交领衣裳cp情侣装春夏款</div>
											<div class="type">颜色分类：深棕色 尺码：均码</div>
										</a>
									</div>
									<div class="tdf2">
										<b class="fz24 cr">-1000</b>
									</div>
									<div class="tdf2"><span class="c6">2017年4月12日 15:13:14</span></div>
									<div class="tdf1">
										<span class="c6">兑换消耗</span>
									</div>
								</div>
								<div class="integral-item">
									<div class="tdf3">
										<a class="integral-item__info" href="">
											<div class="img"><img src="images/temp/M-007.jpg" alt="" class="cover"></div>
											<div class="name ep2">锦瑟 原创传统日常汉服男绣花交领衣裳cp情侣装春夏款</div>
											<div class="type">颜色分类：深棕色 尺码：均码</div>
										</a>
									</div>
									<div class="tdf2">
										<b class="fz24 cr">-12450</b>
									</div>
									<div class="tdf2"><span class="c6">2017年4月12日 15:13:14</span></div>
									<div class="tdf1">
										<span class="c6">兑换消耗</span>
									</div>
								</div>
							</div>
							<div class="page text-right clearfix">
								<a class="disabled">上一页</a>
								<a class="select">1</a>
								<a href="">2</a>
								<a href="">3</a>
								<a class="" href="">下一页</a>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
