<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/23
 * Time: 10:52
 */

//处理 用户 层面ajax方法
if(isset($_GET["type"]))
{
    switch(intval($_GET["type"]))
    {
        case 1://代表用户注册用户名重复判断
            //TODO:数据库因有的查询操作
            exit("1");
            break;
        case 2://代表用户信息检验
            exit("1");
            break;
    }
}
exit("");
?>