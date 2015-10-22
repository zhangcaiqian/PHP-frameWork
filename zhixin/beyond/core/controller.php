<?php
	/**
	   * 核心控制器类
	   */
	class Controller
	{
		function __construct()
		{
			header('Content-type:text/html;chartset=utf-8');
		}

		protected function loadModel($modelName)//显式加载模型 'Admin/XXX'
		{
			 $model_file = MODEL_PATH.'/'.$modelName.'Model.php';
                if (file_exists($model_file)) 
                {
                    require $model_file;
                } 
                else 
                {
                    trigger_error($view_file.' 模型不存在');
                }
		}

		protected function M($model)//实例化模型
		{
			if(empty($model))
			{
				trigger_error('不能实例化空模型');
			}
			else
			{
				$model_name=$model.'Model';
                return new $model_name;
			}
		}

		protected function loadClass($lib,$auto=TRUE)//加载类库
		{
			if(empty($lib))
			{
				trigger_error('加载类库不能为空');
			}
			else if($auto==true)
			{
				return Beyond::$auto_load_class[$lib];
			}
		}

		protected function loadConfig($config)//加载配置参数
		{
			return Beyond::$config[$config];
		}

		protected function display($path,$data=array())//加载模板类,显示模板
		{
			$template=$this->loadClass('template');
            $template->init($path,$data);
            $template->outPut();
		}

		protected function redirect($jumpInformation,$jumpHref='')//页面跳转提示
		{
			$template=$this->loadClass('template');
			$template->fetchJump($jumpInformation,$jumpHref);
			$template->outPut();
		}
	}  
?>