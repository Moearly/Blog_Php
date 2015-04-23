<?php
interface news { //新闻的接口类,包含内部新闻，投稿新闻，第三方新闻
    function loadNews($classid,$keyword,$page,$pagesize); //加载新闻列表
    function loadNewsDetail($newsid);//加载新闻详情

    function clickNews($newsid);//新闻点击率计算
    function reviewNews($newsid,$reviewData); //评论新闻
}
?>