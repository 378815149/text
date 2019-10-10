<?php
/**
 * 小程序接口定义
 *
 * @author alluu
 * @url
 */


$xml = file_get_contents('php://input');

libxml_disable_entity_loader(true);
$result = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

define('IN_MOBILE', true);
require '../../framework/bootstrap.inc.php';
//cache_write('wxpay_reqeust', $result);
//$result = cache_load('wxpay_reqeust');

$m = $_GPC['m']= 'fzqy_chen';
$method = 'doPageIndex';
$_GPC['act'] = 'wxNotify';
$_GPC['wxpay_reqeust'] =$result;

$site = WeUtility::createModuleWxapp($m);
if(!is_error($site)) {
    $site->inMobile = true;
    $site->$method();
}
