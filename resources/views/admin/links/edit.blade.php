@extends('admin/body/index')



@section('content')

<!-- 接受错误信息 -->
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>



@endif


<!-- 友情链接 添加页面 -->

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>友情链接 --- 添加</span>
    </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admins/links/{{ $links->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">链接名：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="lname" placeholder="" value="{{ $links->lname }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">链接地址：</label>
                        <div class="mws-form-item">
                            <input type="text" class="medium" name="lurl" placeholder="请输入链接地址,如:https://www.XDL.com" value="{{ $links->lurl }}">
                        </div>
                    </div>
                    <div>
                        <img src="/uploads/images/linkedit.jpg" alt="">
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