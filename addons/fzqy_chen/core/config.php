<?php
// +----------------------------------------------------------------------
// | 微擎模块
// +----------------------------------------------------------------------
// | Copyright (c) 厦门景诺科技  All rights reserved.
// +----------------------------------------------------------------------
// | Author: chen <234552367@qq.com>
// +----------------------------------------------------------------------

namespace core;

class config {
    // 配置参数
    private static $config = array();

    /**
     * 加载配置文件
     * @return mixed
     */
    public static function load()
    {
        $file = APP_PATH.'/config.php';
        if (is_file($file)) {
            return self::$config = include $file;

        }
        return self::$config;
    }

    public static function get($name = null)
    {
         if(empty($name)){
             return self::$config;
         }else{
             return isset(self::$config[$name]) ? self::$config[$name] : null;
         }
    }


    public static function set($name = null, $value = '')
    {
        if(!empty($name)&&!empty($value)){
              self::$config[$name] = $value;
        }else{
            return false;
        }
    }

    public  static function set_db(){
        global $_W;
        $db_config= $_W['config']['db']['master'];
		if(empty($db_config)){
			require IA_ROOT.'/data/config.php';
			$db_config = $config['db']['master'];
		}
		
		
        self::$config['DB_USER'] = $db_config['username'];
        self::$config['DB_PWD'] = $db_config['password'];
        self::$config['DB_PORT'] = $db_config['port'];
        self::$config['DB_HOST'] = $db_config['host'];
        self::$config['DB_NAME'] = $db_config['database'];
        self::$config['DB_CHARSET'] = $db_config['charset'];
        self::$config['DB_PREFIX'] = $db_config['tablepre'];
    }


}


