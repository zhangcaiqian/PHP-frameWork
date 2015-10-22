<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>页面跳转提示</title>
	<style>
		body{
			font-family: '微软雅黑';
		}
		div{
			font-size:16px;
		}
		a{
			color:red;
		}
		span{
			color:blue;
		}
		h1{
			font-size:50px;
		}
	</style>
</head>
<!--跳转提示-->
<body>
	<h1><?php echo ($title) ?></h1>
	<div>页面自动<a href="###">跳转</a>，<span>等待时间3秒</span></div>
</body>
<script>
(function()
	{
		var oSpan=document.getElementsByTagName('span')[0];
		var count=3;
		var info='<?php echo $jumpHref ?>';
		var timer=setInterval(function(){
			oSpan.innerHTML='等待时间'+count+'秒';
			count--;
			if(count<=0)
			{
				if(info!='') 
				{
					location.href="<?php echo ($jumpHref) ?>";
				}
				else
				{ 
					window.history.go(-1);
				}
				clearInterval(timer);
			}
		},1000);
	})();
</script>
</html>