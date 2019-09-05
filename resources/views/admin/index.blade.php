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
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;管理员管理
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform" >
					<form method="get" action="{{url('admin/create')}}">
						<div class="cfD">
							<button class="userbtn" >添加</button>
						</div>
					</form>
				</div>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							
							<td width="435px" class="tdColor">会员姓名</td>
							<td width="400px" class="tdColor">会员等级</td>
							<td width="630px" class="tdColor">添加时间</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach ($data as $v)
						<tr height="40px">
							
							<td>{{$v->username}}</td>
							<td> @if($v->power==1) 超级管理员 @else 普通管理员 @endif </td>
							<td>{{date("Y-m-d H:i",$v->add_time)}}</td>
							<td><a href="connoisseuradd.html">
								<img class="operation" src="img/update.png"></a>
								<img class="operation delban" src="img/delete.png">
							</td>
						</tr>
						@endforeach
					</table>
					<div class="paging" style="text-align: center;">{{ $data->links() }}</div>
				</div>
				<!-- user 表格 显示 end-->
			</div>
			<!-- user页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
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