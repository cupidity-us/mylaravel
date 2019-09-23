<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>标签修改页面</title>
</head>
<body>
	<form action="{{url('wetag/doupdate_tag')}}" method="post">
		<p>
			标签名:<input type="text0" name="tag" value="{{$name}}">
		</p>
        <p>
            <input type="hidden" name="id" value="{{$id}}">
        </p>
		<p>
			<button>去修改吧</button>
		</p>
	</form>
</body>
</html>
