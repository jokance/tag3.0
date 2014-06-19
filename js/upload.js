$(function(){
   $('.type').click(function(){
	   updateSlider();
   });
   
  

});
     

function updateSlider(){
	
	
	var feel1=$('input:checked').val();
	var feel2=$('#slide').val();
	var temp_tag=$('#temp_tag').html();

	$('#score').html(feel2);
	if(feel1<=6&&feel1>=1){
		$.ajax({
			type:'post',
			url:'ajax.php',
			data:{
				f1:feel1,
				f2:feel2,
				tag:temp_tag
			},
			success:function(data){
				$('#temp_tag').html(data);
			},
//			error:function(XHR,textStatus,errorThrown){
//				
//			}
		});
//		ajax({
//			method:'post',
//			url:'ajax.php',
//			data:{
//				f1:feel1,
//				f2:feel2,
//				tag:temp_tag
//			},
//			success:function(text){
//				$('#temp_tag').html(text);
//			},
//			async:true
//		});
	}
}


function DrawImage(ImgD,w,h){
    var image=new Image();
    var iwidth = w; //定义允许图片宽度
    var iheight = h; //定义允许图片高度
    image.src=ImgD.src;
    if(image.width>0 && image.height>0){
    flag=true;
    if(image.width/image.height>= iwidth/iheight){
    if(image.width>iwidth){
    ImgD.width=iwidth;
    ImgD.height=(image.height*iwidth)/image.width;
    }else{
    ImgD.width=image.width;
    ImgD.height=image.height;
    }
    ImgD.alt=image.width+"×"+image.height;
    }
    else{
    if(image.height>iheight){
    ImgD.height=iheight;
    ImgD.width=(image.width*iheight)/image.height;
    }else{
    ImgD.width=image.width;
    ImgD.height=image.height;
    }
    ImgD.alt=image.width+"×"+image.height;
    }
    }
}

function add(span){
	$tag=$('#img_tag').val();
	$('#img_tag').val($tag+$(span).html()+' ');
}

function isupload(){
	if($('#file').val()==''){
		alert("请先选择图片！");
		return false;
	}
	return true;
}

function checkNull(){
	if($('#flag').val()=='0'){
		alert('请先确定您选择的图片！');
		return false;
	}
	if($('.type:checked').val()==undefined){
		alert('请选择一个情感类别！');
		return false;
	}
	return true;
}


