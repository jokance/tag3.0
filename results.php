<?php 
	
	header('Content-Type:text/html;charset=utf8');
	if(isset($_POST['search_text'])){
		require 'include/DB.class.php';
		require 'include/Image.class.php';
		$db=DB::getDB();
		$words=trim($_POST['search_text']);
		//$words=preg_split('/,|，|\s/', $words);
		$allRes=array();

		$res=$db->query("select * from images where img_tag like '%$words%'");
		while(!!$row=$res->fetch_assoc()){
			$allRes[]=$row;
		}
		DB::unDB($res, $db);
	}

	
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>图片情感标签标注系统-结果页</title> 

<link rel='stylesheet' href='style/style.css' media='screen' />
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<script src="js/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="../html5.js"></script>
<![endif]-->
<script src="js/blocksit.min.js"></script>

<script>

$(document).ready(function() {
	
	
	$('#container').BlocksIt({
		numOfCol: 4,
		offsetX: 8,
		offsetY: 8
	});
	
	console.log($('#container').height());

	$('#header .search_box').blur(function(){
		$(this).animate({
			width:150
		});
	});
});

</script>

</head>
<body>

<!-- Header-->
<?php require 'include/header.inc.php';?>
<div id="upload">
	<div id="text">
		<a><?php echo $_POST['search_text']?>--检索结果</a>
	</div>	
</div>



<!-- Content -->
<section id="wrapper">
<div id="container">
	<?php 
	if(empty($allRes)){
		echo '无检索结果......';
	}else{
	for($i=0;$i<count($allRes);$i++){?>
	<div class="block demo">
		<h3><?php echo $allRes[$i]['bigimg_path'];?></h3>
		<p>
		<a class="imgholder" href="show.php?id=<?php echo $allRes[$i]['id'];?>">
			<img src="photo/<?php echo $allRes[$i]['img_path'];?>" width="210" height="150" alt="" onload="DrawImage(this,100,247) " />
		</a>
		<?php echo trim(trim($allRes[0]['img_tag']).' '.trim($allRes[0]['user_tag']));?>
		</p>
	</div>
	<?php }}?>
</div>
</section>


</body>
</html>