function postData(url, data) {
    $.post(url, data, function (data) {
      	layer.closeAll();
        data = JSON.parse(data);
        console.log('ress: ', data)
        if (!data.type) {
            layer.msg('服务器错误!');
            return false;
        }
        if (data.type == 'success') {
            layer.load();
            setTimeout(function () {
                window.location.href = data.redirect;
            }, 1000)
        }
        layer.msg(data.message);
    });
}

function postDataGoBack(url, data) {
    $.post(url, data, function (data) {
        layer.closeAll();
        data = JSON.parse(data);
        if (!data.type) {
            layer.msg('服务器错误!');
            return false;
        }
        if (data.type == 'success') {
            layer.load();
            setTimeout(function () {
                window.location.href = document.referrer;
            }, 1000)
        }
        layer.msg(data.message);
    });
}


//  禁用回车时间

$(window).keydown( function(e) {
    var key = window.event?e.keyCode:e.which;
    if(key.toString() == "13"){
        return false;
    }
});


