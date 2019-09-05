<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户-有点</title>
<base href="/">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<form method="post" action="{{'cat/store'}}">
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>分类添加</span>
				</div>
				<div class="baBody">

					<div class="bbD">
						分类名称：<input type="text" name="cat_name" class="input3" />
					</div>
					
					
					<div class="cfD">
						上级分类： 
					    	<select name='parent_id'>
					    		<option value='0'>顶级分类</option>
					    		@foreach($data as $v)
					    		<option value="{{$v->cat_id}}">{{str_repeat("——|",$v->level-1).$v->cat_name}}</option>
					    		@endforeach
					    	</select>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input type="text" class="input3" name="sort_order" />
					</div>
					<div class="bbD">

						<p class="bbDP">
							<button class="btn_ok btn_yes"  id="fm">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>
			<!-- 会员注册页面样式end -->
		</div>
	</div>
</body>
</form>

</html>
<script type="text/javascript">
// $('#fm').click(function(){
//     // 收集表单数据
//     var dataVal = $(this).serialize();
//     // Ajax发送表单数据
//     $.ajax({
//       url: "{{'admin/store'}}",
//       method: 'post',
//       data: dataVal,
//       dataType: 'json',
//       async: true,
//       success: function(res){
//         if (res.code==1) {
//             location.href = "{{'admin/index'}}";
//           };    
//       }
//     });
//     return false;
//   });
</script>