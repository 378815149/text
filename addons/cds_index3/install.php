<?php
pdo_query("
CREATE TABLE IF NOT EXISTS `ims_cds_index3_banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title1` varchar(255) DEFAULT NULL COMMENT '团队图片',
  `title2` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT '100',
  `sort` int(10) DEFAULT '100',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`,`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='横幅表';


INSERT INTO `ims_cds_index3_banner` VALUES ('1', '0', 'Welcome To Meghna', 'Welcome To Meghna', 'images/0/2018/10/G4oSpBr2aVZLF8OfNlrVn29V9soVv6.jpg', '100', '1');
INSERT INTO `ims_cds_index3_banner` VALUES ('2', '0', 'Welcome To Meghna', 'Welcome To Meghna', 'images/0/2018/10/yiJIzIa7OgGgIOOD0z7UiAt2GJVioH.jpg', '100', '1');
INSERT INTO `ims_cds_index3_banner` VALUES ('3', '0', 'Welcome To Meghna', 'Welcome To Meghna', 'images/0/2018/10/R2e5h2sWeRsswEwsEe5seearaBHAN1.jpg', '100', '1');


CREATE TABLE IF NOT EXISTS `ims_cds_index3_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL COMMENT '网站标题',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'seo关键字',
  `description` varchar(255) DEFAULT NULL COMMENT 'seo内容',
  `logo` varchar(255) DEFAULT NULL,
  `login_url` varchar(255) DEFAULT NULL,
  `register_url` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `ewm` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


INSERT INTO `ims_cds_index3_config` VALUES ('1', '0', 'cds3', 'cds', 'cds', 'images/0/2018/10/E6wLAA4zW94GWoGIQ4omoAmGq5zWqa.png', '', '', 'XX省XX市XX区', 'XXX有限公司', '13111111', 'images/1/2018/10/SAyNNAeg68gCcAa9f16A96z6cbcna8.jpg', '020-88888888', '123@qq.com', '之里是关于我们的介绍');



CREATE TABLE IF NOT EXISTS `ims_cds_index3_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title1` varchar(20) DEFAULT NULL,
  `title2` varchar(20) DEFAULT NULL,
  `title3` varchar(20) DEFAULT NULL,
  `title4` varchar(20) DEFAULT NULL,
  `title5` varchar(20) DEFAULT NULL,
  `is_show1` tinyint(1) DEFAULT NULL,
  `is_show2` tinyint(1) DEFAULT NULL,
  `is_show3` tinyint(1) DEFAULT NULL,
  `is_show4` tinyint(1) DEFAULT NULL,
  `is_show5` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='底部链接分类';


INSERT INTO `ims_cds_index3_nav` VALUES ('1', '0', ' 关于我们', '服务', '产品', '团队', '价格', '1', '1', '1', '1', '1');


CREATE TABLE IF NOT EXISTS `ims_cds_index3_page1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `icon1` varchar(20) DEFAULT NULL,
  `title1` varchar(20) DEFAULT NULL,
  `content1` varchar(255) DEFAULT NULL,
  `icon2` varchar(20) DEFAULT NULL,
  `title2` varchar(20) DEFAULT NULL,
  `content2` varchar(255) DEFAULT NULL,
  `icon3` varchar(20) DEFAULT NULL,
  `title3` varchar(20) DEFAULT NULL,
  `content3` varchar(255) DEFAULT NULL,
  `num1` int(11) DEFAULT NULL,
  `num_icon1` varchar(20) DEFAULT NULL,
  `num_text1` varchar(20) DEFAULT NULL,
  `num2` int(11) DEFAULT NULL,
  `num_icon2` varchar(20) DEFAULT NULL,
  `num_text2` varchar(20) DEFAULT NULL,
  `num3` int(11) DEFAULT NULL,
  `num_icon3` varchar(20) DEFAULT NULL,
  `num_text3` varchar(20) DEFAULT NULL,
  `num4` int(11) DEFAULT NULL,
  `num_icon4` varchar(20) DEFAULT NULL,
  `num_text4` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


INSERT INTO `ims_cds_index3_page1` VALUES ('1', '0', 'fa-lightbulb-o', '我们富有创造力', '我们富有创造力', 'fa-lightbulb-o', '我们很专业', '我们很专业', 'fa-lightbulb-o', '我们很敬业', '我们很敬业', '320', 'fa-lightbulb-o', '项目完成', '565', 'fa-lightbulb-o', '项目完成', '95', 'fa-lightbulb-o', '正反馈', '2500', 'fa-lightbulb-o', '咖啡杯');


CREATE TABLE IF NOT EXISTS `ims_cds_index3_page2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sort` tinyint(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `ims_cds_index3_page2` VALUES ('1', '0', 'fa-wordpress', '主题', '这里是简介', '1', '0');
INSERT INTO `ims_cds_index3_page2` VALUES ('2', '0', 'fa-desktop', '主题', '这里是简介', '1', '0');
INSERT INTO `ims_cds_index3_page2` VALUES ('3', '0', 'fa-play', '主题', '这里是简介', '1', '0');
INSERT INTO `ims_cds_index3_page2` VALUES ('4', '0', 'fa-eye', '主题', '这里是简介', '1', '0');
INSERT INTO `ims_cds_index3_page2` VALUES ('5', '0', 'fa-android', '主题', '这里是简介', '1', '0');
INSERT INTO `ims_cds_index3_page2` VALUES ('6', '0', 'fa-link', '主题', '这里是简介', '1', '0');


CREATE TABLE IF NOT EXISTS `ims_cds_index3_page3` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;


INSERT INTO `ims_cds_index3_page3` VALUES ('1', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('2', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('3', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('4', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('5', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('6', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('7', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('8', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('9', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('10', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('11', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');
INSERT INTO `ims_cds_index3_page3` VALUES ('12', '0', 'fa-plus', '产品名称', '这里是简介' , 'images/1/2018/10/KzPo6apQqmmakMfGXQLUFq6ZO3opLu.jpg', 'http://www.baidu.com', '1', '0');


CREATE TABLE IF NOT EXISTS `ims_cds_index3_page4` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


INSERT INTO `ims_cds_index3_page4` VALUES ('1', '0', 'images/1/2018/10/SAyNNAeg68gCcAa9f16A96z6cbcna8.jpg', '团队名称', '团队介绍', '0', '1');
INSERT INTO `ims_cds_index3_page4` VALUES ('2', '0', 'images/1/2018/10/SAyNNAeg68gCcAa9f16A96z6cbcna8.jpg', '团队名称', '团队介绍', '0', '1');
INSERT INTO `ims_cds_index3_page4` VALUES ('3', '0', 'images/1/2018/10/SAyNNAeg68gCcAa9f16A96z6cbcna8.jpg', '团队名称', '团队介绍', '0', '1');
INSERT INTO `ims_cds_index3_page4` VALUES ('4', '0', 'images/1/2018/10/SAyNNAeg68gCcAa9f16A96z6cbcna8.jpg', '团队名称', '团队介绍', '1', '1');


CREATE TABLE IF NOT EXISTS `ims_cds_index3_page5` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `text1` varchar(30) DEFAULT NULL,
  `text2` varchar(30) DEFAULT NULL,
  `text3` varchar(30) DEFAULT NULL,
  `text4` varchar(30) DEFAULT NULL,
  `text5` varchar(30) DEFAULT NULL,
  `text6` varchar(30) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` tinyint(3) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`,`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `ims_cds_index3_page5` VALUES ('1', '0', '价格标题', '99.00', '价格介绍', '价格介绍', '价格介绍', '价格介绍', '价格介绍', '价格介绍', 'http://www.baidu.com', '0', '1');
INSERT INTO `ims_cds_index3_page5` VALUES ('2', '0', '价格标题', '149.00', '价格介绍', '价格介绍', '价格介绍', '价格介绍', '价格介绍', '价格介绍', 'http://www.baidu.com', '0', '1');
INSERT INTO `ims_cds_index3_page5` VALUES ('3', '0', '价格标题', '199.00', '价格介绍', '价格介绍', '价格介绍', '价格介绍', '价格介绍', '价格介绍', 'http://www.baidu.com', '0', '1');
INSERT INTO `ims_cds_index3_page5` VALUES ('4', '0', '价格标题', '299.00', '价格介绍', '价格介绍', '价格介绍', '价格介绍', '价格介绍', '价格介绍', 'http://www.baidu.com', '0', '1');
");