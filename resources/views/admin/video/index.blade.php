@extends('admin.body.index')
@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-facetime-video"></i>视频列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">

                            <form action="" method="get">
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
                                    <th style="width:50px;" >编号</th>
                                    <th class="sorting" style="width:150px;" >标题名</th>
                                    <th style="width:250px;" >封页图片</th>
                                    <th class="sorting" style="width:250px;" >操作</th>
                                  

                                </tr>
                                    @foreach($video as $k=>$v)
                                    <tr class="odd"  align="center">

                                        
                                        <td class=" " style="swidth:50px;">{{ $i++ }}</td>
                                        <td class=" ">{{ $v->vname }}</td>
                                       <td class=" "><img src="/uploads/Videopic/{{ $v->pic }}" style="width:60px"></td>
                                        <td class=" ">
                                            <a href="/admins/video/{{ $v->id }}/edit" class="btn btn-warning">编辑</a>
                                            
                                             <form action="/admins/video/{{ $v->id }}" method="post"  style="display: inline;">
                                            {{  csrf_field() }}
                                            {{ method_field('DELETE')}}
                                            <input type="submit" value="删除" onclick="return confirm('数据无价谨慎操作')" class="btn btn-danger"   onclick="return confirm('数据无价谨慎操作')">
                                            </form>
                                          
                                      
                                                                     
                                    </td>
                                    </tr>
                                  
                                @endforeach
                         </table>
                         <div class="dataTables_info" ><h4>共条数据</h4></div>
                            <div class="dataTables_paginate" id="page_page">
                                 <!-- <a class="paginate_disabled_previous" tabindex="0" role="button" id="DataTables_Table_0_previous" aria-controls="DataTables_Table_0">Previous</a> -->
                                 <!-- <a class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next" aria-controls="DataTables_Table_0">Next</a> -->
                                
                                
                            </div>
                         </div>
                    </div>
                </div>
@endsection
