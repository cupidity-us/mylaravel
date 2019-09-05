<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理</title>
<base href="/">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform" >
					<form method="get" action="{{url('student/twoindex')}}">
						<div class="cfD">
							<button class="userbtn" >看看别的</button>
						</div>
					</form>
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							
							<td width="435px" class="tdColor">排序</td>
							<td width="400px" class="tdColor">学生姓名</td>
							<td width="630px" class="tdColor">学生地址</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach ($data as $v)
						<tr height="40px">
							<td>{{$v->student_id}}</td>
							<td>{{$v->student_name}}</td>
							<td>北京市 &nbsp;@if($v->student_address==1) 昌平区 @else 海淀区 @endif </td>
							<td><a href="{{url('student/edit/'.$v->student_id)}}">
								<img class="operation" src="img/update.png"></a>
								<a href="{{url('student/destroy/'.$v->student_id)}}"><img class="operation delban" src="img/delete.png" ></a>
							</td>
						</tr>
						@endforeach
					</table>
					
				</div>
				<!-- user 表格 显示 end-->
			</div>
			<!-- user页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
$(".cfD").click(function(){
  
});
// 广告弹出框 end
</script>
</html>