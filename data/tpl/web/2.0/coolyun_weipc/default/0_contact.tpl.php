<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title><?php  echo $webset['webname'];?></title>
    <meta name="keywords" content="" />
    <meta name="Description" content=""/>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo MODULE_URL;?>public/default/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo MODULE_URL;?>public/default/css/grayscale.css" rel="stylesheet">
    <link href="<?php echo MODULE_URL;?>public/default/css/main.css" rel="stylesheet">
    <SCRIPT language=JavaScript> 
function xxg()
{
  if (form1.name.value=="")
   { 
  alert("请填写姓名！");
  form1.name.focus();
  return false;
   } 
    if (form1.e_mail.value.length!= 0)
   {
    for (i=0; i<form1.e_mail.value.length; i++)
     if (form1.e_mail.value.charAt(i)=="@")
      break;
    if (i==form1.e_mail.value.length)
    {
     alert("无效的email地址！");
     form1.e_mail.focus();
     return false;
    } 
    }
else
       {
        alert("请填写email！");
   form1.e_mail.focus();
   return false;
	 }
   if (form1.requests.value=="")
   { 
  alert("请填写内容！");
  form1.requests.focus();
  return false;
   }
   
   if (form1.phonenumber.value.length<7 || form1.phonenumber.value.length>13)
   { 
	alert("联系电话格式不正确");
	form1.phonenumber.focus();
	return false;
	 } 

  }
