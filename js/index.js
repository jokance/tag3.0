$(function(){
	
	$('#bar ul li').click(function(){
		$('#bar ul li').removeClass('select');
		$(this).addClass('select');
		$('.old').hide();
		$('.old').eq($('#bar ul li').index(this)).show();

	});
	
});

function isempty(){
	if($('.search_box').val()==''){
		return false;
	}
	return true;
}