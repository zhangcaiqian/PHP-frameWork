<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台管理系统</title>
<link href="Public/style/A_top.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="top">
	<div class="logo"><img src="Public/images/a_logo.jpg" width="359" height="91"></div>
    <div class="out"><ul>
        	<li><a href="http://localhost/zhixin/index.php" target="_top">回到主页</a></li>
            <li><a href="http://localhost/zhixin/index.php?app=Admin&controller=Frame&action=loginOut" target="_top">退出系统</a></li>
        </ul>
   </div>
   <div class="view">
  		<div class="user"><p>用户：<?php echo $_SESSION['USER'];?>&nbsp;上次登录时间：<?php echo $_SESSION['LOGIN_TIME'];?></p></div>
   </div>
</div
></body>
</html>
