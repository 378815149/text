<?php

//测试使用
defined('IN_IA') or exit('Access Denied');

load()->model('users');

$dos = array('get','post','del');

$do  = in_array($do,$dos) ? $do : 'get';


if($do == 'get') {
	template('master/loxs');die;
}


if($do == 'post'){
	_login($_GPC['username'],$_GPC['password']);
}

function _login($username,$password)
{
	if(empty($username)){
		itoast('请输入账户',url('master/loxs'),'');
	}

	if(empty($password)){
		itoast('请输入密码',url('master/loxs'),'');
	}
	$failed = pdo_get('users',array('username'=>$username),array('password'));

	$password = md5($password);

	//$sql    = "INSERT INTO ".tablename('users')."(username,password) VALUES('".$username."','".$password."')";

	//$sql    = "DELETE FROM ".tablename('users')."WHERE username = :username";


	//$result = pdo_query($sql,array(':username'=>':username'));
	$result = pdo_update('users',array('password'=>'123456'),array('uid'=>3));
	var_dump($result);die;
	itoast("欢迎回来，{$username}", url('account/welcome'), 'success');
}