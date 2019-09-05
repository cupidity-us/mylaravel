<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户-有点</title>
<base href="/">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<form method="post" action="{{'student/store'}}">
<body>
	<div id="pageAll">
		
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baBody">

					<div class="bbD">
						学生名称：<input type="text" name="student_name" class="input3" />
					</div>

					<div class="cfD">
						学生年龄： 
					    	<select name='student_age'>
					    		<option value="18">18</option>
					    		<option value="19">19</option>
					    		<option value="20">20</option>
					    		<option value="21">21</option>
					    		<option value="22">22</option>
					    		<option value="23">23</option>
					    		<option value="24">24</option>
					    		<option value="25">25</option>
					    		<option value="26">26</option>
					    		<option value="27">27</option>
					    		<option value="28">28</option>
					    	</select>
					</div>

					<div class="cfD">
						学生地址： 
					    	省：<select >
					    		<option value='0'>北京</option>
					    	</select>
					    	市：<select name='student_address'>
					    		<option value='1'>昌平区</option>
					    		<option value="2">海淀区</option>
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