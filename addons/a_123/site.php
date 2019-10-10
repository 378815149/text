<?php
/**
 * a_123模块微站定义
 *
 * @author zhongfutongda
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class A_123ModuleSite extends WeModuleSite {

 	public function __call($name, $arguments)
 	{   
        core\Bootstrap::run($name,$arguments);
    }


}