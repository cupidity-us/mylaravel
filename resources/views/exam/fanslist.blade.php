<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<table border="" align="center">
		<form method="post" action="{{url('exam/maketag')}}">
		<th></th>
		<th>用户昵称</th>	
		<th>用户openid</th>	
	@foreach($data as $v)
		<tr>
			<td><input type="checkbox" name="openid[]" value="{{$v['openid']}}" ></td>
			<td>{{$v['nickname']}}</td>
			<td>{{$v['openid']}}</td>
		</tr>
	@endforeach	
	</table>
	<p align="center">
		<input type="hidden" name="tagid" value="{{$id}}">
		<button>打上标签</button>
	</p>
	</form>
</body>
</html>