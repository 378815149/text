<?php
/**
 * 微擎小程序模块示例模块微站定义
 *
 * @author 微擎团队
 * @url http://s.we7.cc
 */
defined('IN_IA') or exit('Access Denied');

class We7_wxappsampleModuleSite extends WeModuleSite {

	public function doWebList() {
		//这个操作被定义用来呈现 管理中心导航菜单
        echo "导航菜单addddd";
	}
	public function doWebUser(){
      	echo "用户中心菜单";
    }

}