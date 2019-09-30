<?php
/**
*@date     2019-9-17
*@model    动态模块
*@function zha lulu3163014@163.com
*/
namespace inc\master\controller;

use inc\common\controller\Base;

class Article extends Base
{
	const tablename = TABLE_NAME.'_article';

	public function index()
	{
		global $_W,$_GPC;
		$tablename = self::tablename;
		$where = array("uniacid" => $_W["uniacid"]);
		if ($_GPC["status"] && $_GPC["status"] != "all") {
			$where["status"] = $_GPC["status"];
		}
		if (!empty($_GPC["keywords"])) {
			$where['title LIKE'] = "%".$_GPC['keywords']."%";
		}
		$keywords = $_GPC["keywords"] ? $_GPC["keywords"] : "";
		$status   = $_GPC["status"] ? $_GPC["status"] : "all";
		$page = max(1, intval($_GPC["page"]));
		$size = intval($_GPC["psize"]) ? intval($_GPC["psize"]) : 10;
		$total = pdo_count($tablename, $where, 0);
		$list = array();
		if ($total > 0) {
			$list = pdo_getall($tablename, $where, '', '', "listorder DESC", $this->getPageLimit($page, $size));
		}
		$pager = pagination($total, $page, $size);
		$res  = $this->getAdminLogo();
		include $this->template('article/index');
	}



	public function add()
	{
		global $_W,$_GPC;
		$tablename = self::tablename;
		if(checksubmit("submit")){
			if(empty($_GPC['title'])){
				message("请填写动态标题！", '', "error");
			}
			if(empty($_GPC['image'])){
				message("请上传动态封面！", '', "error");
			}
			$data = array("uniacid" => $_W["uniacid"], "title" => $_GPC["title"], "desc" => trim($_GPC["desc"]), "content" => trim($_GPC["content"]), "image" => $_GPC["image"], "status" => $_GPC["status"], "addtime" => time(), "listorder" => $_GPC["listorder"]);
			if (empty($_GPC["article_id"])) {
				$res = pdo_insert($tablename, $data);
			} else {
				unset($data["uniacid"]);
				$res = pdo_update($tablename, $data, array("article_id" => $_GPC["article_id"], "uniacid" => $_W["uniacid"]));
			}
			if ($res) {
				message("操作成功", $this->createWebUrl("article", array("act" => "index")), "success");
			} else {
				message("操作失败", '', "error");
			}
		} else {
			if (intval($_GPC["article_id"])) {
				$info = pdo_get(self::tablename, array("article_id" => $_GPC["article_id"], "uniacid" => $_W["uniacid"]));
			}
			$res  = $this->getAdminLogo();
			include $this->template('article/add');
		}
	}

	public function op()
	{
		global $_W, $_GPC;
		$tablename = self::tablename;
		$where     = array("article_id" => $_GPC["article_id"], "uniacid" => $_W["uniacid"]);
		if ($_GPC["op"] == "del") {
			$res = pdo_delete($tablename, $where);
			$err = '删除成功！';
			$suc = '删除失败！';
		}
		if ($_GPC["op"] == "show") {
			$res = pdo_update($tablename, array("status" => 1), $where);
			$err = '显示成功！';
			$suc = '显示失败！';
		}
		if ($_GPC["op"] == "hide") {
			$res = pdo_update($tablename, array("status" => 2), $where);
			$err = '隐藏成功！';
			$suc = '隐藏失败！';
		}
		if ($res) {
			message($err, $this->createWebUrl("article", array("act" => "index")), "success");
		} else {
			message($suc, '', "error");
		}
	}

	public function del()
	{
		global $_W,$_GPC;
		if(empty($_GPC['article_id']) && !is_array($_GPC['article_id'])){
			message('请选择要删除的产品', '', "error");
		}
		$tablename   = self::tablename;
		$article_id  = implode(',',$_GPC['article_id']);
		$sql   		 = 'DELETE FROM '.tablename($tablename).' WHERE uniacid = :uniacid AND article_id in(:article_id)';
		$res  		 = pdo_query($sql, array(':uniacid'=>$_W["uniacid"],':article_id'=>$article_id));
		if ($res) {
			message('批量删除成功！', $this->createWebUrl("article", array("act" => "index")), "success");
		} else {
			message('批量删除失败！', '', "error");
		}
	}


}