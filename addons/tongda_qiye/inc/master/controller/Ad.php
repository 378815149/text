<?php

/**
*@date     2019-9-17
*@model    广告模块
*@function zha lulu3163014@163.com
*/

namespace inc\master\controller;

use inc\common\controller\Base;

class Ad extends Base
{
	const tablename = TABLE_NAME.'_ad';

	public function index()
	{
		global $_W, $_GPC;
		$tablename = self::tablename;
		$where = array("uniacid" => $_W["uniacid"]);
		if ($_GPC["status"] && $_GPC["status"] != "all") {
			$where["status"] = $_GPC["status"];
		}
		$status = $_GPC["status"] ? $_GPC["status"] : "all";
		$page = max(1, intval($_GPC["page"]));
		$size = intval($_GPC["psize"]) ? intval($_GPC["psize"]) : 10;
		$total = pdo_count($tablename, $where, 0);
		$list = array();
		if ($total > 0) {
			$list = pdo_getall($tablename, $where, '', '', "ad_id DESC", $this->getPageLimit($page, $size));
		}
		$pager = pagination($total, $page, $size);
		$res  = $this->getAdminLogo();
		include $this->template('ad/index');
	}

	public function add()
	{
		global $_W, $_GPC;
		$tablename = self::tablename;
		if(checksubmit("submit")){
			if ($_GPC["title"] == null) {
				message("请输入标题", '', "error");
			} elseif ($_GPC["image"] == null) {
				message("请上传图片", '', "error");
			}
			$data = array("uniacid" => $_W["uniacid"], "title" => $_GPC["title"], "type" => intval($_GPC["type"]), "path" => $_GPC["path"], "image" => $_GPC["image"], "status" => $_GPC["status"], "addtime" => time(), "listorder" => $_GPC["listorder"]);
			if (empty($_GPC["ad_id"])) {
				$res = pdo_insert($tablename, $data);
			} else {
				unset($data["uniacid"]);
				$res = pdo_update($tablename, $data, array("ad_id" => $_GPC["ad_id"], "uniacid" => $_W["uniacid"]));
			}
			if ($res) {
				message("操作成功", $this->createWebUrl("ad", array("act" => "index")), "success");
			} else {
				message("操作失败", '', "error");
			}
		} else {
			if (intval($_GPC["ad_id"])) {
				$info = pdo_get($tablename, array("ad_id" => $_GPC["ad_id"], "uniacid" => $_W["uniacid"]));
			}
			$res  = $this->getAdminLogo();
			include $this->template('ad/add');
		}
	}

	public function op()
	{
		global $_W, $_GPC;
		$tablename = self::tablename;
		if ($_GPC["op"] == "del") {
			$res = pdo_delete($tablename, array("ad_id" => $_GPC["ad_id"], "uniacid" => $_W["uniacid"]));
			if ($res) {
				message("删除成功！", $this->createWebUrl("ad", array("act" => "index")), "success");
			} else {
				message("删除失败！", '', "error");
			}
		}
		if ($_GPC["op"] == "show") {
			$res = pdo_update($tablename, array("status" => 1), array("ad_id" => $_GPC["ad_id"], "uniacid" => $_W["uniacid"]));
			if ($res) {
				message("显示成功！", $this->createWebUrl("ad", array("act" => "index")), "success");
			} else {
				message("显示失败！", '', "error");
			}
		}
		if ($_GPC["op"] == "hide") {
			$res = pdo_update($tablename, array("status" => 2), array("ad_id" => $_GPC["ad_id"], "uniacid" => $_W["uniacid"]));
			if ($res) {
				message("隐藏成功！", $this->createWebUrl("ad", array("act" => "index")), "success");
			} else {
				message("隐藏失败！", '', "error");
			}
		}
	}

}