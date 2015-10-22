<?php
	/**
	  * 用户管理控制器
	  */ 
	class UserController extends PublicController
	{
		public function userList()
		{
			$model=$this->M('User');
			$data=$model->select('user');//var_dump($data);
			$this->display('Admin/userList',$data);
		}

		public function addUser()
		{
			$this->display('Admin/addUser');
		}

		public function addUserHandle()//添加用户处理
		{
			if(empty($_POST['name'])||empty($_POST['password'])||empty($_POST['copy_password']))
			{
				$this->redirect('请将信息填写完整！');
			}
			else
			{
				if($_POST['password']!=$_POST['copy_password'])
				{
					$this->redirect('两次输入密码不一致！');
				}
				else
				{
					$model=$this->M('User');//htmlentities();
					$userName=htmlentities($_POST['name']);
					$userPwd=md5(htmlentities($_POST['password']));
					$time=date('Y-m-d');
					$result=$model->add('user','uname,upwd,utime',"'$userName','$userPwd','$time'");
					if($result==true)
					{
						$this->redirect('已添加','http://localhost/zhixin/index.php?app=Admin&controller=User&action=userList');
					}
					else
					{
						$this->redirect('添加失败！');
					}
				}
			}
		}

		public function deleteUser()
		{
			$id=$_GET['id'];
			$model=$this->M('User');
			$result=$model->delete('user',"id='$id'");
			if($result==true)
			{
				$this->redirect('已删除！','http://localhost/zhixin/index.php?app=Admin&controller=User&action=userList');
			}
			else
			{
				$this->redirect('删除失败！');
			}
		}
	}
 ?>