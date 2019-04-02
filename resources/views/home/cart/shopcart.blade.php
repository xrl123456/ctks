@extends('home.order.index')


@section('order_content')
<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车</div>
				<form action="/home/shop" class="shopcart-form__box" method="post" >
					{{ csrf_field() }}

					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="150">
									<label class="checked-label"><input type="checkbox" class="check-all" ><i></i> 全选</label>
								</th>
								<th width="300">商品信息</th>
								<th width="150">单价</th>
								<th width="200">数量</th>
								<th width="200">总价</th>
								<th width="80">操作</th>
							</tr>
						</thead>
						<tbody>

							@foreach($testshop as $key=>$value)
								
							<tr>

								<th scope="row" style="width:140px;height:140px;">
									 <!-- onclick="shopbox({{ $value->id }})" -->
									<label class="checked-label"><input id="sub_btn" id="boxstatus{{ $value->id }}" type="checkbox" value="{{ $value->oprice }}" name="{{ $value->id }}"  ><i></i>
										<div class="img" ><img src="/uploads/Goods/"  alt="" class="cover"></div>

									</label>
								</th>

								<td>

									<div class="name ep3"></div>
									<div class="type c9">颜色分类：深棕色  尺码：均码</div>
								</td>
								<td>¥444</td>
								<td>
									<div class="amount-widget">
									<input class="amount-input" id="inputnum{{ ($value->id) }}" value="{{ $value->number }}" maxlength="3" title="请输入购买量" type="text" disabled="disabled">
									<div class="amount-btn">
										<a class="amount-but add" onclick="add({{ $value->id }})" ></a>
										<a class="amount-but sub" onclick="prep({{ $value->id }})"></a>
									</div>
								</div>

									<div class="item-stock"><span style="margin-left: 10px;">库存 <b id="Stock{{ $value->id }}"></b> 件</span></div>

								</td>
								<td id="newoprice{{ $value->id }}">¥{{ $value->oprice }}</td>
								<td><a href="/home/shop/del/{{ $value->id }}" style="background-color:orange;border: 1px solid red;width:60px;height:30px;border-radius:10px 10px 10px 10px; margin-top:40px;"  onclick="return confirm('删了就没了哦')"><h3>删除</h3></a></td>
								<!-- <td><a href="/home/shop/del/{{ $value->id }}"><button type="submit" style="background-color:orange;border: 1px solid red;width:60px;height:30px;border-radius:10px 10px 10px 10px; margin-top:40px;">删除</button></a></td> -->
							 <!-- disabled="disabled" -->
							</tr>
							
							@endforeach
						</tbody>
					</table>
					<div class="user-form-group tags-box shopcart-submit pull-right">
						<input type="submit" class="btn" value="提交订单" onclick="return dontshop()">
						<!-- onclick="return dontshop() -->
					</div>
					<div class="checkbox shopcart-total">
						<label><input type="checkbox" class="check-all"><i></i> 全选</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/home/shop/out" onclick="return confirm('清空就没了哦')">清空购物车</a>
						<!-- <div class="pull-right">
							已选商品 <span id="shopnum">0</span> 件
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;合计（不含运费）
							<b class="cr">¥<span class="fz24">0</span></b>
						</div> -->
					</div>


				</form>
					<script>
							// $('input.val').onlyReg({reg: /[^0-9.]/g});
							function add(id){

								// console.log(id);
								var num = $('#inputnum'+id).val();

								// console.log(num);
								var topnum =$('#Stock'+id).text();
								// console.log(topnum);
								// 总金额
								var newoprice = $('#newoprice'+id).text();
								// console.log(newoprice);
								// 操作加 
								if(num > topnum -1){
									alert('没这么多库存');
								}else{
									num++  ;
									// console.log(num);
								}

								$.ajax({
		                            'url': '/home/shop/number/'+num+'/'+id,
		                            'type': 'get',
		                            'data': '',
		                            'async': true,
									success:function(data){
		   									                   
		                        			$('#newoprice'+id).text('￥'+data.oprice);
											$('#inputnum'+id).val(data.num);
		                            }
		                        })
							}
							function prep(id){

								// console.log(id);
								var num = $('#inputnum'+id).val();
								// console.log(num);
								var topnum =$('#Stock'+id).text();
								// console.log(topnum);
								// // 总金额
								var newoprice = $('#newoprice'+id).text();
								// 操作加 
								if(num  == 1 ){
									alert('大爷，好歹留点存货吧');
								}else{
									num--  ;
								}
								$.ajax({
		                            'url': '/home/shop/number/'+num+'/'+id,
		                            'type': 'get',
		                            'data': '',
		                            'async': true,
									success:function(data){
		                        			$('#newoprice'+id).text('￥'+data.oprice);
											$('#inputnum'+id).val(data.num);
											// console.log(data.status);
		                            }
		                            
		                        })
									
							}
					</script>


					<script type="text/javascript">
					
						$(document).ready(function(){
							var $item_checkboxs = $('.shopcart-form__box tbody input[type="checkbox"]'),
								$check_all = $('.check-all');
							// 全选
							$check_all.on('change', function() {
								$check_all.prop('checked', $(this).prop('checked'));
								$item_checkboxs.prop('checked', $(this).prop('checked'));
							});
							// 点击选择
							$item_checkboxs.on('change', function() {
								var flag = true;
								// console.log(item_checkboxs);
								$item_checkboxs.each(function() {
									if (!$(this).prop('checked')) { flag = false }
								});
								$check_all.prop('checked', flag);
							});
							
						});
						// 阻止form表单传送数据 
						function dontshop(){
							var box = $('input:checkbox:checked');
							if(box.length == 0){
								// console.log(123);
								alert('老板,不买东西怎么结算');
								return false;
							}else{
								return true;
							}
						
						}


				
						// console.log(id);
													        				


						// $('#shopnum').test(shopnumber);

					</script>


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



@endsection