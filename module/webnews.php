<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/23
 * Time: 14:17
 */
require "interface.php";

class webNews implements news{

    function loadNews($classid, $keyword, $page, $pagesize)
    {
        // TODO: 应该是根据需求处理数据库--数据
        $news1 = array(
            "news_title"=>"如果40岁了还在写代码，是一种幸福，还是一种悲哀？",
            "news_intr"=>"天光，一檐停风聚天下闲士半阁藏卷窃古今名家 马上就 40 了，依然在写代码，写各种代码，从C/C++写到 object-c，从 java 写到 lua，乐在其中，享受得很。 当然，我现在基本不是依靠写代码挣钱谋生，事实上，我也几乎也没有纯粹依赖过写代码谋生过。写代码只是一种乐趣，一种爱好 当然，难道是写代码谋生就一定是痛苦的吗？也未必。 公司有两个同事，都是非常棒的程序员，也是成熟的架构师，一位是 77 年的，一位是 78 年的，他们主要的工作内容都是写代码，他们也都乐在其中，事实上，如果不出意外，他们能够在公司里继续留下一起合作，我想他们会一直写代码写到 40 岁。他们都是非常非常出色的技术方向的专才，不写代码，浪费了他们的才华。他们现在写代码也写得很 happy。",
            "pubtime"=>"2013-2-5",
            "pubuser"=>"程序员在囧途"
        );

        $news2 = array(
            "news_title"=>"给老罗的一封公开信：关于锤子官网的微吐槽(1)",
            "news_intr"=>"你好。我是一名设计师，有点强迫症，来信是为给锤子手机的官网提一些建议。 和你之前在采访中见过，那次我们跟你聊了将近十个产品的问题，你都坚持听完了，因此印象挺好。 一、免责声明 设计师的强迫症导致我要求比较完美。下面的意见可能对于大多数人来说这并不是“问题”。现在写出来也是基于善意，如果你判断后觉得有必要的话，不妨优化改进一下。不过因轻信和参考里面的信息而带来了任何直接或间接损失则与本人无任何关系。如对此声明有异议，则请停止阅读来信。",
            "pubtime"=>"2015-2-4",
            "pubuser"=>"51cto"
        );

        $newslist[] = $news1;
        $newslist[] = $news2;
        return $newslist;
    }

    function loadNewsDetail($newsid)
    {
        // TODO: Implement loadNewsDetail() method.
    }

    function clickNews($newsid)
    {
        // TODO: Implement clickNews() method.
    }

    function reviewNews($newsid, $reviewData)
    {
        // TODO: Implement reviewNews() method.
    }
}

?>