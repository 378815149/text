<?php
/**
 * a_123模块定义
 *
 * @author zhongfutongda
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Tongda_qiyeModule extends WeModule {

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