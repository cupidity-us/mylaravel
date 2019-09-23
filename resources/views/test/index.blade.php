<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
					<form method="get" action="{{url('test/create')}}">
						<div class="cfD">
							<button class="userbtn" >添加</button>
						</div>
					</form>
				</div>
				<form method="get" action="{{url('test/index')}}">
						<div class="bbD">
								<input type="text" name="name" class="input3" value="{{$name}}"  />
								<button class="userbtn" >搜索</button>
						</div>
					</form>
				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>

							<td width="435px" class="tdColor">网站名称</td>
							<td width="400px" class="tdColor">网站网址</td>
							<td width="500px" class="tdColor">网站图片</td>
							<td width="200px" class="tdColor">网站联系人</td>
							<td width="500px" class="tdColor">网站介绍</td>
							<td width="130px" class="tdColor">连接类型</td>
							<td width="130px" class="tdColor">是否显示</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach ($data as $v)
						<tr height="40px">

							<td>{{$v->t_name}}</td>
							<td>{{$v->t_url}}</td>
							<td><img src="http://www.larlogo.com/{{$v->t_logo}}" width="50"></td>
							<td>{{$v->t_user}}</td>
							<td>{{$v->t_text}}</td>
							<td> @if($v->t_status==1) Logo连接 @else 文字连接 @endif </td>
							<td> @if($v->t_show==1) 显示 @else 不显示 @endif </td>
							<td><a href="{{url('test/edit/'.$v->t_id)}}">
								<img class="operation" src="img/update.png" ></a>
								<a href="javascript:void(0)" class="ok" t_id="{{$v->t_id}}" >
								<img  src="img/delete.png"></a>
							</td>
						</tr>
						@endforeach
					</table>
					<div class="paging" style="text-align: center;"> {{ $data->appends(['name'=>$name])->links()}}</div>
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
				<a href="#" >确定</a><a class="ok no">取消</a>
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

$('.ok').click(function(){
	var _this=$(this);
	var t_id=_this.attr('t_id');

	$.ajax({
      url: "{{url('test/destroy')}}",
      method: 'post',
      data: {t_id:t_id},
      dataType: 'json',
      async: true,
      success: function(res){
        if (res.code==1) {
            _this.parents('tr').remove();
          };
      }
    });


  });
// 广告弹出框 end
</script>


</html>
