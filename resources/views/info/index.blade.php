@extends('layouts.shop')
@section('content')
<script type="text/javascript" src="/js/shop/jquery.min.js"></script>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div align="center" >
      <img src="http://www.larlogo.com/{{$data->goods_img}}" />
     </div><!--sliderA/-->
     <table class="jia-len">
      <tr>
       <th><strong class="orange">¥{{$data->goods_price}}</strong></th>
      </tr>
      <tr>
       <td>
        <strong>{{$data->goods_name}}</strong>
        <p class="hui">{{$data->goods_desc}}</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
     <div class="height2"></div>
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a id="btn" goods_id="{{$data->goods_id}}">加入购物车</a></td>
      </tr>
     </table>
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!--焦点轮换--> 
    <script src="/js/shop/jquery.spinner.js"></script>
    <script src="/js/shop/jquery.excoloSlider.js"></script>

    <script>
		$(function () {
		 $("#sliderA").excoloSlider();
		});
	</script>
   <script>
	$('.spinnerExample').spinner({});
	</script>

  <script type="text/javascript">
    $('#btn').click(function(){
     var _this=$(this); 
     var goods_id=_this.attr('goods_id');
    
    $.ajax({
        url: "{{url('car/create')}}",
        method: 'post',
        data: {goods_id:goods_id},
        dataType: 'json',
        async: true,
        success: function(res){
          if (res.code==1) {
              location.href="{{url('car/index')}}";
            }
        }
      });
 });
  </script>

  </body>
</html>
@endsection