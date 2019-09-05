<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改</title>
</head>
<form method="post" action="{{url('user/update/'.$data->u_id)}}">
<body >
	<!-- @if ($errors->any())
		<div class="alert alert-danger">
		<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
		</div>
	@endif -->

	
	<p><input type="text" name="name" value="{{$data->name}}">姓名<span >&nbsp @php echo $errors->first('name') @endphp</span></p>
	<p><input type="number" name="age" value="{{$data->age}}">年龄<span>&nbsp @php echo $errors->first('age') @endphp</span></p>
	<p><input type="radio" name="sex" value="0" @if ($data->sex==1) checked @endif >男 
		<input type="radio" name="sex" value="1" @if ($data->sex==0) checked @endif >女
	</p>
	<p><button>确认修改</button></p>
</body>
</form>
</html>