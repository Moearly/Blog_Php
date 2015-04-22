<?php
/**
 * 获取友情链接
 */
function getFriendLinks() {
    //TODO:在数据库中获取
    //简单构造数组资源
    $link1 = array(
        "name" => "51CTO",
        "href" => "www.51cto.com",
        "blank" => "_blank"
    );

    $link2 = array(
        "name" => "博客",
        "href" => "www.mokercoder.com",
        "blank" => "_blank"
    );

    $links[] = $link1;
    array_push($links, $link2);

    return $links;
}