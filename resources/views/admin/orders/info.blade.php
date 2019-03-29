<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
</head>
<body>
		<form>
			<h1>订单详情</h1>
			@foreach($info as $key=>$value)
			@foreach($value->addersand $k=>$v)
			<label><img scr="/uploads/Goods/"></label>
			订单号：<input type="text" name="" value="{{ $value->oid }}"><p>
			订单
			@endforeach
			@endforeach
		</form>
</body>
</html>