<?php

return array(
    array(
        'title' => '前台地址',
        'controller' => 'index',
        'action' => 'index',
        'icon' => 'fa-newspaper-o',
        'items' => array()
    ),

    array(
        'title' => '轮播图',
        'controller' => 'ad',
        'action' => 'index',
        'icon' => 'fa-bars',
        'items' => array(
            array(
                'title' => '添加轮播图',
                'action' => 'add',
            ),
            array(
                'title' => '轮播图列表',
                'action' => 'index',
            ),
        )
    ),
  	array(
			'title' => '产品管理',
			'controller' => 'goods',
			'action' => 'index',
			'icon' => 'fa-shopping-cart',
			'items' => array(
					array(
							'title' => '添加产品',
							'action' => 'add',
					),
                    array(
                        'title' => '产品列表',
                        'action' => 'index',
                    ),
			)
		),
    array(
        'title' => '动态管理',
        'controller' => 'article',
        'action' => 'index',
        'icon' => 'fa-life-ring',
        'items' => array(
            array(
                'title' => '添加动态',
                'action' => 'add',
            ),
            array(
                'title' => '动态列表',
                'action' => 'index',
            )
        )
    ),

	
    array(
        'title' => '系统设置',
        'controller' => 'system',
        'action' => 'site',
        'icon' => 'fa-cog',
        'items' => array(
            array(
                'title' => '基本设置',
                'action' => 'site',
            ),
            array(
                'title' => '首页设置',
                'action' => 'index',
            ),

            array(
                'title' => '关于我们',
                'action' => 'about',
            ),
//            array(
//                'title' => '公众号配置',
//                'action' => 'wxset',
//            ),

        )
    ),

);