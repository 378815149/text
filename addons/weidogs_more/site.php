<?php

defined('IN_IA') or exit('Access Denied');
!defined('D_PATH') && define('D_PATH', '../addons/weidogs_more/');
require_once 'inc/functions.php'; 
class weidogs_moreModuleSite extends WeModuleSite {
   
    
	public function __construct(){
       // m('member')->checkMember();
	}
	public function createMobileUrl($do, $query = array(), $noredirect = true)
    {
        global $_W, $_GPC;
        $do = explode('/', $do);
        if (isset($do[1])) {
            $query = array_merge(array(
                'p' => $do[1]
            ), $query);
        }
        if (empty($query['mid'])) {
            $mid = intval($_GPC['mid']);
            if (!empty($mid)) {
                $query['mid'] = $mid;
            }
        }
        return $_W['siteroot'] . 'app/' . substr(parent::createMobileUrl($do[0], $query, true), 2);
    }
    public function createWebUrl($do, $query = array())
    {
        global $_W;
        $do = explode('/', $do);
        if (count($do) > 1 && isset($do[1])) {
            $query = array_merge(array(
                'p' => $do[1]
            ), $query);
        } 
        return $_W['siteroot'] . 'web/' . substr(parent::createWebUrl($do[0], $query, true), 2);
    }
    public function config(){
        global $_W;
        $sql = 'SELECT `settings` FROM ' . tablename('uni_account_modules') . ' WHERE  `module` = :module order by id desc' ;
        $settings = pdo_fetchcolumn($sql, array( ':module' => 'dx_zh'));
        $settings = iunserializer($settings);
        return $settings;
    }
    
   


}