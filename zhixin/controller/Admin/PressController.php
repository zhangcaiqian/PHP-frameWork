<?php
	/**
	  * 出版社信息管理
	  */ 
	class PressController extends PublicController
	{
		public function pressList()
		{
			$model=$this->M('Press');
			$data=$model->select('press');
			$this->display('Admin/pressList',$data);
		}

		public function addPress()//添加出版社信息
		{
			$this->display('Admin/addPress');
		}

		public function addPressHandle()//添加出版社信息处理加入数据库
		{
			if(empty($_POST['press_name'])||empty($_POST['press_info']))
			{
				$this->redirect('请填写完整信息');
			}
			else
			{
				$pname=$_POST['press_name'];
				$pinfo=$_POST['press_info'];
				$model=$this->M('Press');
				$result=$model->add('press','pname,pjianjie',"'$pname','$pinfo'");
				if($result==true)
				{
					$this->redirect('已添加','http://localhost/zhixin/index.php?app=Admin&controller=Press&action=pressList');
				}
				else
				{
					$this->redirect('添加失败');
				}
			}
		}

		public function deletePress()//删除出版社信息
		{
			$id=$_GET['id'];
			$model=$this->M('Press');
			$result=$model->delete('press',"id='$id'");
			if($result==true)
			{
				$this->redirect('已删除！','http://localhost/zhixin/index.php?app=Admin&controller=Press&action=pressList');
			}
			else
			{
				$this->redirect('删除失败！');
			}
		}

		public function modifyPress()
		{
			$id=$_GET['id'];
			$model=$this->M('Press');
			$data=$model->conditionselect('press','id,pname,pjianjie',"id='$id'");//var_dump($data);
			$this->display('Admin/modifyPress',$data);
		}

		public function modifyPressHandle()//修改出版社信息
		{
			$pname=$_POST['press_name'];
			$pinfo=$_POST['press_info'];
			$id=$_POST['id'];
			$model=$this->M('Press');
			$result=$model->save('press',"pname='$pname',pjianjie='$pinfo'","id='$id'");
			if($result==true)
			{
				$this->redirect('已修改！','http://localhost/zhixin/index.php?app=Admin&controller=Press&action=pressList');
			}
			else
			{
				$this->redirect('修改失败！');
			}
		}
	}
 ?>