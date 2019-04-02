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
                        <span class="icon-facetime-video">  视频 --- 编辑</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admins/video/{{ $video->id }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <div class="mws-form-row">
                                    <label class="mws-form-label"><h4>视频标题：</h4></label>
                                    <div class="mws-form-item">
                                        <input placeholder="请输入标题" style="width:200px;" type="text" class="small" name="vname" value="{{ $video->vname }}">
                                    </div>
                                </div>
                            <div class="mws-form-inline">
                                   <div class="mws-form-row">
                                    <label class="mws-form-label">选择视频封页图片：</label>
                                    <div class="mws-form-item"style="width:300px;">
                                        <input type="file" class="small" value="{{ $video->pic }}" name="pic">
                                    </div>
                                </div>
                           
                                <div class="mws-form-row">
                                    <label class="mws-form-label">选择视频：</label>
                                    <div class="mws-form-item"style="width:300px;">
                                        <input type="file" class="small" value="{{ $video->audio }}" name="audio">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">视频状态：</label>
                                    <div class="mws-form-item">
                                        显示<input type="radio" class="" name="status" checked value="1"><br>
                                        隐藏<input type="radio" class="" name="status" value="0">
                                    </div>
                                </div>
                                <div>
                                    <!-- <img src="/uploads/images/link.jpg" alt=""> -->
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="修改" class="btn btn-danger">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>



@endsection