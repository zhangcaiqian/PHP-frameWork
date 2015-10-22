<?php
	/**
	  * 配置文件
	  */ 
	$CONFIG=array(
		'DB_HOST'=>'localhost', //主机名
		'DB_TYPE'=>'mysql',
		'DB_USER'=>'root',      //用户名
		'DB_PASSWORD'=>'12345', //用户密码
		'DB_NAME'=>'lib',          //数据库名
		'DB_TABLE_PREFIX'=>'l_',   //数据库表前缀
		'DB_CON'=>'',            //数据库连接方式，pcon为长连接，默认为即时连接
		'DB_CODING'=>'utf8',
		'URL_TYPE'=>'1',         //路由方式

		'DEFAULT_APP'=>'Home',          //默认应用
		'DEFAULT_CONTROLLER'=>'Index',  //默认控制器
		'DEFAULT_ACTION'=>'index'       //默认方法
		);
 ?>