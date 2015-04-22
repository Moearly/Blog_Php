<form method="post"> <!--默认是get 所有method=post一定要写 -->
<style>
 .regtable{width:600px;background:#fff;border-radius:5px;padding-top:30px;padding-bottom:100px}
 .regtable th{font-size:26px;color:#9c9c9c}
  .regtable td{padding: 6px;}
  .regtable td a{color:green}
 .regtable .lefttd{text-align: right;width:25%;color:gray}
 .regtable .righttd{text-align: left;width:75%}
 .regtable .text{width:58%;border: solid 1px #ddd;height:34px;line-height:10px;background:#f5f5f5;border-radius:5px;}
 #cmdLogin{width:200px;height:40px;text-align:center;color:#fff;border:0;background:#e96481;border-radius:5px;}
</style>
<table class="mytable regtable">
 <tr>
 <th></th>
  <th class="righttd">用户注册</th>
 </tr>
 <tr>
   <td  class="lefttd">用户名:</td>
   <td class="righttd"><input type="text" name="userName"  class="text"/></td> 
 </tr>
 
  <tr>
   <td  class="lefttd">邮箱:</td>
   <td class="righttd"><input type="text" name="userEmail"  class="text"/></td> 
 </tr>
 <tr>
   <td  class="lefttd">密码:</td>
   <td  class="righttd"><input type="password" name="userPwd1" class="text"/></td> 
 </tr>
  <tr>
   <td  class="lefttd">确认密码:</td>
   <td  class="righttd"><input type="password" name="userPwd2" class="text"/></td> 
 </tr>
 <tr>
  <td></td>
  <td class="righttd"><input type="checkbox" name="cbRead" /> <a href="#">请先阅读《程序员在囧途》网站用户条款</td></a>
 </tr>
 <tr>
  <td></td>
  <td class="righttd" >
    <input type="submit" value="注册" name="cmdLogin"  id="cmdLogin" />
  </td>
 
 </tr>
</table>
 </form>
 