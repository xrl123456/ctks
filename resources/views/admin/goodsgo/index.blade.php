@extends('admin.body.index')
@section('content')

<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-shopping-cart"></i>商品列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        <div id="DataTables_Table_1_length" class="dataTables_length">
	                        <label>显示<select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1">
	                        <option value="10" selected="selected">10</option>
	                        <option value="25">25</option><option value="50">50</option>
	                        <option value="100">100</option>
	                        </select>条
                        </label>
                        </div>
                        <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>搜索: <input type="text" aria-controls="DataTables_Table_1">
                        </label></div>
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                <th>编号</th>
                                <th style="width: 120px;">商品名称</th>
                                <th  style="width: 234px;">商品图片</th>
                                <th  style="width: 160px;">商品价格</th>
                                <th  style="width: 120px;">商品分类</th>
                                <th style="width: 250px;">商品描述</th>
                                <th style="width:120px">商品数量</th>
                                <th  style="width: 120px;">商品状态</th>
                                <th  style="width: 160px;">操作</th>
                               
                                </tr>
                            </thead>
                            
                        	<tbody role="alert" aria-live="polite" aria-relevant="all">
                            @foreach($goodsgo as $k=>$v)
                        		<tr class="odd" align="center">
                                    <td class="  sorting_1">{{ $v->id }}</td>
                                    <td class=" ">{{ $v->gname }}</td>
                                    <td class=" "><img src="/uploads/goods/{{ $v->pic }}" style="width:60px"></td>
                                    <td class=" ">{{ $v->price}}</td>
                                       
                                    <td class=" ">{{ $v->goodtype->cname or '' }}</td>
                                  
                                    <td class="  ">{{ $v->goodsinfo }}</td>
                                    <td class=" ">{{ $v->goodsNum }}</td>
                                    <td class=" "><a class="btn btn-info " href="/admins/goodsgo/{{ $v->id }}">{{ $v->status == 0 ?'上架':'下架'}}</a></td>
                                    <td class=" ">
                                    <a href="/admins/goodsgo/{{ $v->id }}/edit"  class="btn btn-info">编辑</a>
                                    <form action="/admins/goodsgo/{{$v->id}}" method="post" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                         <input type="submit" value="删除"  onclick="return confirm('数据无价谨慎操作')" class="btn btn-danger " >
                                    </form>        
                                @endforeach
                         	</tbody>
                        </table>
                         <div class="dataTables_info" id="DataTables_Table_1_info">
                         Showing 1 to 10 of 57 entries
                         </div>
                         <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                         <a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_1_first">First</a>
                         <a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_1_previous">Previous</a>
                         <span><a tabindex="0" class="paginate_active">1</a>
                         <a tabindex="0" class="paginate_button">2</a>
                         <a tabindex="0" class="paginate_button">3</a>
                         <a tabindex="0" class="paginate_button">4</a>
                         <a tabindex="0" class="paginate_button">5</a>
                         </span>
                         <a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">Next</a>
                         <a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">Last</a>
                         </div>
                         </div>
                    </div>
        
               </div>
 @endsection