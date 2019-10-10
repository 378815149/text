<?php

// +----------------------------------------------------------------------
// | 微擎模块
// +----------------------------------------------------------------------
// | Copyright (c) 厦门景诺科技  All rights reserved.
// +----------------------------------------------------------------------
// | Author: chen <234552367@qq.com>
// +----------------------------------------------------------------------


defined('IN_IA') or exit('Access Denied');

define('APP_PATH', __DIR__.'/application/');


include  'vendor/autoload.php';

class fzqy_chenModuleSite extends WeModuleSite {

    public function __call($name, $arguments)
    {   
        core\Bootstrap::run($name,$arguments);

    }


}