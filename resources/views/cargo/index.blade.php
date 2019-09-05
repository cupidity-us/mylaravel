<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>货物列表</title>
</head>
<body>
	<table border="0" align="center" width="800">
		<p><b>欢迎{{$name}}</b></p>
		<th>货物编号</th>
		<th>货物名称</th>
		<th>货物图片</th>
		<th>货物库存</th>
		<th>入库时间</th>
		<th>货物操作</th>
		@foreach($data as $v)
			<tr align="center">
				<td>{{$v['cargo_id']}}</td>
				<td>{{$v['cargo_name']}}</td>
				<td><img src="http://www.larlogo.com/{{$v['cargo_logo']}}" width="50"></td>
				<td>{{$v['cargo_num']}}</td>
				<td>{{date('Y-m-d,H:i:s',$v['cargo_time']+28800)}}</td>
				<td><a href="{{url('cargo/jion/'.$v['cargo_id'])}}">入库</a>|<a href="{{url('cargo/up/'.$v['cargo_id'])}}">出库</a>|<a href="{{url('cargo/love/'.$v['cargo_id'])}}">记录</a></td>
			</tr>
		@endforeach
	</table>
</body>
</html>