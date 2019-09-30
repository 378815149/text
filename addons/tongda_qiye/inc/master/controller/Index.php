<?php
/**
*@date     2019-9-17
*@model    首页模块
*@function zha lulu3163014@163.com
*/
namespace inc\master\controller;

use inc\common\controller\Base;

class Index extends Base
{

	public function index()
	{
		global $_W, $_GPC;
		$res  = $this->getAdminLogo();
		include $this->template('index/index');
	}

}