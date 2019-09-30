<?php defined('IN_IA') or exit('Access Denied');?><ul class="we7-page-tab">
	<?php  if(permission_check_account_user('see_user_manage_display')) { ?>
	<li <?php  if($controller == 'user' && $action == 'display' && ($_GPC['type'] == 'display' || $_GPC['type'] == '')) { ?> class="active"<?php  } ?>><a href="<?php  echo url('user/display')?>">用户管理</a></li>
	<?php  } ?>
	
	<?php  if(permission_check_account_user('see_user_manage_check')) { ?>
	<li <?php  if($_GPC['type'] == 'check') { ?> class="active"<?php  } ?>><a href="<?php  echo url('user/display', array('type' => 'check'))?>">审核用户</a></li>
	<?php  } ?>
	<?php  if(permission_check_account_user('see_user_manage_recycle')) { ?>
	<li <?php  if($_GPC['type'] == 'recycle') { ?> class="active"<?php  } ?>><a href="<?php  echo url('user/display', array('type' => 'recycle'))?>">用户回收站</a></li>
	<?php  } ?>
	<?php  if(permission_check_account_user('see_user_manage_fields')) { ?>
	<li <?php  if($action == 'fields') { ?> class="active"<?php  } ?>><a href="<?php  echo url('user/fields/display');?>">用户属性设置</a></li>
	<?php  } ?>
	<?php  if(permission_check_account_user('see_user_manage_expire')) { ?>
	<li <?php  if($action == 'expire' && $do == 'setting') { ?> class="active"<?php  } ?>><a href="<?php  echo url('user/expire/setting');?>">自定义到期提示</a></li>
	<?php  } ?>
</ul>