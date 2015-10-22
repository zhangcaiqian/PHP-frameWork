<?php
	/**
	  * 框架驱动类
	  */ 
	define('SYSTEM_PATH',dirname(__FILE__));
	define('ROOT_PATH',substr(SYSTEM_PATH,0,-7));
	define('SYS_LIB_PATH', SYSTEM_PATH.'/lib');
	define('APP_LIB_PATH', ROOT_PATH.'/lib');
	define('SYS_CORE_PATH', SYSTEM_PATH.'/core');
    define('SYS_TEMPLATE_PATH',SYSTEM_PATH.'/template');//系统模板文件路径
	define('CONTROLLER_PATH', ROOT_PATH.'/controller');
	define('MODEL_PATH', ROOT_PATH.'/model');
	define('VIEW_PATH',ROOT_PATH.'/view');
    define('ADMIN_PUBLIC_CLASS', ROOT_PATH.'/controller');
    define('__PUBLIC__','view/Home/Public');
    //define('__PUBLIC__',substr(str_replace('\\','/',ROOT_PATH.'/Public'),15));
	//define('LOG_PATH', ROOT_PATH.'/error/');
	final class Beyond
	{
		public static $auto_load_class=null;    //存储自动加载的类对象
		public static $config=null;

		//function __construct()
		//{
		//	header('Content-type:text/html;chartset=utf-8');
		//}

		public static function init()
		{
			self::setAutoLoadClass();
			require SYS_CORE_PATH.'/model.php';
            require SYS_CORE_PATH.'/controller.php';
            require ADMIN_PUBLIC_CLASS.'/PublicController.php';//后台公共控制器
		}

		public static function setAutoLoadClass()//加载系统类库
		{
			self::$auto_load_class=array(
				'route'=>SYS_LIB_PATH.'/sys_route.php',
				'mysql'=>SYS_LIB_PATH.'/sys_mysql.php',
				'template'=>SYS_LIB_PATH.'/sys_template.php'
				);
		}

		public static function autoLoadObject()//实例化自动加载的系统类
		{
			foreach(self::$auto_load_class as $key => $value)
			{
                require(self::$auto_load_class[$key]);
                $lib=ucfirst($key);
                self::$auto_load_class[$key] = new $lib;                   
            }
		}

		public static function start($CONFIG=array())
		{
			self::$config=$CONFIG;
			self::init();
			self::autoLoadObject();
			self::$auto_load_class['route']->setUrlType(self::$config['URL_TYPE']);//设置url模式
			$url_array=self::$auto_load_class['route']->getUrlToArray();//将url转换为数组
			self::routeToCm($url_array);
		}

		 public static function routeToCm($url_array = array())//转发url路由参数
		 {
            	$app='';
                $controller='';
                $action='';
                $model='';
                $params='';
                if(isset($url_array['app']))
                {
                    $app = $url_array['app'];//若传入模块参数，则转向相应的模块
                }
                else if(!empty(self::$config['DEFAULT_APP']))
                {
                    $app=self::$config['DEFAULT_APP'];//若设置模块分组，则转向默认模块，否则进入controller根目录
                }
                
                if(isset($url_array['controller']))//若设置控制器参数，则转向相应控制器，否则转向默认控制器
                {
                        $controller=$model=$url_array['controller'];
                        if($app)//若设置应用分组，则转发到相应的分组，否则转发到控制器根目录
                        {
                                $controller_file=CONTROLLER_PATH.'/'.$app.'/'.$controller.'Controller.php';
                                $model_file=MODEL_PATH.'/'.$app.'/'.$model.'Model.php';
                        }
                        else
                        {
                                $controller_file=CONTROLLER_PATH.'/'.$controller.'Controller.php';
                                $model_file=MODEL_PATH.'/'.$model.'Model.php';
                        }
                }
                else
                {
                    $controller = $model = self::$config['DEFAULT_CONTROLLER'];
                    if($app)
                    {
                        $controller_file = CONTROLLER_PATH.'/'.$app.'/'.self::$config['DEFAULT_CONTROLLER'].'Controller.php';
                        $model_file = MODEL_PATH.'/'.$app.'/'.self::$config['DEFAULT_CONTROLLER'].'Model.php';
                    }
                    else
                    {
                        $controller_file = CONTROLLER_PATH.'/'.self::$config['DEFAULT_CONTROLLER'].'Controller.php';
                        $model_file = MODEL_PATH.'/'.self::$config['DEFAULT_CONTROLLER'].'Model.php';
                    }
                }

                if(isset($url_array['action']))
                {
                    $action=$url_array['action'];
                }
                else
                {
                    $action = self::$config['DEFAULT_ACTION'];
                }
                
                if(isset($url_array['params']))
                {
                    $params = $url_array['params'];
                }
                if(file_exists($controller_file))
                {
                    if(file_exists($model_file)) 
                    {
                        require $model_file;
                    }
                    require $controller_file;
                    $controller = $controller.'Controller';
                    $controller = new $controller;
                    if($action)
                    {
                        if(method_exists($controller, $action))
                        {
                            isset($params) ? $controller ->$action($params) : $controller ->$action();
                        }
                        else
                        {
                            die('控制器方法不存在');
                        }
                    }
                    else
                    {
                        die('控制器方法不存在');
                    }
                }
                else
                {
                    die('控制器不存在');
                }
        }
	}
 ?>