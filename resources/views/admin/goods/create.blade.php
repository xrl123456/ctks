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
<!-- 显示错误 信息 结束 -->
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                         <span>添加分类</span>
                    </div>
                    
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admins/goods" method="post">
                    	{{ csrf_field() }}
                    		
                    			
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><h4>添加类名：</h4></label>
                    				<div class="mws-form-item">
                    					<input  style="width:500px;" type="text" class="small" name="cname" value="{{ old('phone') }}">
                    				</div>
                    			</div>

                            <div class="">
                                <div class="mws-form-row">
                            <label class="mws-form-label"><h4>分类状态：</h4></label>
                            <div class="formControls col-xs-8 col-sm-9"> 
                            <span class="select-box" style="width:150px;">
                                <select class="select" name="status" size="1" style="width:100px;">
                                    <option value="0">关闭</option>
                                    <option value="1">开启</option>
                                       
                                </select>
                                </span> 
                                </div>
                                </div>

                                
                                  <div class="">
                    			<div class="mws-form-row">
							<label class="mws-form-label"><h4>所属分类：</h4></label>
							<div class="formControls col-xs-8 col-sm-9"> 
							<span class="select-box" style="width:150px;">
								<select class="select" name="pid" size="1" style="width:300px;">
									<option value="0">---请选择---</option>
                                             @foreach($data as $k=>$v)
                                             <option value="{{ $v->id }}" @if($id == $v->id ) selected @endif >{{ $v->cname }}</option>
                                             @endforeach
									
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