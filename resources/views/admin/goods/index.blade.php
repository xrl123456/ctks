@extends('admin.body.index')
@section('content')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>分类列表</span>
                    </div>
                
                <div class="mws-panel-body no-padding">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                        <div class="dataTables_filter" id="DataTables_Table_0_filter">  
                            <input type="text" id="keyword" aria-controls="DataTables_Table_0"><button class="btn btn-info">搜索</button> 
                        </div>

                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>类名</th>
                                    <th>父级ID</th>
                                    <th>分类路径</th>
                                   
                                    <th>操作</th>
                                </tr>
                            </thead>
                            @foreach($data as $k=>$v)
                            <tbody>
                                <tr  align="center">

                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->cname }}</td>
                                    <td>{{ $v->pid }}</td>
                                    <td>{{ $v->path }}</td>
                                    
                                    <td>
                                     <form action="/admins/goods/{{ $v->id }}"  method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <input  type="hidden" class="btn btn-danger" value="删除" >
                                    <!-- submit -->
                                    <a href="/admins/goods/create?id={{ $v->id }}" class="btn btn-info">
                                        添加子分类
                                        </a>
                                        </form>
                                    </td>
                                </tr>
                             
                            </tbody>
                            @endforeach
                        </table>
                        <div class="dataTables_info" >
                                <h4>共{{ $total }}条数据</h4>
                        </div>
                        <div >
                           
                                                
                    </div>              
            </div>
    </div>
@endsection




















