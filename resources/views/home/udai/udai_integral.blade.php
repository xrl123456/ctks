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
								<li>1) 通过签到获得：每次签到可获得 10 积分</li>
								<li>2) 通过签到获得：连续签到7天以上每次可获得 20 积分</li>
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
											@if($value->goodsNum !=0)
												
												
										<div class="integral-item">
											<div class="tdf3">
												<a class="integral-item__info" href="">
													<div class="img"><img src="/uploads/Goods/{{ $value->pic }}" alt="" class="cover"></div>
													<div class="name ep2">{{ $value->gname }}</div>
													<div class="type">库存 {{ $value->goodsNum }} 件</div>
												</a>
											</div>
											<div class="tdf2"><span class="c9">
											{{$value->goodsinfo}}</span></div>
											<div class="tdf2"><span class="cr">{{$value->price}}</span></div>
											<div class="tdf1">
												@if($value->price > $user->info[0]->desc )
												<a class="but disabled" href="#" role="button">积分不够</a>
												@else
												<a class="but" href="/home/convert/{{ $value->id }}" role="button">兑换</a>
												@endif
												
												
											</div>
										</div>
											@endif
											@endif
											@endif
											@endforeach
										
										@endforeach
										@endforeach
										
										
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

										@foreach($data as $k=>$v)
										@foreach($v['sub'] as $kk=>$vv)
											
											@foreach($goods as $key=>$value)
											@if($vv->cname =='积分品')
											@if($vv->pid == $value->tid)
												@if($value->price <= $user->info[0]->desc )
										<div class="integral-item">
											<div class="tdf3">
												<a class="integral-item__info" href="">
													<div class="img"><img src="/uploads/Goods/{{ $value->pic }}" alt="" class="cover"></div>
													<div class="name ep2">{{ $value->gname }}</div>
													<div class="type">库存 {{ $value->goodsNum }} 件</div>
												</a>
											</div>
											<div class="tdf2"><span class="c9">{{$value->goodsinfo}}</span></div>
											<div class="tdf2"><span class="cr">{{$value->price}}</span></div>
											<div class="tdf1">
												<a class="but" href="/home/convert/{{ $value->id }}" role="button">兑换</a>
											</div>
										</div>
										@endif
										@endif
										@endif
										@endforeach
										
										@endforeach
										@endforeach
										
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
								<div class="tdf2">订单号</div>
								<div class="tdf2">日期</div>
								<div class="tdf1">备注</div>
							</div>
							<div class="integral-item__list">
									@foreach($integ as $kkk=>$vvv)

									@foreach($goods as $key=>$value)
									@if($vvv->gid == $value->id)
							
								<div class="integral-item">
									<div class="tdf3">
										<a class="integral-item__info" href="">
											<div class="img"><img src="/uploads/Goods/{{ $value->pic }}" alt="" class="cover"></div>
											<div class="name ep2">{{ $value->gname }}</div>
											<div class="type">兑换商品 1 件</div>
										</a>
									</div>
									<div class="tdf2">
										<b class="fz24 cr">-{{ $vvv->price }}</b>
									</div>
									<div class="tdf2"><span class="c6">{{ $vvv->oid }}</span></div>
									<div class="tdf2"><span class="c6">{{ $vvv->created_at }}</span></div>
									<div class="tdf1">
										@if($vvv->status == 0)
										<span class="c6">兑换成功</span>
										@else 
										<span class="c6">商家已发货</span>
										@endif
									</div>
								</div>
								@endif
								@endforeach
								@endforeach
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
