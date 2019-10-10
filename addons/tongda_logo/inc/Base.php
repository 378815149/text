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
*@function	:全站基类
*------------------------------------------------------
*/


class Base
{

	protected $config;
	//配置缓存名
	protected $cachename = 'get_tongda_log_config';

	public function __construct()
	{
		$this->config = $this->getHomeConfig();
	}

	//渲染模版
	protected function template($filename)
	{
		global $_W,$_GPC;
		$name = strtolower(MODULE_NAME);
		$defineDir = dirname(MODULE_ROOT).'/'.$name;
		if(defined('IN_SYS')) {
			$source = IA_ROOT . "/web/themes/{$_W['template']}/{$name}/{$filename}.html";
			$compile = IA_ROOT . "/data/tpl/web/{$_W['template']}/{$name}/{$filename}.tpl.php";
			if(!is_file($source)) {
				$source = IA_ROOT . "/web/themes/default/{$name}/{$filename}.html";
			}
			if(!is_file($source)) {
				$source = $defineDir . "/template/{$filename}.html";
			}
			if(!is_file($source)) {
				$source = IA_ROOT . "/web/themes/{$_W['template']}/{$filename}.html";
			}
			if(!is_file($source)) {
				$source = IA_ROOT . "/web/themes/default/{$filename}.html";
			}
		} else {
			$source = IA_ROOT . "/app/themes/{$_W['template']}/{$name}/{$filename}.html";
			$compile = IA_ROOT . "/data/tpl/app/{$_W['template']}/{$name}/{$filename}.tpl.php";
			if(!is_file($source)) {
				$source = IA_ROOT . "/app/themes/default/{$name}/{$filename}.html";
			}
			if (!is_file($source)) {
				$source = $defineDir . "/template/mobile/{$filename}.html";
			}
			if (!is_file($source)) {
				$source = $defineDir . "/template/wxapp/{$filename}.html";
			}
			if(!is_file($source)) {
				$source = $defineDir . "/template/webapp/{$filename}.html";
			}
			if(!is_file($source)) {
				$source = IA_ROOT . "/app/themes/{$_W['template']}/{$filename}.html";
			}
			if(!is_file($source)) {
				if (in_array($filename, array('header', 'footer', 'slide', 'toolbar', 'message'))) {
					$source = IA_ROOT . "/app/themes/default/common/{$filename}.html";
				} else {
					$source = IA_ROOT . "/app/themes/default/{$filename}.html";
				}
			}
		}

		if(!is_file($source)) {
			exit("Error: template source '{$filename}' is not exist!");
		}
		$paths = pathinfo($compile);
		$compile = str_replace($paths['filename'], $_W['uniacid'] . '_' . $paths['filename'], $compile);
		if (DEVELOPMENT || !is_file($compile) || filemtime($source) > filemtime($compile)) {
			template_compile($source, $compile, true);
		}
		return $compile;
	}

	//前端使用配置信息
	private function getHomeConfig()
	{
		$info  = cache_load($this->cachename);
		if(empty($info)){
			//重组数据
			$result = $this->getConfig(1);
			$config = (include MODULE_ROOT.'/inc/Config.php');
			$info   = array_merge($config,$result);
			cache_write($this->cachename,$info);
		}
		return $info;
	}

	//获取站点配置
	protected function getConfig($uniacid)
	{
		$table  = MODULE_NAME.'_config';
		$res    = pdo_getall($table,array('uniacid'=>$uniacid));
		if(empty($res)) return [];
		$result = array();
		foreach($res as $k=>$v){
			$result[$v['name']] = $v['value'];
		}
		return $result;
	}

	//分页
	public function getPageLimit($page, $size)
	{
		$firstRow = ($page - 1) * $size;
		$listRows = $size;
		return $firstRow . "," . $listRows;
	}

}