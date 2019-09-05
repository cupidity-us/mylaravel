<!DOCTYPE html>
<html lang="zh-cn">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>珠宝店--</title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    
    <!-- Bootstrap -->
    <link href="/css/shop/bootstrap.min.css" rel="stylesheet">
    <link href="/css/shop/style.css" rel="stylesheet">
    <link href="/css/shop/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond./js/shop/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
      @yield('content')
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/shop/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/shop/bootstrap.min.js"></script>
    <script src="/js/shop/style.js"></script>
    <!--焦点轮换-->
    <script src="/js/shop/jquery.excoloSlider.js"></script>
    <script>
    $(function () {
     $("#sliderA").excoloSlider();
    });
  </script>
  </body>
</html>