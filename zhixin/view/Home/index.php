<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>知行 | 图书信息</title>
	<link rel="stylesheet" href="<?php echo __PUBLIC__ ?>/style/index.css" />
</head>
<body>
	<!--首部-->
	<div id="header">
		<div id="header_con">
			<div><img src="<?php echo __PUBLIC__ ?>/images/logo.jpg" alt="首页logo" /></div>
			<div id="search">
				<form action="###" method="post">
					<table>
						<tr>
							<td>
								<select name="index_word" id="" class="myKey">
									<option value="" class="myKey">题名</option>
									<option value="" class="myKey">作者</option>
									<option value="" class="myKey">出版社</option>
									<option value="" class="myKey">索书号</option>
								</select>
							</td>
							<td align="right"><input type="text" name="content" class="myKey keyWord"/></td>
							<td align="left"><input type="submit" value=" " class="myKey btn"/></td>
						</tr>
					</table>
				</form>
			</div>
			<!--导航-->
			<div id="nav">
				<ul>
					<li><a href="###">图书分类</a></li>
					<li><a href="###">图书分类</a></li>
					<li><a href="###">图书分类</a></li>
					<li><a href="###">图书分类</a></li>
					<li><a href="###">图书分类</a></li>
				</ul>
			</div>
			<!--导航结束-->
		</div>
	</div>
	<!--首部结束-->
	<!--主内容-->
	<div id="main">
		<div id="main_con">
			<div id="main_con_hot"><h4>热门借阅</h4>
				
			</div>
			<div id="main_con_time">
				
			</div>

			<div class="book_class jindian"><!--经典书籍-->
				<div class="flipper">
					<div class="front" style="background-color:#663366;">
						<!-- 前面内容 -->
						<img src="<?php echo __PUBLIC__ ?>/images/jindian.jpg" alt="经典书籍" style="left:50px;"/>
					</div>
					<div class="back" style="background-color:#663366;">2
						<!-- 背面内容 -->
						<a href="">万历十五年</a>
					</div>
				</div>
			</div>

			<div class="book_class zhexue"><!--哲学-->
				<div class="flipper">
					<div class="front" style="height:215px;background-color:#6699CC;">
						<!-- 前面内容 -->
						<img src="<?php echo __PUBLIC__ ?>/images/zhexue.jpg" alt="哲学" style="left:50px;"/>
					</div>
					<div class="back" style="height:215px;background-color:#6699CC;">2
						<!-- 背面内容 -->
						<a href="">万历十五年</a>
					</div>
				</div>
			</div>

			<div class="book_class shehuikexue"><!--社会科学-->
				<div class="flipper">
					<div class="front" style="height:215px;background-color:#6699CC;">
						<!-- 前面内容 -->
						<img src="<?php echo __PUBLIC__ ?>/images/shehuikexue.jpg" alt="社会科学" style="left:50px;"/>
					</div>
					<div class="back" style="height:215px;background-color:#6699CC;">2
						<!-- 背面内容 -->
						<a href="">万历十五年</a>
					</div>
				</div>
			</div>

			<div class="book_class jisuanji"><!--计算机技术-->
				<div class="flipper">
					<div class="front" style="background-color:#663366;">
						<img src="<?php echo __PUBLIC__ ?>/images/jisuanji.jpg" alt="计算机技术" style="left:50px;"/>
					</div>
					<div class="back" style="background-color:#663366;">2
						<!-- 背面内容 -->
						<a href="">万历十五年</a>
					</div>
				</div>
			</div>

			<div class="book_class lishidili"><!--历史地理-->
				<div class="flipper">
					<div class="front" style="width:215px;height:215px;background-color:#6699CC;">
						<!-- 前面内容 -->
						<img src="<?php echo __PUBLIC__ ?>/images/lishidili.jpg" alt="历史地理" style="left:7px;"/>
					</div>
					<div class="back" style="width:215px;height:215px;background-color:#6699CC;">2
						<!-- 背面内容 -->
						<a href="">万历十五年</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--传统经典推荐部分-->
	<div id="classical"><h1>传统经典</h1>
		<div class="c one"><img src="<?php echo __PUBLIC__ ?>/images/shiji.jpg" alt="" /></div>
		<div class="c two"><img src="<?php echo __PUBLIC__ ?>/images/laozi.jpg" alt="" /></div>
		<div class="c three"><img src="<?php echo __PUBLIC__ ?>/images/sishu.jpg" alt="" /></div>
	</div>
	<!--页脚-->
	<div id="footer">
		<div id="sign"><p style="line-height:-100px;">读万卷书</p><p style="text-indent:80px;">行万里路</p></div>
	</div>
</body>
</html>