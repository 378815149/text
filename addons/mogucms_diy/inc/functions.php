<?php
/**
 * @author 永和软件
 * @url http://s.we7.cc/developer/index/250122
 */
defined('IN_IA') or exit('Access Denied');

//后台
if(!function_exists("mogucms_site_manage")){
	function mogucms_site_manage(){
		 global $_W;
		 $user = pdo_getAll("users");
		
		 include mytemplate('admin/home');
	}
}

if(!function_exists("mytemplate")){
	function mytemplate($filename) {
		global $_W;
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
}
?>