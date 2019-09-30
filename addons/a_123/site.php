<?php
/**
 * a_123模块微站定义
 *
 * @author zhongfutongda
 * @url
 */
defined('IN_IA') or exit('Access Denied');

//定义自己的根目录
define('APP_PATH', __DIR__.'/inc/');

//引入自动加载
include  'vendor/autoload.php';

class A_123ModuleSite extends WeModuleSite {

    public function __call($name, $arguments)
    {   
        core\Bootstrap::run($name,$arguments);
    }
}


