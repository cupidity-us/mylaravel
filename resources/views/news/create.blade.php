<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>新闻添加</title>
</head>
<body>
	<form method="post" action="{{url('news/store')}}">
		<p>
			标题：<input type="text" name="news_title">
		</p>	
		<p>
			作者：<input type="text" name="news_anthor">
		</p>
		<p>
			内容：<textarea name="news_content">
			</textarea>
		</p>
		<p>
		<button>添加</button>
		</p>
	</form>
</body>
</html>