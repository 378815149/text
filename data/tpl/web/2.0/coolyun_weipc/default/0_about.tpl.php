<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php  echo $webset['webname'];?></title>
    <meta name="keywords" content="" />
    <meta name="Description" content=""/>
    <link href="<?php echo MODULE_URL;?>public/default/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo MODULE_URL;?>public/default/css/grayscale.css" rel="stylesheet">
    <link href="<?php echo MODULE_URL;?>public/default/css/main.css" rel="stylesheet">
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
        <div class="about_hd">
            <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-sm-4 col-md-6"><h2>关于我们</h2><h4>Since 2005</h4></div>
                  <div class="col-xs-12 col-sm-8 col-md-6">
                      <div class="infos">
                            <?php  echo $about['info'];?>
                            <a href="<?php  echo $about['url'];?>" class="about_btn"><span>立即与我们联系</span></a>
                        </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <h3 class="content_h3">合作客户</h3>
                        <h6 class="content_h6"><span>Customers</span></h6>
                    </div>
                    <div class="brands col-xs-12 col-sm-9 col-md-9">
					<?php  if(is_array($cases)) { foreach($cases as $case) { ?>
                        <div class="brand col-xs-4 col-sm-4 col-md-3"><div><img src="<?php  echo $_W['attachurl'];?><?php  echo $case['aboutthum'];?>" alt="<?php  echo $case['title'];?>"></div></div>
					<?php  } } ?>	
                    </div>
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
