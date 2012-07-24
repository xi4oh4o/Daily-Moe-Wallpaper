<?php
/* ==================
   The Code Base SAE
   ================== */

/** Get Image Information **/
function getInfo( $ver ) {
    $mysql = new SaeMysql();
    $sql = "SELECT * FROM `daily_moe` WHERE `id` =$ver LIMIT 0 , 1";
    $data = $mysql->getData( $sql );

    if( $mysql->errno() != 0 )
    {
        die( "Error:" . $mysql->errmsg() );
    }else{
        return $data;
    }
    	$mysql->closeDb();
}

if (isset($_GET["m"])) {
   $image_info = getInfo($_POST['para']);
 ?>
<div id="image_info" class="info_show">
<p><span>Illustrator: <?php echo $image_info[0]['author']; ?></span></p>
  <p><span>Works' Name: <?php echo $image_info[0]['workname']; ?></span></p>
  <hr />
  <p><span class="tips">支持移动与平板设备访问，人工裁剪相容分辨率</span></p>
</div>
<div id="hitokoto" class="info_show">
<?php echo $image_info[0]['hitokoto']; ?>&nbsp;
source: <a href="http://www.pixiv.net/member_illust.php?mode=medium&amp;illust_id=<?php echo $image_info[0]['source']; ?>">pixiv</a>
</div>
<?php } ?>
<?php

/** Set Image Information **/
function setInfo($author, $workname, $hitokoto, $source,  $id) {
    $mysql = new SaeMysql();
    $sql = "UPDATE `app_dailymoe`.`daily_moe` SET `author` = '$author', `workname` = '$workname', `hitokoto` = '$hitokoto', `source` = '$source' WHERE `daily_moe`.`id` = '$id';";
    $mysql->runSql($sql);
    
    if( $mysql->errno() !=0 )
    {
        die( "Error:" . $mysql->errmsg() );
    }else{
    	return;
    }
    	$mysql->closeDb();
}

/** Upload Account information verification **/
define("PASSWORD", '******'); //typing your password
if(!empty($_POST['password'])) {
    if($_POST['password'] == PASSWORD) {
        setcookie("password",$_POST['password'],time()+36000,"/");
        echo "<script type='text/javascript'>setTimeout(\"document.location.href='/upload.php'\",0);</script>";
    }else{
        echo "Account information verification failed - Go Back Home";
        echo "<script type='text/javascript'>setTimeout(\"document.location.href='/upload.php'\",1200);</script>";
    }
}

?>