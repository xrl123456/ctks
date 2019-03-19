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
                    	<span><i class="icon-shopping-cart"></i>添加商品</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form id="mws-validate"   class="mws-form"  enctype="multipart/form-data" action="/admins/goodsgo" method="post" novalidate="novalidate">
                        {{ csrf_field() }}
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label"><h4>商品名称</h4></label>
                                	<div class="mws-form-item">
                                    	<input style="width:500px;" type="text" name="gname" value="{{ old('gname') }}" placeholder="请输入商品名称" class="required large">
                                    </div>
                                </div>
                                
                            	<div class="mws-form-row">
                                	<label class="mws-form-label"><h4>商品价格</h4></label>
                                	<div class="mws-form-item">
                                    	<input style="width:500px;" value="{{ old('price') }}"  maxlength="8" type="text" placeholder="商品价格长度限制8位数" name="price" class="required email large">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label"><h4>商品库存</h4></label>
                                	<div class="mws-form-item">
                                    	<input style="width:500px;" value="{{ old('goodsNum') }}"  maxlength="8"  type="text" name="goodsNum" placeholder="库存长度限制8位数"class="required url large">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label"><h4>商品描述</h4></label>
                                	
                                    	<textarea name="goodsinfo" id="" cols="30" rows="10" onkeyup="check(this)" placeholder="商品描述限制60个字" maxlength="60"></textarea>
                                        <!-- <span>可以输入<b id="id">60</b>个字</span> -->
                                    
                                </div>
                            	<div class="mws-form-row">
                                    <label class="mws-form-label"><h4>商品分类</h4></label>
                                    <div class="mws-form-item">
                                        <select class="required large" name="tid"  style="width:100px;" >
                                         <option>---请选择---</option>
                                          @foreach($goods as $k=>$v)

                                            <option value="{{$v->id }}">{{ $v->cname }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label"><h4>商品图片</h4></label>
                                	<div class="mws-form-item">
                                    	<div class="fileinput-holder" style="position: relative;">
                                            <span class="fileinput-btn btn" type="button" style=" overflow: hidden;  top: 0; right: 0; cursor: pointer;">
                                            <h5>上传图片：</h5>
                                            <input type="file" name="pic"   class="required" style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                                            </span>
                                        </div>
                                        <label for="picture" class="error"  generated="true" style="display:none"></label>
                                    </div>
                                </div>
                            	
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><h4>商品状态</h4></label>
                    				<div class="mws-form-item">
                                    	<ul class="mws-form-list">
                                        	<li><input id="gender_male" type="radio" name="status" value="0" checked class="required">
                                             <label for="gender_male">上架</label></li>
                                        	<li><input id="gender_female" type="radio" name="status" value="1" >
                                             <label for="gender_female">下架</label></li>
                                        </ul>
                                        <label for="gender" class="error plain" generated="true" style="display:none"></label>
                    				</div>
                    			</div>
                            </div>
                            <div class="mws-button-row">
                            	<input type="submit" class="btn btn-danger">
                            </div>
                        </form>
                    </div>    	
                </div>
        <script>
            //找对象
            var id=document.getElementById('id');
            //改属性
            var mun=60;
            function check(obj){
            //获取当前输入的字符串
            var zi= obj.value;
            //alert(zi);
            //用总数减去当前字符串的个数得到剩余的个数
            str = mun-zi.length;
            //赋值
            //判断最小值
            if(str<0){
                str=0;
        }
        id.innerHTML=str;
    }
    
</script>

@endsection