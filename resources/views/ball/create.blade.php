<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="post" action="{{url('ball/store')}}">
		<p><b>添加竞猜球队</b></p>
		<p>
			<input type="text" name="ball_lname">VS<input type="text" name="ball_rname">
		</p>
		<p>
			结束竞猜时间<input type="text" name="ball_time" >
		</p>
		<p>
			<button>添加</button>
		</p>
	</form>
</body>
</html>
<script type="text/javascript">
	
</script>