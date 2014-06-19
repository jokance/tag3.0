<?php
	error_reporting(0);
	header('Content-Type:text/html;charset=utf8');
	require 'include/DB.class.php';	
	require 'include/Image.class.php';
	$results=Image::getImages();
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>图片情感标签标注系统-主页</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/basic.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/upload.js"></script>
</head>
<body>
<?php require 'include/header.inc.php';?>
	
<div id="main">
	<div id="bar">
		<ul>
			<li class="select">愉快</li>
			<li>期望</li>
			<li>惊讶</li>
			<li>恐惧</li>
			<li>悲伤</li>
			<li>愤怒</li>
		</ul>
	</div>	
	<div class="old type1">
	<a href="detail.php?sid=6" target="_blank" class="more">查看更多</a>
		<dl class="list_dl">
					<?php foreach ($results as $value){
						if($value->sid==6){
						$tag=trim($value->img_tag).' '.trim($value->user_tag);
						$tag=trim($tag);
							if(empty($tag)){
								$tag=null;
							}else{
								//$tag=explode(',', $tag);
								$tag=preg_split('/，|,|\s/', $tag);
							}
						
					?>
						
						<dd><a href="show.php?id=<?php echo $value->id;?>" target="_blank"><img src="photo/<?php echo $value->img_path;?>"/><?php if($tag!=null){?><span></span><?php }?><ul><?php for($i=0;$i<count($tag);$i++){?><li><?php echo $tag[$i];if($i==2) break;?></li><?php }?></ul></a></dd>
					<?php }}?>
		</dl>
		
		
	</div>
	
	<div class="old type2">
	<a href="detail.php?sid=5" target="_blank" class="more">查看更多</a>
		<dl class="list_dl">
					<?php foreach ($results as $value){
						if($value->sid==5){
						$tag=trim($value->img_tag).' '.trim($value->user_tag);
						$tag=trim($tag);
							if(empty($tag)){
								$tag=null;
							}else{
								$tag=preg_split('/，|,|\s/', $tag);
							}
						
					?>
						
						<dd><a href="show.php?id=<?php echo $value->id;?>" target="_blank"><img src="photo/<?php echo $value->img_path;?>"/><?php if($tag!=null){?><span></span><?php }?><ul><?php for($i=0;$i<count($tag);$i++){?><li><?php echo $tag[$i];if($i==2) break;?></li><?php }?></ul></a></dd>
					<?php }}?>
		</dl>
		
	</div>
	<div class="old type3">
	<a href="detail.php?sid=4" target="_blank" class="more">查看更多</a>
		<dl class="list_dl">
					<?php foreach ($results as $value){
						if($value->sid==4){
						$tag=trim($value->img_tag).' '.trim($value->user_tag);
						$tag=trim($tag);
							if(empty($tag)){
								$tag=null;
							}else{
								$tag=preg_split('/，|,|\s/', $tag);
							}
						
					?>
						
						<dd><a href="show.php?id=<?php echo $value->id;?>" target="_blank"><img src="photo/<?php echo $value->img_path;?>"/><?php if($tag!=null){?><span></span><?php }?><ul><?php for($i=0;$i<count($tag);$i++){?><li><?php echo $tag[$i];if($i==2) break;?></li><?php }?></ul></a></dd>
					<?php }}?>
		</dl>
		
	</div>
	
	<div class="old type4">
	<a href="detail.php?sid=3" target="_blank" class="more">查看更多</a>
		<dl class="list_dl">
					<?php foreach ($results as $value){
						if($value->sid==3){
						$tag=trim($value->img_tag).' '.trim($value->user_tag);
						$tag=trim($tag);
							if(empty($tag)){
								$tag=null;
							}else{
								$tag=preg_split('/，|,|\s/', $tag);
							}
						
					?>
						
						<dd><a href="show.php?id=<?php echo $value->id;?>" target="_blank"><img src="photo/<?php echo $value->img_path;?>"/><?php if($tag!=null){?><span></span><?php }?><ul><?php for($i=0;$i<count($tag);$i++){?><li><?php echo $tag[$i];if($i==2) break;?></li><?php }?></ul></a></dd>
					<?php }}?>
		</dl>
		
	</div>
	<div class="old type5">
	<a href="detail.php?sid=2" target="_blank" class="more">查看更多</a>
		<dl class="list_dl">
					<?php foreach ($results as $value){
						if($value->sid==2){
						$tag=trim($value->img_tag).' '.trim($value->user_tag);
						$tag=trim($tag);
							if(empty($tag)){
								$tag=null;
							}else{
								$tag=preg_split('/，|,|\s/', $tag);
							}
						
					?>
						
						<dd><a href="show.php?id=<?php echo $value->id;?>" target="_blank"><img src="photo/<?php echo $value->img_path;?>"/><?php if($tag!=null){?><span></span><?php }?><ul><?php for($i=0;$i<count($tag);$i++){?><li><?php echo $tag[$i];if($i==2) break;?></li><?php }?></ul></a></dd>
					<?php }}?>
		</dl>
		
	</div>
	<div class="old type6">
	<a href="detail.php?sid=1" target="_blank" class="more">查看更多</a>
		<dl class="list_dl">
					<?php foreach ($results as $value){
						if($value->sid==1){
						$tag=trim($value->img_tag).' '.trim($value->user_tag);
						$tag=trim($tag);
							if(empty($tag)){
								$tag=null;
							}else{
								$tag=preg_split('/，|,|\s/', $tag);
							}
						
					?>
						
						<dd><a href="show.php?id=<?php echo $value->id;?>" target="_blank"><img src="photo/<?php echo $value->img_path;?>"/><?php if($tag!=null){?><span></span><?php }?><ul><?php for($i=0;$i<count($tag);$i++){?><li><?php echo $tag[$i];if($i==2) break;?></li><?php }?></ul></a></dd>
					<?php }}?>
		</dl>
		
	</div>
</div>





	
	
</body>
</html>