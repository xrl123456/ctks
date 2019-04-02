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
         <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">

                            <form action="/admins/super" method="get">
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
                                <label>用户名： <input type="text"  name="search"  value ="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_0">
                                    <input type="submit" class="btn btn-info" value="搜索">
                                 </label>
                            </div>
                        </form>
            </div>
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th>编号</th>
                    <th>账号</th>
                    <th>头像</th>
                    <th>联系邮箱</th>
                    <th>身份</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($supers as $key =>$value)
            <tr class="odd">
                <td class="  sorting_1" style="text-align:center">{{ $i++ }}</td>
                <td class="  sorting_1" style="text-align:center">{{ $value->name }}</td>
                <td class="  sorting_1" style="text-align:center"><img src="/uploads/{{ ($value->superlist->face == 'faces/1.jpg') ? 'faces/1.jpg' : $value->superlist->face }}" alt="" style="width:50px;height:50px;border-radius:70%;"></td>
                <td class="  sorting_1" style="text-align:center">{{ $value->email }}</td>
                <td class="  sorting_1" style="text-align:center">
                    {{ ($value->grade == 0 ? '管理员' : '超级管理员') }}                    
                </td>
                <td class="  sorting_1" style="text-align:center">
                @if(Session::get('admin_user')['grade'] ==1)
                <label for="status">
                    <img src="/uploads/face/{{ ($value->status) }}.jpg" alt="" title="可以点击修改状态" style="width:40px;border-radius:50%"; id="img{{ $value->id }}" name="img" onclick="editstatus('{{ $value->id }}')">
                </label>
                @else
                    <img src="/uploads/face/{{ ($value->status) }}.jpg" alt="" style="width:40px;border-radius:50%"; name="img">
                @endif
                </td>
                <td class="  sorting_1" style="text-align:center">
                <a href="/admins/super/{{ $value->id }}" class="btn btn-success">详情</a>
                @if(Session::get('admin_user')['id'] == $value->id)
                        <a href="/admins/super/{{ $value->id }}/edit" class="btn btn-warning">修改</a>
                @endif
                @if(Session::get('admin_user')['grade'] == 1)
                    @if($value->grade < 1)
                <form action="/admins/super/{{ $value->id }}" method="post"  style="display: inline;">
                {{  csrf_field() }}
                {{ method_field('DELETE')}}
                <input type="submit" value="删除"  class="btn btn-danger"   onclick="return confirm('数据无价谨慎操作')">
                </form>
                    @endif
                @endif
                </td>
            </tr>
            @endforeach

        </tbody>
        </table>
         <div class="dataTables_info" ><h4>- - 共 {{ $total }} 条数据</h4></div>
        

            <div class="dataTables_paginate paging_full_numbers" id="page_page">
                        {{ $supers->appends($request)->links() }}
            </div>
        </div>
            
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