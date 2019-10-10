<?php
// +----------------------------------------------------------------------
// | 微擎模块
// +----------------------------------------------------------------------
// | Copyright (c) 厦门景诺科技  All rights reserved.
// +----------------------------------------------------------------------
// | Author: chen <234552367@qq.com>
// +----------------------------------------------------------------------


/**
 *
 * 产生随机字符串，不长于32位
 * @param int $length
 * @return 产生的随机字符串
 */
function getNonceStr($length = 32)
{
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $str ="";
    for ( $i = 0; $i < $length; $i++ )  {
        $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);
    }
    return $str;
}

/**
 * 友好时间显示
 * @param $time
 * @return bool|string
 */
function friend_date($time)
{
    if (!$time)
        return false;
    $fdate = '';
    $d = time() - intval($time);
    $ld = $time - mktime(0, 0, 0, 0, 0, date('Y')); //得出年
    $md = $time - mktime(0, 0, 0, date('m'), 0, date('Y')); //得出月
    $byd = $time - mktime(0, 0, 0, date('m'), date('d') - 2, date('Y')); //前天
    $yd = $time - mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')); //昨天
    $dd = $time - mktime(0, 0, 0, date('m'), date('d'), date('Y')); //今天
    $td = $time - mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')); //明天
    $atd = $time - mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')); //后天
    if ($d == 0) {
        $fdate = '刚刚';
    } else {
        switch ($d) {
            case $d < $atd:
                $fdate = date('Y年m月d日', $time);
                break;
            case $d < $td:
                $fdate = '后天' . date('H:i', $time);
                break;
            case $d < 0:
                $fdate = '明天' . date('H:i', $time);
                break;
            case $d < 60:
                $fdate = $d . '秒前';
                break;
            case $d < 3600:
                $fdate = floor($d / 60) . '分钟前';
                break;
            case $d < $dd:
                $fdate = floor($d / 3600) . '小时前';
                break;
            case $d < $yd:
                $fdate = '昨天' . date('H:i', $time);
                break;
            case $d < $byd:
                $fdate = '前天' . date('H:i', $time);
                break;
            case $d < $md:
                $fdate = date('m月d日 H:i', $time);
                break;
            case $d < $ld:
                $fdate = date('m月d日', $time);
                break;
            default:
                $fdate = date('Y年m月d日', $time);
                break;
        }
    }
    return $fdate;
}





/**
 * 获取数组中的某一列
 * @param type $arr 数组
 * @param type $key_name  列名
 * @return type  返回那一列的数组
 */
function get_arr_column($arr, $key_name)
{
    $arr2 = array();
    foreach($arr as $key => $val){
        if(!in_array($val[$key_name],$arr2))
            $arr2[] = $val[$key_name];
    }
    return $arr2;
}


/**
 * 获取url 中的各个参数  类似于 pay_code=alipay&bank_code=ICBC-DEBIT
 * @param type $str
 * @return type
 */
function parse_url_param($str){
    $data = array();
    $str = explode('?',$str);
    $str = end($str);
    $parameter = explode('&',$str);
    foreach($parameter as $val){
        $tmp = explode('=',$val);
        $data[$tmp[0]] = $tmp[1];
    }
    return $data;
}


/**
 * 二维数组排序
 * @param $arr
 * @param $keys
 * @param string $type
 * @return array
 */
function array_sort($arr, $keys, $type = 'desc')
{
    $key_value = $new_array = array();
    foreach ($arr as $k => $v) {
        $key_value[$k] = $v[$keys];
    }
    if ($type == 'asc') {
        asort($key_value);
    } else {
        arsort($key_value);
    }
    reset($key_value);
    foreach ($key_value as $k => $v) {
        $new_array[$k] = $arr[$k];
    }
    return $new_array;
}


/**
 * 多维数组转化为一维数组
 * @param 多维数组
 * @return array 一维数组
 */
function array_multi2single($array)
{
    static $result_array = array();
    foreach ($array as $value) {
        if (is_array($value)) {
            array_multi2single($value);
        } else
            $result_array [] = $value;
    }
    return $result_array;
}


/**
 * 二维数组合并并排序
 * @param $a 二维数组
 * @param $b 二维数组
 * @return array
 */
function array_to_combine($a,$b,$keys='',$type = 'desc')
{
    $result_array = array();
    if(is_array($a)){
        foreach ($a as $v) {
            $result_array[] = $v;
        }
    }
    if(is_array($a)){
        foreach ($b as $v) {
            $result_array[] = $v;

        }
    }
    if($keys&&count($result_array)>0){
        $result_array =  array_sort($result_array,$keys,$type);
    }

    return $result_array;
}

/**
 * 去除多维数组中最外层的key
 */
function  array_remove_key($array){
    $result_array = array();
    if(is_array($array)){
        foreach ($array as  $v) {
            $result_array[] = $v;
        }
    }
    return $result_array;
}


/**
 * 转换数组key
 */
function  array_set_key($array=array(),$key=''){
    $result_array = array();
    if(is_array($array)){
        foreach ($array as  $v) {
            $result_array[$v[$key]] = $v;
        }
    }
    return $result_array;
}



function https_request($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,60);
    curl_setopt($curl, CURLOPT_SSLVERSION, 4);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}



function tocurl($url="",$data=""){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}


