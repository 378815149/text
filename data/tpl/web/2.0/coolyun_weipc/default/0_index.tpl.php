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
    <link href="<?php echo MODULE_URL;?>public/default/css/index.css" rel="stylesheet">
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
                <h1><a class="navbar-brand" href="<?php  echo $_W['‘siteroot’'];?>"><img src="<?php  if(!empty($webset['logo'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $webset['logo'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/logo.png<?php  } ?>" alt="<?php  echo $webset['webname'];?>"></a></h1>
            </div>
			<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('default/top', TEMPLATE_INCLUDEPATH)) : (include template('default/top', TEMPLATE_INCLUDEPATH));?>

        </div>
    </div>
    <div id="wrap" class="wrapper">
        <div class="pages" id="pages">
            <div class="page page1">
                <div id="slide" class="slide">
				<?php  if(is_array($banners)) { foreach($banners as $banner) { ?>
                    <div>
                        <div class="bgs" style="background-image: url(<?php  echo $_W['attachurl'];?><?php  echo $banner['image'];?>);"></div>
                        <div class="index_inner">
                            <div class="index_box solgan">
                                <div class="container">
                                    <h3><?php  echo $banner['desc'];?></h3>
                                    <h2><?php  echo $banner['title'];?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php  } } ?>	

                </div>
                <div class="index_inner">
                    <div class="index_box">
                        <div class="container index_nav">
                            <ul id="index_nav" class="clearfix">
                                <li><a href="javascript:;" data-index="1"><span>业务</span><i class="iconfont icon-about"></i></a></li>
                                <li><a href="javascript:;" data-index="2"><span>案例</span><i class="iconfont icon-service"></i></a></li>
                                <li><a href="javascript:;" data-index="3"><span>客户</span><i class="iconfont icon-custom"></i></a></li>
                                <li><a href="javascript:;" data-index="4"><span>新闻</span><i class="iconfont icon-news"></i></a></li>
                                <li><a href="javascript:;" data-index="5"><span>联系</span><i class="iconfont icon-contact"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="arrow"><span></span><i class="iconfont icon-arrow"></i></div>
            </div>
            <div class="page page2">
                <div class="index_inner">
                    <div class="index_box item_box">
                        <h2><a href="">服务项目</a></h2>
                        <h5><span class="t">Business</span><span class="page_icon iconfont icon-about"></span></h5>
                        <div class="container">
                            <div class="about_box item_bd">

								<?php  if(is_array($servicecates)) { foreach($servicecates as $servicecate) { ?>
                                <div class="card">
                                <a href="/web/index.php?c=account&a=welcome&do=customer&cid=<?php  echo $servicecate['id'];?>">
                                    <div class="cont">
                                        <div class="card_image" style="background-image: url(<?php  echo $_W['attachurl'];?><?php  echo $servicecate['image'];?>);"></div>
                                        <div class="card_detail">
                                                <span class="icon iconfont <?php  echo $servicecate['icon'];?>"></span>
                                                <span class="text">
                                                    <h3><?php  echo $servicecate['title'];?></h3>
                                                    <p class="line"><?php  echo $servicecate['desc'];?></p>
                                                    <p class="text-r"><span class="more">Learn More &gt;</span></p>
                                                </span>
                                        </div>
                                    </div>
                                </a>
                                </div>
								<?php  } } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="arrow"><span></span><i class="iconfont icon-arrow"></i></div>
            </div>
            <div class="page page3">
                <div class="index_inner">
                    <div class="index_box item_box">
                        <h2><a href="#">成功案例</a></h2>
                        <h5><span class="t">Cases</span><span class="page_icon iconfont icon-service"></span></h5>
                        <div class="container">
                            <div class="case_box item_bd">
                                <div class="case_slide">
                                   
                                    <div id="case_slide" data-json='{"data":[
										<?php  if(is_array($cases)) { foreach($cases as $case) { ?>
                                        {"url":"/web/index.php?c=account&a=welcome&do=detail&id=<?php  echo $case['id'];?>","img":"<?php  echo $_W['attachurl'];?><?php  echo $case['homethum'];?>","type":"<?php  echo $casecate['title'];?>","name":"<?php  echo $case['title'];?>"},
										<?php  } } ?>
										{"url":"case_article.html","img":"img/健斐.jpg","type":"更多案例","name":"点击查看"}
                                    ]}'>
                                    </div>
                                </div>
                                <div class="arr">
                                    <div class="case_arrow_l"><i class="iconfont icon-left"></i></div>
                                    <div class="case_arrow_r"><i class="iconfont icon-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="arrow"><span></span><i class="iconfont icon-arrow"></i></div>
            </div>
            <div class="page page4">
                <div class="index_inner">
                    <div class="index_box item_box">
                        <h2><a href="kehuminglu.html">我们的客户</a></h2>
                        <h5><span class="t">Clients</span></h5>
                        <div class="container">
                            <div class="custom_box item_bd">
                                <div class="clearfix">
                                    <div class="item"><div><span></span><img src="<?php  if(!empty($customer['logo1'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo1'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo1.png<?php  } ?>" alt="海信集团"></div></div><div class="item">
                                    <div><span></span><img src="<?php  if(!empty($customer['logo2'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo2'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo2.png<?php  } ?>" alt="中国中化"></div></div><div class="item">
                                    <div><span></span><img src="<?php  if(!empty($customer['logo3'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo3'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo3.png<?php  } ?>" alt="青岛郑建集团"></div></div><div class="item">
                                    <div><span></span><img src="<?php  if(!empty($customer['logo4'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo4'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo4.png<?php  } ?>" alt="国家电网青岛公司"></div></div><div class="item">
                                    <div><span></span><img src="<?php  if(!empty($customer['logo5'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo5'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo5.png<?php  } ?>" alt="青岛承建地产 青岛印象"></div></div><div class="item">
                                    <div><span></span><img src="<?php  if(!empty($customer['logo6'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo6'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo6.png<?php  } ?>" alt="青岛泰凯英"></div></div><div class="item">
                                    <div><span></span><img src="<?php  if(!empty($customer['logo7'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo7'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo7.png<?php  } ?>" alt="青岛宝龙地产"></div></div><div class="item">
                                    <div><span></span><img src="<?php  if(!empty($customer['logo8'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo8'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo8.png<?php  } ?>" alt="青岛亨达集团"></div></div><div class="item">
                                    <div><span></span><img src="<?php  if(!empty($customer['logo9'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo9'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo9.png<?php  } ?>" alt="青岛市图书馆"></div></div><div class="item">
                                    <div><span></span><img src="<?php  if(!empty($customer['logo10'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $customer['logo10'];?><?php  } else { ?><?php echo MODULE_URL;?>public/default/img/index/logo10.png<?php  } ?>"  alt="青岛市博物馆"></div></div>
                                    <div class="city"></div>
                                    <div class="names"><span>我们的客户</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="arrow"><span></span><i class="iconfont icon-arrow"></i></div>
            </div>
            <div class="page page5">
                <div class="index_inner">
                    <div class="index_box item_box">
                        <h2><a href="newscenter.html">公司资讯</a></h2>
                        <h5><span class="t">News Center</span><span class="page_icon iconfont icon-news"></span></h5>
                        <div class="container">
                            <div class="news_box item_bd">
                                <ul>
								<?php  if(is_array($articles)) { foreach($articles as $article) { ?>
                                    <li>
                                      <a href="/web/index.php?c=account&a=welcome&do=article&id=<?php  echo $article['id'];?>">
                                            <p class="type"><span><?php  echo $artcate['title'];?></span>/<?php  echo date("Y.m.d",$artcate['updatetime'])?></p>
                                            <h4 class="title"><?php  echo $article['title'];?></h4>
                                            <p><?php  echo $article['desc'];?>...</p>
                                            <p class="more">Learn More <i class="iconfont icon-right"></i></p>
                                        </a>
                                    </li>
								<?php  } } ?>	
                              </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="arrow"><span></span><i class="iconfont icon-arrow"></i></div>
            </div>
            <div class="page page6">
                <div class="index_inner">
                    <div class="index_box item_box">
                        <h2><a href="contact.html">联系我们</a></h2>
                        <h5><span class="t">Contact Us</span><span class="page_icon iconfont icon-contact"></span></h5>
                        <div class="container-fluid">
                            <div class="contact_box item_bd">
                                <ul>
                                    <li>
                                        <div>
                                            <div class="contact">
                                                <div>
                                                <ul class="clearfix">
                                                    <li><span class="icon iconfont icon-qq"></span><span class="text"><p class="tips">QQ</p><p class="num"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $webset['qq'];?>&site=qq&menu=yes" target="_blank"><?php  echo $webset['qq'];?></a></p></span></li>
                                                    <li><span class="icon iconfont icon-tel"></span><span class="text"><p class="tips">电话</p><p class="num"><a href="tel:<?php  echo $webset['phone'];?>" target="_blank"><?php  echo $webset['phone'];?></a></p></span></li>
                                                    <li><span class="icon iconfont icon-place"></span><span class="text"><p class="tips">地址</p><p><?php  echo $webset['address'];?></p></span></li>
                                                    <li><span class="icon iconfont icon-mail"></span><span class="text"><p class="tips">E-Mail</p><p><?php  echo $webset['email'];?></p></span></li>
                                                </ul>
                                                </div>
                                            </div>
                                            <div class="solgan">
                                                <div>
                                                    <p><?php  echo $webset['footer'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
										
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

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="nav_index" class="nav_index">
        <div>
            <span class="active"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="chat" class="chat">
        <div>
        <div>
            <a href="tel:<?php  echo $webset['phone'];?>" class="tel" target="_blank"><span><i class="iconfont icon-tel"></i><?php  echo $webset['phone'];?></span></a>
            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $webset['qq'];?>&site=qq&menu=yes" class="qq" target="_blank"><span><i class="iconfont icon-qq"></i><?php  echo $webset['qq'];?></span></a>
            <a href="mailto:service@leadto.com.cn" class="mail" target="_blank"><span><i class="iconfont icon-mail"></i><?php  echo $webset['email'];?></span></a>
        </div>
        </div>
    </div>
    <script src="<?php echo MODULE_URL;?>public/default/js/jquery.js"></script>
    <script src="<?php echo MODULE_URL;?>public/default/js/bootstrap.min.js"></script>
    <script src="<?php echo MODULE_URL;?>public/default/js/verder.min.js"></script>
    <script src="<?php echo MODULE_URL;?>public/default/js/grayscale.js"></script>
    <script src="<?php echo MODULE_URL;?>public/default/js/index.js"></script>
</body>
</html>
