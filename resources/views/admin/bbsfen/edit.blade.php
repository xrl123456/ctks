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
                    	<span>公告分类修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admins/bbsfen/{{ $date->id }}" method="post">
                    	{{ csrf_field()}}
                        {{ method_field('PUT') }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">分类名称</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="cname" value="{{ $date->cname }}">
                    				</div>
                    			</div>
                    		<div class="mws-button-row">
                    			<input type="submit" class="btn btn-danger" value="确认修改">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>





@endsection