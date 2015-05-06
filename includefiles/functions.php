<?php
  //处理某些不需要加载头部和尾部的界面
    $__hideNav=false;
    $__hideItemList=array("userpic");
    if (isset($_GET["type"]) && in_array($_GET["type"],$__hideItemList)){
        $__hideNav=true;//需要隐藏掉头部
    }

    //建立一些通用函数，来给各个页面调用,属于通用函数库

function func_doAction($posts,$type)
{

    if(isset($type))
    {
        if($type=='login')
        {
            //代表用户在登录界面点了登录方法
            require_once("module/webuser.php");
            $user=new webuser();
            $ret = $user->login($posts["userName"],$posts["userPwd"]);
            if ($ret) {
                var_export($_GET["from"]) ;
                if (isset($_GET["from"])) {
                    header("location:".$_GET["from"]);
                } else {
                    header("location:/Blog_Php/index");//返回到首页
                }
                    //登陆成功{}
            } else {
                //TODO:错误页面模版实现
                echo "登陆失败";
            }


        }
        if ($type == 'reg') {
            //代表请求注册数据
            require_once("module/webuser.php");
            $user=new webuser();
            $ret= $user->add($posts["userName"],$posts["userEmail"],$posts["userPwd1"],$posts["userPwd2"]);
            if ($ret) {
                header("location:/Blog_Php/index");//返回首页---->后期逻辑，还是要注册后就能登陆
            } else {
                //TODO:错误页面模版实现
                echo "注册失败";
            }
        }
        if ($type == 'userpic' && isset($posts['cmdUpHeader'])) {
            //代表上传用户个人图片
            require_once("module/webuser.php");//上传前做最后一次用户登陆信息确认
            if (!webuser::userIsLogged()) {
                //没有登陆，转到登陆界面
                exit("<script>self.top.location='/Blog_Php/login'</script>");
            } else {
                //上传逻辑
                var_export(webuser::getCurrentUser());

                if ($posts['hideUploadUserName'] != webuser::getCurrentUser()->user_name)
                    exit("非法提交");
                    $user = new webuser();
                    $user->addUserPic($_FILES, $posts["hideUploadUserName"]);

            }
        }

    }
}

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
    "index"=>"index.tpl",//首页的模板
    "login"=>"userlogin.tpl",//登陆界面
    "logout"=>"userlogout.tpl",//登出界面
    "onecenter"=>"onecenter.tpl",//个人中心
    "userpic"=>"userpic.tpl",//图片选择上传
        "newsadd"=>"newsadd.tpl",//新闻投稿，编辑
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

<?php
//新闻函数
function the_news($params="")
{
    $getNews=new webnews();
    $result=$getNews->loadNews("","",1,20);
    return $result;
}

//判断当前页面是否需要登陆才能访问
function needLogin($isChild=false)
{
    echo "login....";
    require_once("module/webuser.php");
    if (!webuser::userIsLogged()) {
        //没有登陆，跳转到登陆界面
        if ($isChild) {
            //针对弹出界面的登陆跳转
            exit("<script>self.top.location='/Blog_Php/login'</script>");
        } else {
            header("location:/Blog_Php/login?from=".urlencode($_SERVER["REQUEST_URI"]));
            exit();
        }

    }
}
?>