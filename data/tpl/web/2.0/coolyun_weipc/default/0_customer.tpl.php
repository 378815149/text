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
        <div class="header_hd" style="background-image:url(<?php echo MODULE_URL;?>public/default/img/head-gaoduan.jpg); background-repeat:no-repeat">
            <div class="container">
                <h3>客户案例</h3>
                <h2><?php  echo $catetop['title'];?></h2>
                <div id="case_tab" class="tab">
                    <div>
                         <?php  if(is_array($cates)) { foreach($cates as $cate) { ?>
                         <a href="/web/index.php?c=account&a=welcome&do=customer&cid=<?php  echo $cate['id'];?>" <?php  if($_GPC['cid'] == $cate['id']) { ?>class="active"<?php  } ?>><?php  echo $cate['title'];?></a>
                         <?php  } } ?>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="case_logo content hidden-xs">
                <div class="case_num">
                    <span class="case_arrow_l iconfont icon-left"></span><span class="case_arrow_r iconfont icon-right"></span>
                </div>
                <p class="tit"><i class="iconfont icon-about"></i><?php  echo $catetop['desc'];?></p>

            </div>
            <div class="content">
            
                <div class="row">
                    <div class="case_item col-md-8 col-sm-8 col-xs-8">
                        <a href="case_article.html" target="_blank">
                            <span>
                                <img src="<?php echo MODULE_URL;?>public/default/img/case_list_pic/_泰凯英.jpg" alt="泰凯英英文官网">
                                <span><span><span><p class="type">高端网站设计</p><h3>泰凯英英文官网</h3><i class="more iconfont icon-right"></i></span></span></span>
                            </span>
                            <p>泰凯英英文官网</p>
                        </a>
                    </div>

                    
                    <div class="case_item aside col-md-4 col-sm-4 col-xs-4">
                        <a href="case_article.html" target="_blank"><span><img src="<?php echo MODULE_URL;?>public/default/img/case_list_pic/_城建.jpg" alt="青岛印象2016官网">
                                <span><span><span><p class="type">高端网站设计</p><h3>青岛印象2016官网</h3><i class="more iconfont icon-right"></i></span></span></span>
                                </span>
                        <p>青岛印象2016官网</p></a>
                    </div>
                </div>
                
            

                <div class="row">
				<?php  if(is_array($bcases)) { foreach($bcases as $bcase) { ?>
                    <div class="case_item col-md-4 col-sm-6 col-xs-6">
                        <a href="/web/index.php?c=account&a=welcome&do=detail&id=<?php  echo $bcase['id'];?>" target="_blank"><span><img src="<?php  echo $_W['attachurl'];?><?php  echo $bcase['bottomthum'];?>" alt="<?php  echo $bcase['title'];?>">
                                <span><span><span><p class="type">H5与手机站设计</p><h3><?php  echo $bcase['title'];?></h3><i class="more iconfont icon-right"></i></span></span></span></span>
                        <p><?php  echo $bcase['title'];?></p></a>
                    </div>
				<?php  } } ?>	
					<div class="case_item col-md-4 col-sm-6 col-xs-6">
                        <a href="javascript:;" target="_blank"><span><img src="<?php echo MODULE_URL;?>public/default/img/case_list_pic/案例持续更新中.jpg" alt="案例持续更新中">
                                <span><span><span><p class="type">高端网站设计</p><h3>案例持续更新中</h3><i class="more iconfont icon-right"></i></span></span></span></span>
                        <p>案例持续更新中</p></a>
                    </div>
                    
                </div>
                <div class="page"></div>
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
