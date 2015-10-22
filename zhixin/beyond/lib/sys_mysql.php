<?php
	/**
	  * MySQL 数据库操作类
	  */ 
	class Mysql
	{
		private $mHost;//主机
		private $mUser;//用户
		private $mPassword;//密码
		private $mDbName;//数据库名
		private $mConnect;//连接
		private $mCoding;//数据库编码

		private $mSql;//执行的sql语句
		private $mResult;//返回查询结果

		function __destruct()//析构函数，释放连接
		{
			@mysql_close($this->mConnect);//屏蔽警告
		}

		public function init($host,$user,$password,$dbname,$connect,$coding)
		{
			$this->mHost=$host;
			$this->mUser=$user;
			$this->mPassword=$password;
			$this->mDbName=$dbname;	//数据库名
			$this->mConnect=$connect;
			$this->mCoding=$coding;
			$this->SetConnect();
		}

		private function SetConnect()//连接数据库
		{
			if($this->mConnect=='pcon')
			{
				$this->mConnect=mysql_pconnect($this->mHost,$this->mUser,$this->mPassword);
			}
			else
			{
				$this->mConnect=mysql_connect($this->mHost,$this->mUser,$this->mPassword);
			}

			if(!$this->mConnect)
			{
				echo '无法连接数据库';
				die(mysql_error());
			}
			else
			{
				if(!mysql_select_db($this->mDbName,$this->mConnect))
				{echo '123';  echo $this->mDbName;
					echo 'database'.$this->mDbName.'can not use';
					die();
				}
			}
			mysql_query("SET NAMES $this->mCoding");//设置数据库编码
		}

		public function query($sql)//查询，可执行任何查询语句
		{//echo $sql;die();
			if($sql=='')
			{
				echo '查询语句有误，请检查';
				die();
			}
			else
			{
				$this->mSql=$sql;
				$result=mysql_query($this->mSql,$this->mConnect);
				if(!result)
				{
					echo '查询语句执行有误';
					die();
				}
				else
				{
					$this->mResult=$result;
				}
			}

			return $this->mResult;
		}

		public function FetchArray()//获取数据数组，关联，数字索引
		{
			return mysql_fetch_array($this->mResult);
		}

		public function FetchAssoc()//获取关联数组
		{
			return mysql_fetch_assoc($this->mResult);
		}

		public function FetchRow()//获取数字索引数组
		{
			return mysql_fetch_row($this->mResult);
		}

		public function FetchObject()//获取对象数组
		{
			return mysql_fetch_object($this->mResult);
		}

		public function SelectAll($table)//查询表中的所有记录集
		{
			$this->query("SELECT * FROM $table");
		}

		public function NormalSelect($table,$fieldName='*',$condition='')//查询指定记录或字段，条件查询，传入参数(表名，字段名，查询条件)
		{
			if($condition=='')
			{
				$this->query("SELECT $fieldName FROM $table");//默认取所有字段
			}
			else
			{
				$condition='WHERE '.$condition;//条件查询
				$this->query("SELECT $fieldName FROM $table $condition");
			}
		}

		public function LimitSelect($table,$offsetline)
		{
			$this->query("SELECT * FROM $table limit 0,$offsetline");
		}

		public function Delete($table,$condition='')//简化删除，条件删除
		{
			$isSuccess=null;
			$condition='WHERE '.$condition;
			if($this->query("DELETE FROM $table $condition"))
			{
				$isSuccess=true;
			}
			else
			{
				$isSuccess=flase;
			}
			return $isSuccess;
		}

		public function Updata($table,$fieldName,$condition)//简化修改，条件修改
		{
			$isSuccess=null;
			$condition='WHERE '.$condition;
			if($this->query("UPDATE $table SET $fieldName $condition"))
			{
				$isSuccess=true;
			}
			else
			{
				$isSuccess=false;
			}
			return $isSuccess;
		}

		public function Insert($table,$fieldName,$values)//简化插入,表名，字段，字段值
		{
			$isSuccess=null;
			if($this->query("INSERT INTO $table ($fieldName) VALUES ($values)"))
			{
				$isSuccess=true;
			}
			else
			{
				$isSuccess=false;
			}
			return $isSuccess;
		}
	}
 ?>