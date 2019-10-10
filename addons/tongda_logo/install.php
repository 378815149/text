<?php


//数据库

$table = 'tongda_logo';  //表前缀名


pdo_query("

DROP TABLE IF EXISTS `ims_{$table}_banner`;
CREATE TABLE `ims_{$table}_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` char(10) NOT NULL COMMENT '显示位置',
  `desc` varchar(255) NOT NULL COMMENT '英文标题',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ims_{$table}_case`;
CREATE TABLE `ims_{$table}_case` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否首页显示 0是',
  `path` varchar(255) NOT NULL COMMENT '链接',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `listsort` int(11) DEFAULT '0' COMMENT '排序',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_{$table}_chart`;
CREATE TABLE `ims_{$table}_chart` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_{$table}_company`;
CREATE TABLE `ims_{$table}_company` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `listsort` int(11) NOT NULL DEFAULT '0',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_{$table}_config`;
CREATE TABLE `ims_{$table}_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_{$table}_goods`;
CREATE TABLE `ims_{$table}_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否展示',
  `addtime` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `listsort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_{$table}_message`;
CREATE TABLE `ims_{$table}_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_{$table}_news`;
CREATE TABLE `ims_{$table}_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0' COMMENT '阅读量',
  `image` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架',
  `content` text NOT NULL,
  `listsort` int(11) NOT NULL DEFAULT '0',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

");