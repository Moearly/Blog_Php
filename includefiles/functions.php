<?php
  //建立一些通用函数，来给各个页面调用,属于通用函数库
/**
 * des:加载模版函数
 *
 */
function func_loadTpl() {
    $tpl_root="tpl/";
    
    //数组的介绍,应该是根据传参来加载模版
    $tpl_set=array(
    "news"=>"news.tpl",//新闻的模板
    "reg"=>"userreg.tpl",//注册的模板
    "index"=>"index.tpl" //首页的模板
    );
   
     //加载模板
     $get_type=$_GET["type"];
     
     if($get_type) {
        // 原始写法
        /*
        if($get_type=="news") //代表新闻
        {
             include $tpl_root."news.tpl";
        }
        if($get_type=="reg")//注册
        {
             include $tpl_root."userreg.tpl";
        }*/
        
        //用数组来判断
        if($tpl_set[$get_type]) { // isset($tpl_set[$get_type])   array_key_exists($get_type,$tpl_set);
            include $tpl_root.$tpl_set[$get_type]; //加载 对应的模板
        }
        else
           include $tpl_root."index.tpl"; //没有匹配到 ，依然家在首页
     }
     else {
        //没有传递参数 默认加载首页加载首页
        include $tpl_root."index.tpl";
     }
   }
?>