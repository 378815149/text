jQuery(document).ready(function () {
	$(window).on("scroll",function(){
		var Wscroll = $(window).scrollTop();
		Wscroll >= 280 ? $('.fix_link').fadeIn() : $('.fix_link').fadeOut();
		if(Wscroll>80){
			$(".header").addClass("fix");	
		}else{
			$(".header").removeClass("fix");
		}
	});
	$(function(){
		$(".top").click(function(event) {
			$('html,body').animate({scrollTop:0},500);
		});
	})
})
//导航
$(function(){
	var h = Math.max($(window).height(),$(document).height(),$('body').height());
	$(function(){
		$(".navico").click(function(){
			$(this).hide();
			$(".navico").siblings("ul").animate({"left":"-0"},300);
			$(".hsbg").show();
			$(".hsbg").css({'width':'100%','height':h});
			$(".navico").siblings("ul").css({'height':h});
			$(".close").animate({"opacity":"1","left":"20px"},200);
			$(this).addClass("on");
			$(window).resize(function(){
				var winwidth =$(window).width();
				if(winwidth>768){
					window.location.reload();
				}
			})
		})
		$(".close").click(function(){
			navpix();
		})
		$(".hsbg").click(function(){
			navpix();
		})
		$(".hsbg").on("swipeleft",function(){
		  navpix();
		});
	})
	
	function navpix(){
		$(".navico").siblings("ul").animate({"left":"-240px"},200);
		$(".hsbg").hide();
		$(".close").animate({"opacity":"0","left":"0"},100);
		$(".navico").show();
		$(".hsbg").css({'width':'100%','height':h});
		$(".navico").siblings("ul").css({'height':h});
		$(".navico").removeClass("on");
	}
})
$(function(){
	var winwidth =$(window).width();
	if(winwidth>768){
		$(".nav li").hover(function(){
			$(this).find(".nav_uix").show();
		},function(){
			$(this).find(".nav_uix").hide();
		})
	}
})

//tab切换
$(function(){
	function tabs(tabTit,on,tabCon){
		$(tabTit).find("li:first").addClass(on).show(); 
		$(tabCon).find(".tabbox").hide();
		$(tabCon).find(".tabbox:first").show();
		
		$(tabTit).find("li").click(function(){
			$(this).addClass(on).siblings("li").removeClass(on);
			var index = $(tabTit).find("li").index(this);
			$(tabCon).find(".tabbox").eq(index).show().siblings().hide();
		});
	};
	tabs(".tab-hd","active",".tab-bd");
});

$(function(){
	$(".case_ewmico").hover(function(){
		if($(this).parents("li").hasClass("on")){
			$(this).parents("li").removeClass("on");
		}else{
			$(this).parents("li").addClass("on");
		}	
	})
})
$(function(){
	$(".fix_wx").on("click",function(){
		var sUserAgent = navigator.userAgent;
		if (sUserAgent.indexOf('Android') > -1 || sUserAgent.indexOf('iPhone') > -1 || sUserAgent.indexOf('iPad') > -1 || sUserAgent.indexOf('iPod') > -1 || sUserAgent.indexOf('Symbian') > -1) {
			$("#gfweixin").toggle();
		}
	})
	$(".fix_tel").on("click",function(){
		var sUserAgent = navigator.userAgent;
		if (sUserAgent.indexOf('Android') > -1 || sUserAgent.indexOf('iPhone') > -1 || sUserAgent.indexOf('iPad') > -1 || sUserAgent.indexOf('iPod') > -1 || sUserAgent.indexOf('Symbian') > -1) {
			$("#gftel").toggle();
		}
	})
})