/**
 * Created by Administrator on 2015/4/22.
 */
$(document).ready(function() {
    //网页初始化工作
    if ($(".readyShow").length > 0) //隐藏有操作的按钮处理
    {
        var getClass = $(".readyShow").attr("class");
        getClass = getClass.replace("readyShow", "");
        $(".readyShow").attr("class", getClass);
    }

    //适配屏幕
    if(screen.width>1024 && $(".adaptertable").length>0)
    {
        $(".adaptertable").animate({width:"1000px"},900);
    }
})

function showError(objid,color,mes){
    //构建一个区域来显示错误
    if($("#"+objid).parent().find(".errInfo").length>0){
        $("#"+objid).parent().find(".errInfo").html(mes);
    }else{
        $("#"+objid).parent().append("<span class='errInfo' style='color:"+color+"'>"+mes+"</span>");
    }

}

function removeError(id){
    //删除构建区域的错误
    var errorInfo = $("#"+id).parent().find(".errInfo");
    if(errorInfo.length>0) {
        $("#"+id).parent().find(".errInfo").remove();
    }
}

/**
 * 判断是否为空,并调整颜色
 * @param objid
 * @param border
 */
function isBlank(objid, border){
    if($("#"+objid).val().replace(/^\s*$/g,'') == ""){

        if(border!=""){
            //改变边框显示
            $("#"+objid).css("border","solid 1px "+border);

        }
        return true;
    }
    $("#"+objid).css("border","solid 1px #fff");
    return false;
}

function isEqual(val1,val2){
    if($("#"+val1).val() == $("#"+val2).val()){
        return true;
    }
    return false;
}

function isCheck(objid){
    if($("#"+objid).prop("checked")){
        return true;
    }
    return false;
}

function checkName(inputname) {
    var reg=/^[a-zA-Z]\w{3,19}$/;
    if(reg.test($("#"+inputname).val())==false){
        alert("用户名只能是4-20位字母、数字、下划线组合");
        return false;
    }else {
        return true;
    }
}

function isEmail(id,border)//文本框的值 是否是Email格式
{
    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if(myreg.test($("#"+id).val())) {
        $("#"+id).css("border","solid 1px #fff");
        return true;
    }
    if(border!="")
    {
        $("#"+id).css("border","solid 1px "+border);
    }
    return false;
}

function execServer(type,params,func) //请求操作
{       //使用POST方式来进行异步请求
    $.post("server/userSvr.php?type="+type,params,func);
}

function blankBlur(objid)
{
    //失去焦点时 ，红色框提醒
    $("#"+objid).blur(function(){
        isBlank(objid,"red");
    })
}

