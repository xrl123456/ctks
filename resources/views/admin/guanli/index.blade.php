@extends('admin.body.index')
@section('content')

<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-bullhorn"></i> 网站管理列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        <form action="/admins/bbs" method="get">
                        <div id="DataTables_Table_1_length" class="dataTables_length">
                        <label>显示
                        <select size="1" name="count" aria-controls="DataTables_Table_1">
                        	<option value="5"  @if(isset($request['count']) && $request['count'] == 5) selected  @endif >5</option>
                        	<option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif >10</option>
                        	<option value="15" @if(isset($request['count']) && $request['count'] == 15) selected @endif >15</option>
                        	<option value="30" @if(isset($request['count']) && $request['count'] == 30) selected @endif >30</option>
                        </select>条
                        </label>
                        </div>
                      
                        <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>搜索关键字: <input type="text" aria-controls="DataTables_Table_1" name="search" value="{{ $request['search'] or ''}}"></label>
                        <input type="submit" value="搜索">
                        </div>
                        </form>
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                	<th>ID</th>
									<th>网站管理名称</th>
									<th>描述</th>
                                    <th>logo</th>
									<th>filing</th>
									<th>电话</th>
									<th>状态</th>
									<th>地址</th>
									<th>操作</th>
                                </tr>

                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($guanli as $k =>$v)
                        <tr class="odd">
                        		<td class="  sorting_1" style="text-align:center">{{ $v->id }}</td>
                                <td class="  sorting_1" style="text-align:center">{{ $v->name }}</td>
                                <td class="  sorting_1" style="text-align:center">{{ $v->desc }}</td>
                                <td class="  sorting_1" style="text-align:center"><img src="/uploads/{{ $v->logo }}" style="width:100px;height:100px;"></td>
                                <td class="  sorting_1" style="text-align:center">{{ $v->filing }}</td>
                                <td class="  sorting_1" style="text-align:center">{{ $v->phone }}</td>
                                <td class="  sorting_1" style="text-align:center">{{ $v->statu == 1 ? '显示':'隐藏' }}</td>
                               	<td class="  sorting_1" style="text-align:center">{{ $v->url }}</td>
                                <td class="  sorting_1" style="text-align:center">
                                <form action="/admins/guanli/{{ $v->id }}" method="post"  style="display: inline;">
                                {{  csrf_field() }}
                                {{ method_field('DELETE')}}
                                <input type="submit" value="删除"  class="btn btn-danger"   onclick="return confirm('数据无价谨慎操作')">
                                </form>
                                <a href="/admins/guanli/{{ $v->id }}/edit" class="btn btn-warning">修改
                                </td>
                     	</tr>
                     	@endforeach

                        </tbody></table>
                        <div class="dataTables_info" id="DataTables_Table_1_info">
                        Showing 1 to 10 of 57 entries
                        </div>
                        <div class="dataTables_paginate paging_full_numbers" id="page_pageqw">
                        	{{ $guanli->appends($request)->links() }}
                        </div>
                        </div>
                    </div>
                </div>

@endsection