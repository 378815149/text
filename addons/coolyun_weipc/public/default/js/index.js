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
    $("#pages").pageSwitch({duration:1200,start:0,direction:1,loop:false,ease:'ease',transition:"scroll",freeze:false,mouse:true,mousewheel:true,arrowkey:true});
    $("#pages>.page:eq(0)").addClass('current');
    $("#pages").ps().on("before",function(m,n){
        $("#menu ul li:eq("+n+") a").addClass('active').parent("li").siblings().find("a").removeClass('active');
        $("#nav_index span").eq(n).addClass('active').siblings().removeClass('active');
        n!=0?$(".navbar-fixed-top").addClass("top-nav-collapse"):$(".navbar-fixed-top").removeClass("top-nav-collapse");
    }).on("after",function(m){
        $("#pages>.page:eq("+m+")").addClass('current').siblings().removeClass('current');
    });
    var _nav_item=$("#nav_index > div > span");
    _nav_item.on("click",function(){
        var i=_nav_item.index(this);
        $("#pages").ps().slide(i);
    });
    //第一屏
    $("#slide").pageSwitch({duration:1000,start:0,direction:0,loop:true,ease:'ease',transition:"scroll",freeze:false,mouse:true,mousewheel:false,arrowkey:false,autoplay:true});
    $("#slide>div:eq(0)").addClass('current');
    $("#slide").ps().on("after",function(m,n){
        $("#slide>div:eq("+m+")").addClass('current').siblings().removeClass('current');
    });
    $("#index_nav").on("click","li >a",function(){
        var i=$(this).data("index");
        $("#pages").ps().slide(i);
    });
    $(".page1 .arrow").on("click",function(){
        $("#pages").ps().next();
    });
    //第二屏
    //第三屏
    $(".case_box .arr").on("click",".case_arrow_l",function(){
        $("#case_slide").ps().prev();
    }).on("click",".case_arrow_r",function(){
        $("#case_slide").ps().next();
    });
    $(".card").hover3d({
        selector: ".cont",
        shine: false,
    });
    var resizeTimer = null;
    $(window).on('resize', function (){
        if (resizeTimer) {
            clearTimeout(resizeTimer);
        }
        resizeTimer = setTimeout(function(){
            resize();
        }, 400);
    });


});
resize();
function resize(){
    var _wid=$(window).width();
    var _hei=$(window).height();
    //添加case
    if(_wid<="767"){
        //小屏幕
        case_slide("mobile");
    }else{
        //大屏幕
        case_slide("pc");
    }
}
var slide_num;
function case_slide(device){
    var n=device=="pc"?4:6;
    if(n==slide_num) return;
    slide_num=n;
    var _case=$("#case_slide").data("json");
    var _html="";
    for(var i=0;i<_case.data.length;i++){
        if(i%n==0){
            _html+="<div>";
        }
        _html+="<div class='slide_item'><a href='"+_case.data[i].url+"' style='background-image: url("+_case.data[i].img+");'><div><span><span><p class='type'>"+_case.data[i].type+"</p><h3>"+_case.data[i].name+"</h3><p class='more'>更多案例</p></span></span></div></a></div>";
        if((i+1)%n==0){
            _html+="</div>";
        }
    }
    $("#case_slide").html(_html).pageSwitch({
        duration:1000,
        start:0,
        direction:0,
        loop:true,
        ease:'ease',
        transition:"scroll",
        freeze:false,
        mouse:true,
        mousewheel:false,
        arrowkey:false,
        autoplay:true
    });


}



