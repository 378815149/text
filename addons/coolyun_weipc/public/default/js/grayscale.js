document.body.addEventListener('touchstart', function() {});

$(function() {
    $('.navbar-collapse ul li a').click(function() {
        if ($(this).attr('class') != 'dropdown-toggle active' && $(this).attr('class') != 'dropdown-toggle') {
            $('.navbar-toggle:visible').click();
        }
    });
    $('.navbar-toggle:visible').on("click", function() {
        var target = $(this).data("target");
        if ($(target).attr("aria-expanded") == "true") {
            $(".nav_mask").removeClass('show');
            setTimeout(function() {
                $(".nav_mask").hide();
            }, 400);
        } else {
            $(".nav_mask").show().addClass('show');
        }
    });
    var _menu = $(".navbar-main-collapse");
    var _menu_item = $(".navbar-main-collapse ul li");
    var _menu_line = $(".navbar-main-collapse > span.follow");
    _menu_item.find("a.active").parent().size()?_menu_item.find("a.active").parent().addClass("active"):_menu_item.eq(0).addClass('active');
    var _menu_wid = _menu_item.filter(".active").outerWidth();
    var _menu_left = _menu_item.filter(".active").position().left;
    _menu_line.css({ width: _menu_wid, left: _menu_left });
    _menu_item.on("mouseenter", function() {
        if(navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)) return;
        var _m_wid = $(this).outerWidth();
        var _m_left = $(this).position().left;
        _menu_line.stop().animate({ width: _m_wid, left: _m_left },200);
    }).on("click", function() {
        $(this).addClass('active').siblings().removeClass('active');
        _menu_wid = $(this).outerWidth();
        _menu_left = $(this).position().left;
    });
    _menu.on("mouseleave", function() {
        _menu_line.animate({ width: _menu_wid, left: _menu_left }, 200);
    });
    var _chat = $("#chat");
    _chat.on("mouseenter click", "a", function() {
        var _left = $(this).find("span").outerWidth() - $(this).outerWidth();
        $(this).addClass('active').find("span").stop().animate({ left: -_left }, 200);
    }).on("mouseleave", "a", function() {
        $(this).removeClass('active').find("span").stop().animate({ left: 0 }, 200);
    });
});
