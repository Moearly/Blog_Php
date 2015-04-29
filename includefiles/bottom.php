<style>
    .buttom{height: 90px;width: 100%;background: #474747;margin: 0 auto;position: fixed;bottom: 0;padding-top: 20px;color: #fff}
    .buttom a{color: #ffffff;text-decoration: none}
    .buttom a:hover{text-decoration: underline}
</style>
<?php
    require "module/page.php";
?>

<div class="buttom">
    <p>友情链接:
        <?php
            $link_data = getFriendLinks();
      // var_export($link_data);
//            var_export($link_data);
            foreach($link_data as $link) {
                echo '<a href="http://'.$link[furl].'" target="'.$link[target].'">'.$link[fname].'</a> | ';
            }
        ?></p>
    <p>苏ICP备14027568号©martnlei.com Inc. All Rights Reserved</p>
</div>
  <br /><br />
  <br /><br />
</html>
</body>