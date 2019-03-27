@extends('admin.body.index')
@section('content')
    <style type="text/css">
 #id{
position:absolute;
top:100%;
left:35%;
margin:-60px 0 0 -200px;
width:800px;
height:280px;
}
</style>
  <div class="mws-panel grid_4" id="id">
        <div class="mws-panel-header">
            <span>{{ $users->name or '' }} &nbsp; &nbsp;用户的详情页</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="form_layouts.html">
                <div class="mws-form-inline">
                    <div style="text-align:center;">
                        <img src="{{$users->pic  or '/uploads/faces/h7TNAnxGxBBdUJaBEpc9PGWnTsR3SMkPUb5iwTbn.png'}}" alt="" style="width:150px;height:150px;border-radius:50%;margin:20px;">
                    </div>
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">用户名：</label>
                        <div class="mws-form-item">
                            <h4> 
                                {{ $users->name or '' }}
                                
                            </h4>
                        </div>
                    </div>
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">联系电话：</label>
                        <div class="mws-form-item">
                         <h4>{{ $users->phone or ''}}</h4>
                        </div>
                    </div>
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">生日:</label>
                        <div class="mws-form-item">
                        <div>
                            <h4> {{ $users->birth or '' }}</h4>
                        </div>
                        </div>
                    </div>
                   
                    
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">创建时间：</label>
                        <div class="mws-form-item clearfix">
                            <h4>{{ $users->updated_at or '' }}</h4>
                        </div>
                    </div>
                    <div class="mws-form-row bordered">
                        <label class="mws-form-label">性别：</label>
                        <div class="mws-form-item clearfix">
                            <h3>
                             @if($users->sex =='')

                            @elseif($users->sex == 0)
                                      男      
                            @elseif($users->sex== 1)
                                    女
                            @elseif($users->sex ==2)
                                保密      
                            @endif
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <a class="btn " href="/admins/users">返回</a>
                </div>
             </form> 
        </div>      
    </div> 

@endsection