function curlp($post_url,$xjson){//php post
    $ch = curl_init($post_url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //ssl证书不检验
    curl_setopt($ch, CURLOPT_USERAGENT,useragent());
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS,$xjson);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($xjson))
    );
    $respose_data = curl_exec($ch);
    return $respose_data;
}


function useragent($mobile=null){
    $ua1 = 'Mozilla/5.0 (Windows NT 5.1; rv:25.0) Gecko/20100101 Firefox/25.0';
    $ua2= 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1';
    $ua3 = 'Mozilla/5.0 (Windows NT 6.1; rv:25.0) Gecko/20100101 Firefox/25.0';
    $ua4 = 'Mozilla/5.0 (Windows NT 6.2; rv:25.0) Gecko/20100101 Firefox/25.0';
    $ua5 = 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1';
    $ua6 = 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1';
    $ua7 = 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/534.57.2 (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2';
    $ua8 = 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 2.0.50727; .NET CLR 1.1.4322; .NET4.0C; .NET CLR 3.0.04506.30; InfoPath.2; .NET4.0E; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)';
    $ua9 = 'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 1.1.4322; .NET4.0C; .NET CLR 3.0.04506.30; InfoPath.2; .NET4.0E; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)';
    $ua10 = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 1.1.4322; .NET4.0C; .NET CLR 3.0.04506.30; InfoPath.2; .NET4.0E; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)';
    $ua11 = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 1.1.4322; .NET4.0C; .NET CLR 3.0.04506.30; InfoPath.2; .NET4.0E; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)';
    $uaarr = array($ua1,$ua2,$ua3,$ua4,$ua5,$ua6,$ua7,$ua8,$ua9,$ua10,$ua11);
    if($mobile){
        return 'Mozilla/5.0 (Linux; Android 4.4.4; HM NOTE 1LTEW Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/33.0.0.0 Mobile Safari/537.36 MicroMessenger/6.0.2.56_r958800.520 NetType/3gnet';
        //Mozilla/5.0 (Linux; Android 4.4.4; HM NOTE 1LTEW Build/KTU84P) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/33.0.0.0 Mobile Safari/537.36 MicroMessenger/6.0.2.56_r958800.520 NetType/3gnet
        //Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Mobile/11B554a MicroMessenger/5.2
    }else{
        return $uaarr[rand(0,count($uaarr)-1)];
    }
}

function curl_get_contents($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_USERAGENT, "IE 6.0");
    $r = curl_exec($ch);
    curl_close($ch);
    if($r===false) return file_get_contents($url);
    return $r;
}


/**
 * 保留后两位
 * @param 金额 $fee
 * @return string
 */
function fee_format($fee){
    $fee  = number_format($fee, 2, '.', '');
    if(floatval($fee)<0){
        $fee = "0.00";
    }
    return $fee;
}



function config($key=''){
    global $_W;
    $cache_name = C('modulename').'_config_'.$_W['uniacid'];

   if($data = cache_load($cache_name)){
        if($key) return $data[$key];
        return $data ;
    }
    $info = pdo_get(C('modulename').'_config', array('uniacid'=>$_W['uniacid']));
    if($info){
        cache_write($cache_name, $info);
        if($key) return $info[$key];
        return $info;
    }
    return $info;
}



/**
 * 获取内容图片
 * @param string $content 内容
 * @param int $num N张图片
 * @return string 图片URL
 */
 function getImage($content, $num = 3)
{
    if(!$content) return array();
    $img = array();
    $content = htmlspecialchars_decode($content);
    //$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    $output = preg_match_all("/<img.*?src=\"(.+?)\"/", $content, $matches);

    if($matches[1]){
        for ($i=0;$i<3;$i++){
            $img[] = $matches[1][$i];
        }
    }

    return $img;
}


/**
 * 检查手机号码格式
 * @param $mobile 手机号码
 */
function check_mobile($mobile){
    if(preg_match('/1[34578]\d{9}$/',$mobile))
        return true;
    return false;
}



/**
 * 概率计算函数
 * @param $proArr
 * @return int|string
 */
function get_rand($proArr) {
    $result = '';

    //概率数组的总概率精度
    $proSum = array_sum($proArr);

    //概率数组循环
    foreach ($proArr as $key => $proCur) {
        $randNum = mt_rand(1, $proSum);
        if ($randNum <= $proCur) {
            $result = $key;
            break;
        } else {
            $proSum -= $proCur;
        }
    }
    unset ($proArr);

    return $result;
}

/**
 * 过滤手机号码
 * @param $mobile
 * @return mixed
 */
function filter_mobile($mobile){
    return substr_replace($mobile, '****', 3, 4);
}



 function curlPost($url,$postFields){
    $postFields = json_encode($postFields);

    $ch = curl_init ();
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8'   //json版本需要填写  Content-Type: application/json;
        )
    );
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt( $ch, CURLOPT_TIMEOUT,60);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
    $ret = curl_exec ( $ch );
    if (false == $ret) {
        $result = curl_error(  $ch);
    } else {
        $rsp = curl_getinfo( $ch, CURLINFO_HTTP_CODE);
        if (200 != $rsp) {
            $result = "请求状态 ". $rsp . " " . curl_error($ch);
        } else {
            $result = $ret;
        }
    }
    curl_close ( $ch );
    return $result;
}




