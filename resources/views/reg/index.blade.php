@extends('layouts.shop')
@section('content')
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/images/head.jpg" />
     </div><!--head-top/-->

     <form  class="reg-login" method="post" action="{{url('reg/store')}}" >
      <h3>有账号了？ 登录啊<a class="orange" href="{{url('login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="a_email" placeholder="输入邮箱号" /></div>
       <div class="lrList2"><input type="text" placeholder="输入短信验证码" id="num" /><button id="btn">获取验证码</button>
       </div>
        <span id="nspan"></span>
       <div class="lrList"><input type="text" name="a_pwd"  id="pwd" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text"  id="apwd" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form>
     <!--reg-login/-->
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
    </div><!--maincont-->
<script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" >
      //发送邮箱
      $('#btn').click(function(){
       //event.preventDefault();
        _this=$(this);
        var email=$('[name="a_email"]').val();
        $.ajax({
            url: "{{url('reg/sendemail')}}",
            method: 'post',
            data: {email:email},
            dataType: 'json',
            async: false,
            success: function(res){
              if (res.code==1) {
                    _this.before('<span style="color:green">验证码已经发送<span>')
                }else{
                    _this.before('<span style="color:red">验证码发送失败<span>')
                    return false;
                };    
            }
        });
        return false;
      });
      //验证验证码
      $('#num').blur(function(){
        _this=$(this);
        var num=_this.val();
        $(this).next('nspan').empty();
        $.ajax({
            url: "{{url('reg/show')}}",
            method: 'post',
            data: {num:num},
            dataType: 'json',
            async: false,
            success: function(res){
              if (res.code==1) {
                     $('#nspan').html("<span style='color:green'>验证码没毛病</span>");
                }else{
                    $('#nspan').html("<span style='color:red'>验证码不对</span>");
                    return false;
                };    
            }
        })
      });

      //验证密码
       $('#apwd').blur(function(){
          var pwd=$('#pwd').val();
          var apwd=$(this).val();
          if (pwd==apwd) {
             $(this).after('<span style="color:green">密码一致<span>')
          }else{
             $(this).after('<span style="color:green">密码不一致<span>')
             return false;
          }
      });

    </script>
     @endsection