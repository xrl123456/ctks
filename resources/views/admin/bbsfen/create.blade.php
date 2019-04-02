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
                    	<span>分类添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admins/bbsfen" method="post">
                    		{{ csrf_field() }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">分类名称</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="cname" value="{{ old('cname') }}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">分类类别</label>
                    				<div class="mws-form-item">
                    					<select class="medium" name="pid">
                    						<option value="0">请选择</option>
                    						@foreach($date as $k => $v)
                    						<option value="{{ $v->id }}"  @if($id == $v->id)  selected @endif>{{ $v->cname }}</option>
                    						@endforeach
                    					</select>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="确认添加" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
                    			


                                











@endsection