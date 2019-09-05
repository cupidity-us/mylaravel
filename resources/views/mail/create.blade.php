<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>发送邮件</title>
</head>
<form method="post" action="{{url('mail/store')}}">
<body>
	<p>
		<input type="text" name="username">用户名
	</p>
	<p>
		<input type="email" name="email">邮箱
	</p>
	
	<button>发送</button>
</body>
</form>
</html>