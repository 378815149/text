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
    <link href="<?php echo MODULE_URL;?>public/default/img/favicon.ico" rel="shortcut icon" />
	<style>.info{margin-bottom:10px;}</style>
<style type="text/css">
           ul.pagination>li.active>a{background: #ea5106!important;color: #fff!important;border-color: #ea5106!important}.pagination>li>a, .pagination>li>span{color: #333!important;}
</style>	
</head>
<body class="bg_gary" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
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
    <div class="wrapper">
        <div class="header_hd" style="background-image:url(<?php echo MODULE_URL;?>public/default/img/news.jpg); background-repeat:no-repeat">
            <div class="container">
                <h3>信息动态</h3>
                <h2><?php  if(empty($_GPC['cid'])) { ?>全部资讯<?php  } else { ?><?php  echo $catetop['desc'];?><?php  } ?></h2>
                <div id="case_tab" class="tab">
                    <div>
                         <?php  if(is_array($cates)) { foreach($cates as $cate) { ?>
                         <a href="/web/index.php?c=account&a=welcome&do=newslist&cid=<?php  echo $cate['id'];?>" class=""><?php  echo $cate['title'];?></a>
                         <?php  } } ?>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <h4 class="text-c">信息</h4>
                    <div class="news_box">
                    
                   
                        <div class="row">
						<?php  if(is_array($articles)) { foreach($articles as $temp) { ?>
                             <div class="col-md-6 col-xs-12 col-sm-6 info">
                                <a href="/web/index.php?c=account&a=welcome&do=article&id=<?php  echo $temp['id'];?>">
                                                <p class="type"><span><?php  echo $temp['catetitle'];?></span>/ <?php  echo date("Y.m.d",$temp['updatetime'])?></p>
                                                <p class="title"><?php  echo $temp['title'];?></p>
                                                <p><?php  echo $temp['desc'];?>...</p>
                                                <p class="more">Learn More <i class="iconfont icon-right"></i></p>
                                </a>
                             </div>
						<?php  } } ?>	 
                       </div>
                       
                     
    
                       
                       <div class='row'>
                         

                       </div>
                    
                        
                </div>
                
                <div class="page">
				<?php  echo $pager;?>
				
<!-- 				<a href='list_2_1.html'>&lt;</a>
<a href='list_2_1.html'>1</a>
<a class="hover">2</a>
<a href='list_2_3.html'>3</a>
<a href='list_2_3.html'>&gt;</a> -->
</div>
                
            </div>
        </div>
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
