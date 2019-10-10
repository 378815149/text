<?php
$tablename = trim(tablename('fzqy_chen'),"`");//fzqy_chen  为项目名，该方式可以批量替换
pdo_query("
 
CREATE TABLE IF NOT EXISTS `{$tablename}_ad` (
  `ad_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL COMMENT '标识id',
  `type` tinyint(3) unsigned NOT NULL COMMENT '查看配置文件',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `image` varchar(250) NOT NULL COMMENT '广告图',
  `path` varchar(250) NOT NULL COMMENT '跳转地址',
  `status` smallint(1) unsigned NOT NULL COMMENT '状态 1 显示 2 隐藏',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `listorder` smallint(3) NOT NULL COMMENT '排序',
  PRIMARY KEY (`ad_id`),
  UNIQUE KEY `ad_id` (`ad_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='广告数据表' AUTO_INCREMENT=3 ;


CREATE TABLE IF NOT EXISTS `{$tablename}_article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL COMMENT '标题',
  `image` varchar(250) NOT NULL COMMENT '封面',
  `desc` varchar(255) DEFAULT NULL COMMENT '简介',
  `content` text NOT NULL COMMENT '内容',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态',
  `listorder` int(10) unsigned NOT NULL COMMENT '排序',
  `addtime` int(10) unsigned NOT NULL COMMENT '添加时间',
  `uniacid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=24 ;


CREATE TABLE IF NOT EXISTS `{$tablename}_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `appid` varchar(32) NOT NULL COMMENT '微信appid',
  `appsecret` varchar(64) NOT NULL COMMENT '微信秘钥',
  `mchid` varchar(32) NOT NULL COMMENT '商户号',
  `wxkey` varchar(64) NOT NULL COMMENT '支付key',
  `pt_name` varchar(20) NOT NULL COMMENT '平台名称',
  `link_name` varchar(20) NOT NULL COMMENT '系统名称',
  `link_logo` varchar(250) NOT NULL COMMENT '系统logo',
  `products_logo` varchar(255) DEFAULT NULL COMMENT '产品中心logo',
  `about_logo` varchar(255) DEFAULT NULL COMMENT '关于我们logo',
  `news_logo` varchar(255) DEFAULT NULL COMMENT '企业动态logo',
  `contact_logo` varchar(255) DEFAULT NULL COMMENT '联系我们logo',
  `uniacid` int(10) unsigned NOT NULL COMMENT '标识id',
  `point_1` varchar(50) DEFAULT NULL COMMENT '特性-1',
  `point_logo_1` varchar(255) DEFAULT NULL COMMENT '特性logo-1',
  `point_2` varchar(50) DEFAULT NULL COMMENT '特性-2',
  `point_logo_2` varchar(255) DEFAULT NULL COMMENT '特性logo-2',
  `point_3` varchar(50) DEFAULT NULL COMMENT '特性-3',
  `point_logo_3` varchar(255) DEFAULT NULL COMMENT '特性logo-3',
  `point_4` varchar(50) DEFAULT NULL COMMENT '特性-4',
  `point_logo_4` varchar(255) DEFAULT NULL COMMENT '特性logo-4',
  `point_5` varchar(50) DEFAULT NULL COMMENT '特性-5',
  `point_logo_5` varchar(255) DEFAULT NULL COMMENT '特性logo-5',
  `point_6` varchar(50) DEFAULT NULL COMMENT '特性-6',
  `point_logo_6` varchar(255) DEFAULT NULL COMMENT '特性logo-6',
  `about_content` text COMMENT '关于我们',
  `company_profile` text COMMENT '公司简介',
  `address_lng` double(10,6) DEFAULT NULL COMMENT '经度',
  `address_lat` double(10,6) DEFAULT NULL COMMENT '纬度',
  `company_address` varchar(100) DEFAULT NULL COMMENT '公司地址',
  `company_address_logo` varchar(250) DEFAULT NULL COMMENT '公司地址logo',
  `company_fax` varchar(20) DEFAULT NULL COMMENT '传真',
  `company_fax_logo` varchar(250) DEFAULT NULL COMMENT '传真logo',
  `company_email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `company_email_logo` varchar(250) DEFAULT NULL COMMENT '邮箱logo',
  `contact_tel` varchar(20) DEFAULT NULL COMMENT '电话',
  `contact_tel_logo` varchar(250) DEFAULT NULL COMMENT '电话logo',
  `contact_banner` varchar(250) DEFAULT NULL COMMENT '联系我们banner',
  `about_banner` varchar(250) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL COMMENT '公司名称',
  `copyright` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='站点设置表' AUTO_INCREMENT=3 ;


CREATE TABLE IF NOT EXISTS `{$tablename}_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '标题',
  `image` varchar(250) NOT NULL COMMENT '封面',
  `goods_images` varchar(1000) NOT NULL,
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `listorder` int(11) NOT NULL COMMENT '排序',
  `desc` text NOT NULL COMMENT '描述',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态 ',
  `addtime` int(11) unsigned NOT NULL COMMENT '添加时间',
  `uniacid` int(11) unsigned NOT NULL,
  `is_recommend` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=26 ;

CREATE TABLE IF NOT EXISTS `{$tablename}_order` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) NOT NULL COMMENT '订单号',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户id',
  `order_status` tinyint(1) unsigned NOT NULL COMMENT '订单状态',
  `pay_time` int(11) unsigned NOT NULL COMMENT '支付时间',
  `order_amount` decimal(10,2) NOT NULL COMMENT '订单金额',
  `uniacid` int(11) unsigned NOT NULL,
  `add_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表' AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `{$tablename}_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL COMMENT '标识id',
  `openid` varchar(32) unsigned NOT NULL COMMENT '微信标识',
  `nickname` varchar(20) NOT NULL COMMENT '昵称',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `sex` smallint(1) NOT NULL COMMENT '性别 0保密 1男 2女',
  `province` varchar(20) DEFAULT NULL COMMENT '省',
  `city` varchar(20) DEFAULT NULL COMMENT '市区',
  `district` varchar(20) DEFAULT NULL COMMENT '县',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `integral` int(11) DEFAULT '0' COMMENT '积分',
  `is_lock` smallint(1) unsigned DEFAULT '0' COMMENT '是否被锁定 0否 1是',
  `reg_time` int(11) NOT NULL COMMENT '注册时间',
  `last_login` int(11) NOT NULL COMMENT '最后登录时间',
  `last_ip` varchar(16) DEFAULT NULL COMMENT '最后登录ip',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户数据表' AUTO_INCREMENT=1 ;

");
