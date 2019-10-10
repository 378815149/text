<?php defined('IN_IA') or exit('Access Denied');?>	<?php  if($_W["os"] == "windows") { ?>
	<style>
.li-loginq{
 margin-right: 45px;
}
.li-login{
 margin-top: 10px;
 margin-right: 10px;
}
.btn-login {
    width: 90px;
    border: solid 1px #ea5106;
	padding-top: 10px!important;
    padding-bottom: 10px!important;
	line-height: 10px!important;
    border-radius: 2px;
}
.li-register{
 margin-top: 10px;
}
.btn-register {
    width: 90px;
    border: solid 1px #ea5106;
    background: #ea5106;
	padding-top: 10px!important;
    padding-bottom: 10px!important;
	line-height: 10px!important;
    border-radius: 2px;
}
</style>
<?php  } ?>        
		<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/" <?php  if(empty($_GPC["do"])) { ?>class="active"<?php  } ?>>首页</a></li>
                    <li><a href="./index.php?c=account&a=welcome&do=about" <?php  if($_GPC["do"] == "about") { ?>class="active"<?php  } ?>>关于</a></li>
                    <li><a href="./index.php?c=account&a=welcome&do=service" <?php  if($_GPC["do"] == "service") { ?>class="active"<?php  } ?>>业务</a></li>
                    <li><a href="./index.php?c=account&a=welcome&do=customer" <?php  if($_GPC["do"] == "customer") { ?>class="active"<?php  } ?>>案例</a></li>
                    <li><a href="./index.php?c=account&a=welcome&do=newslist" <?php  if($_GPC["do"] == "newslist") { ?>class="active"<?php  } ?>>信息</a></li>
                    <li class="li-loginq"><a href="./index.php?c=account&a=welcome&do=contact" <?php  if($_GPC["do"] == "contact") { ?>class="active"<?php  } ?>>联系</a></li>
					<li class="li-login"><a target="_blank" class="btn-login" href="<?php  echo url('user/login');?>">登录</a></li>
					<li class="li-register"><a target="_blank" class="btn-register" href="<?php  echo url('user/register');?>">注册</a></li>
                </ul>
                <span class="follow"></span>
            </div>