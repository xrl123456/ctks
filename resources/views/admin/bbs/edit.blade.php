@extends('admin.body.index')
@section('bbs')
@endsection
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
                    	<span>公告修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admins/bbs/{{ $bbs->id }}" method="post">
                    	{{ csrf_field()}}
                        {{ method_field('PUT') }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">公告标题</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="title" value="{{ $bbs->title }}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">公告内容</label>
                    				<div class="mws-form-item">
                    					<textarea name="content" class="small">{{ $bbs->content }}</textarea>
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