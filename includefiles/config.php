<?php
  require "debug.php";//加载调试的配置
  require "module/webuser.php";
  require "module/webnews.php";
  require "functions.php";//加载通用函数库
  require "lib/database.php";

  $config_defaulttitle='_程序员在囧途';//网站的默认标题(title)
  $get_pagepath=$_SERVER["PHP_SELF"];//获取当前访问页 *即将废止

  //echo $get_pagepath; // /news.php代表是新闻  /index.php 代表是首页

if(isset($_POST) && count($_POST)>0) //代表有表单提交
{
    func_doAction($_POST,$_GET["type"]);
}
  
  //以下代码即将废止  ****************
//  if($get_pagepath=='/news.php') // /news.php代表是新闻
//  {
//     $config_defaulttitle="新闻".$config_defaulttitle;
//  }
//  else if($get_pagepath=="/index.php")
//  {
//    $config_defaulttitle="首页".$config_defaulttitle;
//  }
//  else if($get_pagepath=="/userreg.php") //用户注册界面
//  {
//    $config_defaulttitle="用户注册".$config_defaulttitle;
//
//    if($_POST["cmdLogin"])
//    {
//        //include
//        $get_userName=$_POST["userName"];//必须注册页面 用户名 文本框 的name值一样
//        $get_usePwd=$_POST["userPwd"];//必须注册页面 密码 文本框 的name值一样
//        echo "用户输入的用户名是:".$get_userName." 密码是：".$get_usePwd;
//    }
//  }
//  else
//  {
//    $config_defaulttitle="404".$config_defaulttitle;
//  }
    $get_type=$_GET["type"];

    if($get_type) {
        if ($get_type == 'news') {
            $config_defaulttitle = '新闻'.$config_defaulttitle;
        }
        if ($get_type == 'reg') {
            $config_defaulttitle = '注册'.$config_defaulttitle;
            if($_POST["cmdLogin"]) {
                    //include
                    $get_userName=$_POST["userName"];//必须注册页面 用户名 文本框 的name值一样
                    $get_usePwd=$_POST["userPwd"];//必须注册页面 密码 文本框 的name值一样
                    echo "用户输入的用户名是:".$get_userName." 密码是：".$get_usePwd;
                }
        }
        if ($get_type == 'index') {
            $config_defaulttitle = '主页'.$config_defaulttitle;
        }

    } else {
        $config_defaulttitle = '404'.$config_defaulttitle;
    }
?>