<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="view/Admin/Public/style/A_common.css" type="text/css"/>
    <title></title>
</head>
<body id="tag">
        <table id="table" border="0">
            <tr colspan="5" style="background:none;">
                <td>
                    <li class="btn">
                        <a href="http://localhost/zhixin/index.php?app=Admin&controller=Press&action=addPress">添加出版社</a>
                    </li>
                </td>
            </tr>
            <tr>
                <th colspan="3">出版社列表</th>
            </tr>
            <tr align="center">
                <td width="30%">出版社</td>
                <td width="50%">简介</td>
                <td width="20%">操作</td>
            </tr>
            <?php
                foreach($data as $v)
                { ?>
                    <tr align="center">
                        <td><?php echo $v['pname'];?></td>
                        <td><?php echo $v['pjianjie'];?></td>
                        <td>
                            <a class="delete" style="display:inline;"href="http://localhost/zhixin/index.php?app=Admin&controller=Press&action=deletePress&id=<?php echo $v['id'];?>">[删除]</a>
                            <a style="color:#f00;display:inline;" href="http://localhost/zhixin/index.php?app=Admin&controller=Press&action=modifyPress&id=<?php echo $v['id'];?>">[修改]</a>
                        </td>
                    </tr>
            <?php    } 
             ?>
        </table>
</body>
<script src="view/Admin/Public/js/util.js"></script>
<script>
    alertDelete('tag');
</script>
</html>