<?php
 include "config.php";//加载全站配置文件
?>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $config_defaulttitle ?></title>  
  <style>
 *{margin:0 auto;text-align:center;font-size:14px;font-family:"微软雅黑"; }
 body{background: url(images/bg.jpg);}
 .container{background-color:#474747;height:130px;margin:0 auto;color: #fff;}
 .container a{color:#fff;text-decoration: none;}
 .container a:hover{text-decoration: underline;}
 .container .top{width:1000px}
 
 .logo{float:left;width:300px;margin-top:30px}
 .container .menu{float:left;margin-top:30px;width:500px;text-align:left}

 .container .userinfo{float:right;text-align:right;width:500px}

 .container .search{border:solid 1px gray;
    width:180px;height:21px;line-height:21px;
  background:url(images/topsearch.gif) no-repeat #fff right
  }
 
 
 
 
 .mytable{margin:30px auto;}
 input{text-align:left;text-indent: 3px;}
 .1text{width:150px;height: 22px;border:0;border-bottom:solid 1px #000}
</style>
 </head>
 <body>
 <div class="container"> <!--外部大div -->
  <div class="top">  <!--宽度为1000px -->
   <div class="logo"><a href="/"><img src="images/logo.png" alt="程序员在囧途" /></a></div>

   <div class="userinfo"> <span>
  <?php
    include "module/webuser.php";
  //TODO:这里还要处理用户是否已经登陆的逻辑
    echo webuser::getCurrentUser(); //获取当前登录用户名

//    $user = new webuser(); //实例化类

//    //用户注册信息 作为属性值传入到 用户类
//    $user->userName="";
//    $user->age=18;
//    $user->userDisplayName="沈逸";
//    $user->userPwd="123";
//
//    $user->add();//新增用户

  ?></span> <a href="#">安全退出</a></div>
  
  
   <div class="menu"><a href=<?php echo $get_pagepath ?>>首页</a>  |  <a href="/Blog_Php/news">新闻</a> |  <a href="/Blog_Php/reg">用户注册</a>
    <input type="text" class="search" />
    </div>
  </div>
 
 </div>
 

 <?php func_loadTpl(); //加载所以存在的模版模板 ?>