<?php
//工具类
class Tool{
	//图片缩放
	static public function resizeImg($src_img){
		
		$dst_w = 200;
		$dst_h = 160;
		//获取图像信息
		$info = getimagesize('photo/'.$src_img);
		$src_w=$info[0];
		$src_h=$info[1];
		$type= image_type_to_extension($info[2], false);
		if('gif' == $type){
			exit('不允许传gif图像');
		}
		$dst_scale = $dst_h/$dst_w; //目标图像长宽比
		$src_scale = $src_h/$src_w; // 原图长宽比
		
		if($src_scale>=$dst_scale)
		{
			// 过高
			$w = intval($src_w);
			$h = intval($dst_scale*$w);
			$x = 0;
			$y = ($src_h - $h)/3;
		}
		else
		{
			// 过宽
			$h = intval($src_h);
			$w = intval($h/$dst_scale);
			$x = ($src_w - $w)/2;
			$y = 0;
		}
		// 剪裁
		$fun = "imagecreatefrom{$type}";
		$source=$fun('photo/'.$src_img);
		$croped=imagecreatetruecolor($w, $h);
		imagecopy($croped,$source,0,0,$x,$y,$src_w,$src_h);
		// 缩放
		$scale = $dst_w/$w;
		$target = imagecreatetruecolor($dst_w, $dst_h);
		$final_w = intval($w*$scale);
		$final_h = intval($h*$scale);
		imagecopyresampled($target,$croped,0,0,0,0,$final_w,$final_h,$w,$h);
		// 保存
		//$timestamp = time();
		$fun = "image{$type}";
		$fun($target, 'photo/200x160'.$src_img);
		imagedestroy($target);
	}
	

}

?>