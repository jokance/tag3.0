<?php
	header('Content-Type:text/html;charset=utf8');
	require 'include/DB.class.php';
	
	$db=DB::getDB();
// 	$arr=array(array('轻浮','心浮','浮躁','烦乱'),
// 				array('不平','不快','焦躁','烦躁'),
// 				array('腻烦','头疼','讨厌','窝火'),
// 				array('生气','恼火','愤怒','气氛'),
// 				array('敌视','恼恨','愤恨','悲愤'),
// 				array('忿恨','激愤','愤懑','愤慨','暴怒','发火')
// 	);
	
// 	$arr=array(array('困惑','无奈','酸辛','冷淡'),
// 				array('黯淡','消沉','荒凉','沉重'),
// 				array('压抑','忧郁','哀愁','感伤'),
// 				array('伤感','悲伤','惨痛','悲切'),
// 				array('哀戚','悲恸','颓丧','绝望'),
// 				array('失落','沉默','灰心','遗憾','低沉','丧气','心寒','沮丧','低落','不满','负疚','沉痛','心酸','苍凉','郁闷','惆怅','苦闷','烦闷','忧虑','伤心')
// 	);

// 	$arr=array(
// 			array('不安','小心','羞怯','害羞'),
// 			array('揪心','焦虑','着急','担忧'),
// 			array('冷漠','陈腐','丑陋','吓人'),
// 			array('害怕','残酷','冷酷','恶心'),
// 			array('恐惧','惊慌','恐怖','发憷'),
// 			array('无助','绝望','头痛','烦闷','发慌','哀痛','悲戚','悲恸','阴郁','不满','无奈','苍凉','注意','怯场','苦恼','犯愁')
// 	);

// 	$arr=array(
// 			array('新奇','兴奋','激动','华丽'),
// 			array('心虚','迷惑','疑问','奇怪'),
// 			array('震惊','吓人','惊疑','惊讶'),
// 			array('发憷','骇异','诧异','愕然'),
// 			array('惊惧','怕','惶恐','慌乱'),
// 			array('惊奇')
// 	);

// 	$arr=array(	
// 			array('珍惜','赞赏','温馨','激励'),
// 			array('关心','在乎','器重','关注'),
// 			array('挂念','操心','紧张','担心'),
// 			array('期望','向往','羡慕','牵挂'),
// 			array('梦幻','神往','渴望','盼望'),
// 			array('心疼','怜爱','自信','害羞')
// 	);

// 	$arr=array(		
// 			array('舒畅','舒服','松快','留神'),
// 			array('喜欢','乐于','康乐','欣慰'),
// 			array('快乐','高兴','愉快','幸福'),
// 			array('得意','欣喜','喜悦','欢娱'),
// 			array('激昂','亢奋','振奋','热情'),
// 			array('爽心','骄傲','满足','可心','称意','专注','陶醉','沉醉','激情','舒心','高涨','激动','搞笑','宁静','兴奋'));
// 	$str=serialize($arr);
// 	$db->query("INSERT INTO feeltable (feelname,sid) VALUES ('$str','1')");
//  	$result=$db->query("SELECT feelname FROM feeltable WHERE sid='1'");
// 	$row=$result->fetch_object();
// 	$feelname=unserialize(htmlspecialchars_decode($row->feelname));
// 	print_r(setArr($feelname));
	
//	echo date('YmdHis');
// 	$a=substr('123,234,', 0,-1);
// 	$a=explode(',', $a);
// 	print_r($a);
?>