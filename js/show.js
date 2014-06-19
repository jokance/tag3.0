$(function(){
	

	//修改情感类别
	for(var i=0;i<$('select option').size();i++){
		if($('select option').eq(i).val()==$('#sid').val()){
			$('select option').eq(i).attr('selected','selected');
		}
	}
	
	//查看大图
	$('#small_img').mousemove(function(e){
		$('#big_img').css('display','block').css('top',e.clientY-60).css('left',e.clientX+50);
	});
	$('#small_img').mouseout(function(){
		$('#big_img').css('display','none');
	});
	
});








