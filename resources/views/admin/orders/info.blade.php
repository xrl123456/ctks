@extends('admin.body.index')

@section('content')
<div class="mws-panel grid_4">
					@foreach($info as $key=>$value)
					@foreach($value->addersand as $k=>$v)
                    <div class="mws-panel-header">
                        <span>订单详情：</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="form_layouts.html">
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">订单号：</label>
                                    <div class="mws-form-item">
                                        {{ $value->oid }}
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">下单时间：</label>
                                    <div class="mws-form-item">
                                        {{ $value->updated_at }}
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">收货信息：</label>
                                    <div class="mws-form-item">
                                        {{ $value->useraddres->name }}<br>
                                        {{ $value->useraddres->phone }}<br>
                                        {{ $value->useraddres->address }}
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">当前订单状态：</label>
                                    <div class="mws-form-item">
                                        @if($value->status == 1 )
                                        	买家已付款，等待发货
                                        @elseif($value->status == 2 )
                                        	已发货，等待签收
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
                                        {{ $v->gname }}
                                    </div>
                                    <div class="mws-form-item clearfix">
                                        <img src="/uploads/Goods/{{ $v->pic }}" style="height: 200px;">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">购买数量：</label>
                                    <div class="mws-form-item clearfix">
                                    	{{ $value->number }}
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">总金额：</label>
                                    <div class="mws-form-item clearfix">
                                    	{{ $value->oprice }}
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <a href="/admins/order" type="submit"  class="btn btn-danger">返回</a>
                               
                            </div>
                        </form>
                    </div>      
                </div>
                @endforeach
                @endforeach
@endsection
