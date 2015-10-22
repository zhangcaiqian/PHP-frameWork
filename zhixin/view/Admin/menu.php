<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台管理系统</title>
<link href="Public/style/A_menu.css" rel="stylesheet" type="text/css" />
<style>
#export{
    width:95%;
    margin:0px;
    left:50%;
    display:none;
}
#export li{
        width:95%;
        height:20px;
        line-height:20px;
        background:#ff7f50;
}
#export li a{
    height:20px;
    font-size:11px;
}
</style>
</head>

<body>
<div id="nav">
	<div id="nav_title">管理系统</div>
	<ul>
    	<li><a href="http://localhost/zhixin/index.php?app=Admin&controller=BookClass&action=bookClassList" target="mainFrame" >书籍类别</a></li>
        <li><a href="http://localhost/zhixin/index.php?app=Admin&controller=Book&action=bookList" target="mainFrame" >书目信息</a></li>
        <li><a href="http://localhost/zhixin/index.php?app=Admin&controller=Press&action=pressList" target="mainFrame" >出版社信息</a></li>
        <li><a href="http://localhost/zhixin/index.php?app=Admin&controller=User&action=userList" target="mainFrame" >用户管理</a></li>
</div>
</body>
</html>
