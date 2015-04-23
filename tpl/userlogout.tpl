<?php
  require_once("module/webuser.php");
  $user=new webuser();
  $user->logout();
//  header("location:/");//返回到首页
?>

<p style="height: 500px;padding-top:50px;font-size:20px;">
    注销成功.... <a href="/Blog_Php/index">点此返回首页</a>
</p>