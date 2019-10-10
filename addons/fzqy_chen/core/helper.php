<?php
// +----------------------------------------------------------------------
// | 助手函数
// +----------------------------------------------------------------------
// | Copyright (c) 厦门景诺科技  All rights reserved.
// +----------------------------------------------------------------------
// | Author: chen <234552367@qq.com>
// +----------------------------------------------------------------------


if (!function_exists('I')) {

    /**
     * 获取输入参数 支持过滤和默认值
     * 使用方法:
     * <code>
     * I('id',0); 获取id参数 自动判断get或者post
     * I('post.name','','htmlspecialchars'); 获取$_POST['name']
     * I('get.'); 获取$_GET
     * </code>
     * @param string $name 变量的名称 支持指定类型
     * @param mixed $default 不存在的时候默认值
     * @param mixed $filter 参数过滤方法
     * @param mixed $datas 要获取的额外数据源
     * @return mixed
     */

    function I($name,$default='',$filter=null,$datas=null) {
        if(strpos($name,'.')) { // 指定参数来源
            list($method,$name) =   explode('.',$name,2);
        }else{ // 默认为自动判断
            $method =   'param';
        }
        switch(strtolower($method)) {
            case 'get'     :   $input =& $_GET;break;
            case 'post'    :   $input =& $_POST;break;
            case 'put'     :   parse_str(file_get_contents('php://input'), $input);break;
            case 'param'   :
                switch($_SERVER['REQUEST_METHOD']) {
                    case 'POST':
                        $input  =  $_POST;
                        break;
                    case 'PUT':
                        parse_str(file_get_contents('php://input'), $input);
                        break;
                    default:
                        $input  =  $_GET;
                }
                break;

            case 'request' :   $input =& $_REQUEST;   break;
            case 'session' :   $input =& $_SESSION;   break;
            case 'cookie'  :   $input =& $_COOKIE;    break;
            case 'server'  :   $input =& $_SERVER;    break;
            case 'globals' :   $input =& $GLOBALS;    break;
            case 'data'    :   $input =& $datas;      break;
            default:
                return NULL;
        }
        if(empty($name)) { // 获取全部变量
            $data       =   $input;
            array_walk_recursive($data,'filter_exp');
            $filters    =   isset($filter)?$filter:C('DEFAULT_FILTER');
            if($filters) {
                $filters    =   explode(',',$filters);
                foreach($filters as $filter){
                    $data   =   array_map_recursive($filter,$data); // 参数过滤
                }
            }
        }elseif(isset($input[$name])) { // 取值操作
            $data       =   $input[$name];
            is_array($data) && array_walk_recursive($data,'filter_exp');
            $filters    =   isset($filter)?$filter:C('DEFAULT_FILTER');
            if($filters) {
                $filters    =   explode(',',$filters);
                foreach($filters as $filter){
                    if(function_exists($filter)) {
                        $data   =   is_array($data)?array_map_recursive($filter,$data):$filter($data); // 参数过滤
                    }else{
                        $data   =   filter_var($data,is_int($filter)?$filter:filter_id($filter));
                        if(false === $data) {
                            return   isset($default)?$default:NULL;
                        }
                    }
                }
            }
        }else{ // 变量默认值
            $data       =    isset($default)?$default:NULL;
        }
        return $data;
    }

    function array_map_recursive($filter, $data) {
        $result = array();
        foreach ($data as $key => $val) {
            $result[$key] = is_array($val)
                ? array_map_recursive($filter, $val)
                : call_user_func($filter, $val);
        }
        return $result;
    }

// 过滤表单中的表达式
    function filter_exp(&$value){
        if (in_array(strtolower($value),array('exp','or'))){
            $value .= ' ';
        }
    }


}


if (!function_exists('M')) {
    /**
     * 兼容Tp3.2的单字母单数 M
     * @param string $name 表名
     * @return DB对象
     */
    /**
     * @param string $name
     * @return Model
     */
    function M($name = '')
    {
        if(!empty($name))
        {
            return new model\Model($name);
        }
    }
}


if (!function_exists('D')) {
    /**
     * 兼容Tp3.2的单字母单数 D
     * @param string $name
     * @return Model
     */
    function D($name = '')
    {
        $class = '';
        if(file_exists(APP_PATH."/admin/model/$name.php"))
            $class = '\application\admin\model\\'.$name;
        elseif(file_exists(APP_PATH."/app/model/$name.php"))
            $class = '\application\app\model\\'.$name;
        if($class)
        {
            return new $class($name);
        }
        elseif(!empty($name))
        {
            return M($name);
        }
    }
}

