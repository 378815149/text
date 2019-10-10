<?php
// +----------------------------------------------------------------------
// | 微擎模块
// +----------------------------------------------------------------------
// | Copyright (c) 厦门景诺科技  All rights reserved.
// +----------------------------------------------------------------------
// | Author: chen <234552367@qq.com>
// +----------------------------------------------------------------------

namespace core;

// 记录内存初始使用
define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));

class Bootstrap {

    public static function run($name,$arguments){
     
        global $_GPC;
        //加载配置文件
        config::load();
        //设置数据库配置
        config::set_db();
        $isWeb = stripos($name, 'doWeb') === 0; //web端
        $isMobile = stripos($name, 'doMobile') === 0; //手机端
        $isPage = stripos($name, 'doPage') === 0;  //小程序接口
        if($isWeb) {
            $dir = 'admin';
            $fun = strtolower(substr($name, 5));
        }
        if($isMobile) {
            $dir = 'mobile';
            $fun = strtolower(substr($name, 8));
        }
        if($isPage) {
            $dir = 'app';
            $fun = strtolower(substr($name, 6));
        }

        $class = 'application\\'.$dir.'\\controller\\'.$fun;
        $action = isset($_GPC['act'])&&$_GPC['act']?$_GPC['act']:'index';
        if (class_exists($class)){
            $obj = new $class();
            $obj->$action();
        }else{
           exit('404');
        }
    }
}


