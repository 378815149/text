<?php
/**
*@date     2019-9-17
*@model    系统模块
*@function zha lulu3163014@163.com
*/
namespace inc\master\controller;

use inc\common\controller\Base;

class System extends Base
{
	const tablename = TABLE_NAME.'_config';
	//基础设置
	public function site()
	{
		global $_W,$_GPC;
		$where = array("uniacid" => $_W["uniacid"]);
		if(checksubmit('submit')){
			$data = array("uniacid" => $_W["uniacid"], "pt_name" => $_GPC["pt_name"], "link_name" => $_GPC["link_name"], "link_logo" => $_GPC["link_logo"], "copyright" => $_GPC["copyright"], "statsCode" => $_GPC["statsCode"]);
			$this->save($data,'site');
		} else {
			$this->show('site');
		}
	}
	//首页设置
	public function index()
	{
		global $_W,$_GPC;
		if(checksubmit('submit')){
			$data = array("uniacid" => $_W["uniacid"], "products_logo" => $_GPC["products_logo"], "about_logo" => $_GPC["about_logo"], "news_logo" => $_GPC["news_logo"], "contact_logo" => $_GPC["contact_logo"], "point_1" => $_GPC["point_1"], "point_2" => $_GPC["point_2"], "point_logo_1" => $_GPC["point_logo_2"], "point_logo_2" => $_GPC["point_logo_1"], "point_logo_3" => $_GPC["point_logo_3"], "point_3" => $_GPC["point_3"], "point_4" => $_GPC["point_4"], "point_5" => $_GPC["point_5"], "point_6" => $_GPC["point_6"], "point_logo_4" => $_GPC["point_logo_4"], "point_logo_5" => $_GPC["point_logo_5"], "point_logo_6" => $_GPC["point_logo_6"]);
			$this->save($data,'index');
		} else {
			$this->show('index');
		}
	}
	//关于我们
	public function about()
	{
		global $_W,$_GPC;
		if(checksubmit('submit')){
			$data = array("uniacid" => $_W["uniacid"], "company_name" => $_GPC["company_name"], "about_banner" => $_GPC["about_banner"], "contact_banner" => $_GPC["contact_banner"], "contact_tel_logo" => $_GPC["contact_tel_logo"], "contact_tel" => $_GPC["contact_tel"], "company_email" =>  $_GPC["company_email"], "company_email_logo" => $_GPC["company_email_logo"], "company_fax_logo" =>  $_GPC["company_fax_logo"], "company_fax" =>  $_GPC["company_fax"], "company_address_logo" =>  $_GPC["company_address_logo"], "company_address" =>  $_GPC["company_address"], "address_lng" =>  $_GPC["address_lng"], "address_lat" =>  $_GPC["address_lat"], "company_profile" =>  $_GPC["company_profile"]);
			$this->save($data,'about');
		} else {
			$this->show('about');
		}
	}

	private function save($data,$act)
	{
		$tablename = self::tablename;
		$where = array("uniacid" => $data["uniacid"]);
		$total = pdo_count($tablename,$where);
		if ((int)$total <= 0) {
			$res = pdo_insert($tablename, $data);
		} else {
			unset($data["uniacid"]);
			$res = pdo_update($tablename, $data, $where);
		}
		if ($res) {
			message("操作成功", $this->createWebUrl("system", array("act" => $act)), "success");
		} else {
			message("操作失败", '', "error");
		}
	}

	private function show($act)
	{
		global $_W;
		if (intval($_W["uniacid"])) {
			$info = pdo_get(self::tablename, array("uniacid" => $_W["uniacid"]));
		}
		$res  = $this->getAdminLogo();
		include $this->template('system/'.$act);
	}

}