<?php
$num = count($_FILES['uploads']['name']);
for ($i= 0; $i < $num ; $i++) {
	$stor = new SaeStorage();
	$stor->upload("imoe",'images/'.$_FILES['uploads']['name'][$i],$_FILES['uploads']['tmp_name'][$i], array('expires' => 'modification plus 1 days'));
}
include_once('conn.php');
if(!empty($_POST['desktop_author']) && !empty($_POST['desktop_workname']) && !empty($_POST['desktop_hitokoto']) && !empty($_POST['desktop_source']))
    {
    setInfo($_POST['desktop_author'], $_POST['desktop_workname'], $_POST['desktop_hitokoto'], $_POST['desktop_source'], '0');
    }

if(!empty($_POST['mobile_author']) && !empty($_POST['mobile_workname']) && !empty($_POST['mobile_hitokoto']) && !empty($_POST['mobile_source']))
    {
    setInfo($_POST['mobile_author'], $_POST['mobile_workname'], $_POST['mobile_hitokoto'], $_POST['mobile_source'], '1');
    }
?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Images Upload</title>
	<style type="text/css">
        #upload {padding: 20px;}
        </style>
</head>
<body>
<?php
if (!empty($_COOKIE['password'])){
	define("PASSWORD", "912913");
	if ($_COOKIE['password'] == PASSWORD) {
	show_upload();
}
}else{
	login();
}
?>
<?php
function login() { ?>
<div id="login">
<form action="" method="get">
  Password：<input type="password" name="password" /><br />
<button type="submit" formmethod="post" formaction="/conn.php">Login</button>
</form>
</div>
<?php }
?>

<?php
function show_upload() { ?>
<div id="upload">
<form action="upload.php" method="post"
enctype="multipart/form-data">
<label for="file">Various size:</label>
<br />
<input name='uploads[]' type=file multiple>
<input type='submit' value="Upload">
<br />
<h4>Desktop ver.</h4>
<div id="desktop_info">
Author: <input type="text" name="desktop_author" class="author" />
<br />
Work's: <input type="text" name="desktop_workname" class="workname" />
<br />
Hitokoto: <input type="text" name="desktop_hitokoto" class="hitokoto" />
<br />
Source: <input type="text" name="desktop_source" class="source" />
</div>
<br />
<h4>Mobile ver.</h4>
<div id="mobile_info">
Author: <input type="text" name="mobile_author" class="author" />
<br />
Work's: <input type="text" name="mobile_workname" class="workname" />
<br />
Hitokoto: <input type="text" name="mobile_hitokoto" class="hitokoto" />
<br />
Source: <input type="text" name="mobile_source" class="source" />
</div>
<input type="submit" name="submit" value="提交" />
</form>
</div>
<?php }
?>
</body>
</html>