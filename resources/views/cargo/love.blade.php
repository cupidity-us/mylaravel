<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>	
	<table border="0" width="500" align="center">
		<th>用户id</th>
		<th>操作</th>
		@foreach($data as $v)
		<tr>
			<td>{{$v->u_id}}</td>
			@if($v->c_status==0)
			<td>入库</td>
			@else
			<td>出库</td>
			@endif
		</tr>
		@endforeach
	</table>

</body>
</html>