<?php
	/**
	  * 后台首页控制器
	  */ 
	class FrameController extends PublicController
	{
		public function index()
		{
			$this->display('Admin/index');
		}

		public function loginOut()
		{
			if(isset($_SESSION['USER']))
			{
				session_destroy();
				$this->redirect('已退出','http://localhost/zhixin/index.php?app=Admin');
			}
			else
			{
				echo '<h1>404 error</h1>';
			}
		}
	}
 ?>