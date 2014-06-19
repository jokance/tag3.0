<?php
	class DB{
		//连接数据库
		static public function getDB(){
			//root--用户名
			//123--密码
			//在下边修改为你设置的用户名和密码
			$db=new mysqli('localhost','root','123','tag');
			if(mysqli_connect_errno()){
				echo '数据库连接错误'.mysqli_connect_error();
				exit();
			}
			$db->set_charset('utf8');
			return $db;
		}

	
		//数据库销毁
		static public function unDB(&$_result, &$_db){
			if (is_object($_result)) {
				$_result->free();
				$_result = null;
			}
			if (is_object($_db)) {
				$_db->close();
				$_db = null;
			}
		}
		

	}
?>