@extends('admin.body.index')
@section('content')
<!-- 显示错误 信息 开始 -->
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- 显示错误 信息 结束 -->
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                         <span>订单详情</span>
                    </div> 
                       
                    <div class="mws-panel-body no-padding">
                    	<div class="mws-form" >
                    			<div class="mws-form-row">
                    				<h3>地址：</h3>
                    				
                    					<td><h4>{{ $integ->address->address }}</h4></td>
                    				
                    			</div>
                                <div class="mws-form-row">
                                    <h3>订单信息</h3>
                                        <tr>
                                            <td><h4>订单编号：{{ $integ->oid }}</h4></td>
                                            <td><h4>支付方式：积分兑换</h4></td>
                                           <td><h4>交易时间：{{ $integ->created_at }}</h4></td>
                                        </tr>
                                </div>
                                <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                <tr  style="background-color:#b0c4de;">
                                    <th  style="width: 185px;"><h4>用户名</h4></th>
                                    <th  style="width: 185px;"><h4>手机号</h4></th>
                                    <th  style="width: 185px;"><h4>商品</h4></th>
                                    <th  style="width: 234px;"><h4>数量</h4></th>
                                    <th  style="width: 160px;"><h4>积分单价</h4></th>
                                      <th  style="width: 250px;"><h4>状态</h4></th>
                                  
                                </tr>
                                 <tr align="center">

                                        <td class=" " style="swidth:50px;"><h4>{{ $integ->user->name }}</h4></td>
                                        <td class=" "><h4>{{ $integ->user->phone }}</h4></td>
                                        <td class=" "><h4><img src="/uploads/goods/{{ $integ->goods->pic }}" style="width:100px"><br/>商品名称：<br/>{{ $integ->goods->gname }}</h4></td>
                                        <td class=" "><h4>1件</h4></td>
                                        <td><h4>{{ $integ->price }} </h4></td>
                                        <td class=" "><h4>已发货</h4></td>
                                       
                                       
                                       
                                                                
                         </table>

@endsection