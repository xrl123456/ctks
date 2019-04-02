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

	
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-official"></i> 管理员 -- 列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">

                            <form action="/admins/order" method="get">
                                <div id="DataTables_Table_0_length" class="dataTables_length">
                                    <label>搜索显示
                                            <select size="1" name="count">
                                            <option value="5"   @if(isset($request['count']) && !empty($request['count']) && $request['count']==5) selected @endif >5</option>
                                            <option value="10"  @if(isset($request['count']) && !empty($request['count']) && $request['count']==10) selected @endif >10</option>
                                            <option value="15"  @if(isset($request['count']) && !empty($request['count']) && $request['count']==15) selected @endif >15</option>
                                            <option value="20"  @if(isset($request['count']) && !empty($request['count']) && $request['count']==20) selected @endif >20</option>
                                        </select>条 
                                    </label>
                                </div>
                            <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                <label>订单号： <input type="text"  name="search"  value ="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_0">
                                    <input type="submit" class="btn btn-info" value="搜索">
                                 </label>
                            </div>
                        </form>
            </div>
        
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th style="width:30px;">ID</th>
                    <th>订单号</th>
                    <th>收货人</th>
                    <th>金额</th>
                    <th>缩略图</th>
                    <th>时间</th>
                    <th>订单进程</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
      		@foreach($orders as $key=>$value)
      		@foreach($value->addersand as $k=>$v)
            <tr class="odd">
                <td class="  sorting_1" style="text-align:center">{{ $value->id }}</td>
                <td class="  sorting_1" style="text-align:center">{{ $value->oid }}</td>
                <!-- 一对一 -->
                <td class="  sorting_1" style="text-align:center">{{ $value->userorder->name }}<img src="" alt="" style="width:50px;height:50px;border-radius:70%;"></td>
                <td class="  sorting_1" style="text-align:center">￥{{ $value->oprice }}</td>
                <td class="  sorting_1" style="text-align:center;width:60px;height:60px;">
                	<img src="/uploads/Goods/{{ $v->pic }}">
                </td>
                <td class="  sorting_1" style="text-align:center">{{ $value->created_at }}</td>
                <td class="  sorting_1" style="text-align:center">
                <b>	@if( $value->status  == 1)
                		<font color="red">已支付<br>未发货</font>
                	@elseif($value->status == 2)
                		<font color="orange">已发货<br>等待买家签收</font>
                	@elseif($value->status == 3)
                		<font color="#f0c">已签收<br>待评价</font>
                	@else
 						<font color="green">完成</font>               	
                	@endif
                </b>
                </td>
                <td class="  sorting_1" style="text-align:center">
                <a href="/admins/order/{{$value->oid}}" class="btn btn-success">订单详情</a>
                @if($value->status <= 1)
                <a href="/admins/order/{{ $value->oid }}/edit" class="btn btn-warning">修改物流状态</a>
                @endif
                </td>
            </tr>
            @endforeach
            @endforeach

        </tbody>
        </table>
        <div class="dataTables_info" ><h4>- - 共 {{ $total }} 条数据</h4></div>
        

            <div class="dataTables_paginate paging_full_numbers" id="page_page">
                        {{ $orders->appends($request)->links() }}
            </div>
        </div>
    </div>
</div>
            <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
                <script type="text/javascript">
                function editstatus(id){
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }) 

                        $.ajax({
                            'url': '/admins/super/status/'+id ,
                            'type': 'POST',
                            'data': '',
                            'async': true,
                            success:function(arr){
                                    var imgpath = '/uploads/face/'+arr+'.'+'jpg';
                                    // console.log(imgpath);
                                    $('#img'+id).attr('src',imgpath);
                            }
                        })
                    }
            </script>





@endsection