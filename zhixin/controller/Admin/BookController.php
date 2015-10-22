<?php
	/**
	  *书籍信息控制器
	  */ 
	class BookController extends PublicController
	{
		public function bookList()//书籍列表
		{
			$model=$this->M('Book');
			$data=$model->select('book');
			$this->display('Admin/bookList',$data);
		}

		public function addBook()//添加书籍
		{
			$this->loadModel('Admin/BookClass');//加载模型
			$cModel=$this->M('BookClass');
			$cData=$cModel->select('class');

			$this->loadModel('Admin/Press');//加载模型
			$pModel=$this->M('Press');
			$pData=$pModel->select('press');

			$data=array(
				'class'=>$cData,
				'press'=>$pData
				);
			//var_dump($data);
			$this->display('Admin/addBook',$data);
		}

		public function addBookHandle()
		{
			$bookName=$_POST['book_name'];
			$bookAuthor=$_POST['book_author'];
			$bookClass=$_POST['book_class'];
			$bookPress=$_POST['book_press'];
			$bookTime=$_POST['book_time'];
			$bookInfo=$_POST['book_info'];
			if(empty($bookName)||empty($bookAuthor)||empty($bookTime)||empty($bookInfo))
			{
				$this->redirect('请填写完整信息');
			}
			else
			{
				$model=$this->M('Book');
				$result=$model->add('book','bname,bauthor,bclass,bpress,btime,bjianjie',"'$bookName','$bookAuthor','$bookClass','$bookPress','$bookTime','$bookInfo'");
				if($result==true)
				{
					$this->redirect('已添加！','http://localhost/zhixin/index.php?app=Admin&controller=Book&action=bookList');	
				}
				else
				{
					$this->redirect('添加失败！');
				}
			}
		}
	}
 ?>