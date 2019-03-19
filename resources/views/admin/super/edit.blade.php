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
            <span>管理员 -- 修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admins/super/{{ $super->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label"><h4>用户名</h4></label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="name" value="{{ $super->name }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><h4>密码</h4></label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name="password" value="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><h4>确认密码</h4></label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name="password2" value="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><h4>邮箱</h4></label>
                        <div class="mws-form-item">
                            <input type="email" class="small" name="email" value="{{ $super->email }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><h4>手机号</h4></label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="phone" value="{{ $super->phone }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                    <label class="mws-form-label"><h4>角色：</h4></label>
                    <div class="formControls col-xs-8 col-sm-9"> 
                    <span class="select-box" style="width:150px;">
                        <select class="large" name="grade" size="1">
                            <option value="0" {{ (($super->grade ==  0) ? 'selected' : '' ) }}>管理员</option>
                            <option value="1" {{ (($super->grade ==  1) ? 'selected' : '' ) }}>超级管理员</option>
                    </select>
                    </span> 
                    </div>
                    </div>

                      <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn ">
                </div>
            </form>
        </div>      
    </div>





@endsection