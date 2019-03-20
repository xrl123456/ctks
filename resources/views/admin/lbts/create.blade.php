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
                        <span>轮播图 --- 添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admins/lbts" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图名称：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="simg" placeholder="请输入轮播图名称" value="{{ old('simg') }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图目标地址：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="surl" placeholder="请输轮播图地址,如:http://www.XDL.com" value="{{ old('surl') }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">选择图片：</label>
                                    <div class="mws-form-item">
                                        <input type="file" class="small" name="pic">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图状态：</label>
                                    <div class="mws-form-item">
                                        显示<input type="radio" class="" name="status" value="1"><br>
                                        隐藏<input type="radio" class="" name="status" value="0">
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