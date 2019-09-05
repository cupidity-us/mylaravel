<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<form method="post" action="store">
<body>
	<!-- @if ($errors->any())
		<div class="alert alert-danger">
		<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
		</div>
	@endif -->

	
	<p><input type="text" name="name">姓名<span >&nbsp @php echo $errors->first('name') @endphp</span></p>
	<p><input type="number" name="age">年龄<span>&nbsp @php echo $errors->first('age') @endphp</span></p>
	<p><input type="radio" name="sex" value="0">男 
		<input type="radio" name="sex" value="1">女
	</p>
	<p><button>提交</button></p>
</body>
</form>
</html>