<?php
//升级数据表
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `smallimage` varchar(300) DEFAULT NULL,
  `addtime` int(10) NOT NULL,
  `desc` text,
  `content` longtext,
  `cateid` int(11) NOT NULL,
  `siteid` int(11) NOT NULL,
  `buyurl` varchar(300) DEFAULT NULL,
  `paixu` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_app','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_app','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `name` varchar(150) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_app','image')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `image` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_app','smallimage')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `smallimage` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_app','addtime')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `addtime` int(10) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_app','desc')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `desc` text");}
if(!pdo_fieldexists('mogucms_diy_app','content')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `content` longtext");}
if(!pdo_fieldexists('mogucms_diy_app','cateid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `cateid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_app','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_app','buyurl')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `buyurl` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_app','paixu')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_app')." ADD   `paixu` int(11) DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_appanli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `erweima` varchar(300) DEFAULT NULL,
  `desc` text,
  `addtime` int(10) NOT NULL,
  `url` varchar(300) DEFAULT NULL,
  `siteid` int(11) NOT NULL,
  `cateid` int(11) NOT NULL,
  `paixu` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_appanli','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_appanli','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD   `name` varchar(150) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_appanli','image')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD   `image` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_appanli','erweima')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD   `erweima` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_appanli','desc')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD   `desc` text");}
if(!pdo_fieldexists('mogucms_diy_appanli','addtime')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD   `addtime` int(10) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_appanli','url')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD   `url` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_appanli','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_appanli','cateid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD   `cateid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_appanli','paixu')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appanli')." ADD   `paixu` int(11) DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_appcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `siteid` int(11) NOT NULL,
  `addtime` int(10) NOT NULL,
  `ishome` smallint(1) NOT NULL DEFAULT '1',
  `ord` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_appcategory','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appcategory')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_appcategory','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appcategory')." ADD   `name` varchar(60) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_appcategory','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appcategory')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_appcategory','addtime')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appcategory')." ADD   `addtime` int(10) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_appcategory','ishome')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appcategory')." ADD   `ishome` smallint(1) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('mogucms_diy_appcategory','ord')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_appcategory')." ADD   `ord` int(11) DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_cert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) NOT NULL,
  `siteid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_cert','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_cert')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_cert','image')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_cert')." ADD   `image` varchar(300) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_cert','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_cert')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_cert','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_cert')." ADD   `name` varchar(150) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(200) NOT NULL COMMENT '绑定的域名',
  `mysiteid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_domain','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_domain')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_domain','domain')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_domain')." ADD   `domain` varchar(200) NOT NULL COMMENT '绑定的域名'");}
if(!pdo_fieldexists('mogucms_diy_domain','mysiteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_domain')." ADD   `mysiteid` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cateid` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `content` longtext,
  `addtime` int(10) NOT NULL,
  `image` varchar(300) NOT NULL,
  `siteid` int(11) NOT NULL,
  `paixu` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_help','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_help')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_help','cateid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_help')." ADD   `cateid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_help','title')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_help')." ADD   `title` varchar(150) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_help','desc')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_help')." ADD   `desc` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_help','content')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_help')." ADD   `content` longtext");}
if(!pdo_fieldexists('mogucms_diy_help','addtime')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_help')." ADD   `addtime` int(10) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_help','image')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_help')." ADD   `image` varchar(300) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_help','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_help')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_help','paixu')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_help')." ADD   `paixu` int(11) DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_helpcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `siteid` int(11) NOT NULL,
  `addtime` int(10) NOT NULL,
  `paixu` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_helpcategory','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_helpcategory')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_helpcategory','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_helpcategory')." ADD   `name` varchar(60) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_helpcategory','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_helpcategory')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_helpcategory','addtime')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_helpcategory')." ADD   `addtime` int(10) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_helpcategory','paixu')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_helpcategory')." ADD   `paixu` int(11) DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_kehu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `siteid` int(11) NOT NULL,
  `addtime` int(10) NOT NULL,
  `ord` int(11) NOT NULL DEFAULT '0',
  `isshow` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_kehu','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_kehu')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_kehu','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_kehu')." ADD   `name` varchar(150) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_kehu','image')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_kehu')." ADD   `image` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_kehu','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_kehu')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_kehu','addtime')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_kehu')." ADD   `addtime` int(10) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_kehu','ord')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_kehu')." ADD   `ord` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('mogucms_diy_kehu','isshow')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_kehu')." ADD   `isshow` smallint(1) NOT NULL DEFAULT '1'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `url` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_link','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_link')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_link','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_link')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_link','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_link')." ADD   `name` varchar(150) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_link','url')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_link')." ADD   `url` varchar(300) DEFAULT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_mysite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL COMMENT '站点名',
  `template` varchar(60) NOT NULL COMMENT '选择的模板',
  `username` varchar(40) NOT NULL,
  `addtime` int(10) NOT NULL,
  `webset` longtext,
  `banner` longtext,
  `about` longtext,
  `shouye` longtext,
  `agent1` longtext,
  `agent2` longtext,
  `agent3` longtext,
  `agent4` longtext,
  `homexcx` longtext,
  `homeyoushi` longtext,
  `menu` longtext,
  `title` longtext,
  `disanfang` varchar(60) DEFAULT NULL,
  `loginset` longtext,
  `tourl` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_mysite','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_mysite','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `name` varchar(60) NOT NULL COMMENT '站点名'");}
