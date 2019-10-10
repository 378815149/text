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
	<link href="<?php echo MODULE_URL;?>public/default/css/common.css" rel="stylesheet">
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
        <div class="service_box">
            <div id="service_bg" class="bgs">
			<?php  if(is_array($cates)) { foreach($cates as $cate) { ?>
                <div>
				<div style="background-image:url(<?php  echo $_W['attachurl'];?><?php  echo $cate['banner'];?>)"></div>
				</div>
            <?php  } } ?>
            </div>
            <div class="service_inner">
                <div class="service_tab">
                    <h2>
					<?php  if(is_array($cates)) { foreach($cates as $cate) { ?>
					<span><?php  echo $cate['title'];?></span>
					<?php  } } ?>
					</h2>
                    <p>
					<?php  if(is_array($cates)) { foreach($cates as $cate) { ?>
					<span><?php  echo $cate['desc'];?></span>
					<?php  } } ?>
					</p>
                    <div class="tab_main">
                        <ul id="service_num" class="clearfix">
						<?php  if(is_array($cates)) { foreach($cates as $cate) { ?>
                            <li><div><a href="/web/index.php?c=account&a=welcome&do=customer&cid=<?php  echo $cate['id'];?>"><span><i class="<?php  echo $cate['icon'];?>"></i><p>查看案例</p></span></a></div></li>
						<?php  } } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer pos" style="background:#1c1c1c!important;">
        <div class="container-fluid">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <p><?php  echo $webset['name'];?> 版权所有 <?php  echo $webset['beian'];?></p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <p class="link">
                <a href="index.html" target="_blank">青岛网站建设</a> 
                <a href="index.html" target="_blank">青岛网站设计</a> 
                <a href="index.html" target="_blank">青岛网站制作</a> 
                <a href="index.html" target="_blank">青岛网络公司</a>
                </p>
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