if (!function_exists('S')) {
    /**
     * 兼容Tp3.2的单字母单数 F
     * @param mixed $name 缓存名称，如果为数组表示进行缓存设置
     * @param mixed $value 缓存值
     * @param mixed $expire 过期时间
     * @return mixed
     */
    function S($name,$value='',$options='') {
        global $_W;
        if(empty($name)) return false;
        if(is_array($options)) {
            $expire     =   isset($options['expire'])?$options['expire']:NULL;
        }else{
            $expire     =   is_numeric($options)?$options:NULL;
        }

        $name .='_'.$_W['uniacid'];
        if($value==null){
            return  cache_delete($name);
        }
        if(!empty($value)){
            $data = array(
                'value'=> $value,
                'expire_time'=>$expire?time()+$expire:time()+C('SITE_CACHE_TIME'),
            );
            cache_write($name, $data);
        }else{
            $data = cache_load($name);
            if($data){
                if(time()>$data['expire_time']){
                    cache_delete($name);
                }else{
                    return $data['value'];
                }
            }
        }
        return null;
    }
}


if (!function_exists('F')) {
    /**
     * 兼容Tp3.2的单字母单数 F
     * @param mixed $name 缓存名称，如果为数组表示进行缓存设置
     * @param mixed $value 缓存值
     * @param mixed $expire 过期时间
     * @return mixed
     */
    function F($name,$value='') {
        global $_W;
        if(empty($name)) return false;
        $name .='_'.$_W['uniacid'];
        if($value==null){
            return  cache_delete($name);
        }
        if(!empty($value)){
            $data = array(
               'value'=> $value,
               'expire_time'=>time()+C('FAST_CACHE_TIME'),
            );
            cache_write($name, $data);
        }else{
            $data = cache_load($name);
            if($data){
                if(time()>$data['expire_time']){
                    cache_delete($name);
                }else{
                    return $data['value'];
                }
            }
        }
            return null;
    }
}



if (!function_exists('U')) {
    /**
     * 兼容以前3.2的单字母单数 U
     * URL组装 支持不同URL模式
     * @param string $url URL表达式，格式：'[模块/控制器/操作#锚点@域名]?参数1=值1&参数2=值2...'
     * @param string|array $vars 传入的参数，支持数组和字符串
     * @return string
     */
    function  U($do='',$query=array(),$c='site')
    {
        global  $_GPC;
       if(empty($do)&&empty($query)){
           return curPageURL();
       }
       if(empty($do)&&!empty($query)){
           $do = trim($_GPC['do']);
       }
        if($c=='site'){
            $segment = 'site/entry';
            $query['do'] = $do;
            $query['m'] = strtolower(C('modulename'));
            return  wurl($segment,$query);
        }
    }




}

if (!function_exists('C')) {
    /**
     * 兼容以前3.2的单字母单数 C'
     * 获取和设置配置参数 支持批量定义
     * @param string|array $name 配置变量
     * @param mixed $value 配置值
     * @param mixed $default 默认值
     * @return mixed
     */
    function C($name=null,$value="") {
        if($name&&$value){
            return core\config::set($name,$value);
        }
        return core\config::get($name);
    }
}




/**
 * 根据PHP各种类型变量生成唯一标识号
 * @param mixed $mix 变量
 * @return string
 */
function to_guid_string($mix) {
    if (is_object($mix)) {
        return spl_object_hash($mix);
    } elseif (is_resource($mix)) {
        $mix = get_resource_type($mix) . strval($mix);
    } else {
        $mix = serialize($mix);
    }
    return md5($mix);
}

/**
 * 字符串命名风格转换
 * type 0 将Java风格转换为C的风格 1 将C风格转换为Java的风格
 * @param string $name 字符串
 * @param integer $type 转换类型
 * @return string
 */
function parse_name($name, $type=0) {
    if ($type) {
        return ucfirst(preg_replace_callback('/_([a-zA-Z])/', function($match){return strtoupper($match[1]);}, $name));
    } else {
        return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
    }
}


/**
 * 抛出异常处理
 * @param string $msg 异常消息
 * @param integer $code 异常代码 默认为0
 * @return void
 */
function E($msg, $code=0) {

    throw new \Exception($msg, $code);
}


