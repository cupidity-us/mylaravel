<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页左侧导航</title>
<link rel="stylesheet" type="text/css" href="../css/public.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/public.js"></script>
<head></head>

<body id="bg">
	<!-- 左边节点 -->
	<div class="container">

		<div class="leftsidebar_box">
			<a href="../main.html" target="main"><div class="line">
					<img src="../img/coin01.png" />&nbsp;&nbsp;首页
				</div></a>
			<!-- <dl class="system_log">
			<dt><img class="icon1" src="../img/coin01.png" /><img class="icon2"src="../img/coin02.png" />
				首页<img class="icon3" src="../img/coin19.png" /><img class="icon4" src="../img/coin20.png" /></dt>
		</dl> -->
			<dl class="system_log">
				<dt>
					<img class="icon1" src="../img/coin05.png" /><img class="icon2"
						src="../img/coin06.png" /> 管理员管理<img class="icon3"
						src="../img/coin19.png" /><img class="icon4"
						src="../img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../img/coin111.png" /><img class="coin22"
						src="../img/coin222.png" /><a class="cks" href="{{url('admin/create')}}"
						target="main">管理员添加</a><img class="icon5" src="../img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../img/coin111.png" /><img class="coin22"
						src="../img/coin222.png" /><a class="cks" href="{{url('admin/index')}}"
						target="main">管理员列表</a><img class="icon5" src="../img/coin21.png" />
				</dd>
			</dl>

			<dl class="system_log">
				<dt>
					<img class="icon1" src="../img/coin07.png" /><img class="icon2"
						src="../img/coin08.png" /> 品牌管理<img class="icon3"
						src="../img/coin19.png" /><img class="icon4"
						src="../img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../img/coin111.png" /><img class="coin22"
						src="../img/coin222.png" /><a href="{{url('brand/create')}}" target="main"
						class="cks">品牌添加</a><img class="icon5" src="../img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../img/coin111.png" /><img class="coin22"
						src="../img/coin222.png" /><a href="{{url('brand/index')}}" target="main"
						class="cks">品牌列表</a><img class="icon5" src="../img/coin21.png" />
				</dd>
			</dl>

			<dl class="system_log">
				<dt>
					<img class="icon1" src="../img/coin10.png" /><img class="icon2"
						src="../img/coin09.png" /> 分类管理<img class="icon3"
						src="../img/coin19.png" /><img class="icon4"
						src="../img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../img/coin111.png" /><img class="coin22"
						src="../img/coin222.png" /><a href="{{url('cat/create')}}"
						target="main" class="cks">分类添加</a><img class="icon5"
						src="../img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../img/coin111.png" /><img class="coin22"
						src="../img/coin222.png" /><a href="{{url('cat/index')}}"
						target="main" class="cks">分类列表</a><img class="icon5"
						src="../img/coin21.png" />
				</dd>
			</dl>

			<dl class="system_log">
				<dt>
					<img class="icon1" src="../img/coin11.png" /><img class="icon2"
						src="../img/coin12.png" /> 商品管理<img class="icon3"
						src="../img/coin19.png" /><img class="icon4"
						src="../img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../img/coin111.png" /><img class="coin22"
						src="../img/coin222.png" /><a href="{{url('goods/create')}}" target="main"
						class="cks">商品添加</a><img class="icon5" src="../img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../img/coin111.png" /><img class="coin22"
						src="../img/coin222.png" /><a href="{{url('goods/index')}}" target="main"
						class="cks">商品列表</a><img class="icon5" src="../img/coin21.png" />
				</dd>
			</dl>
			

		</div>

	</div>
</body>
</html>