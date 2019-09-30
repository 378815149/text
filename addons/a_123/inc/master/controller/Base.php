<?php

namespace inc\master\controller;

class Base 
{
	public $modulename;
	public $uniacid;
	public $__define;
	public $navemenu;

	public function __construct()
	{
		global $_W, $_GPC;
		$this->modulename = trim($_GPC["m"]);
		$this->uniacid = intval($_W["uniacid"]);
		$this->__define = IA_ROOT . "/addons/" . $this->modulename;
		//C("modulename", $this->modulename);
		//$this->getMainMenu();
	}
	//后台菜单列表
	public function getMainMenu()
	{
		global $_GPC;
		$menu = (include $this->__define . "/inc/master/menu.php");
		$navemenu = array();
		$do = $_GPC["do"];
		$act = $_GPC["act"] ? $_GPC["act"] : '';
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
}