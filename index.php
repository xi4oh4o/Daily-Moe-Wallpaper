<?php
include_once ('conn.php');
/*
 * Provide after resize the resolution
 */
    if(!empty($_GET['down'])) {
/*
 * Download files name set
 */

    if ( $_GET['down'] == 'mobile_origin' || $_GET['down'] == '768x1024' || $_GET['down'] == '720x1280' || $_GET['down'] == '640x960' || $_GET['down'] == '540x960' || $_GET['down'] == '480x854' || $_GET['down'] == '480x800' || $_GET['down'] == '320x480' || $_GET['down'] == '240x320'){
    $image_info_size = getInfo(1);
    }else{
    $image_info_size = getInfo(0);
    }

    if($_GET['down'] != null) {
    $filename = $_GET['down'].".jpg";
    $encoded_filename = urlencode($image_info_size[0]['author'].' - '.$image_info_size[0]['workname'].'-'.$filename);
    $encoded_filename = str_replace("+", "%20", $encoded_filename);  
    $ua = $_SERVER["HTTP_USER_AGENT"];  
    header('Content-type: application/jpeg'); 
    if (preg_match("/MSIE/", $ua)) {  
    header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');  
    } else if (preg_match("/Firefox/", $ua)) {  
    header('Content-Disposition: attachment; filename*="utf8\'\'' . $encoded_filename . '"');  
    } else {  
    header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');  
    }  
    $stor = new SaeStorage();

    /*
         Origin
    ----------
    */
    if ($_GET['down'] == 'origin') {
        echo $stor->read("imoe","images/$filename");
                $stor->close();
    }

    /*
        iPad Retina
         1536x2048
    ---------------
    */
    if ($_GET['down'] == '1536x2048') {
        echo $stor->read("imoe","images/$filename");
    }else if($_GET['down'] == '768x1024') {
        $img = new SaeImage ( $stor->read("imoe","images/1536x2048.jpg") );
                $img->resize(768,1024);
    }else if($_GET['down'] == '600x1024') {
        $img = new SaeImage ( $stor->read("imoe","images/1536x2048.jpg") );
                $img->resize(600,1024);
    }

    /*
         16:10
     2880x1800
    -----------
    */
    if ($_GET['down'] == '2880x1800') {
        echo $stor->read("imoe","images/$filename");
    }else if($_GET['down'] == '1920x1200') {
        $img = new SaeImage ( $stor->read("imoe","images/2880x1800.jpg") );
                $img->resize(1920,1200);
    }else if($_GET['down'] == '1680x1050') {
        $img = new SaeImage ( $stor->read("imoe","images/2880x1800.jpg") );
                $img->resize(1680,1050);   
    }else if($_GET['down'] == '1440x900') {
        $img = new SaeImage ( $stor->read("imoe","images/2880x1800.jpg") );
                $img->resize(1440,900);
    }else if($_GET['down'] == '1280x800') {
        $img = new SaeImage ( $stor->read("imoe","images/2880x1800.jpg") );
                $img->resize(1280,800);
    }else if($_GET['down'] == '1024x600') {
        $img = new SaeImage ( $stor->read("imoe","images/2880x1800.jpg") );
                $img->resize(1024,600);
    }
        
    /*
         16:9
     1920x1080
    -----------
    */
    if ($_GET['down'] == '1920x1080') {
        echo $stor->read("imoe","images/$filename");
    }else if($_GET['down'] == '1366x768') {
        $img = new SaeImage ( $stor->read("imoe","images/1920x1080.jpg") );
                $img->resize(1366,768);
    }else if($_GET['down'] == '1280x720') {
        $img = new SaeImage ( $stor->read("imoe","images/1920x1080.jpg") );
                $img->resize(1280,720);
    }

    /*
         4:3
     2048x1536
    -----------
    */
if ($_GET['down'] == '2048x1536') {
        echo $stor->read("imoe","images/$filename");
    }else if($_GET['down'] == '1920x1440') {
        $img = new SaeImage ( $stor->read("imoe","images/2048x1536.jpg") );
        $img->resize(1920,1440);
    }else if($_GET['down'] == '1280x1024') {
        $img = new SaeImage ( $stor->read("imoe","images/2048x1536.jpg") );
        $img->resize(1280,1024);
    }else if($_GET['down'] == '1024x768') {
        $img = new SaeImage ( $stor->read("imoe","images/2048x1536.jpg") );
        $img->resize(1024,768);
    }else if($_GET['down'] == '800x600') {
        $img = new SaeImage ( $stor->read("imoe","images/2048x1536.jpg") );
        $img->resize(800,600);
    }else { //other resolution download
        echo $stor->read("imoe","images/$filename");
    }

echo $img->exec(); //generator resize the image download
$img->clean();
$stor->close();
exit();
    }
}

?><!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Daily Moe Wallpaper - 每日萌图精选" />
    <meta name="keywords" content="moe wallpaper,视网膜壁纸,视网膜分辨率,retina萌图,retina wallpaper,mac book pro,iphone4壁纸,ipad壁纸,萌图,萌图壁纸,手机萌图,手机动漫壁纸,CG,daily moe wallpaper" />
    <meta name="author" content="xi4oh4o" />
    <link rel="author" href="humans.txt" />
    <link rel="icon" type="image/x-icon" href="http://xhs.me/images/favicon.ico">

    <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0" name="viewport" />
    <link rel="stylesheet" href="static/index_style.css">
    <script type="text/javascript" src="static/effects.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Mystery+Quest|Berkshire+Swash|Italianno' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <title>Daily Moe Wallpaper - 每日萌图精选</title>
</head>
<body>
    <div id="container">
        <div id="header">
            <a href="/info.php">
                <div class="icon_left icon_info"></div>
            </a>
            <div class="icon_right icon_download"></div>
            <div>Daily Moe Wallpaper</div>
        </div>
        <div id="down_window">
            <div class="icon_box_add"></div>
            <div id="down_list">
                <ul>
                    <li>Fit resolution</li>
                    <div id="down">
                        <script type="text/javascript">getList();</script>
                    </div>
                </ul>
            </div>
        </div>
        <div id="share_button">
        <div id="ckepop">
        <a class="jiathis_button_copy"></a><br />
        <a class="jiathis_button_tsina"></a><br />
        <a class="jiathis_button_tqq"></a><br />
        <a class="jiathis_button_t163"></a><br />
        <a class="jiathis_button_douban"></a><br />
        <a class="jiathis_button_fanfou"></a><br />
        <a class="jiathis_button_twitter"></a><br />
        <a class="jiathis_button_googleplus"></a><br />
        <a class="jiathis_button_huaban"></a><br />
        <a class="jiathis_button_pinterest"></a><br />
        </div>
        </div>
        <div id="footer">
            <script type="text/javascript">getInfo();</script>
        </div>

        <div id="landscape"></div>
    </div>

<!-- Javascript Code -->
<script type="text/javascript">

/* jQuery Function */
$("div.icon_download").click(function () {
    if ($("div#down_window").css("display") == "none") {
        $("div#down_window").toggle("drop");
    }else{
        $("div#down_window").toggle("drop");
    }
})

/* Google Analytics */
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-33056114-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
/* Jiathis button  */
    var jiathis_config={
    data_track_clickback:true,
    summary:"",
    ralateuid:{
        "tsina":"xi4oh4o"
    },
    hideMore:true
    }
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js?uid=1642813" charset="utf-8"></script>
</body>
</html>