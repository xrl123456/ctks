@extends('admin.body.index')


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<div class="mws-panel grid_4">
    <div class="mws-panel-header">
        <span>修改： &nbsp;{{ $su['name'] }} &nbsp; &nbsp;的个人详情</span>
    </div>
    <div class="mws-panel-body no-padding" style="text-align:center;">
        <label for="file">
            <img id="face" src="/uploads/{{ ($super['face'] ? $super['face'] : '/faces/1.jpg' ) }}" alt="" style="width:150px;height:150px;border-radius:50%;margin:20px;" >
        </label>

    <form enctype="multipart/form-data" style="display: none;">
        {{ csrf_field() }}
        <input type="file" value="上传" name="face" id="file" onchange="uploadimg()">
    </form>
        <form class="mws-form" action="/admins/super/showup/{{ $su['id'] }}" method="post" >
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row bordered">
                
                    <label class="mws-form-label">姓名：</label>
                    <div class="mws-form-item">
                        <input type="text" class="large" value="{{ $super['name'] }}" name="name">
                    </div>
                </div>
                <div class="mws-form-row bordered">
                    <label class="mws-form-label">联系电话：</label>
                    
                    <div class="mws-form-item">
                        <input type="text" class="large" value="{{ $su['phone'] }}" name="phone">
                    </div>
                </div>
                <div class="mws-form-row bordered">
                    <label class="mws-form-label">简介：</label>
                    <div class="mws-form-item">
                        <textarea  class="large" value="" name="desc">{{ $super['desc'] }}</textarea>
                    </div>
                </div>

                <div class="mws-form-row bordered">
                    <label class="mws-form-label">性别：</label>
                    <div class="mws-form-item clearfix">
                        <input type="radio" name="sex" value="1" {{ ($super['sex'] == 1 ) ? 'checked' : '' }}>男|
                        <input type="radio" name="sex" value="2" {{ ($super['sex'] == 2 ) ? 'checked' : '' }}>女|
                        <input type="radio" name="sex" value="0" {{ ($super['sex'] == 0 ) ? 'checked' : '' }}>保密
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger" name="submit">
                    <a class="btn " href="/admins/super">返回</a>
            </div>
        </form>
    </div>      
</div>



    <div class="mws-panel grid_4">
        <div class="mws-panel-header">
            <span>{{ $su['name'] }} &nbsp; &nbsp;的详情页</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="form_layouts.html">
                <div class="mws-form-inline">
                    <div style="text-align:center;">
                        <img src="/uploads/{{ ($super['face'] ? $super['face'] : '/faces/1.jpg' ) }}" alt="" style="width:150px;height:150px;border-radius:50%;margin:20px;">
                    </div>
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">姓名：</label>
                        <div class="mws-form-item">
                            <h4> 
                                {{ $super['name'] }} 
                                @if($super['sex'] == 1)
                                    先生

                                @elseif($super['sex'] == 2)
                                    女士
                                @else

                                @endif

                            </h4>
                        </div>
                    </div>
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">联系电话：</label>
                        <div class="mws-form-item">
                         <h4>{{ $su['phone'] }}</h4>
                        </div>
                    </div>
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">个人简介:</label>
                        <div class="mws-form-item">
                        <div>
                            <h4>{{ $super['desc'] }}</h4>
                        </div>
                        </div>
                    </div>
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">创建时间：</label>
                        <div class="mws-form-item clearfix">
                            <h4>{{ $su['created_at'] }}</h4>
                        </div>
                    </div>
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">当前身份：</label>
                        <div class="mws-form-item clearfix">
                            <h3>{{ ($su['grade'] == 0 ) ? '管理员' : '超级管理员' }}</h3>
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <a class="btn " href="/admins/super">返回</a>
                </div>
             </form> 
        </div>      
    </div> 
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

        <script type="text/javascript">
        

            
            function uploadimg(){
                var formData = new FormData($("form")[0]);
                formData.append('face',$('#file')[0].files[0]);
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    'url': '/admins/super/imgup/{{ $su['id'] }}',
                    'type': 'POST',
                    'data':formData,
                    'async': true,
                    'processData': false,
                    'contentType': false,
                    'dataType':'json',
                    success:function(arr){
                        // alert(arr);
                        if(arr.msg == 'success'){
                            // 拼接路径
                            // 拼接路径
                            var imgpath = '/uploads/'+arr.path;
                            $('#face').attr('src',imgpath);
                        }
                    }

                })
            }

           

        </script>
@endsection
