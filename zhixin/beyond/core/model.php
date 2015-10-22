<?php
	/**
	  * 核心模型类
	  */ 
	class Model
	{
		protected $dbObj=null;

		function __construct()//初始化模型，数据库连接参数传入，加载数据库操作类
		{
			header('Content-type:text/html;chartset=utf-8');
            $this->dbObj=$this->loadClass('mysql');//加载MySQL操作类库,并实例化
            $this->dbObj->init(
                $this->loadConfig('DB_HOST'),
                $this->loadConfig('DB_USER'),
                $this->loadConfig('DB_PASSWORD'),
                $this->loadConfig('DB_NAME'),
                $this->loadConfig('DB_CON'),
                $this->loadConfig('DB_CODING')
            );
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

		protected function table($table_name)//获取表名
		{
           	$tableName=$this->loadConfig('DB_TABLE_PREFIX').$table_name;
           	return "$tableName";
        }
        //////////////////////////////////////////////////////////////////////
        private function mergeArray()//组合查询到的数据
        {
        	$result=array();
        	while($data=$this->dbObj->FetchAssoc())
        	{
        		$result[]=$data;
        	}
			return $result;
        }

        public function select($table)//取出所有记录，返回关联数组
        {
        	$this->dbObj->SelectAll($this->table($table));
        	return $this->mergeArray();
        }

        public function limitselect($table,$rownumber)//限制条数的查询
        {
        	$this->dbObj->LimitSelect($this->table($table),$rownumber);
        	return $this->mergeArray();
        }

        public function conditionselect($table,$field,$condition)//条件查询,表名，字段，条件
       	{
       		$this->dbObj->NormalSelect($this->table($table),$field,$condition);
       		return $this->mergeArray();
       	}

        public function add($table,$field,$content)//添加数据
        {
            if($this->dbObj->Insert($this->table($table),$field,$content))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function save($table,$content,$condition)//修改数据 $content:field='abc'
        {
            if($this->dbObj->Updata($this->table($table),$content,$condition))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function delete($table,$condition)//删除
        {
            if($this->dbObj->Delete($this->table($table),$condition))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
	}
 ?>