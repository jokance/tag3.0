<?php 
	error_reporting(0);
	header('Content-Type:text/html;charset=utf8');
	//接口
	require 'include/DB.class.php';
	require 'include/Image.class.php';
	require 'include/Page.class.php';
	
	$total=Image::total($_GET['sid']);
	$typename=Image::getTypeName($_GET['sid']);
	//分页
	$page=new Page($total, 20);
	$allImages=Image::getAllImages($_GET['sid'],$page->getLimit());	//需要传递一个参数，1-6表示有六个类，这个参数通过Get方式传递进来
	
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>图片情感标签标注系统-<?php echo $typename;?></title> 

<link rel='stylesheet' href='style/style.css' media='screen' />
<link rel="stylesheet" type="text/css" href="style/basic.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/detail.js"></script>
<!--[if lt IE 9]>
<script src="../html5.js"></script>
<![endif]-->
<script type="text/javascript" src="js/blocksit.min.js"></script>

<script>
$(document).ready(function() {
	
	
	$('#container').BlocksIt({
		numOfCol: 4,
		offsetX: 8,
		offsetY: 8
	});
	
	console.log($('#container').height());


});

</script>

</head>
<body>

<!-- Header-->

<?php require 'include/header.inc.php';?>



<!-- Content -->
<section id="wrapper">
<div id="container">
<?php if(empty($allImages)){
	echo '该类下没有图片资源';
}else {
	foreach($allImages as $value){
?>
	<div class="block demo">
		<h3><?php echo $value->bigimg_path;?></h3>
		<p>
		<a class="imgholder" href="show.php?id=<?php echo $value->id;?>" target="_blank">
			<img src="photo/<?php echo $value->bigimg_path;?>" width="210" height="150" alt="" onload="DrawImage(this,100,247) " />
		</a>
		<?php echo trim(trim($value->img_tag).' '.trim($value->user_tag));?>
		</p>
	</div>

<?php }}?>




</div>
</section>
<div id="page"><?php echo $page->showpage();?></div>

</body>
</html>