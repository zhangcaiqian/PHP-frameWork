<?php
	/**
	  * url处理类
	  */
	final class Route
	{
		public $url_query;
		public $url_type;
		public $url_array=array();

		public function __construct() {
                $this->url_query=parse_url($_SERVER['REQUEST_URI']);//解析url的组成      
        }

        public function setUrlType($url_type = 2)//设置url模式
        {
                if($url_type > 0 && $url_type <3)
                {
                    $this->url_type=$url_type;
                }
                else
                {
                    trigger_error("指定的URL模式不存在！");
                }
        }

        public function setUrl()//组合url的不同形式
        {
        	if($this->url_type==1)
        	{
        		$this->queryToArray();
        	}
        	else if($this->url_type==2)
        	{
        		$this->queryToPathInfo();
        	}
        }

        public function queryToArray()//将查询转换为数组形式
        {
        	$queryArray=!empty($this->url_query)?explode('&', $this->url_query['query']):array();
        	$item=array();
        	$arr=array();
        	if(count($queryArray)>0)
        	{
        		foreach($queryArray as $v)
        		{
        			$item=explode('=',$v);
        			$arr[$item[0]]=$item[1];
        		}

        		if(isset($arr['app']))
        		{
        			$this->url_array['app']=$arr['app'];
        			unset($arr['app']);
        		}

        		if(isset($arr['controller']))
        		{
        			$this->url_array['controller']=$arr['controller'];
        			unset($arr['controller']);
        		}

        		if(isset($arr['action']))
        		{
        			$this->url_array['action']=$arr['action'];
        			unset($arr['action']);
        		}

        		if(count($arr)>0)
        		{
        			$this->url_array['params']=$arr;
        		}
        	}
        	else
        	{
        		$this->url_array=array();
        	}
        }

        public function getUrlToArray()//返回组合后的url数组
        {
            $this->setUrl();
            return $this->url_array;
        }
	}
 ?>