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
                        <span>轮播图 --- 修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admins/lbts/{{ $lbts->id }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="mws-form-inline">
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图图片：</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<img src="/uploads/{{ $lbts->pic }}" style="width:100px;height:100px;">
                                    <div class="mws-form-item"style="width:300px;">
                                    <label class="mws-form-label">可选择新轮播图片替换:</label><br><br>
                                        <input type="file" class="medium" name="pic">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    
                                    <label class="mws-form-label">轮播图状态：</label>
                                    <div class="mws-form-item">

                                        显示<input type="radio" class="" name="status" value="1"{{ $lbts->status==1?'checked':''}}><br>
                                        隐藏<input type="radio" class="" name="status" value="0"{{ $lbts->status==0?'checked':''}}>
                                    </div>
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