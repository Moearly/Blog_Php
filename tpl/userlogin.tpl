<script>
    $(document).ready(function(){

        $("#cmdLogin").click(function(){

            if(isBlank("txtUserName","red"))
            {
                showError("txtUserName","red","用户名不能为空");
                return false;
            }

            if(isBlank("txtUserPwd","blue"))
            {
                showError("txtUserPwd","blue","密码不能为空");
                return false;
            }

            //能到这里表示检查完毕，可以提交
            execServer(2,{username:$("#txtUserName").val(), userpwd:$("#txtUserPwd").val()},function(result){
                if(result!=null && result==1){
                    //表示密码校验成功,登陆
                    $("#loginForm").submit();
                }
            })
        })
    })
</script>

<form method="post" id="loginForm"> <!--默认是get 所有method=post一定要写 -->
    <style>
        .regtable{width:600px;background:#fff;border-radius:5px;padding-top:30px;padding-bottom:100px}
        .regtable th{font-size:26px;color:#9c9c9c;font-weight:normal}
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
            <th class="righttd">用户登录</th>
        </tr>
        <tr>
            <td  class="lefttd">用户名:</td>
            <td class="righttd"><input type="text" name="userName" id="txtUserName"  class="text"/></td>
        </tr>

        <tr>
            <td  class="lefttd">密码:</td>
            <td  class="righttd"><input type="password" name="userPwd" id="txtUserPwd" class="text"/></td>
        </tr>


        <tr>
            <td></td>
            <td class="righttd" >
                <input type="button" value="登录" name="cmdLogin"  id="cmdLogin"  class="readyShow" />
            </td>

        </tr>
    </table>
</form>