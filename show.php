<?php 
	error_reporting(0);
	header('Content-Type:text/html;charset=utf8');
	require 'include/DB.class.php';
	require 'include/Image.class.php';
	//删除图片
	if($_GET['action']=='del'){
		if(Image::delImage($_GET['id'])=='1'){
			unlink('photo/'.$_GET['path']);
			unlink('photo/200x160'.$_GET['path']);
			echo '<script>alert("图片删除成功！");location.href="index.php";</script>';
			exit();
		}
	}
	
	$image=Image::getOneImage($_GET['id']);
	if(empty($image)){
		echo '<script>alert("图片不存在！");location.href="index.php";</script>';
	}
	$typename=Image::getTypeName($image->sid);
	
	//修改图片
	if($_GET['action']=='update'){
		if(Image::updateImage($_POST)=='1'){
			echo '<script>alert("图片修改成功！");</script>';
		}else{
			echo '<script>alert("图片修改失败！");</script>';
		}
	}
	

	
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>图片情感标签标注系统-详情页</title> 
<link rel="stylesheet" type="text/css" href="style/basic.css"/>
<link rel="stylesheet" type="text/css" href="style/show.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/show.js"></script>
<!--[if lt IE 9]>
<script src="../html5.js"></script>
<![endif]-->

</head>
<body>
<?php require 'include/header.inc.php';?>
	
	<div id="show">
		<h2>图片详细信息</h2>
		
		<img id="small_img" alt="图片" src="photo/<?php echo $image->img_path;?>">
		<div id="big_img"><img alt="大图" style="max-width:800px" src="photo/<?php echo $image->bigimg_path;?>" /></div>
		<div id="info">
		<form method="post" action="?action=update&id=<?php echo $image->id;?>">
			<input type="hidden" id="sid" value="<?php echo $image->sid;?>">
			<input type="hidden" id="id" name="id" value="<?php echo $image->id;?>">
				<ul>
					<li>图片名称：<span><?php echo $image->bigimg_path;?></span></li>
					<li>图片类别：<select name="type"><option value="6">愉快</option>
													<option value="5">期望</option>
													<option value="4">惊讶</option>
													<option value="3">恐惧</option>
													<option value="2">悲伤</option>
													<option value="1">愤怒</option>
													</select></li>
					<li>上传时间：<span><?php echo $image->date;?></span></li>
					<li>情感标签：<input type="text" name="img_tag" value="<?php echo $image->img_tag;?>" class="text"/> （*词之间用空格隔开）</li>
					<li>用户标签：<input type="text" name="user_tag" value="<?php echo $image->user_tag;?>" class="text"/> （*词之间用空格隔开）</li>
				</ul>
			<input type="submit" class="submit" value="修改" onclick="return confirm('确认修改吗？');"/>
			<a href="?action=del&path=<?php echo $image->bigimg_path;?>&id=<?php echo $image->id;?>" onclick="return confirm('确定删除该图吗？');" id="del">删除该图</a>
		</form>
		
		</div>
	</div>

</body>
</html>










