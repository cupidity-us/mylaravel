<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户-有点</title>
<base href="/">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<form method="post" action="{{'admin/store'}}">
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
					<span>管理员注册</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;用户名：<input type="text" name="username" class="input3" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密码：<input type="password"
							class="input3" name="password" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;手机号：<input type="text" name="mobile" class="input3" />
					</div>
					<div class="cfD">
						&nbsp;&nbsp;&nbsp;&nbsp;权限： 
					    	<select name='power'>
					    		<option value='2'>普通管理员</option>
					    		<option value='1'>超级管理员</option>
					    	</select>
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