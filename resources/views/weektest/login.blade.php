<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
    <form>
		<p>
			账号：<input type="text" name="name">
		</p>
		<p>
			密码：<input type="text" name="pwd">
		</p>
		<p>
			<button>登录</button>

		</p>
    </form>
    <button class="btn">微信授权登录</button>
</body>
<script src="/js/jquery.min.js"></script>
<script type="text/javascript">
	$('.btn').click(function(){
        location.href="{{url('weektest/dologin')}}";
	})
</script>
</html>
