<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<table border="1"  align="center" >
		<a href="{{url('user/create')}}">添加</a>
		<th>姓名</th>
		<th>年龄</th>
		<th>性别</th>
		<th>操作</th>
		@foreach ($user as $v)
		<tr >
	 	<td>{{ $v->name }}</td>
	 	<td>{{ $v->age }}</td>
	 	<td> @if($v->sex==0) 男 @else 女 @endif </td>
	 	<td><a href="{{url('user/destroy/'.$v->u_id)}}">删除</a>|<a href="{{url('user/edit/'.$v->u_id)}}">修改</a></td>
	 	</tr>
 		@endforeach

	</table>
</body>
</html>