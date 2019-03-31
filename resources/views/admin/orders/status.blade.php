@extends('admin.body.index')

@section('content')
<div class="mws-panel grid_4">
					@foreach($info as $key=>$value)
					@foreach($value->addersand as $k=>$v)
                    <div class="mws-panel-header">
                        <span>订单详情：</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admins/order" method="POST">
                        	{{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">订单号：</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="oid" value="{{ $value->oid }}"  readonly="readonly" style="border:#000;">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">下单时间：</label>
                                    <div class="mws-form-item">
                                        <input type="" name="" value="{{ $value->updated_at }}" disabled="disabled" style="border:#000;">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">收货信息：</label>
                                    <div class="mws-form-item" >
                             
                                    	<input type="hidden" id="input" name="aid" value="{{ $value->aid }}" >
                                        <input type="text"  name="addresname" value="{{ $value->useraddres->name }}" ><br>
                                        <input type="text" name="addresphone" value="{{ $value->useraddres->phone }}" ><br>
                                        <input type="text" name="addres" value="{{ $value->useraddres->address }}" ><br>
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">当前订单状态：</label>
                                    <div class="mws-form-item">
                                        @if($value->status == 1 )
                                        	<span>买家已付款，等待发货</span><br/><br/>
                                        	<select name="status">
                                        		<option selected="selected" value="1" >未发货</option>
                                        		<option value="2" >确认发货</option>

                                        	</select>		
                                        @elseif($value->status == 2 )
                                        	<span>已发货，等待签收</span>

                                        @elseif($value->status == 3 )	
                                        	已签收，
                                        @else
                                        	订单完成
                                        @endif
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">商品信息：</label>
                                    <div class="mws-form-item clearfix">
                                    	<input type="hidden" name="gid" value="{{ $v->id }}">
                                        {{ $v->gname }}
                                    </div>
                                    <div class="mws-form-item clearfix">
                                        <img src="/uploads/Goods/{{ $v->pic }}" style="height: 200px;">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">购买数量：</label>
                                    <div class="mws-form-item clearfix">
                                    	<input type="text" name="number" value="{{ $value->number }}">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">总金额：</label>
                                    <div class="mws-form-item clearfix">
                                    	<input type="text" name="oprice" value="{{ $value->oprice }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                            	@if($value->status > 2)
                                <a href="/admins/order" type="submit"  class="btn btn-success">返回</a>
                            	@else
                            	<input type="submit" name=""  class="btn btn-danger" value="提交修改">

                                <a href="/admins/order" type="submit"  class="btn btn-success">返回</a>
                               @endif
                            </div>
                        </form>
                    </div>      
                </div>
                @endforeach
                @endforeach
                <script type="text/javascript">
                

                </script>
@endsection
