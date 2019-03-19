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



<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-official"></i> 管理员 -- 列表</span>
    </div>
    <div class="mws-panel-body no-padding">
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
                    <td class="  sorting_1" style="text-align:center">{{ $value->id }}</td>
                    <td class="  sorting_1" style="text-align:center">{{ $value->name }}</td>
                    <td class="  sorting_1" style="text-align:center"><img src="/uploads/" alt="" style="width:50px;border-radius:70%;"></td>
                    <td class="  sorting_1" style="text-align:center">{{ $value->email }}</td>
                    <td class="  sorting_1" style="text-align:center">
                        {{ ($value->grade == 0 ? '管理员' : '超级管理员') }}                    
                    </td>
                    <td class="  sorting_1" style="text-align:center">
                        <img src="/uploads/faces/{{ ($value->status == 0 ? 'yes.jpg' : 'no.jpg') }}" alt="" style="width:40px;border-radius:50%";>
                    </td>
                    <td class="  sorting_1" style="text-align:center">
                    <a href="/admins/super/{{ $value->id }}" class="btn btn-success">详情</a>
                    <a href="/admins/super/{{ $value->id }}/edit" class="btn btn-warning">修改</a>
                    <form action="/admins/super/{{ $value->id }}" method="post"  style="display: inline;">
                    {{  csrf_field() }}
                    {{ method_field('DELETE')}}
                    <input type="submit" value="删除"  class="btn btn-danger"   onclick="return confirm('数据无价谨慎操作')">
                    </form>
                    </td>
            </tr>
            @endforeach

        </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">
         - - - 1.0.0 for XDL.com
        </div>
        <div class="dataTables_paginate paging_full_numbers" id="page_page">
            
        </div>
        </div>
    </div>
</div>

@endsection