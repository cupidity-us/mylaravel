<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<table border="" align="center">
		<th></th>
		<th>用户昵称</th>	
		<th>用户openid</th>	
		<th>操作</th>
	@foreach($data as $v)
		<tr>
			<td><input type="checkbox" name="mytag" ></td>
			<td>{{$v['nickname']}}</td>
			<td>{{$v['openid']}}</td>
			<td><a href="">修改</a>|<a href="">删除</a></td>
		</tr>
	@endforeach	
	</table>
</body>
</html>