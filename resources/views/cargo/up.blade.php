<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>库存管理</title>
</head>
<body>
	<form method="post" action="{{url('cargo/doup')}}">
	<p>
		物品名称：<input type="text" value="{{$data->cargo_name}}">
	</p>
	<p>
		物品库存：<input type="number" name="cargo_num" value="{{$data->cargo_num}}" >
	</p>
	<input type="hidden" name="cargo_id" value="{{$data->cargo_id}}">
	<p>
		<button id="btn">出库</button>
	</p>
	</form>
</body>
</html>
<script type="text/javascript" src="/js/shop/jquery.min.js"></script>
<script type="text/javascript">
	$('#btn').click(function(){

	});	


</script>