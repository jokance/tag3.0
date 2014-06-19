<?php
	error_reporting(0);
	header("Content-Type:text/html;charset=utf-8");
	require 'include/DB.class.php';
	$f1=$_POST["f1"];
	$f2=floor($_POST["f2"]);
	$tag=substr($_POST['tag'], 0,-1);
	$flag=false;	//判断tag是否为空
	if(empty($tag)){
		$flag=true;
	}else{
		$flag=false;
		$tag=explode(',', $tag);
	}
	
	$db=DB::getDB();
	$result=$db->query("SELECT feelname FROM feeltable WHERE sid='$f1'");
	$row=$result->fetch_object();
	$feelname=unserialize(htmlspecialchars_decode($row->feelname));
	
	if($f2!='0'){
		$temp='';
		$feelRand=array_rand($feelname[$f2-1],3);
		$feelTag='<span onclick="add(this)">'.$feelname[$f2-1][$feelRand[0]].'</span><span onclick="add(this)">'.$feelname[$f2-1][$feelRand[1]].'</span>'.'<span onclick="add(this)">'.$feelname[$f2-1][$feelRand[2]].'</span>';
		echo $feelTag;

		
	}else{
		$feelname=setArr($feelname);
		if(!$flag) $feelname=array_diff($feelname,$tag);
		
		if(count($feelname)<2) exit();
		$feelRand=array_rand($feelname,2);
		$feelTag='<span onclick="add(this)">'.$feelname[$feelRand[0]].'</span><span onclick="add(this)">'.$feelname[$feelRand[1]].'</span>';
		echo $feelTag;		
 	}

	
	
	function setArr($arr){
		$feelArr=array();	//一维数组，用于保存一个类的所有情感
		for($i=0;$i<count($arr);$i++){
			for($j=0;$j<count($arr[$i]);$j++){
				$feelArr[]=$arr[$i][$j];
			}
		}
		return $feelArr;
	}
	

	
	
	
?>