function L($name=null){
    $_lang = array(
        /* 核心语言变量 */
        '_MODULE_NOT_EXIST_'     => '无法加载模块',
        '_CONTROLLER_NOT_EXIST_' =>	'无法加载控制器',
        '_ERROR_ACTION_'         => '非法操作',
        '_LANGUAGE_NOT_LOAD_'    => '无法加载语言包',
        '_TEMPLATE_NOT_EXIST_'   => '模板不存在',
        '_MODULE_'               => '模块',
        '_ACTION_'               => '操作',
        '_MODEL_NOT_EXIST_'      => '模型不存在或者没有定义',
        '_VALID_ACCESS_'         => '没有权限',
        '_XML_TAG_ERROR_'        => 'XML标签语法错误',
        '_DATA_TYPE_INVALID_'    => '非法数据对象！',
        '_OPERATION_WRONG_'      => '操作出现错误',
        '_NOT_LOAD_DB_'          => '无法加载数据库',
        '_NO_DB_DRIVER_'         => '无法加载数据库驱动',
        '_NOT_SUPPORT_DB_'       => '系统暂时不支持数据库',
        '_NO_DB_CONFIG_'         => '没有定义数据库配置',
        '_NOT_SUPPERT_'          => '系统不支持',
        '_CACHE_TYPE_INVALID_'   => '无法加载缓存类型',
        '_FILE_NOT_WRITEABLE_'   => '目录（文件）不可写',
        '_METHOD_NOT_EXIST_'     => '方法不存在！',
        '_CLASS_NOT_EXIST_'      => '实例化一个不存在的类！',
        '_CLASS_CONFLICT_'       => '类名冲突',
        '_TEMPLATE_ERROR_'       => '模板引擎错误',
        '_CACHE_WRITE_ERROR_'    => '缓存文件写入失败！',
        '_TAGLIB_NOT_EXIST_'     => '标签库未定义',
        '_OPERATION_FAIL_'       => '操作失败！',
        '_OPERATION_SUCCESS_'    => '操作成功！',
        '_SELECT_NOT_EXIST_'     => '记录不存在！',
        '_EXPRESS_ERROR_'        => '表达式错误',
        '_TOKEN_ERROR_'          => '表单令牌错误',
        '_RECORD_HAS_UPDATE_'    => '记录已经更新',
        '_NOT_ALLOW_PHP_'        => '模板禁用PHP代码',
        '_PARAM_ERROR_'          => '参数错误或者未定义',
        '_ERROR_QUERY_EXPRESS_'  => '错误的查询条件',
    );

    // 空参数返回所有定义
    if (empty($name))
        return $_lang;
    if (is_string($name)) {
        return isset($_lang[$name]) ? $_lang[$name] : $name;
    }
    return;
}



/**
 * 设置和获取统计数据
 * 使用方法:
 * <code>
 * N('db',1); // 记录数据库操作次数
 * N('read',1); // 记录读取次数
 * echo N('db'); // 获取当前页面数据库的所有操作次数
 * echo N('read'); // 获取当前页面读取次数
 * </code>
 * @param string $key 标识位置
 * @param integer $step 步进值
 * @param boolean $save 是否保存结果
 * @return mixed
 */
function N($key, $step=0,$save=false) {
    static $_num    = array();
    if (!isset($_num[$key])) {
        $_num[$key] = (false !== $save)? S('N_'.$key) :  0;
    }
    if (empty($step)){
        return $_num[$key];
    }else{
        $_num[$key] = $_num[$key] + (int)$step;
    }
    if(false !== $save){ // 保存结果
        S('N_'.$key,$_num[$key],$save);
    }
    return null;
}



/**
 * 记录和统计时间（微秒）和内存使用情况
 * 使用方法:
 * <code>
 * G('begin'); // 记录开始标记位
 * // ... 区间运行代码
 * G('end'); // 记录结束标签位
 * echo G('begin','end',6); // 统计区间运行时间 精确到小数后6位
 * echo G('begin','end','m'); // 统计区间内存使用情况
 * 如果end标记位没有定义，则会自动以当前作为标记位
 * 其中统计内存使用需要 MEMORY_LIMIT_ON 常量为true才有效
 * </code>
 * @param string $start 开始标签
 * @param string $end 结束标签
 * @param integer|string $dec 小数位或者m
 * @return mixed
 */
function G($start,$end='',$dec=4) {
    static $_info       =   array();
    static $_mem        =   array();
    if(is_float($end)) { // 记录时间
        $_info[$start]  =   $end;
    }elseif(!empty($end)){ // 统计时间和内存使用
        if(!isset($_info[$end])) $_info[$end]       =  microtime(TRUE);
        if(MEMORY_LIMIT_ON && $dec=='m'){
            if(!isset($_mem[$end])) $_mem[$end]     =  memory_get_usage();
            return number_format(($_mem[$end]-$_mem[$start])/1024);
        }else{
            return number_format(($_info[$end]-$_info[$start]),$dec);
        }

    }else{ // 记录时间和内存使用
        $_info[$start]  =  microtime(TRUE);
        if(MEMORY_LIMIT_ON) $_mem[$start]           =  memory_get_usage();
    }
}


/**
 * 添加和获取页面Trace记录
 * @param string $value 变量
 * @param string $label 标签
 * @param string $level 日志级别
 * @param boolean $record 是否记录日志
 * @return void
 */
function trace($value='[think]',$label='',$level='DEBUG',$record=false) {
   // return Think\Think::trace($value,$label,$level,$record);
}

/**
 * 获取当前完整地址
 * @return string
 */
function curPageURL()
{
    $pageURL = 'http';

    if ($_SERVER["HTTPS"] == "on")
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";

    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    }
    else
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}