<?php
class Image{
	//取出最新图片
	static public function getImages(){
		$db=DB::getDB();
		$results=$db->query("SELECT * FROM images t WHERE 12>(SELECT count(*) FROM images WHERE t.sid=sid AND date>t.date)");
		$resArr=array();
		while(!!$rows=$results->fetch_object()){
			$resArr[]=$rows;
		}
		return $resArr;
		DB::unDB($results, $db);
	}
	
	//分页取出图片
	static public function getAllImages($sid,$limit){
		$db=DB::getDB();
		$sql="SELECT id,sid,bigimg_path,img_path,img_tag,user_tag,date FROM images WHERE sid='$sid' order by date desc limit $limit";
		$results=$db->query($sql);
		$resArr=array();
		while(!!$rows=$results->fetch_object()){
			$resArr[]=$rows;
		}
		
		DB::unDB($results, $db);
		return $resArr;
	}
	
	//计算某个类下的图片总数
	static public function total($sid){
		$db=DB::getDB();
		$result=$db->query("select count(id) num from images where sid='$sid'");
		$row=$result->fetch_assoc();
		$total=$row['num'];
		DB::unDB($result, $db);
		return $total;
	}
	//取出一张图片
	static public function getOneImage($id){
		$db=DB::getDB();
		$result=$db->query("SELECT id,sid,bigimg_path,img_path,img_tag,user_tag,date FROM images WHERE id='$id'");
		$row=$result->fetch_object();
		DB::unDB($result, $db);
		return $row;
		
	}
	
	//修改一张图片
	static public function updateImage($data){
		$db=DB::getDB();
		$db->query("update images set sid='{$data['type']}',img_tag='{$data['img_tag']}',user_tag='{$data['user_tag']}' where id='{$data['id']}'");
		$num=$db->affected_rows;
		$db->close();
		return $num;
		
	}
	
	//删除一张图片
	static public function delImage($id){
		$db=DB::getDB();
		$db->query("delete from images where id='$id'");
		$num=$db->affected_rows;
		$db->close();
		return $num;
	}
	//取出类名
	static public function getTypeName($id){
		$db=DB::getDB();
		$sql="select feelname from feeltype where id='$id'";
		$res=$db->query($sql);
		$row=$res->fetch_assoc();
		DB::unDB($res, $db);
		return $row['feelname'];
	}
	//取出指定类别的部分图片
	static public function getTypeImages($sid){
		$db=DB::getDB();
		$sql="select * from images where sid='$sid' order by date desc limit 0,10";
		$res=$db->query($sql);
		while(!!$rows=$res->fetch_object()){
			$resArr[]=$rows;
		}
		DB::unDB($res, $db);
		return $resArr;
		
	}
}
?>