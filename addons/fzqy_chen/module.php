<?php

// +----------------------------------------------------------------------
// | 微擎模块
// +----------------------------------------------------------------------
// | Copyright (c) 厦门景诺科技  All rights reserved.
// +----------------------------------------------------------------------
// | Author: chen <234552367@qq.com>
// +----------------------------------------------------------------------


defined('IN_IA') or exit('Access Denied');

class fzqy_chenModule extends WeModule {


	public function welcomeDisplay()

    {   
    	global $_GPC, $_W;

        $url = $this->createWebUrl('index');
        if ($_W['role'] == 'operator') {
        	$url = $this->createWebUrl('account');
        }

        Header("Location: " . $url);

    }

}