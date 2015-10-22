<?php
	/**
	  * 首页控制器
	  */ 
	class IndexController extends Controller
	{
		public function index()
		{
			//$model=$this->M('Index');
			//$data=$model->conditionselect('nav1','module,id','id=1');
			//var_dump($data);
			//$this->redirect('失败！');
			$this->display('Home/index');
		}
	}
 ?>