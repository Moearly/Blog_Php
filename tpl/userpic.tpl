<?php
    needLogin(true);
?>
<style>
    .picPhotoTable{width:98%;}
    .picPhotoTable td{line-height:21pt;height:21pt;border-bottom:dashed 1px gray}
</style>
<form method="post" enctype="multipart/form-data">
    <table class="picPhotoTable">
        <tr>
            <td colspan="2">选择头像文件</td>
        </tr>
        <tr>
            <td style="width: 20%;text-align:right">选择文件:</td>
            <td style="width: 20%;text-align:left"><input type="file" name="user_pic" /></td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name="hideUploadUserName" value="<?php echo webuser::getCurrentUser()->user_name ?>"/>
                <input type="submit" value="上传" name="cmdUpHeader"  />
            </td>
        </tr>
    </table>


</form>