if(!pdo_fieldexists('mogucms_diy_mysite','template')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `template` varchar(60) NOT NULL COMMENT '选择的模板'");}
if(!pdo_fieldexists('mogucms_diy_mysite','username')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `username` varchar(40) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_mysite','addtime')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `addtime` int(10) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_mysite','webset')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `webset` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','banner')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `banner` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','about')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `about` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','shouye')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `shouye` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','agent1')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `agent1` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','agent2')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `agent2` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','agent3')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `agent3` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','agent4')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `agent4` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','homexcx')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `homexcx` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','homeyoushi')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `homeyoushi` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','menu')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `menu` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','title')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `title` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','disanfang')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `disanfang` varchar(60) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_mysite','loginset')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `loginset` longtext");}
if(!pdo_fieldexists('mogucms_diy_mysite','tourl')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_mysite')." ADD   `tourl` smallint(1) DEFAULT '0'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_rukou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `siteid` int(11) NOT NULL,
  `addtime` int(10) NOT NULL,
  `ord` int(11) NOT NULL DEFAULT '0',
  `isshow` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_rukou','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_rukou')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_rukou','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_rukou')." ADD   `name` varchar(150) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_rukou','desc')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_rukou')." ADD   `desc` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_rukou','image')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_rukou')." ADD   `image` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_rukou','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_rukou')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_rukou','addtime')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_rukou')." ADD   `addtime` int(10) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_rukou','ord')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_rukou')." ADD   `ord` int(11) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('mogucms_diy_rukou','isshow')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_rukou')." ADD   `isshow` smallint(1) NOT NULL DEFAULT '1'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` varchar(300) NOT NULL,
  `zhiwei` varchar(60) NOT NULL,
  `siteid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_team','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_team')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_team','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_team')." ADD   `name` varchar(150) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_team','image')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_team')." ADD   `image` varchar(300) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_team','zhiwei')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_team')." ADD   `zhiwei` varchar(60) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_team','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_team')." ADD   `siteid` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_xcxanli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `image` varchar(300) NOT NULL,
  `erweima` varchar(300) DEFAULT NULL,
  `siteid` int(11) NOT NULL,
  `cateid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_xcxanli','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxanli')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_xcxanli','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxanli')." ADD   `name` varchar(150) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_xcxanli','desc')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxanli')." ADD   `desc` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_xcxanli','image')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxanli')." ADD   `image` varchar(300) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_xcxanli','erweima')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxanli')." ADD   `erweima` varchar(300) DEFAULT NULL");}
if(!pdo_fieldexists('mogucms_diy_xcxanli','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxanli')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_xcxanli','cateid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxanli')." ADD   `cateid` int(11) NOT NULL");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_mogucms_diy_xcxcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `siteid` int(11) NOT NULL,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('mogucms_diy_xcxcategory','id')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxcategory')." ADD 
  `id` int(11) NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('mogucms_diy_xcxcategory','name')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxcategory')." ADD   `name` varchar(60) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_xcxcategory','siteid')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxcategory')." ADD   `siteid` int(11) NOT NULL");}
if(!pdo_fieldexists('mogucms_diy_xcxcategory','addtime')) {pdo_query("ALTER TABLE ".tablename('mogucms_diy_xcxcategory')." ADD   `addtime` int(10) NOT NULL");}
