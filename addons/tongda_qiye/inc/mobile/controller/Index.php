<?php
/**
*@date     2019-9-17
*@model    Model模块
*@function zha lulu3163014@163.com
*/

namespace inc\mobile\controller;


use inc\common\controller\Base;

class Index extends Base
{
	//首页
	public function index()
	{
		global $_W,$_GPC;
		$menu      = 'index';
		$title     = '首页';
		$tablename = TABLE_NAME.'_ad';
		$where     = array("uniacid" => $_W["uniacid"],'status'=>1);
		$adlist    = pdo_getall($tablename,$where);
		$info      = $this->getConfig();
		//推荐产品    
		$tablename = TABLE_NAME.'_goods';
		$where     = array("uniacid" => $_W["uniacid"],'status' => 1, 'is_recommend' => 1);
		$goodslist = pdo_getall($tablename,$where,['goods_id','title','image'],'listorder DESC',[],[0,4]);
		//企业动态
		$tablename = TABLE_NAME.'_article';
		$where     = array("uniacid" => $_W["uniacid"],'status' => 1);
		$newslist  = pdo_getall($tablename,$where,'','listorder DESC',[],[0,8]);
		include $this->template('index/index');
	}
	//关于我们
	public function about()
	{
		global $_W,$_GPC;
		$menu      = 'about';
		$title     = '关于我们';
		$config    = $this->getConfig($_W["uniacid"]);
		include $this->template('index/about');
	}
	//企业动态
	public function news()
	{
		global $_W,$_GPC;
		$menu      = 'news';
		$title     = '企业动态';
		$tablename = TABLE_NAME.'_article';
		$where     = array("uniacid" => $_W['uniacid'],'status' => 1);
		$page      = max(1, intval($page));
		$size      = intval($size) ? intval($size) : 10;
		$total     = pdo_count($tablename, $where, 0);
		$list      = array();
		if ($total > 0) {
			$list = pdo_getall($tablename, $where, '', '', "listorder DESC", $this->getPageLimit($page, $size));
		}
		if($_W['isajax']){
			include $this->template('index/news_item');
		} else {
			include $this->template('index/news');
		}
	}
	//动态详情
	public function article()
	{
		global $_W,$_GPC;
		$menu      = 'news';
		$title     = '动态详情';
		$tablename = TABLE_NAME.'_article';
		$where     = array("uniacid" => $_W["uniacid"],'article_id' => $_GPC['article_id'], 'status' => 1);
		$info      = pdo_get($tablename,$where);
		include $this->template('index/article');
	}
	//产品中心
	public function goods()
	{
		global $_W,$_GPC;
		$menu      = 'goods';
		$title     = '产品中心';
		$tablename = TABLE_NAME.'_goods';
		$where     = array("uniacid" => $_W["uniacid"],'status' => 1);
		$page      = max(1, intval($_GPC["page"]));
		$size      = intval($_GPC["psize"]) ? intval($_GPC["psize"]) : 8;
		$total     = pdo_count($tablename, $where, 0);
		$list      = array();
		if ($total > 0) {
			$list = pdo_getall($tablename, $where, '', '', "listorder", $this->getPageLimit($page, $size));
		}
		if($_W['isajax']){
			include $this->template('index/goods_item');
		} else {
			include $this->template('index/goods');
		}
	}
	//产品详情
	public function info()
	{
		global $_W,$_GPC;
		$menu      = 'goods';
		$title     = '产品详情';
		$tablename = TABLE_NAME.'_goods';
		$where     = array("uniacid" => $_W["uniacid"],'status' => 1,'goods_id' => $_GPC['goods_id']);
		$info      = pdo_get($tablename,$where);
		empty($info) && message("产品已下架！", '', "error");
		$images    = explode(',',$info['image'].','.$info['goods_images']);
		//获取最后三条数据当作相关产品
		$map       = array(":uniacid" => $_W["uniacid"],':status' => 1);
		$sql       = "select goods_id,title,image from ". tablename($tablename). " where uniacid = :uniacid and status = :status ORDER BY goods_id limit 3";
		$list      = pdo_fetchall($sql,$map);
		if(!empty($list)){
			//当前产品是否存在数组中
			$goods_id  = array_column($list,'goods_id');
			if(in_array($_GPC['goods_id'],$goods_id)){
				sort($list);
				if($list[0]['goods_id'] == $_GPC['goods_id']){
					$list = [];
				} elseif($list[1]['goods_id'] == $_GPC['goods_id']){
					unset($list[0]);
					unset($list[1]);
				} elseif($list[2]['goods_id'] == $_GPC['goods_id']) {
					unset($list[2]);
				}
			}
		}
		include $this->template('index/info');
	}
	//联系我们
	public function contact()
	{
		global $_W,$_GPC;
		$menu      = 'contact';
		$title     = '联系我们';
		$config = $this->getConfig($_W["uniacid"]);
		include $this->template('index/contact');
	}


    private function getConfig($uniacid = 0)
    {
    	$tablename = TABLE_NAME.'_config';
		$where     = array("uniacid" => $uniacid);
		$config    = pdo_get($tablename,$where);
		// var_dump($config['copyright']);die;
		return $config;
    }


}