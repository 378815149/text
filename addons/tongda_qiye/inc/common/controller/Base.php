<?php

/**
*@date     2019-9-17
*@model    基类
*@function zha lulu3163014@163.com
*/

namespace inc\common\controller;

class Base 
{
	public $gpc;
	public $uniacid;
	public $__define;

	public function __construct()
	{
		global $_W, $_GPC;
		$this->gpc     = $_GPC;
		$this->uniacid  = intval($_W["uniacid"]);
		$this->__define = IA_ROOT . "/addons/" . trim($_GPC["m"]);
	}
	//后台菜单列表
	public function getMainMenu()
	{
		$menu = (include $this->__define . "/inc/master/menu.php");
		$navemenu = array();
		$do = $this->gpc["do"];
		$act = $this->gpc["act"] ? $this->gpc["act"] : '';
		foreach ($menu as $v) {
			$_menuData = array("do" => $v["controller"], "title" => $this->createMenuTitle($v["title"], $v["controller"], $v["action"], $v["icon"]), "items" => array());
			if ($v["items"]) {
				foreach ($v["items"] as $item) {
					$_itemData = $this->createMainMenu($item["title"], $do . $act, $v["controller"], $item["action"], '');
					$_menuData["items"][] = $_itemData;
				}
			}
			$navemenu[] = $_menuData;
		}
		return $navemenu;
	}

	protected function getAdminLogo()
	{
		$res = cache_load('admin_logo');
		if(!empty($res)) return $res;
		$tablename = TABLE_NAME.'_config';
		$where = array("uniacid" => $this->uniacid);
		$res = pdo_get($tablename,$where,['link_name','link_logo']);
		cache_write('admin_logo',$res);
		return $res;
	} 



	function createMenuTitle($title, $do, $act, $icon = "fa-line-chart", $color = "color:#8d8d8d;")
	{
		return "<a href=\"" . $this->createWebUrl($do, array("op" => "display", "act" => $act)) . "\" class=\"panel-title wytitle\" id=\"yframe-" . $do . "\"><icon style=\"" . $color . "\" class=\"fa " . $icon . "\"></icon>" . $title . "</a>";
	}
	function createMainMenu($title, $do, $method, $act, $icon = "fa-image", $color = '')
	{
		$color = " style=\"color:" . $color . ";\" ";
		return array("title" => $title, "url" => $this->createWebUrl($method, array("op" => "display", "act" => $act)), "active" => $do == $method . $act ? " active" : '', "append" => array("title" => "<i " . $color . " class=\"fa fa-angle-right\"></i>"));
	}
	protected function createWebUrl($do, $query = array())
	{
		$query["do"] = $do;
		$query["m"]  = strtolower($this->gpc['m']);
		return wurl("site/entry", $query);
	}
	protected function createMobileUrl($do, $query = array())
	{
		$query["do"] = $do;
		$query["m"] = strtolower($this->gpc['m']);
		return murl("entry", $query, true, true);
	}
	//分页
	public function getPageLimit($page, $size)
	{
		$firstRow = ($page - 1) * $size;
		$listRows = $size;
		return $firstRow . "," . $listRows;
	}
	//引入模版
	protected function template($filename)
	{
		global $_W,$_GPC;
		$action   = empty($this->gpc['do']) ? 'index' : $this->gpc['do'];
		$name 	  = strtolower($this->gpc['m']);
		$defineDir  = $this->__define;
		if (defined("IN_SYS")) {
			$source  = $defineDir . "/template/master/{$filename}.html";
			$compile = IA_ROOT . "/data/tpl/web/{$_W["template"]}/{$name}/{$filename}.tpl.php";
		} else {
			$source  = $defineDir . "/template/mobile/{$filename}.html";
			$compile = IA_ROOT . "/data/tpl/app/{$_W["template"]}/{$name}/{$filename}.tpl.php";
		}
		if (!is_file($source)) {
			exit("Error: template source '{$action}' is not exist!");
		}	
		$paths = pathinfo($compile);
		$compile = str_replace($paths["filename"], $_W["uniacid"] . "_" . $paths["filename"], $compile);
		if (DEVELOPMENT || !is_file($compile) || filemtime($source) > filemtime($compile)) {
			template_compile($source, $compile, true);
		}
		return $compile;
	}

}