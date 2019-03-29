@extends('admin.body.index')
@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-users"></i>积分兑换详情表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">

                        	<form action="/admins/users" method="get">
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
                            	<label>关键字： <input type="text"  name="search"  value ="" aria-controls="DataTables_Table_0">
                            		<input type="submit" class="btn btn-info" value="搜索">
                           		 </label>
                            </div>
                        </form>
                        <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            
                                <tr role="row">
	                                <th style="width:50px;" class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 185px;">编号</th>
	                                <th class="sorting" style="width:150px;"role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;">账号名</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 234px;">商品名称</th>
	                                <th class="sorting" style="width:150px;"role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 160px;">定单号</th>
	                                <th class="sorting" style="width:150px;"role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 120px;">兑换时间</th>
	                                <th style="width:150px;" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 120px;">操作</th>

                                </tr>
                        			@foreach($integ as $k=>$v)
	                       	 		<tr class="odd"  align="center">

	                                    
	                                    <td class=" " style="swidth:50px;">{{$i++}}</td>
	                                    <td class=" ">{{ $v->user->name }}</td>
	                                    <td class=" ">{{ $v->goods->gname }}</td>
	                                    <td class=" ">{{ $v->oid }}</td>
	                                    <td class=" ">{{ $v->created_at }}</td>

	                                   
	                                    <td class=" ">
                                            @if($v->status == 0)
		                                    <a href="/admins/integrati/{{ $v->id }}" class="btn btn-danger">待发货</a>
                                            @else
                                             <a href="" class="btn btn-info">已发货</a>
                                            @endif
                                             <a href="/admins/integrati/{{ $v->id }}/edit" class="btn btn-warning">订单详情</a>
                                           
	                                     </td>
	                                </tr>
	                               @endforeach
                         </table>
                         <div class="dataTables_info" ><h4></h4></div>
                         	<div class="dataTables_paginate" id="page_page">
		                         <!-- <a class="paginate_disabled_previous" tabindex="0" role="button" id="DataTables_Table_0_previous" aria-controls="DataTables_Table_0">Previous</a> -->
		                         <!-- <a class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next" aria-controls="DataTables_Table_0">Next</a> -->
		                         
		                        
                         	</div>
                         </div>
                    </div>
                </div>
@endsection
