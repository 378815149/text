<?php

/*
*------------------------------------------------------
*@date		:2019/9/25 10:25
*------------------------------------------------------
*@author	:查(HH)[北京通达推广有限公司]
*------------------------------------------------------
*@mail		:lulu3163014@163.com
*------------------------------------------------------
*@note		:later-Liu
*------------------------------------------------------
*@function	:前端模块
*------------------------------------------------------
*/



//引入公共类
(include 'Base.php');

class Home extends Base
{
	protected $uniacid;

	public function __cu()
	{
		global $_W;
		$this->uniacid = $_W['uniacid'];
	}

	//首页
	public function index()
	{
		global $_GPC;
		$where  = array('uniacid' => $this->uniacid,'status'=>1);
		//轮播图
		$images = pdo_getall(MODULE_NAME.'_chart',$where);
		//展示产品
		$goods  = pdo_getall(MODULE_NAME.'_goods',$where,'', '', "listsort DESC",'0,4');
		//展示案例
		$case   = pdo_getall(MODULE_NAME.'_case', $where,'', '', "listsort DESC",'0,4');
		//站点配置
		$config  = $this->config;
		//合作公司
		unset($where['status']);
		$company = pdo_getall(MODULE_NAME.'_company',$where);
		$show 	= 'index';
		include $this->template('home/index');
	}

	//产品
	public function goods()
	{
		$this->getCommonList('goods');
	}


	//动态
	public function news()
	{
		$this->getCommonList('news');
	}

	//动态详情
	public function detail()
	{
		global $_GPC;
		$where  = array('uniacid' => $this->uniacid,'id' => $_GPC['token']);
		$info   = pdo_get(MODULE_NAME.'_news',$where);
		if(empty($info)) {
			message('动态新闻不存在！', '', "error");
		}
		//站点配置
		$config  = $this->config;
		unset($config['id']);
		//合作公司
		$company = pdo_getall(MODULE_NAME.'_company',$where);
		$show 	= 'news';
		include $this->template('home/detail');
	}
	//案例
	public function case()
	{
		$this->getCommonList('case');
	}

	//关于
	public function about()
	{
		global $_GPC,$_W;
		if(checksubmit('submit')){
			$data = array('uniacid'=>$this->uniacid,'ip'=>$_W['clientip'],'addtime'=>time(),'name'=>$_GPC['name'],'phone'=>$_GPC['phone'],'email'=>$_GPC['email'],'content'=>$_GPC['content']);
			$table  = MODULE_NAME.'_message';
			$res    = pdo_insert($table,$data);
			$config = $this->config;
			if($res && $config['status']){
				message('感谢你的提议！', '', "success");
			} else {
				message('意见功能已暂停！', '', "error");
			}	
		} else {
			$where = array('uniacid' => $this->uniacid);
			//站点配置
			$config  = $this->config;
			//合作公司
			$company = pdo_getall(MODULE_NAME.'_company',$where);
			//banner
			$where['position'] = $name;
			$banner = pdo_get(MODULE_NAME.'_banner', $where);
			$show 	= 'about';
			include $this->template('home/about');
		}	
	}

	//公共列表
	private function getCommonList($name)
	{
		global $_GPC;
		$table = MODULE_NAME.'_'.$name;
		$where = array('uniacid' => $this->uniacid,'status' => 1);
		$page  = max(1, intval($_GPC["page"]));
		$size  = intval($_GPC["psize"]) ? intval($_GPC["psize"]) : 10;
		$total = pdo_count($table,$where,0);
		$list  = array();
		if ($total > 0) {
			$list = pdo_getall($table, $where, '', '', "listsort DESC", $this->getPageLimit($page, $size));
		}
		//$pager = pagination($total, $page, $size);
		//站点配置
		unset($where['status']);
		$config  = $this->config;
		//合作公司
		$company = pdo_getall(MODULE_NAME.'_company',$where);
		//banner
		$where['position'] = $name;
		$show 	= $name;
		$banner = pdo_get(MODULE_NAME.'_banner', $where);
		include $this->template('home/'.$name);
	}

}