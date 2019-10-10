<?php

defined('IN_IA') or exit('Access Denied');

global $_W,$_GPC;

$config=$this->config();

	if($config['czy']){
		$username='we-'.$_W['uniacid'];
	}else{
		$username='we-'.$_W['user']['username'].'-'.$_W['uniacid'];
	}
	
	
	$token=generate_password(10);
	$user_data = array(
		'username' => $username,
		'token' => $token,
	);
	if($config['db']){
		
		$weidog_database = array(
			'host' =>$config['db_ip'], //数据库IP或是域名
			'username' => $config['db_username'], // 数据库连接用户名
			'password' => $config['db_password'], // 数据库连接密码
			'database' => $config['db_database'], // 数据库名
			'port' => $config['db_port'], // 数据库连接端口
			'tablepre' => '', // 表前缀，如果没有前缀留空即可
			'charset' => 'utf8', // 数据库默认编码
			'pconnect' => 0, // 是否使用长连接
		);
		$weidog_db = new DB($weidog_database);
		$result = $weidog_db->insert('ims_user_linshi', $user_data);
	}else{
		$result = pdo_insert('user_linshi', $user_data);
	}

	

	if (!empty($result)) {
		header("Location:".$config['host'].'/we7.html?token='.$token);
	}else{
		message('失败');
	}
	


function generate_password( $length = 8 ) {  
		// 密码字符集，可任意添加你需要的字符  
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';  
		$password = time();  
		for ( $i = 0; $i < $length; $i++ )  
		{  
		// 这里提供两种字符获取方式  
		// 第一种是使用 substr 截取$chars中的任意一位字符；  
		// 第二种是取字符数组 $chars 的任意元素  
		// $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);  
		$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];  
		}  
		return $password;  
} 