<?php


//后台菜单


return array(

	array(
		'title' => '站点设置',
		'icon'  => 'fa-cogs',
		'items' => array(
			array(
				'title' => '基本信息',
				'icon'  => 'fa-list-alt',
				'url'   => "{php echo url('site/entry',array('eid'=>$_GPC['eid']))}"
			),
			array(
				'title' => '合作公司',
				'icon'  => 'fa-bookmark',
				'url'   => "{php echo url('site/entry',array('eid'=>$_GPC['eid']))}"
			),
		) 
	),
	array(
		'title' => '首页设置',
		'icon'  => 'fa-cogs',
		'items' => array(
			array(
				'title' => 'Banner设置',
				'icon'  => 'fa-picture-o',
				'url'   => "{php echo url('site/entry',array('eid'=>$_GPC['eid']))}"
			),
			array(
				'title' => '页面底部',
				'icon'  => 'fa-minus-square-o',
				'url'   => "{php echo url('site/entry',array('eid'=>$_GPC['eid']))}"
			),
		) 
	),
	array(
		'title' => '关于我们',
		'icon'  => 'fa-cogs',
		'items' => array(
			array(
				'title' => '关于我们',
				'icon'  => 'fa-picture-o',
				'url'   => "{php echo url('site/entry',array('eid'=>$_GPC['eid']))}"
			),
			array(
				'title' => '留言列表',
				'icon'  => 'fa-suitcase',
				'url'   => "{php echo url('site/entry',array('eid'=>$_GPC['eid']))}"
			),
		) 
	),
	array(
		'title' => '业务管理',
		'icon'  => 'fa-cogs',
		'items' => array(
			array(
				'title' => '产品列表',
				'icon'  => 'fa-picture-o',
				'url'   => "{php echo url('site/entry',array('eid'=>$_GPC['eid']))}"
			),
			array(
				'title' => '案例列表',
				'icon'  => 'fa-suitcase',
				'url'   => "{php echo url('site/entry',array('eid'=>$_GPC['eid']))}"
			),
			array(
				'title' => '动态列表',
				'icon'  => 'fa-suitcase',
				'url'   => "{php echo url('site/entry',array('eid'=>$_GPC['eid']))}"
			)
		) 
	)

);