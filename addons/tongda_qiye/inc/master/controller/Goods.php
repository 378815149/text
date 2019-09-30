<?php

/**
*@date     2019-9-17
*@model    产品模块
*@function zha lulu3163014@163.com
*/

namespace inc\master\controller;

use inc\common\controller\Base;

class Goods extends Base
{
	const tablename = TABLE_NAME.'_goods';

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
		$status = $_GPC["status"] ? $_GPC["status"] : "all";
		$page = max(1, intval($_GPC["page"]));
		$size = intval($_GPC["psize"]) ? intval($_GPC["psize"]) : 10;
		$total = pdo_count($tablename,$where,0);
		$list = array();
		if ($total > 0) {
			$list = pdo_getall($tablename, $where, '', '', "listorder DESC", $this->getPageLimit($page, $size));
		}
		$pager = pagination($total, $page, $size);
		$res  = $this->getAdminLogo();
		include $this->template('goods/index');
	}

	public function add()
	{
		global $_W,$_GPC;
		$tablename   = self::tablename;
		if(checksubmit("submit")){
			if ($_GPC["title"] == null) {
				message("请输入产品标题", '', "error");
			} elseif ($_GPC["image"] == null) {
				message("请上传产品封面图片", '', "error");
			}
			$goods_images = empty($_GPC["goods_images"]) ? '' : implode(',',$_GPC['goods_images']);
			$data = array("uniacid" => $_W["uniacid"], "title" => $_GPC["title"], "goods_images" => $goods_images, "desc" => $_GPC["desc"], "image" => $_GPC["image"], "price" => $_GPC["price"], "addtime" => time(), "listorder" => $_GPC["listorder"] ,'	status'=>$_GPC['status'],'is_recommend'=>$_GPC['is_recommend']);
			if (empty($_GPC["goods_id"])) {
				$res = pdo_insert($tablename, $data);
			} else {
				unset($data["uniacid"]);
				$res = pdo_update($tablename, $data, array("goods_id" => $_GPC["goods_id"], "uniacid" => $_W["uniacid"]));
			}
			if ($res) {
				message("操作成功", $this->createWebUrl("goods", array("act" => "index")), "success");
			} else {
				message("操作失败", '', "error");
			}
		} else {
			if (intval($_GPC["goods_id"])) {
				$info = pdo_get($tablename, array("goods_id" => $_GPC["goods_id"], "uniacid" => $_W["uniacid"]));
				if(!empty($info['goods_images'])){
					$info['goods_images'] = explode(',',$info['goods_images']);
				}
			}
			$res  = $this->getAdminLogo();
			include $this->template('goods/add');
		}
	}

	public function op()
	{
		global $_W,$_GPC;
		$tablename = self::tablename;
		$where     = array("goods_id" => $_GPC["goods_id"], "uniacid" => $_W["uniacid"]);
		switch($_GPC["op"])	{
			case 'show';
				$res     = pdo_update($tablename, array('status' => 1) ,$where);
				$error   = '显示成功！';
				$success = '显示失败！';
			break;
			case 'hide';
				$res     = pdo_update($tablename, array('status' => 2) ,$where);
				$error   = '隐藏成功！';
				$success = '隐藏失败！';
			break;
			case 'rec';
				$res     = pdo_update($tablename, array('is_recommend' => 1) ,$where);
				$error   = '推荐成功！';
				$success = '推荐失败！';
			break;
			case 'unrec';
				$res     = pdo_update($tablename, array('is_recommend' => 2) ,$where);
				$error   = '取消推荐成功！';
				$success = '取消推荐失败！';
			break;
			case 'del';
				$res     = pdo_delete($tablename, $where);
				$error   = '删除成功！';
				$success = '删除失败！';
			break;	
		}
		if ($res) {
			message($success, $this->createWebUrl("goods", array("act" => "index")), "success");
		} else {
			message($error, '', "error");
		}
	}

	public function del()
	{
		global $_W,$_GPC;
		if(empty($_GPC['goods_id']) && !is_array($_GPC['goods_id'])){
			message('请选择要删除的产品', '', "error");
		}
		$tablename   = self::tablename;
		$goods_id    = implode(',',$_GPC['goods_id']);
		$sql   = 'DELETE FROM '.tablename($tablename).' WHERE uniacid = :uniacid AND goods_id in(:goods_id)';
		$res  = pdo_query($sql, array(':uniacid'=>$_W["uniacid"],':goods_id'=>$goods_id));
		if ($res) {
			message('批量删除成功！', $this->createWebUrl("goods", array("act" => "index")), "success");
		} else {
			message('批量删除失败！', '', "error");
		}
	}



}