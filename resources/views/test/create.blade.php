<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户-有点</title>
<base href="/">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<form method="post" action="{{'test/store'}}" enctype="multipart/form-data">
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
					<span>添加友情连接</span>
				</div>
				<div class="baBody">

					<div class="bbD">
						网站名称：<input type="text" name="t_name" class="input3" /><span>&nbsp @php echo $errors->first('t_name') @endphp</span>
					</div>

					<div class="bbD">
						网站网址：<input type="text" class="input3" name="t_url" />
					</div>

					<div class="bbD">
						连接类型：
						<label>
							<input type="radio" name="t_status" value="1" checked />&nbsp;Logo连接
						</label>
						<label>
							<input type="radio" name="t_status" value="0" />&nbsp;文字连接
						</label>
					</div>

					<div class="bbD">
						图片logo：
						<div class="bbDd">
							<div class="bbDImg">+</div>
							<input type="file" class="file" name="t_logo" /> <a class="bbDDel" href="#">删除</a>
						</div>
					</div>

					<div class="bbD">
						网站联系人：<input type="text" name="t_user" class="input3" />
					</div>

					<div class="bbD">
						网站介绍：
						<div class="btext">
							<textarea class="text2" name="t_text"></textarea>
						</div>
					</div>

					<div class="bbD">
						是否显示：
						<label>
							<input type="radio" name="t_show" value="1" checked />&nbsp;是
						</label>
						<label>
							<input type="radio" name="t_show" value="0" />&nbsp;否
						</label>
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