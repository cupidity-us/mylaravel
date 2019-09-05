<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>竞猜列表</title>
</head>
<body>
	<table border="0" align="center" width="500">
		<th>赛事</th>
		<th>状态</th>
		<th>竞猜</th>
		<th>操作</th>
		@foreach($data as $v)
		<tr align="center">
			<td>{{$v['ball_lname']}}VS{{$v['ball_rname']}}</td>	
			<td>
			@if( $time > $v['ball_time'] )
                查看结果
			@else
				竞猜中
			@endif	
			</td>
			<td>
			@if( $time > $v['ball_time'] )
                <a href="{{url('')}}">查看结果</a>
			@else
				<a href="{{url('ball/guess/'.$v['ball_id'])}}">点击竞猜</a>
			@endif
			</td>
			<td><a href="">随便|写写</a></td>
		</tr>
		@endforeach
	</table>
</body>
</html>