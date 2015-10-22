<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="view/Admin/Public/style/A_common.css" type="text/css"/>
    <title></title>
</head>
<body id="tag">
        <table id="table" border="0">
            <tr colspan="6" style="background:none;">
                <td>
                    <li class="btn">
                        <a href="http://localhost/zhixin/index.php?app=Admin&controller=Book&action=addBook">添加书籍</a>
                    </li>
                </td>
            </tr>
            <tr>
                <th colspan="6">书籍列表</th>
            </tr>
            <tr align="center">
                <td>书名</td>
                <td>作者</td>
                <td>类别</td>
                <td>出版社</td>
                <td>出版时间</td>
                <td>操作</td>
            </tr>
            <?php
                foreach($data as $v)
                { ?>
                    <tr align="center">
                        <td><?php echo $v['bname'];?></td>
                        <td><?php echo $v['bauthor'];?></td>
                        <td><?php echo $v['bclass'];?></td>
                        <td><?php echo $v['bpress'];?></td>
                        <td><?php echo $v['btime'];?></td>
                        <td>
                            <a class="delete" style="display:inline;"href="http://localhost/zhixin/index.php?app=Admin&controller=Book&action=deleteBook&id=<?php echo $v['id'];?>">[删除]</a>
                            <a style="color:#f00;display:inline;" href="http://localhost/zhixin/index.php?app=Admin&controller=Book&action=modifyBook&id=<?php echo $v['id'];?>">[修改]</a>
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