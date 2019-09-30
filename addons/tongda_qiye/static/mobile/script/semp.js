
$(function(){
	$('.fixedNavBut').click(function(){
		$('.NMore_1002').attr('state','open');
		$('.Nzz').css('display','block');
		//$('.NMore_1002').css('right','-100%')
	});
	
	$('.Nzz').click(function(){
	$('.NMore_1002').attr('state','close');
	$('.Nzz').css('display','none');
});
});
