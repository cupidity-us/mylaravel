<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>旗下的用户</title>
</head>
<body>
	<table border="" align="center">
		<form method="post" action="{{url('exam/sendnews')}}" >
		<th></th>
		<th>标签下的用户昵称</th>	
		<th>标签下的用户openid</th>	
	@foreach($info as $v)
		<tr>
			<td><input type="checkbox" name="openid[]" value="{{$v['openid']}}" ></td>
			<td>{{$v['nickname']}}</td>
			<td>{{$v['openid']}}</td>
		</tr>
	@endforeach	
	</table>
	<p align="center">
		<input type="text" name="tagnews">
		<button>群发消息</button>
	</p>
	</form>
</body>
</html>