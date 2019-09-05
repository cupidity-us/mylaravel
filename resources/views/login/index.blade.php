@extends('layouts.shop')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/images/head.jpg" />
     </div><!--head-top/-->
     <form  class="reg-login">
      <h3>还没有账号！ 心思鸡脖那？点此<a class="orange" href="{{url('reg/index')}}">注册</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="a_email" id="a_email" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList"><input type="text" name="a_pwd"  id="a_pwd" placeholder="输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" id="btn" value="立即登录" />
      </div>
     </form><!--reg-login/-->
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
     
<script  src="/js/shop/jquery.min.js"></script>
     <script type="text/javascript">

       $('#btn').click(function(){
        // alert(111);
          _this=$(this);
          var email=$('#a_email').val();
          var pwd=$('#a_pwd').val();
          $.ajax({
            url: "{{url('login/store')}}",
            method: 'post',
            data: {email:email,pwd:pwd},
            dataType: 'json',
            async: false,
            success: function(res){
              if (res.code==1) {
                    _this.before('<span style="color:green">验证正确<span>')
                    location.href="{{url('/')}}"
                }else{
                    _this.before('<span style="color:red">用户密码错误<span>')
                    return false;
                };    
            }
        });
        return false;
       });


     </script>
@endsection