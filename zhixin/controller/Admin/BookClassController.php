<?php
	/**
	  * 书籍类别控制器
	  */ 
	class BookClassController extends PublicController
	{
		public function bookClassList()//书籍类别列表
		{
			$model=$this->M('BookClass');
			$data=$model->select('class');
			$this->display('Admin/bookClassList',$data);
		}

		public function addBookClass()
		{
			$this->display('Admin/addBookClass');
		}

		public function addBookClassHandle()
		{
			$bookClass=$_POST['book_class'];
			if(empty($bookClass))
			{
				$this->redirect('请填写类别！');
			}
			else
			{
				$model=$this->M('BookClass');
				$result=$model->add('class','cname',"'$bookClass'");
				if($result==true)
				{
					$this->redirect('已添加！','http://localhost/zhixin/index.php?app=Admin&controller=BookClass&action=bookClassList');
				}
				else
				{
					$this->redirect('添加失败！');
				}
			}
		}

		public function deleteBookClass()
		{
			$id=$_GET['id'];
			$model=$this->M('BookClass');
			$result=$model->delete('class',"id='$id'");
			if($result==true)
			{
				$this->redirect('已删除！','http://localhost/zhixin/index.php?app=Admin&controller=BookClass&action=bookClassList');
			}
			else
			{
				$this->redirect('删除失败！');
			}
		}

		public function modifyBookClass()//修改图书类别
		{
			$id=$_GET['id'];
			$model=$this->M('BookClass');
			$data=$model->conditionselect('class','id,cname',"id='$id'");//var_dump($data);
			$this->display('Admin/modifyBookClass',$data);
		}

		public function modifyBookClassHandle()//修改图书类别处理
		{
			$cname=$_POST['book_class'];
			$id=$_POST['id'];
			$model=$this->M('BookClass');
			$result=$model->save('class',"cname='$cname'","id='$id'");
			if($result==true)
			{
				$this->redirect('已修改！','http://localhost/zhixin/index.php?app=Admin&controller=BookClass&action=bookClassList');
			}
			else
			{
				$this->redirect('修改失败！');
			}
		}
	}
 ?>