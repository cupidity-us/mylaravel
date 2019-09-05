@extends('layouts.shop')
@section('content')

<div class="head-top">
      <img src="images/head.jpg" />
      <dl>
       <dt><a href="user.html"><img src="/images/touxiang.jpg" /></a></dt>
       <dd>
        @if(session())
        <h1 class="username">{{$session['a_email']}}</h1>
        @else
        <h1 class="username">三级分销终身荣誉会员</h1>
        @endif
        <ul>
         <li><a href="prolist.html"><strong>{{$num}}</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="{{url('login')}}">登录</a></li>
      <li><a href="{{url('reg/index')}}" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <div id="sliderA" class="slider">
      <img src="images/image1.jpg" />
      <img src="images/image2.jpg" />
      <img src="images/image3.jpg" />
      <img src="images/image4.jpg" />
      <img src="images/image5.jpg" />
     </div><!--sliderA/-->
     <ul class="pronav">
      @foreach($top as $v)
      <li><a href="{{url('lists/index/'.$v->cat_id)}}">{{$v->cat_name}}</a></li>
      @endforeach
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">

      @foreach($goods as $v)
      <div class="index-pro1-list">
       <dl>
        <dt><a href="{{url('info/index/'.$v->goods_id)}}"><img src="http://www.larlogo.com/{{$v->goods_img}}" ></a></dt>
        <dd class="ip-text"><a href="proinfo.html">{{$v->goods_name}}</a><span>已售：488</span></dd>
        <dd class="ip-price"><strong>¥{{$v->goods_price}}</strong> <span>¥{{$v->goods_price*2}}</span></dd>
       </dl>
      </div>
      @endforeach

      <div class="clearfix"></div>
     </div><!--index-pro1/-->
     <div class="prolist">
      
     
      <dl>
       <dt><a href="proinfo.html"><img src="images/prolist1.jpg" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="proinfo.html">四叶草</a></h3>
        <div class="prolist-price"><strong>¥299</strong> <span>¥599</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--prolist/-->
     <div class="joins"><a href="fenxiao.html"><img src="images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>
     
     <div class="height1"></div>
     <div class="footNav">
      <dl>
       <a href="index.html">
        <dt><span class="glyphicon glyphicon-home"></span></dt>
        <dd>微店</dd>
       </a>
      </dl>
      <dl>
       <a href="prolist.html">
        <dt><span class="glyphicon glyphicon-th"></span></dt>
        <dd>所有商品</dd>
       </a>
      </dl>
      <dl>
       <a href="car.html">
        <dt><span class="glyphicon glyphicon-shopping-cart"></span></dt>
        <dd>购物车 </dd>
       </a>
      </dl>
      <dl>
       <a href="user.html">
        <dt><span class="glyphicon glyphicon-user"></span></dt>
        <dd>我的</dd>
       </a>
      </dl>
      <div class="clearfix"></div>
     </div><!--footNav/-->
@endsection