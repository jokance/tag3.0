<?php 
	error_reporting(0);
	session_start();
	header('Content-Type:text/html;charset=utf8');
	require 'include/Tool.class.php';
	date_default_timezone_set('PRC');
	if($_GET['action']=='img'){
		$type=$_FILES['userimg']['type'];
		$ext=substr($type,-(strlen($type)-6));
		if($ext=='jpeg') $ext='jpg';
		if (is_uploaded_file($_FILES['userimg']['tmp_name'])) {
			$imgName=date('YmdHis').'.'.$ext;
			
			if (!move_uploaded_file($_FILES['userimg']['tmp_name'],'photo/'.$imgName)) {
				echo '<script>alert("图片上传失败，请重新选择文件！");</script>';
				exit();
			}else{
				
				Tool::resizeImg($imgName);
				//$_SESSION['imgName']=$imgName;
			}
		} else {
			echo '<script>alert("非法进入！");</script>';
		}
	}
	
	if($_GET['action']=='upload'){
		require 'include/DB.class.php';
		$db=DB::getDB();
		$imgValue=$_POST['feel'];
		$path=$_POST['name'];
		$db->query("INSERT INTO images (sid,bigimg_path,img_path,img_value,img_tag,user_tag,date) VALUES ('{$_POST['type']}','$path','200x160$path','$imgValue','{$_POST['img_tag']}','{$_POST['user_tag']}',NOW())");
		if($db->affected_rows){
			echo '<script>alert("上传图片成功！");location.href="index.php";</script>';
		}else{
			echo '<script>alert("上传图片失败！");history.back();</script>';
 		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传图片</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel='stylesheet' href='style/upload.css' media='screen' />

<script type="text/javascript" src="js/upload.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>

<div id="main">
	<div id="text">
		<h2>上传图片</h2>
	</div>
	
	
	<form method="post" action="?action=img" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<input type="hidden" id="flag" value="<?php $flag=$_GET['action']=='img'?1:0;echo $flag;?>" />
		<div id="left">
				<span>
						<img id="show" src="photo/<?php if(empty($imgName)){echo 'zanwu.jpg';}else{echo $imgName;} ?>" onload="DrawImage(this,200,300) "/>	
				</span>	
				<input type="file" name="userimg" id="file"/>
				<input type="submit" name="submit" value="确定" onclick="return isupload();"/>
		</div>
	</form>
	<form method="post" action="?action=upload">
		<div id="right">
			<div id="temp_tag"></div>
			<input type="text" name="img_tag" id="img_tag" placeholder="请选择自动标签"/>
			<dl>
				<dd>图片名称</dd>
				<dd><input type="text" readonly="readonly" name="name" class="text" value="<?php echo $imgName;?>"></dd>
				<dd>情感分类：</dd>
					<dd><label><input type="radio" name="type" value="6" class="type"/>愉快</label><label><input type="radio" name="type" value="5" class="type"/>期望</label><label><input type="radio" name="type" value="4" class="type"/>惊讶</label><label><input type="radio" name="type" value="3" class="type"/>恐惧</label><label><input type="radio" name="type" value="2" class="type"/>悲伤</label><label><input type="radio" name="type" value="1" class="type"/>愤怒</label></dd>
					<dd>1<input id="slide" type="range" min="1" max="6.9" step="0.1" name="feel" value="0" onchange="updateSlider()" />7 情感强度:<span id="score" style="color:red">0</span>	分</dd>
					
				<dd>用户自定义标签：</dd>
				<dd>	<input type="text" name="user_tag" class="text" id="tag"></dd>
			
				<dd class="set"><input type="reset" name="reset" value="重置" class="button"/><input type="submit" name="submit" class="button" onclick="return checkNull();" value="上传"></dd>
			</dl>
		</div>
	</form>
	
	<span class="line"></span>
	
</div>




</body>
</html>