@extends('admin/body/index')
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
                        <span>网站管理 --- 修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admins/guanli/{{ $guanli->id }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">网站管理名称：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="name" placeholder="请输轮播图地址,如:http://www.XDL.com" value="{{ $guanli->name }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">描述：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="desc" placeholder="请输轮播图地址,如:http://www.XDL.com" value="{{ $guanli->desc }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">备案号：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="filing" placeholder="请输轮播图地址,如:http://www.XDL.com" value="{{ $guanli->filing }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">电话：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="phone" placeholder="请输轮播图地址,如:http://www.XDL.com" value="{{ $guanli->phone }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">状态：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="statu" placeholder="请输轮播图地址,如:http://www.XDL.com" value="{{ $guanli->statu }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">地址：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="url" placeholder="请输轮播图地址,如:http://www.XDL.com" value="{{ $guanli->url }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">操作：</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="medium" name="cright" placeholder="请输轮播图地址,如:http://www.XDL.com" value="{{ $guanli->cright }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">logo图片：</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<img src="/uploads/{{ $guanli->logo }}" style="width:100px;height:100px;">
                                    <div class="mws-form-item">
                                    <label class="mws-form-label">可选择新logo图片替换:</label><br><br>
                                        <input type="file" class="medium" name="pic">
                                    </div>
                                </div>
                                <div>
                                    <img src="/uploads/images/link.jpg" alt="">
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="确认修改" class="btn btn-danger">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>



@endsection