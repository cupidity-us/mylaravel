<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题编辑-有点</title>
<base href="/">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<form method="post" action="{{url('brand/store')}}" enctype="multipart/form-data">
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;商品添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>品牌添加</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						品牌名称：<input type="text" class="input3" name="brand_name" />
					</div>
					<div class="bbD">
						品牌网址：<input type="text" class="input3" name="site_url" />
					</div>
					
					<div class="bbD">
						上传图片：
						<div class="bbDd">
							<div class="bbDImg">+</div>
							<input type="file" class="file" name="brand_logo" /> <a class="bbDDel" href="#">删除</a>
						</div>
					</div>

					<div class="bbD">
						品牌描述：
						<div class="btext">
							<textarea class="text2" name="brand_desc"></textarea>
						</div>
					</div>

					<div class="bbD">
						排序：<input type="text" class="input3" name="sort_order" />
					</div>
					

					<div class="bbD">
						是否显示：
						<label>
							<input type="radio" name="is_show" value="1" />&nbsp;是
						</label>
						<label>
							<input type="radio" name="is_show" value="0" />&nbsp;否
						</label>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</form>
</html>