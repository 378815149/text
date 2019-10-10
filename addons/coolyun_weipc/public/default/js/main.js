function collapseNavbar() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
}
$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);

$.fn.extend({
    pageSwitch:function(cfg){
        this[0].ps=new pageSwitch(this[0],cfg);
        return this;
    },
    ps:function(){
        return this[0].ps;
    }
});


$(function(){

    var resizeTimer = null;
    $(window).on('resize', function (){
        if (resizeTimer) {
            clearTimeout(resizeTimer);
        }
        resizeTimer = setTimeout(function(){
            $("#case_tab>div>span").css({left:$("#case_tab>div>a.active").position().left,width:$("#case_tab>div>a.active").outerWidth()});
        }, 400);
    });

	
$("#service_bg>div").eq(0).addClass('current');

$("#service_num>li").size() && $("#service_num>li").each(function(i){
    var that = $(this);
        that.hoverDelay({
            hoverEvent: function(){
				$("#service_bg>div").eq(i).addClass('current').siblings().removeClass('current');
				$(".service_tab>h2>span").eq(i).addClass('current').siblings().removeClass('current');
				$(".service_tab>p>span").eq(i).addClass('current').siblings().removeClass('current');
            }        
        });
});

$("#case_tab>div>span").size() && $("#case_tab>div>span").css({left:$("#case_tab>div>a.active").position().left,width:$("#case_tab>div>a.active").outerWidth()});
$("#case_tab>div>a").on("mouseenter",function(){
	var _left=$(this).position().left;
	var _wid=$(this).outerWidth();
	$("#case_tab>div>span").animate({width: _wid,left: _left},200);
}).on("click",function(){
	$(this).addClass('active').siblings().removeClass('active');
});
$("#case_tab>div").on("mouseleave",function(){
	var _left=$("#case_tab>div>a").filter(".active").position().left;
	var _wid=$("#case_tab>div>a").filter(".active").outerWidth();
	$("#case_tab>div>span").animate({width: _wid,left: _left},200);
});

$("#case_slide").size() && $("#case_slide").pageSwitch({duration:1000,start:0,direction:0,loop:true,ease:'ease',transition:"scroll",freeze:false,mouse:false,mousewheel:false,arrowkey:false,autoplay:true});
$(".case_num").on("click",".case_arrow_l",function(){
        $("#case_slide").ps().prev();
    }).on("click",".case_arrow_r",function(){
        $("#case_slide").ps().next();
});

});