<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登录</title>
</head>
<body>
	<form method="psot" action="{{url('cargo/login')}}">
		<p>
			用户名：<input type="text" name="name">
		</p>
		<p>
			密码：<input type="text" name="pwd">
		</p>
		<p>
			<button>登录</button>
		</p>
	</form>
</body>
</html>