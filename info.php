<?php
    if(!empty($_POST['msg'])) {
    $mail = new SaeMail();
    $ret = $mail->quickSend( 'xi4oh4o@gmail.com' , 'Daily Moe Wallapepr feedback' , $_POST['msg'] , 'dailymoe.service@gmail.com' , 'dailymoeservice' ); 
    //发送失败时输出错误码和错误信息
    if ($ret === false){
            var_dump($mail->errno(), $mail->errmsg());
        }else{
        echo '<script type="text/javascript">alert("郵件發送成功")</script>';
        }
    }
?><!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Daily Moe Wallpaper - 每日萌图精选" />
    <meta name="keywords" content="Daily Moe Wallpaper,每日萌图精选" />
    <meta name="author" content="xi4oh4o" />
    <link rel="author" href="humans.txt" />
    <link rel="icon" type="image/x-icon" href="http://xhs.me/images/favicon.ico">
    <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0" name="viewport" />
    <link rel="stylesheet" href="static/info_style.css">
    <script type="text/javascript" src="static/effects.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Mystery+Quest|Berkshire+Swash|Italianno' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <title>Daily Moe Wallpaper - 每日萌图精选</title>
</head>
<body>
    <div id="container">
        <div id="header">
            <div><a href="/index.php">Daily Moe Wallpaper</a></div>
        </div>

        <div id="wrapper">
            <li class="big_font">你好</li>
            <li>我是</li>
            <li>開發和設計</li>
            <li>豪</li>
            <li class="big_font">特點</li>
            <li>每日萌图精选主旨在每晚5点准时为您更新一款精选萌壁纸哦！</li>
            <li class="big_font">支持</li>
            <li>桌面版(包括MBP Retina高清分辨率)，移动版(完美裁剪分辨率，多屏用户提供宽屏版原图)，平板设备(包括新版iPad Retina分辨率)</li>
            
            <li class="big_font">已知問題</li>
            <li>关于分辨率：因比例原因，移动版与桌面版可能会使用两种不同图片</li>
            <li>关于桌面多屏：因多屏尺寸不定暂时只提供原图共自行裁剪使用(欢迎反馈有效解决方法)</li>

            <br />
            <li class="big_font">Bonjour</li>
            <li>I'm</li>
            <li>developers &amp; designer</li>
            <li>Howe Isamu</li>
            <li class="big_font">Special</li>
            <li>Daily Moe Wallpaper Dedicated to night 5:00 time for you to update a chosen of Moe wallpaper!</li>
            <li class="big_font">Support</li>
            <li>Desktop ver.(Including MBP Retina), Mobile ver.(perfect cut, Multi-screen provide  widescreen original), Tablet ver.(Including iPad Retina)</li>
            <li class="big_font">Know Issues</li>
            <li>about resolution: Due proportion of reason , the mobile version and desktop version may use differ  two pictures</li>
            <li>abpit Multi-screen: Multi-screen size is uncertain temporarily only provide original , cutting their own use(Welcome to provide solutions)</li>
            <li class="big_font">Feedback</li>

            <form action="info.php" method="post" enctype="multipart/form-data">
                <li>分辨率支持請求或建議(Resolution of support requests and suggestions):</li>
                <br />
                <textarea name="msg" id="msg_content" placeholder="請報告需要支持的分辨率(如：1024x768)或其他建議，點擊發送按鈕即可，建議您寫下email或其他能回應您的方式以便回覆 " cols="30" rows="10"></textarea>
                <br /><input id="send_button" type="submit" name="submit" value="發送" />
            </form>

            <li class="big_font">聯繫我</li>
            <li><a href="http://XHs.Me">XHs.Me</a></li>
            <li><a href="http://www.v2ex.com/member/xi4oh4o?r=xi4oh4o">V2EX</a></li>
            <li><a href="https://twitter.com/XHs">Twitter</a></li>
            <li><a href="http://weibo.com/xi4oh4o">Weibo</a></li>
            <li><a href="mailto:xi4oh4o@gmail.com">xi4oh4o@gmail.com</a></li>
			
            <li class="big_font">感谢</li>
            <li>Alen Elric(提供建议下载文件名包括图片信息)</li>
            <li>奇特(反馈移动版下载原图仍为桌面版bug)</li>
            <li>pixiv41378(反馈增加source link信息)</li>
        </div>
        <div id="go_home"><a href="/">Go Home</a></div>
    </div>
</body>
</html>