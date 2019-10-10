<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?><?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?><?php  if(IMS_FAMILY != 'x') { ?><?php  if(!empty($_W['page']['title'])) { ?> - <?php  } ?>微擎 - 公众平台自助引擎 -  Powered by WE7.CC<?php  } ?><?php  } else { ?><?php  if(!empty($_W['page']['title'])) { ?> - <?php  } ?><?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
	<meta name="keywords" content="<?php  if(empty($_W['page']['copyright']['keywords'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微擎,微信,微信公众平台,w7.cc<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['keywords'];?><?php  } ?>" />
	<meta name="description" content="<?php  if(empty($_W['page']['copyright']['description'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>公众平台自助引擎（www.w7.cc），简称微擎，微擎是一款免费开源的微信公众平台管理系统，是国内最完善移动网站及移动互联网技术解决方案。<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['description'];?><?php  } ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo MODULE_URL;?>public/admin/css/normalize.css">
    <link rel="stylesheet" href="<?php echo MODULE_URL;?>public/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo MODULE_URL;?>public/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo MODULE_URL;?>public/admin/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo MODULE_URL;?>public/admin/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="<?php echo MODULE_URL;?>public/admin/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?php echo MODULE_URL;?>public/admin/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo MODULE_URL;?>public/admin/css/style.css">
<!-- Scripts -->
<script type="text/javascript" src="./resource/js/lib/jquery-1.11.1.min.js"></script>

	<script type="text/javascript" src="./resource/js/lib/bootstrap.min.js"></script> 
<script src="<?php echo MODULE_URL;?>public/admin/js/popper.min.js"></script>
<script src="<?php echo MODULE_URL;?>public/admin/js/bootstrap.min.js"></script>
<script src="<?php echo MODULE_URL;?>public/admin/js/jquery.matchHeight.min.js"></script>
<script src="<?php echo MODULE_URL;?>public/admin/js/main.js"></script>
	
<link href="<?php echo MODULE_URL;?>public/admin/css/bootstraps.min.css?v=<?php echo IMS_RELEASE_DATE;?>" rel="stylesheet">
	<link href="<?php echo MODULE_URL;?>public/admin/css/common.css?v=<?php echo IMS_RELEASE_DATE;?>" rel="stylesheet"> 
	<script type="text/javascript">
	if(navigator.appName == 'Microsoft Internet Explorer'){
		if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	window.sysinfo = {
		<?php  if(!empty($_W['uniacid'])) { ?>'uniacid': '<?php  echo $_W['uniacid'];?>',<?php  } ?>
		<?php  if(!empty($_W['acid'])) { ?>'acid': '<?php  echo $_W['acid'];?>',<?php  } ?>
		<?php  if(!empty($_W['openid'])) { ?>'openid': '<?php  echo $_W['openid'];?>',<?php  } ?>
		<?php  if(!empty($_W['uid'])) { ?>'uid': '<?php  echo $_W['uid'];?>',<?php  } ?>
		<?php  if(!empty($_W['role'])) { ?>'role': '<?php  echo $_W['role'];?>',<?php  } ?>
		'isfounder': <?php  if(!empty($_W['isfounder'])) { ?>1<?php  } else { ?>0<?php  } ?>,
		'family': '<?php echo IMS_FAMILY;?>',
		'siteroot': '<?php  echo $_W['siteroot'];?>',
		'siteurl': '<?php  echo $_W['siteurl'];?>',
		'attachurl': '<?php  echo $_W['attachurl'];?>',
		'attachurl_local': '<?php  echo $_W['attachurl_local'];?>',
		'attachurl_remote': '<?php  echo $_W['attachurl_remote'];?>',
		'module' : {'url' : '<?php  if(defined('MODULE_URL')) { ?><?php echo MODULE_URL;?><?php  } ?>', 'name' : '<?php  if(defined('IN_MODULE')) { ?><?php echo IN_MODULE;?><?php  } ?>'},
		'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'},
		'account' : <?php  echo json_encode($_W['account'])?>,
		'server' : {'php' : '<?php  echo phpversion()?>'},
		'frame': '<?php echo FRAME;?>',
	};
	</script>
	<script>var require = { urlArgs: 'v=<?php echo IMS_RELEASE_DATE;?>' };</script>
	<script>
		document.addEventListener('error', function(event) {
			var elem = event.target;
			elem.src = ''
		}, true)
	</script> 
	<script type="text/javascript" src="./resource/js/lib/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="./resource/js/app/util.js?v=<?php echo IMS_RELEASE_DATE;?>"></script>
	<script type="text/javascript" src="./resource/js/app/common.min.js?v=<?php echo IMS_RELEASE_DATE;?>"></script>
	<script type="text/javascript" src="./resource/js/require.js?v=<?php echo IMS_RELEASE_DATE;?>"></script>
	<script type="text/javascript" src="./resource/js/lib/jquery.nice-select.js?v=<?php echo IMS_RELEASE_DATE;?>"></script>
</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php  echo url('home/welcome/system', array('page' => 'home'));?>"><i class="menu-icon fa fa-laptop"></i>返回系统 </a>
                    </li>
                    <li class="menu-title">系统设置</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>站点设置</a>
                        <ul class="sub-menu children dropdown-menu">                            
						<li><i class="fa fa-list-alt"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=set">基本信息</a></li>
                        <li><i class="fa fa-bookmark"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=style">风格设置</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-home"></i>首页设置</a>
                        <ul class="sub-menu children dropdown-menu">                            
						<li><i class="fa fa-picture-o"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=home.banner">Banner设置</a></li>
                        <li><i class="fa fa-suitcase"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=home.customer">客户列表</a></li>
                        <li><i class="fa fa-minus-square-o"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=home.footer">页面底部</a></li>
                        </ul>
                    </li>
					<li class="menu-title">站点相关</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>关于我们</a>
                        <ul class="sub-menu children dropdown-menu">                            
						<li><i class="fa fa-male"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=about.us">关于我们</a></li>
                        <li><i class="fa fa-phone-square"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=about.contact">联系我们</a></li>
                        <li><i class="fa fa-mail-forward"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=about.message">留言列表</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>业务管理</a>
                        <ul class="sub-menu children dropdown-menu">                            
						<li><i class="fa fa-puzzle-piece"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=service.cate">业务类别</a></li>
                        <li><i class="fa fa-th"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=service.case">客户案例</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>资讯管理</a>
                        <ul class="sub-menu children dropdown-menu">                            
						<li><i class="fa fa-files-o"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=news.cate">资讯类别</a></li>
                        <li><i class="fa fa-th-large"></i><a href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=news.article">资讯列表</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php  echo url('home/welcome/system', array('page' => 'home'));?>"><img src="<?php  if(!empty($_W['setting']['copyright']['blogo'])) { ?><?php  echo to_global_media($_W['setting']['copyright']['blogo'])?><?php  } else { ?>./resource/images/logo/logo.png<?php  } ?>" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="<?php echo MODULE_URL;?>public/admin/images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php  echo $avatar;?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php  echo url('user/profile');?>"><i class="fa fa-user"></i>我的账号</a>

                            <a class="nav-link" href="<?php  echo url('system/updatecache');?>"><i class="fa fa-repeat"></i>更新缓存</a>

                            <a class="nav-link" href="<?php  echo url('system/site');?>"><i class="fa fa-cog"></i>系统设置</a>

                            <a class="nav-link" href="<?php  echo url('user/logout');?>"><i class="fa fa-power-off"></i>退出系统</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->