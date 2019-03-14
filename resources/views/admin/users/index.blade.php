@extends('admin.body.index')
@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-users"></i>用户列表</span>
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
                            	<label>关键字： <input type="text"  name="search"  value ="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_0">
                            		<input type="submit" class="btn btn-info" value="搜索">
                           		 </label>
                            </div>
                        </form>
                        <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            
                                <tr role="row">
	                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 185px;">编号</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;">姓名</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 234px;">手机号</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 160px;">邮箱</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 120px;">申请时间</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 120px;">操作</th>

                                </tr>
                        			@foreach($users as $k=>$v)
	                       	 		<tr class="">

	                                    
	                                    <td class=" " style="swidth:50px;">{{ $v->id }}</td>
	                                    <td class=" ">{{ $v->name }}</td>
	                                    <td class=" ">{{ $v->phone }}</td>
	                                    <td class=" ">{{ $v->email }}</td>
	                                    <td class=" ">{{ $v->created_at }}</td>

	                                   
	                                    <td class=" ">
		                                    <a href="/admins/users/{{ $v->id }}/edit" class="btn btn-danger">编辑</a>
                                            <form action="/admins/users/{{ $v->id }}" method="post" style="display: inline;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                 <input type="submit" value="删除" onclick="return confirm('数据无价谨慎操作')" class="btn btn-warning" >
                                            </form>

	                                     </td>
	                                </tr>
	                                @endforeach
                         	
                         </table>
                         <div class="dataTables_info" ><h4>共{{ $count }}条数据</h4></div>
                         	<div class="dataTables_paginate" id="page_page">
		                         <!-- <a class="paginate_disabled_previous" tabindex="0" role="button" id="DataTables_Table_0_previous" aria-controls="DataTables_Table_0">Previous</a> -->
		                         <!-- <a class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next" aria-controls="DataTables_Table_0">Next</a> -->
		                         {{ $users->appends($request)->links() }}

		                        
                         	</div>
                         </div>
                    </div>
                </div>
@endsection
