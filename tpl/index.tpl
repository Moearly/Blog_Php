<?php
    $result = the_news();
?>

<div class="outer">
    <div class="content">
        <div class="right">

        </div>
        <div class="left">
            <?php foreach($result as $item):?>
            <dl class="listNewItem">
                <dt><?php echo $item["news_title"]?></dt>
                <dd><?php echo $item["news_intr"]?></dd>
                <dd class="pubInfo">
                    作者:<?php echo $item["pubuser"]?>  发布时间:<?php echo $item["pubtime"]?>
                </dd>
            </dl>
            <?php endforeach;?>
        </div>
    </div>

</div>