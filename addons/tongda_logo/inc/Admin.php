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
*@function	:后台模块
*------------------------------------------------------
*/

//引入公共类
(include 'Base.php');

class Admin extends Base
{ 
	//首页
	public function index()
	{
		$data    = array('webname','name','phone','email','beian','logo','timer');
		$this->doConfig('',$data);
	}
	//关于我们
	public function about()
	{
		$data = array('address','address_lng','address_lat','company','status');
		$this->doConfig('about',$data);
	}
	//留言板
	public function message()
	{
		$this->getCommonList('message');
	}
	//留言板详情
	public function message_do()
	{
		$this->getCommonDo('message',[],true);
	}
	//删除留言板
	public function message_del()
	{
		$this->getCommonDel('message','留言板');
	}
	//轮播图
	public function chart()
	{
		$this->getCommonList('chart');
	}
	//操作轮播图
	public function chart_do()
	{
		$data = array('path','addtime','image','status');
		$this->getCommonDo('chart',$data,true);
	}
	//删除轮播图
	public function chart_del()
	{
		$this->getCommonDel('chart','轮播图');
	}	
	//合作公司
	public function company()
	{
		$this->getCommonList('company');
	}
	//操作公司
	public function company_do()
	{
		$data = array('title','path','addtime','listsort');
		$this->getCommonDo('company',$data,true);
	}
	//删除合作公司
	public function company_del()
	{
		$this->getCommonDel('company','合作公司');
	}
	//banner列表
	public function banner()
	{
		$this->getCommonList('banner');
	}
	//操作banner
	public function banner_do()
	{
		$data = array('title','image','desc','position','addtime');
		$this->getCommonDo('banner',$data,true);
	}
	//删除banner
	public function banner_del()
	{
		$this->getCommonDel('banner','banner');
	}
	//产品列表
	public function goods()
	{
		$this->getCommonList('goods');
	}
	//操作产品
	public function goods_do()
	{
		$data = array('title','image','desc','status','addtime','listsort','icon');
		$this->getCommonDo('goods',$data,true);
	}
	//删除产品
	public function goods_del()
	{
		$this->getCommonDel('goods','动态');
	}
	//动态列表
	public function news()
	{
		$this->getCommonList('news');
	}
	//操作动态
	public function news_do()
	{
		$data = array('title','image','desc','status','addtime','listsort','number','content');
		$this->getCommonDo('news',$data,true);
	}
	//删除动态
	public function news_del()
	{
		$this->getCommonDel('news','动态');
	}
	//案例列表
	public function case()
	{
		$this->getCommonList('case');
	}
	//操作案例
	public function case_do()
	{
		$data = array('title','desc','image','status','path','listsort','addtime');
		$this->getCommonDo('case',$data,true);
	}
	//删除案例
	public function case_del()
	{
		$this->getCommonDel('case','产品');
	}
	//公共列表
	protected function getCommonList($name)
	{
		global $_W, $_GPC;
		$tablename = MODULE_NAME.'_'.$name;
		$where = array("uniacid" => $_W["uniacid"]);
		$page  = max(1, intval($_GPC["page"]));
		$size  = intval($_GPC["psize"]) ? intval($_GPC["psize"]) : 10;
		$total = pdo_count($tablename, $where, 0);
		$sort  = in_array($name,['banner','chart','message']) ? 'id DESC' : 'listsort DESC';
		$list  = array();
		if ($total > 0) {
			$list = pdo_getall($tablename, $where, '', '', $sort, $this->getPageLimit($page, $size));
		}
		$pager = pagination($total, $page, $size);
		if($name == 'banner'){
			$banner = $this->position();
		}
		include $this->template('admin/'.$name);
	}
	//公共操作
	protected function getCommonDo($name,$field,$type)
	{
		global $_W, $_GPC;
		$tablename = MODULE_NAME.'_'.$name;
		if(checksubmit("submit")){
			if (empty($_GPC["title"]) && $name != 'chart') {
				message("请输入标题", '', "error");
			}
			$data['uniacid']  = $_W["uniacid"];
			foreach($field as $k=>$v){
				if($v == 'addtime'){
					$data[$v] = time();
				} else {
					$data[$v] = $_GPC[$v];
				}
			}
			if (empty($_GPC["id"])) {
				$res = pdo_insert($tablename, $data);
			} else {
				unset($data["uniacid"]);
				$res = pdo_update($tablename, $data, array("id" => $_GPC["id"], "uniacid" => $_W["uniacid"]));
			}
			if ($res) {
				message("操作成功", url("site/entry", array("eid"=>$_GPC['eid'],'p'=>$name)), "success");
			} else {
				message("操作失败", '', "error");
			}
		} else {
			if (intval($_GPC["id"])) {
				$setting = pdo_get($tablename, array("id" => $_GPC["id"], "uniacid" => $_W["uniacid"]));
			}
			$name = $type?$name.'_do':$name;
			include $this->template('admin/'.$name);
		}
	}
	//公共删除
	protected function getCommonDel($name,$msg)
	{
		global $_W,$_GPC;
		if(empty($_GPC['id']) && !is_array($_GPC['id'])){
			message('请选择要删除的'.$msg, '', "error");
		}
		$where   = array('uniacid'=>$_W["uniacid"],'id'=>$_GPC['id']);
		$table   = MODULE_NAME.'_'.$name;
		$result  = pdo_count($table,$where);
		if($result <= 0){
			message($msg.'不存在！', '', "error");
		} 
		$res  = pdo_delete($table, $where);
		if ($res) {
			message('删除成功！', url("site/entry", array("eid" => $_GPC['eid'],'p'=>$name)), "success");
		} else {
			message('删除失败！', '', "error");
		}
	}
	//配置操作
	protected function doConfig($name,$field)
	{
		global $_GPC,$_W;
		$table  = MODULE_NAME . '_config';
		//获取已经有的配置信息
		$config = $this->getConfig($_W['uniacid']);
		if(checksubmit("submit")){
			foreach($field as $k=>$v){
				if(!array_key_exists($v,$config)){
					$insert = array('uniacid'=>$_W["uniacid"],'name'=>$v,'value'=>$_GPC[$v]);
					$res    = pdo_insert($table,$insert);
				} else {
					if($config[$v] == $_GPC[$v]) continue;
					$map    = array('uniacid'=>$_W["uniacid"],'name'=>$v);
					$res    = pdo_update($table,array('value'=>$_GPC[$v]),$map);
				}
				if(!$res){
					message('操作字段'.$v.'失败', '', "error");
				}
			}
			cache_delete($this->cachename);
			message('操作成功！', url("site/entry", array("eid" => $_GPC['eid'],'p'=>$name)), "success");
		} else {
			$setting = $this->config;
			$name = empty($name) ? 'index' : $name;
			include $this->template('admin/'.$name);
		}
	}
	//定义banner位置名称
	public function position()
	{
		return array(
			'case'  => '案例',
			'goods' => '产品',
			'news'  => '动态',
			'about' => '关于'
		);
	}
}