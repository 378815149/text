<?php
/**
 *
 * @author 永和软件
 * @url 
 */
defined('IN_IA') or exit('Access Denied');

class Mogucms_diyModule extends WeModule {


	public function welcomeDisplay($menus = array()) {
		//这里来展示DIY管理界面
		global $_W,$_GPC;
		$info = pdo_get("modules_bindings",array("module"=>"mogucms_diy","entry"=>"menu"));
		header("Location:/web/index.php?c=site&a=entry&eid=".$info['eid']."&r=webset.set");
	}
}