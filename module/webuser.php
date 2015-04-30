<?php
require_once "lib/myclass.php";


class loginedUser { //处理登陆的user对象
    public $user_name="游客";//登陆对象name
    public $user_email="游客";//登陆邮箱
    public $user_id=0;

    public function setUser($_name, $_email, $_id){
        $this->user_email = $_email;
        $this->user_id = $_id;
        $this->user_name = $_name;
    }
}

class webuser {     //用户处理类

    public $error_code="000";//错误编码
    private $userinfo=array(); //用户属性 数组
    public static $cookie_type = "99"; //cookie的版本号

    function webuser() {
         //默认在new时会调用的方法
        //echo "用户类已经初始化";
    }

    //设置用户类属性
    function __set($key,$value) {

        if($key=="age") {
            //必须 大于21岁  
        }
        
       $this->userinfo[$key]=$value;
    }

    //获取用户类属性
    function __get($key) {
        //为啥不用 下面两种判断方法呢？
      //1、if(isset($this->userinfo[$key]))
      //2、if($this->userinfo[$key]) 
        
        if(array_key_exists($key,$this->userinfo)) {
            return $this->userinfo[$key];
        } else {
            //return false;
            return "";
        }
    }

    //检查参数的合法性
    function validateArgs($args,$num) {
        //用来检测 参数是否合法
        if($args && is_array($args) && count($args)==$num) {
            return true;
        } else {
            //参数不合法008
            $this->error_code="008";
            return false;
        }
    }

    //默认执行函数
    function __call($methodName,$args)
    {
        if($methodName=="add")
        {
            //验证参数
            if($this->validateArgs($args,4)) {
                //echo "add";
                return $this->addUser($args[0],$args[1],$args[2],$args[3]);
            }
        }
        else if($methodName=="login") { //用户登录
            //使用用户名和邮箱均可登录
            if($this->validateArgs($args,2)){
                return $this->userLogin($args[0],$args[1]);
            }
        }
        else if($methodName=="logout") { //注销
            $this->userLogout();
        }else if ($methodName == "addUserPic") {//上传用户头像
            if ($this->validateArgs($args, 2)) {
                return $this->addUserPic($args[0], $args[1]);
            }
        }
    }

    /**
     * 上传头像
     * @param $file
     * @param $username
     */
    private function addUserPic($file, $username) {
        if (!empty($file['user_pic']['name']) && $file['user_pic']['size']>0) {
            //验证图片类型（限定）
            $allowType = array("image/pjpeg","image/jpeg");
            if(!in_array($file['user_pic']['type'], $allowType)) exit("只能上传jpg的图片");
            //取出图片尾缀
            $fileName = explode(".", $file['user_pic']['name']);
            $fileType = $fileName[count($fileName)-1];
            if (move_uploaded_file($file['user_pic']['tmp_name'], "userheader/" . $username . "." . $fileType)) {
                exit("<script>self.top.location.reload()</script>");
            } else {
                exit("上传失败，请重新上传");
            }
        } else {
            exit("请重新上传图片");
        }

    }

    /**用户登陆
     * @param $username
     * @param $userpwd
     */
    private function userLogin($username, $userpwd){
        //类容非空判断
        if(trim($username)=="" && trim($userpwd)=="") return;
        //对输入name判断限制
        if(!preg_match("/^[a-zA-Z]\w{3,19}$/",$username)) //用户名只能是4-20位字母、数字、下划线组合
            return false;
        $ms = new myClass('users');
        $ms->userUtil;
        //注意返回的是一个数组
        $ret = $ms->userLogin($username);
        if ($ret && count($ret)==1){
            $back = $ret[0];//取得第一行数据，也应该是唯一的数据
            if ($back["userpwd"] == md5(trim($userpwd))) {
                //密码相等
                setcookie("webUser_Martn",$back["id"]."|".$username."|99",time()+200,"/");
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 用户离开
     */
    private function userLogout(){
        setcookie("webUser_Martn","",time()-3600,"/");
    }


    //往数据库插入用户
    private function addUser($userName,$userEmail,$userPwd1,$userPwd2) {

        //参数的逻辑处理
        // 需要实现的函数有 isRepeat:是否重复 isFormat:是否格式正确
        if($userPwd1=="" || $userPwd1!=$userPwd2 ) //密码填写不正确
        {
            $this->error_code="001";
            return false;
        }
        if($userName=="" ||  $userEmail=="") 
        {
              $this->error_code="002";
            return false; //代表用用户填写数据不正确
        }
        
//        if(isFormat($userName,$userEmail))
//        {
//            $this->error_code="003";
//            return false;// 代表用户名和邮箱不符合命名规范
//        }
//
//        if(isRepeat($userName,$userEmail))  //用户名和Email是否 同时唯一
//        {
//              $this->error_code="004";
//            return false;
//        }

        if(!preg_match("/^[a-zA-Z]\w{3,19}$/",$userName)) //用户名只能是4-20位字母、数字、下划线组合
            return false;
//echo "has_add";
        $mc=new myClass("users");
        $mc->userUtil;
        //var_dump($mc);

        $ret = $mc->addUserToDB($userName,md5($userPwd1),$userEmail);
        //var_dump($ret);
        if($ret && intval($ret)>0) //代表插入数据库成功
        {
             $this->error_code="000";
            //echo "has_done";
            return true;
        } else {
            $this->error_code="009";//代表未处理到的错误
            return false;
        }

    }

    /**
     * 判断当前是否有用户登陆
     */
    public static function userIsLogged(){
        if (self::getCurrentUser()->user_id == 0) {
            //表示没有用户登陆
            return false;
        } else {
            return true;
        }

    }

    //获取当前登录用户
    static public function getCurrentUser() {
        $get_cvalue = $_COOKIE["webUser_Martn"];
        $get_cvalue = explode("|",$get_cvalue);//拆分cookie--string中的信息
        if ($get_cvalue && count($get_cvalue) == 3 && intval($get_cvalue[0])>0 && $get_cvalue[2] == self::$cookie_type) {
            //返回数据成功,表示有用户登陆
            $loginUser = new loginedUser();
            $loginUser->setUser($get_cvalue[1],"",intval($get_cvalue[0]));
            return $loginUser;
        } else {
            return new loginedUser();
        }

    }



    /* function login($uname,$upwd) //用户登录方法
   {

   }*/
    
    
  /*   //传统方法 
    public static function addUser($userName,$userpwd)  // static public function add()  这样写也可以)
    {
        
    }
    function add()  //新增用户方法
    {
        //self::方法名
        if($this->userName=="")
        {
            echo "用户名不能为空";
        }
        else
        {
            echo "用户新增成功";  
        }
            
    }*/
}

?>