<?php
/**
 * yingyong_ceshi模块微站定义
 *
 * @author zhongfutongda
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Yingyong_ceshiModuleSite extends WeModuleSite {


	public function doMobileIndex() {
		//这个操作被定义用来呈现 功能封面
      global $_W,$_GPC;
      echo IA_ROOT;
      include $this->template('index');
      
	}
	public function doWebConfs() {
		//这个操作被定义用来呈现 管理中心导航菜单
        global $_W,$_GPC;
      include $this->template('confs');
	}
		public function doWebUsers() {
		//这个操作被定义用来呈现 管理中心导航菜单
	}
		public function doWebOrders() {
		//这个操作被定义用来呈现 管理中心导航菜单
	}
	

}