</script>
    <link href="<?php echo MODULE_URL;?>public/default/img/favicon.ico" rel="shortcut icon" />
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div class="nav_mask"></div>
    <div class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i></i><i></i><i></i>
                </button>
                <h1><a class="navbar-brand" href="$_W[‘siteroot’]}"><img src="<?php  if(!empty($webset['logo'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $webset['logo'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/logo.png<?php  } ?>" alt="<?php  echo $webset['webname'];?>"></a></h1>
            </div>
         <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('default/top', TEMPLATE_INCLUDEPATH)) : (include template('default/top', TEMPLATE_INCLUDEPATH));?>
        </div>
    </div>
    <div class="wrapper">
        <div class="header_hd" style="background-image:url(<?php  if(!empty($contact['banner'])) { ?><?php  echo $contact['banner'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/contact.jpg<?php  } ?>); background-repeat:no-repeat">
            <div class="container">
                <h3>联系我们</h3>
                <h2><?php  echo $contact['title'];?></h2>
                <!--<div id="case_tab" class="tab">
                    <div>
                        <a href="###" class="active">联系我们</a>
                        <span></span>
                    </div>
                </div>-->
            </div>
        </div>
        <div class="container">
            <div class="content">
                <h4>联系方式</h4>
                <div class="line"></div>
                <div class="row mb">
                    <div class="contact_item col-xs-6 col-sm-6 col-md-3">
                        <span class="icon iconfont icon-tel"></span><span class="text"><p class="tips">电话</p><p class="num"><?php  echo $webset['phone'];?></p></span>
                    </div>
                    <div class="contact_item col-xs-6 col-sm-6 col-md-3">
                        <span class="icon iconfont icon-qq"></span><span class="text"><p class="tips">QQ</p><p class="num"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $webset['qq'];?>&site=qq&menu=yes" target="_blank"><?php  echo $webset['qq'];?></a></p></span>
                    </div>
                    <div class="contact_item col-xs-6 col-sm-6 col-md-3">
                        <span class="icon iconfont icon-mail"></span><span class="text"><p class="tips">E-Mail</p><p><?php  echo $webset['email'];?></p></span>
                    </div>
                    <div class="contact_item col-xs-6 col-sm-6 col-md-3">
                        <span class="icon iconfont icon-place"></span><span class="text"><p class="tips">地址</p><p><?php  echo $webset['address'];?></p></span>
                    </div>
                </div>
				<?php  if(!empty($contact['message'])) { ?>
                <h4>在线留言</h4>
                <div class="line"></div>
                
               

                <div class="row forms">
                    <div class="col-sm-5 col-xs-6 col-md-5">
                    
                    <form action="" enctype="multipart/form-data" id="form1" onsubmit="return xxg();" method="post">
                        <div class="forms_label">
                            <input type="text" name='name' id='name' class="form-control" placeholder="姓名"><i class="iconfont icon-form-user"></i>
                        </div><div class="forms_label">
                            <input type="text" name='phonenumber' id='phonenumber' class="form-control" placeholder="电话"><i class="iconfont icon-form-tel"></i>
                        </div><div class="forms_label">
                            <input type="text" name='email' id='e_mail' class="form-control" placeholder="E-mail"><i class="iconfont icon-form-mail"></i>
                        </div>
                    </div><div class="col-sm-7 col-xs-6 col-md-7">
                        <div class="forms_label">
                            <textarea  name='requests' id='requests' class="form-control" cols="30" rows="10" placeholder="留言"></textarea><i class="iconfont icon-form-msg"></i>
                        </div>
						<div class="form_label text-r">
                            <input  type="submit" class="forms_btn" name="submit" value="提交" />
                        </div>
                    </div>
                </div>
                </form>
                <?php  } ?>
            </div>
        </div>
        
        <!--引用百度地图API-->
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.0&services=true"></script>

  <!--百度地图容器-->
        <div class="map"><div style="width:auto;height:500px; border:#ccc solid 0px;" id="dituContent"></div></div>
        <script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(<?php  echo $webset['longitude'];?>,<?php  echo $webset['latitude'];?>);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.disableScrollWheelZoom();//禁用地图滚轮放大缩小，默认禁用(可不写)
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){

        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:0});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:"<?php  echo $webset['webname'];?>",content:"电话：<?php  echo $webset['phone'];?><br/>地址：<?php  echo $webset['address'];?><br/>WebSite：<?php  echo $_W['siteroot'];?>",point:"<?php  echo $webset['longitude'];?>|<?php  echo $webset['latitude'];?>",isOpen:1,icon:{w:21,h:21,l:23,t:0,x:6,lb:5}}
		 ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
			
			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
				    this.openInfoWindow(_iw);
			    });
			    _iw.addEventListener("open",function(){
				    _marker.getLabel().hide();
			    })
			    _iw.addEventListener("close",function(){
				    _marker.getLabel().show();
			    })
				label.addEventListener("click",function(){
				    _marker.openInfoWindow(_iw);
			    })
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>


    </div>
    <div class="footer">
        <div class="container-fluid">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <p><?php  echo $webset['name'];?> 版权所有 <?php  echo $webset['beian'];?></p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <p class="link"><a href="index.html" target="_blank">青岛网站建设</a> <a href="index.html" target="_blank">青岛网站设计</a> <a href="index.html" target="_blank">青岛网站制作</a> <a href="index.html" target="_blank">青岛网络公司</a></p>
            </div>
</div>
    </div>
    <div id="chat" class="chat">
        <div>
        <div>
            <a href="tel:<?php  echo $webset['phone'];?>" class="tel" target="_blank"><span><i class="iconfont icon-tel"></i><?php  echo $webset['phone'];?></span></a>
            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $webset['qq'];?>&site=qq&menu=yes" class="qq" target="_blank"><span><i class="iconfont icon-qq"></i><?php  echo $webset['qq'];?></span></a>
            <a href="mailto:<?php  echo $webset['email'];?>" class="mail" target="_blank"><span><i class="iconfont icon-mail"></i><?php  echo $webset['email'];?></span></a>
        </div>
        </div>
    </div>
    <script src="<?php echo MODULE_URL;?>public/default/js/jquery.js"></script>
    <script src="<?php echo MODULE_URL;?>public/default/js/bootstrap.min.js"></script>
    <script src="<?php echo MODULE_URL;?>public/default/js/verder.min.js"></script>
    <script src="<?php echo MODULE_URL;?>public/default/js/grayscale.js"></script>
    <script src="<?php echo MODULE_URL;?>public/default/js/main.js"></script>
</body>
</html>
