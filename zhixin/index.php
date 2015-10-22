<?php
	/**
	  * 入口文件
	  */ 
	require dirname(__FILE__).'/beyond/app.php';
	require dirname(__FILE__).'/config/config.php';
	//var_dump(parse_url($_SERVER['REQUEST_URI']));
	//echo $_SERVER['REQUEST_URI'];
	Beyond::start($CONFIG);
 ?>