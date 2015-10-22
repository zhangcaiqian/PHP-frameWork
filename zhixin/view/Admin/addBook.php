<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="view/Admin/Public/style/A_common.css" type="text/css"/>
	<title></title>
</head>
<body>
	<form action="http://localhost/zhixin/index.php?app=Admin&controller=Book&action=addBookHandle" method="post">
		<table id="table">
			<tr>
				<th colspan="3">添加书目</th>
			</tr>
			<tr>
				<td align="right" width="40%">书名：</td><td><input type="text" name="book_name"/></td>
			</tr>
			<tr>
				<td align="right" width="40%">作者：</td><td><input type="text" name="book_author"/></td>
			</tr>
			<tr>
				<td align="right" width="40%">类别：</td>
				<td>
					<select name="book_class" id="">
						<?php
							foreach ($data['class'] as $v) 
							{?>
								<option value="<?php echo $v['cname']; ?>"><?php echo $v['cname']; ?></option>
							 	
						<?php	} 
						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right" width="40%">出版社：</td>
				<td>
					<select name="book_press" id="">
						<?php
							foreach ($data['press'] as $v) 
							{?>
								<option value="<?php echo $v['pname']; ?>"><?php echo $v['pname']; ?></option>
							 	
						<?php	}
						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right" width="40%">出版时间：</td><td><input type="text" name="book_time"/></td>
			</tr>
			<tr>
				<td align="right" width="40%">简介：</td><td><textarea name="book_info" id="" cols="50" rows="20"></textarea></td>
			</tr>

			<tr>
				<td colspan="2" align="center"><input type="submit" value="保存添加" id="sub"/></td>
			</tr>
		</table>
	</form>
</body>
</html>