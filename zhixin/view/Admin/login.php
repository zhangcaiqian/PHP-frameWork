<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书信息管理</title>
<style>
#main{
    width:500px;
    height:300px;
    position:absolute;
    margin-left:-250px;
    margin-top:-150px;
    padding:0px;
    top:50%;
    left:50%;
    font-family:"微软雅黑";
    font-size:15px;
    font-weight:600;
    color:#000;
    /*background-color:#ccc;*/
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    -ms-border-radius:10px;
    border-radius:10px;
    border:#999 solid 1px;
}

#main table{
    width:300px;
    height:220px;
    position:absolute;
    left:120px;
    top:50px;
    /*background:#CCC;*/
}

#main .bt{
    background-color:#6495ed;
    border:none;
    color:#fff;
    font-weight: 700;
    cursor:pointer;
    width:40px;
    height:23px;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    -ms-border-radius:4px;
    border-radius:4px;
}
#main .bt:hover{
    background-color:#00008b;
}
#main input{
    border:#6495ed solid 1px;
}


</style>
</head>
<body>
<div id="main">
	<form action="http://localhost/zhixin/index.php?app=Admin&controller=Index&action=loginVerify" method="post">
    	<table align="center" id="tab">
                <th>
                    <td align="left" colspan="2"><span style="font-size:18px;">图书信息管理</span></td>
                </th>
            	<tr>
                	<td align="right">账户：</td>
                    <td><input type="text" name="user" style="width:180px;"></input></td>
                </tr>
                <tr>
                	<td align="right">密码：</td>
                    <td><input type="password" name="userpwd" style="width:180px;"></input></td>
                </tr>
                <tr>
                	<td align="right"><input type="submit" value="进入" class="bt"></input></td>
                    <td><input type="reset" value="取消" class="bt"></input></td>
                </tr>
         </table>
    </form>
</div>
</body>
</html>
