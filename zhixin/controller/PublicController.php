<?php
	/**
	  * 后台公共控制器
	  */ 
	class PublicController extends Controller
	{
		function __construct()
		{
			session_start();
			if(!isset($_SESSION['USER']))
			{
				$this->redirect('非法访问！','http://localhost/zhixin/index.php?app=Admin');
			}
			else
			{

			}
		}
	}
 ?>