<?php
needLogin();
$userheader="images/nopic.jpg";
if(file_exists("userheader/".webuser::getCurrentUser()->user_name.".jpg"))
    $userheader="userheader/".webuser::getCurrentUser()->user_name.".jpg";
?>
<link href="css/colorbox.css" rel="stylesheet" />
<script src="scripts/colorbox.js"></script>
<script>
    $(document).ready(function(){

        $(".editHeader").colorbox({href:"/Blog_Php/popic",iframe:true,width:600,height:300,title:"修改头像"});
    })
</script>
<style>
    .centerContainer{width:800px;background:#fff;border-radius:5px;padding-top:30px;height:600px;margin:30px auto;}
    .centerContainer .photo{width:100px;float:left;text-align:center;border:solid 1px #000}
    .centerContainer .photo img{width:80px;border-radius:50px}
    .centerContainer .pline{width:670px;float:right;text-align:left;}
    .centerContainer .userinfo{color:gray;text-indent:1em;margin-top:10px;margin-right:20px;width:670px;background:#F3F3F3}
    .centerContainer hr{width:100%;float:left;border:solid 1px #ddd;margin:10px auto;clear:both}
    .centerContainer .slidemenu{float:left;width:160px;background:#F3F3F3}
    .centerContainer .slidemenu ul,li{width:100%;float:left;text-align:center;padding:0}
    .centerContainer .slidemenu ul li{line-height:21pt;}
</style>
<div class="centerContainer">

    <div class="photo"><img src="<?php echo $userheader?>"/></div>
    <div class="pline"> 我的名字</div>
    <div class="pline userinfo"> 我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介我的个人简介</div>
    <hr />
    <div class="slidemenu">
        <ul>
            <li><a href="#">修改密码</a></li>
            <li><a href="/Blog_Php/popic"  class="editHeader" title="修改头像">修改头像</a></li>
            <li><a href="#">修改密码</a></li>
            <li><a href="#">修改头像</a></li>
            <li><a href="#">修改密码</a></li>
            <li><a href="#">修改头像</a></li>

            <li><a href="#">修改密码</a></li>
            <li><a href="#">修改头像</a></li>
            <li><a href="#">修改密码</a></li>
            <li><a href="#">修改头像</a></li>
            <li><a href="#">修改密码</a></li>
            <li><a href="#">修改头像</a></li>
            <li><a href="#">修改密码</a></li>
            <li><a href="#">修改头像</a></li>
        </ul>
    </div>
</div>
