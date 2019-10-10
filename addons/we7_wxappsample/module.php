<?php
/**
 * 微擎小程序模块示例模块定义
 *
 * @author 微擎团队
 * @url http://s.we7.cc
 */
defined('IN_IA') or exit('Access Denied');

class We7_wxappsampleModule extends WeModule {


	public function welcomeDisplay($menus = array()) {
		//这里来展示DIY管理界面
		include $this->template('welcome');
	}
}