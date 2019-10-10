//滚动加载更多
$(window).scroll(
    function() {
        var scrollTop = $(this).scrollTop();
        var scrollHeight = $(document).height();
        var windowHeight = $(this).height();
        if (scrollTop + windowHeight == scrollHeight) {
            ajax_sourch_submit();//调用加载更多
        }
    }
);

 /**
     * 继续加载猜您喜欢
     * */
	/* 
    var before_request = 1; // 上一次请求是否已经有返回来, 有才可以进行下一次请求
    var page = 0;
    function ajax_sourch_submit(){
        if(before_request == 0)// 上一次请求没回来 不进行下一次请求
            return false;
        before_request = 0;
        page++;
        $.ajax({
            type : "get",
            url:"/index.php?m=Mobile&c=Index&a=ajaxGetMore&p="+page,
            success: function(data)
            {
                if(data){
                    $("#J_ItemList>ul").append(data);
                    before_request = 1;
                }else{
                    $('.get_more').hide();
                }
            }
        });
    }
	*/
