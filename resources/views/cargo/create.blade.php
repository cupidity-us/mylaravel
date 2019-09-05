<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="post" action="{{url('cargo/store')}}" enctype="multipart/form-data">
		<p>
			货物名称：<input type="text" name="cargo_name">
		</p>
		<p>
			<div>
			货物图片：<input type="file" name="cargo_logo">
			</div>
		</p>
		<p>
			货物数量：<input type="text" name="cargo_num">
		</p>
		<p>
			<button>提交</button>
		</p>
	</form>
</body>
</html>