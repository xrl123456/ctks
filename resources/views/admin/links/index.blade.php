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

<!-- 表格 列表 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 友情链接管理 --- 列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table" >
            <thead>
                <tr>
                    <th style="width:40px;">id</th>
                    <th style="width:100px;">名称</th>
                    <th>地址</th>
                    <th style="width:200px;">修改时间</th>
                    <th style="width:130px;">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($links as $key =>$val)
                <tr>
                    <th class="active" style="height:40px;">{{ $i++ }}</th>
                    <th>{{ $val->lname }}</th>
                    <th>{{ $val->lurl }}</th>
                    <th>{{ $val->updated_at }}</th>
                    <th>
                        <a href="/admins/links/{{ $val->id }}/edit/" class="btn btn-warning">修改</a>

                        <form action="/admins/links/{{ $val->id }}" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                 <input type="submit" value="删除" class="btn btn-danger " >
                            </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection