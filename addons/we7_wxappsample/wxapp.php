<?php

/**
 * [WeEngine System] Copyright (c) 2013 WE7.CC
 * User: fanyk
 * Date: 2017/12/10
 * Time: 14:46.
 */
class We7_wxappsampleModuleWxapp extends WeModuleWxapp {

	const TABLE = 'we7_wxappsample_riji';

	private $gpc;
	private $w;
	private $uid; // 用户ID
	public function __construct() {
//		parent::__construct();
		global $_W;
		global $_GPC;
		$this->gpc = $_GPC;
		$this->w = $_W;
		$this->uid = $_W['openid'];
		$this->uniacid = $_W['uniacid'];
//		$this->uid = 0;
		// 如果需要强制登录 加 下边代码
//		if (empty($this->uid)) {
//			$this->result(41009, '请先登录');
//		}
	}


	public function get($key, $default = null) {
		return isset($this->gpc[$key]) ? $this->gpc[$key] : $default;
	}

	/**
	 * 显示数据
	 * 接口一个名为"index"的接口
	 * 响应json串.
	 */
	public function doPageIndex() {
		$this->result(0, '', array('hello' => 'word'));
	}
  
  	/*测试与小程序通信过程   李岩松添加*/
  	public function doPageFanhui(){
    	/*global $_W,$_GPC;
      	$data=['name'=>$_GPC['name'],'age'=>$_GPC['age']];
      	//载入日志函数
		load()->func('logging');
		//记录文本日志
		logging_run('$data');*/
      	$this->result(0, '记录成功', array('msg' => '发布成功'));
    }

	/**
	 *  日记列表
	 */
	public function doPageList() {
		$data = pdo_getall(self::TABLE, array('uniacid'=>$this->uniacid, 'uid'=>$this->uid),'', 'orderBy createtime desc');
		$this->result(0, '日记列表', $data);
	}

	/**
	 *  获取单条日记
	 */
	public function doPageShow() {
		$id = intval($this->get('id', 0));
		$data = pdo_get(self::TABLE, array('id'=>$id, 'uid'=>$this->uid, 'uniacid'=>$this->uniacid));
		$this->result(0, '获取单条日记', $data);
	}


	/**
	 *  修改单条日记
	 */
	public function doPageEdit() {
		$id = intval($this->get('id', 0));
		$title = $this->get('title');
		$content = $this->get('content');
		$data = pdo_update(self::TABLE, array('title'=>$title, 'content'=>$content), array('id'=>$id, 'uid'=>$this->uid, 'uniacid'=>$this->uniacid));
		$this->result(0, '编辑单条日记', $data ? 1 : 0);
	}



	/**
	 *  添加日记
	 */
	public function doPageAdd() {
		$title = $this->get('title', '');
		$content = $this->get('content');
		$image = $this->get('image', '');

		$insert = pdo_insert(self::TABLE, array('title'=>$title, 'image'=>$image,
			'content'=>$content, 'createtime'=>TIMESTAMP, 'updatetime'=>TIMESTAMP,
			'uid'=> $this->uid, 'uniacid'=>$this->uniacid));

		if ($insert) {
			$this->result(0, 'message', $insert);
			return;
		}
		$this->result(0, '添加失败');
	}

	/**
	 *  删除日记
	 */
	public function doPageDel() {
		$result = pdo_delete(self::TABLE,  array('id'=>intval($this->get('id')),
			'uid'=>$this->uid, 'uniacid'=>$this->uniacid));
		$this->result(0, '', $result ? 1 : 0);
	}

	/**
	 *  执行支付.
	 */
	public function doPagePay() {
		//模拟模块数据 支付需要 正式版本无需这行代码
//		$this->module = array('name' => 'we7_wxappsample');
		//构造订单数据
		$orderid = $this->get('orderid', null);
		// 判断权限
		if (!$this->hasOrder($orderid)) {
			$this->result(1, '非用户订单');
		}
//		$this->result(1, '非用户订单');
		$order = array(
			'tid' => $orderid, //订单号
			'fee' => floatval(0.01), //支付参数
			'title' => '测试订单', //标题
		);
		$paydata = $this->pay($order);
		if (is_error($paydata)) {
			$this->result($paydata['errno'], $paydata['message']);
		}
		$this->result(0, '', $paydata);
	}

	// 判断当前用户有没这个订单
	private function hasOrder($orderid) {
		return true;
	}

	/**
	 * 获取支付结果.
	 */
	public function doPagePayResult() {
		global $_GPC;
		global $_W;
		$orderid = $_GPC['orderid'];
		$order_type = trim($_GPC['order_type']);
		//订单id
		$paylog = pdo_get('core_paylog', array('uniacid' => $_W['uniacid'], 'module' => 'we7_wxappdemo', 'tid' => $orderid));
		$status = intval($paylog['status']) === 1;
		$this->result($status, $status ? '支付成功' : '支付失败');
	}
}
