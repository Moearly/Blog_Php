<?php
 include "config.php";//加载全站配置文件
?>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $config_defaulttitle ?></title>
     <script src="scripts/jq.js"></script>
     <script src="scripts/common.js"></script>
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
 .text{width:150px;height: 22px;border:0;border-bottom:solid 1px #000}


 .readyShow{display: none}

 /*新闻列表样式     */
 .outer{width: 100%;margin: 20px;min-height: 500px;_height: 500px}
.content{width: 1000px;margin: 0 auto}
.content .left{float: left;width: 69%}
.content .right{float: right;width: 29%}

 .listNewItem{background:#fff;float:left;margin:5px auto;border-radius:10px;width:100%;border:solid 1px #ddd;padding-top: 10px}
 .listNewItem{color:#9c9c9c;}
 .listNewItem dt{width:90%;line-height:20px;border-bottom:solid 1px #ddd;text-align: left;padding:6px;color:#383838;font-size: 20px}
 .listNewItem dd{width:90%;line-height:20px;text-align: left;padding:10px;text-indent:2em;}
 .listNewItem .pubinfo{border:0;background:url(images/newsbar.jpg);
     width:100%;padding:0;height:35px;padding-top:10px;border-top:solid 1px #ddd;}
</style>
 </head>
 <body>
 <div class="container"> <!--外部大div -->
  <div class="top">  <!--宽度为1000px -->
   <div class="logo"><a href="/"><img src="images/logo.png" alt="程序员在囧途" /></a></div>

   <div class="userinfo">
    <span>
<?php
        echo webuser::getCurrentUser();
?>
    </span>
      <?php if(webuser::userIsLogged()):?>
      | <a href="/Blog_Php/logout">安全退出</a>
      <?php else:?>
      | <a href="/Blog_Php/login">立即登录</a> | <a href="/Blog_Php/reg">注册</a>
      <?php endif;?>
    </div>
   <div class="menu"><a href="/Blog_Php/index">首页</a>  |  <a href="/Blog_Php/news">新闻</a> |  <a href="/Blog_Php/reg">用户注册</a>
    <input type="text" class="search" />
    </div>
  </div>
</div>

<?php
          func_loadTpl();
?>