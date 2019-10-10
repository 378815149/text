$(function(){
	$(window).load(function(){
		$( 'img.lazy' ).lazyload( {
			threshold : 1 ,
			effect : 'fadeIn' ,
			effect_speed: 1000 ,
			failure_limit: 1 ,
		});
		$(window).trigger('scroll');
		setTimeout(function(){
			$(window).trigger('scroll');
		},200);
	});

	isAndroid = (navigator.userAgent.match(/Android/i));
	isiPhone = (navigator.userAgent.match(/iPhone/i));
	isiPad = (navigator.userAgent.match(/iPad/i));
	isM = isAndroid || isiPhone;
	//isM = isAndroid || isiPhone || isiPad;
	
	
	isIe8 = (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.match(/8./i)=="8.");
	isIe9 = (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.match(/9./i)=="9.");
	if(isIe8){
		$('html').addClass('ie8');
	}
	if(isIe9){
		$('html').addClass('ie9');
		$("a.specA").mouseover(function(){
			$(this).find("img").stop();
			$(this).find("img").animate({opacity:0.7},{duration:0.25*1000, easing:"linear"});
		}).mouseout(function(){
			$(this).find("img").stop();
			$(this).find("img").animate({opacity:1.0},{duration:0.25*1000, easing:"linear"});
		});
	}
	
	$(window).bind('load', function(){
		if(!isIe8 && !isIe9){
			new WOW().init();
		}
		if(isIe9){
			$('.wow').each(function(){
				if($(window).scrollTop() > ($(this).offset().top-$(window).height())){
					$(this).animate({opacity:1});
				}
			});
			$(window).scroll(function(){
				$('.wow').each(function(){
					if($(window).scrollTop() > ($(this).offset().top-$(window).height())){
						$(this).animate({opacity:1});
					}
				});
			});
		}
	});
});



