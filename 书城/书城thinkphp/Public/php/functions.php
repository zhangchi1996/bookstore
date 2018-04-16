<?php

	#查询
	function select($table,$fields,$where,$order,$limit){
		global $link;
		$sql = SelectSql($table,$fields,$where,$order,$limit);
		
		#result是一个对象，告诉我们查询成功，但数据还在服务器上没有返回
		$result = mysqli_query($link,$sql);
		
		#mysqli_fetch_all : 将查询的结果集从mysql服务器上取来,它的参数是mysqli_query执行后的返回值
		#MYSQL_NUM  ：只返回数字下标
		#MYSQL_ASSOC：只返回关联下标
		#MYSQL_BOTH ：将得到一个同时返回数字和关联下标的数组
		
		return mysqli_fetch_all($result,MYSQL_ASSOC);
	};
	
	#修改
	function update($table,$array,$where){
		global $link;
		$sql = UpdateSql($table, $array, $where);
		mysqli_query($link, $sql);
	}
	
	#增加
	function insert($table, $array){
		global $link;
		$sql = InsertSql($table, $array);
//		echo $sql;
		$result = mysqli_query($link, $sql);
		return $result;
	}
	
	#删除
	function delete($table, $where){
		global $link;
		$sql = DeleteSql($table, $where);
		return mysqli_query($link, $sql);
	}
	
	
	function upload($uploadfile,$path){
		#print_r($uploadfile);
		$picname = mt_rand(1000,9999);
		$picname.= $uploadfile['name'];
		if(move_uploaded_file($uploadfile['tmp_name'],$path.$picname)){
			return $picname;
		} else {
			return false;
		}
	}
	/*
	创建保存信息的函数
	$array		array	包含需要保存信息的字段
	$str			string	用什么分隔符拼接字符串
	**/
	function save($array, $str, $dataFile){
		$data = implode($array,$str)."\n";
		if(file_put_contents($dataFile, $data, FILE_APPEND)){
			return true;
		} else {
			return false;
		}
	}
	/**
	insert 插入sql语句
	@param	$table	string	 表名
	@param	$fields	string	 字段
	**/
	function InsertSql($table, $fields){
		#insert into 表名 set key = value
		$insert = "insert into ";
		$insert.= $table;
		$insert.= " set ";
		foreach($fields as $key=>$value){
			$insert.="`$key` = '".addslashes($value)."',";
		}
		$insert = rtrim($insert,",");
		return $insert;
	}
	
	/**
	delete 删除sql语句
	@param	$table	string	 表名
	@param	$where	string	 条件
	**/
	function DeleteSql($table,$where){
		$delete = "delete from `$table` where $where";
		return $delete;
	}
	
	/**
	update 修改sql语句
	@param	$table	string	 表名
	@param	$fields	string	 字段
	@param	$where	string	 条件
	**/
	function UpdateSql($table, $fields, $where){
		#	update students set name='upd' where id = 15
		$update = "update ";
		$update.= $table;
		$update.= " set ";
		foreach($fields as $key=>$value){
			$update.= "`$key` = '".$value."',";
		}
		$update = rtrim($update,",");
		$update.= " where ".$where;
		return $update;
	}
	 
	/**
	select 查询sql语句
	@param	$table				string	 		表名
	@param	$fields				string	 		(*|多字段，分隔符为逗号)
	@param	$where				string	 		条件
	@param	$groupField=null		string	 		分组查询字段
	@param	$order				array	 		([字段，排序方式])
	@param	$limit				string/array	 	查询限制条数
	**/
	function SelectSql($table, $fields, $where, $order, $limit, $groupField=null){
		$select = " select $fields from `$table` ";
		#判定有没有传入条件
		if(!empty($where)){
			$select.= " where $where ";
		}
		#判定排序要求
		if(!empty($order)){
			$select.= " order by {$order[0]} {$order[1]} ";
		}
		#判定是否需要分组查询
		if(!empty($groupField)){
			$select.= " group by $groupField ";
		}
		#判定limit是否为数组
		if(is_array($limit)){
			$select.= " limit {$limit[0]},{$limit[1]} ";
		} else {
			if(!empty($limit)){
				$select.= " limit $limit";
			}
		}
		return $select;
	}

	
?>