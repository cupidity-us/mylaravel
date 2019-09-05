<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题编辑-有点</title>
<base href="/">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<form method="post" action="{{url('brand/update/'.$data->brand_id)}}" enctype="multipart/form-data">
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;商品修改
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>品牌修改</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						品牌名称：<input type="text" class="input3" name="brand_name" value="{{$data->brand_name}}" />
					</div>
					<div class="bbD">
						品牌网址：<input type="text" class="input3" name="site_url" value="{{$data->site_url}}" />
					</div>
					
					<div class="bbD">
						上传图片：
							<input type="file" name="brand_logo" /> <img src="http://www.larlogo.com/{{$data->brand_logo}}" width="100">
					</div>
					<input type="hidden" name="oldimg" value="{{$data->brand_logo}}">
					<div class="bbD">
						品牌描述：
						<div class="btext">
							<textarea class="text2" name="brand_desc" >{{$data->brand_desc}}</textarea>
						</div>
					</div>

					<div class="bbD">
						排序：<input type="text" class="input3" name="sort_order" value="{{$data->sort_order}}" />
					</div>
					<div class="bbD">
						是否显示：
						<label>
							<input type="radio" name="is_show" value="1" @if ($data->is_show==1) checked @endif />&nbsp;是
						</label>
						<label>
							<input type="radio" name="is_show" value="0" @if ($data->is_show==0) checked @endif />&nbsp;否
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