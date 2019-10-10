// JavaScript Document
$(document).ready(function () {

    resminHei();
    function resminHei() {
        var _win_h = $(window).height();
		var _header_h = $('.header').height();
		$(".leftsidebar").css("min-height", _win_h - _header_h+'px');
    }
   
	$(window).on('resize',resminHei);
	$(window).on('load',resminHei);
	
	
	
	if($(window).width()<768){
		
	  $('#side-menu').children('li').hover(function () {
		   $(this).addClass('themetxtcolor');
		   $(this).siblings('li').removeClass('themetxtcolor');
		   
		   $(this).find('li a').hover(function () {
			   $(this).addClass('themetxtcolor');
			   $(this).parent('li').siblings('li').find('a').removeClass('themetxtcolor');
		   });
		   
	  },function () {
		   $(this).removeClass('themetxtcolor');
	  
	  })
	}
	
	/*顶部悬停消息*/
	$('.messlibox').hover(function () {
		$(this).find('.hmmesslist').stop(true,true).fadeIn(300);
		$(this).children('a').removeClass('themebgcolor').addClass('themetxtcolor')
		$(this).find('.label-warning').css({'border-color':'#fff','background':'#f39800'})
		
	},function () {
		$(this).find('.hmmesslist').stop(true,false).fadeOut(300);
		$(this).children('a').addClass('themebgcolor').removeClass('themetxtcolor');
		$(this).find('.label-warning').css({'border-color':'','background':'#fff100'})
	
	})
	
	$('.btn-group.mnselect').find('.dropdown-menu li').click(function () {
		var tval=$(this).text();
		$(this).parent('ul').siblings('.dropdown-toggle').find('span').text(tval);
	})
	
			 
	 $('.operate').find('a').hover(function(){
		 $(this).addClass(' themetxtcolor')
	 },function(){
		 $(this).removeClass(' themetxtcolor')
	 })
	 
		 /*radio 选中添加样式*/
	  $(".radio input").click(function(){
		  if($(this).is(':checked') ){
			  
			 $(this).siblings('label').addClass('themebgcolor');
			 $(this).parents('.radio').siblings('.radio').find('label').removeClass('themebgcolor');
		  }
		})
		
		 /*checkbox 选中添加样式*/
	  $(".checkbox input").click(function(){
		  if($(this).is(':checked') ){
			  
			 $(this).siblings('label').addClass('themebgcolor');
		  }else{
			   $(this).siblings('label').removeClass('themebgcolor');
		   }
		})


 

		
});





