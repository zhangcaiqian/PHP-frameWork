<?php
	/**
	 * 后台登录控制器
	 */
	class  IndexController extends Controller
	{
		public function index()//登录验证显示
		{
			$this->display('Admin/login');
		}

		public function loginVerify()//登录验证
		{
			if(empty($_POST['user'])||empty($_POST['userpwd']))
			{
				$this->redirect('请填写信息完整！');
			}
			else
			{
				$model=$this->M('Index');
				$userName=htmlentities($_POST['user']);
				$userPwd=md5(htmlentities($_POST['userpwd']));
				$result=$model->conditionselect('user','*',"uname='$userName' AND upwd='$userPwd'");
				if(!empty($result))
				{
					session_start();
					$_SESSION['USER']=$userName;
					$_SESSION['LOGIN_TIME']=$result[0]['utime'];
					$id=$result[0]['id'];
					$newtime=date('Y-m-d');
					$model->save('user',"utime='$newtime'","id='$id'");
					$this->redirect('认证成功！','http://localhost/zhixin/index.php?app=Admin&controller=Frame');
				}
				else
				{
					$this->redirect('认证失败！');
				}
			}
		}
	}
 ?>