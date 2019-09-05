<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="post" action="{{url('file/fileup')}}" enctype="multipart/form-data">
		<p>
			选择图片：<input type="file" name="u_file">
		</p>
        <p>
            <button>提交</button>
        </p>
	</form>
</body>
</html>
