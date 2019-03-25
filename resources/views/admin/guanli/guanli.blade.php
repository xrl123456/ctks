@extends('admin.body.index')
@section('content')
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
                        <span>网站管理 --- 添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admins/guanli" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">网站管理名称：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="name"  value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">描述：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="desc"  value="{{ old('desc') }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">logo：</label>
                                    <div class="mws-form-item">
                                        <input type="file" class="small" name="pic">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">备案号：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="filing"  value="{{ old('filing') }}">
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                                    <label class="mws-form-label">电话：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="phone"  value="{{ old('phone') }}">
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                                    <label class="mws-form-label">状态：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="statu"  value="{{ old('statu') }}">
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                                    <label class="mws-form-label">地址：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="url"  value="{{ old('url') }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" name="cright">操作：</label>
                                    <div class="mws-form-item">
                                        显示<input type="radio" class="" name="cright" value="1"><br>
                                        隐藏<input type="radio" class="" name="cright" value="0">
                                    </div>
                                </div>
                                <div>
                                    <img src="/uploads/images/link.jpg" alt="">
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="添加" class="btn btn-danger">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>



@endsection