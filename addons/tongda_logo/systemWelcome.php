<?php
/**
 * tongda_logo模块system_welcome接口定义
 *
 * @author zhongfutongda
 * @url
 */
defined('IN_IA') or exit('Access Denied');
//模块和表前缀名
define('MODULE_NAME', 'tongda_logo');
	
class Tongda_logoModuleSystemWelcome extends WeModuleSystemWelcome
{

	//首页入口
	public function systemWelcomeDisplay()
	{
		$this->getClassName('Home');
	}

	//后端入口
	public function __call($name,$reqeust)
	{
        $this->getClassName('Admin');
	}

	//引入类
	private function getClassName($class)
	{
		global $_GPC, $_W;
		(include MODULE_ROOT.'/inc/'.$class.'.php');
		$action = isset($_GPC['p'])&&$_GPC['p']?$_GPC['p']:'index';
        if (class_exists($class)){
            $obj = new $class();
            $obj->$action();
        }else{
           exit('404');
        }
	}

}