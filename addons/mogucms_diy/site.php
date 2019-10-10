<?php
/**
 * mogucms_shouye03模块微站定义
 *
 * @author 永和软件
 * @url 
 */
defined('IN_IA') or exit('Access Denied');

class Mogucms_diyModuleSite extends WeModuleSite {

	public function doWebMenu(){
		global $_W,$_GPC;
		$r = safe_gpc_string($_GPC['r']);
		$menu = explode(".",$r);
	   	$do = trim($menu[0]);
	   	if($_W['role']=="founder"){
	   		itoast('创始人请在系统首页管理内容', referer());exit;
	   	}
        if(!empty($do)){
            $func = "doWeb".ucfirst($do);
            if( method_exists( $this , $func) ) {
            	$this->tpl = "$menu[0]_$menu[1]";
                $this->$func();
                exit;
            }
        }
	}
	public function doWebLogin(){
		global $_GPC, $_W;
		self::issite();
		if($_W['ispost']){
			$data["loginskin"] = safe_gpc_string($_GPC["loginskin"]);
			
			$data["corp"] = safe_gpc_string($_GPC["corp"]);
			$data["logo"] = safe_gpc_string($_GPC["logo"]);
			$data["title"] = safe_gpc_string($_GPC["title"]);
			$data["zhongwen"] = safe_gpc_string($_GPC["zhongwen"]);
			$data["yingwen"] = safe_gpc_string($_GPC["yingwen"]);
			$data["smssign"] = safe_gpc_string($_GPC["smssign"]);
			$data["smsapi"] = safe_gpc_string($_GPC["smsapi"]);
			$data["juheid"] = safe_gpc_string($_GPC["juheid"]);
			$data["juhekey"] = safe_gpc_string($_GPC["juhekey"]);
			$data["aliid"] = safe_gpc_string($_GPC["aliid"]);
			$data["alisecret"] = safe_gpc_string($_GPC["alisecret"]);
			$data["alimoban"] = safe_gpc_string($_GPC["alimoban"]);
			
			$seri = iserializer($data);
			pdo_update('mogucms_diy_mysite', array("loginset"=>$seri),array("username"=>$_W["username"]));
			itoast('成功', referer());
		}else{
			$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
			$setting = array();
			if(!empty($set["loginset"])){
				$setting = iunserializer($set["loginset"]);
			}
			include $this->template("admin/$this->tpl");
		}
	}
	public function doWebTreemenu(){
		global $_GPC, $_W;
		self::issite();
		if($_W['ispost']){
			$data["home"] = safe_gpc_string($_GPC["home"]);
			$data["app"] = safe_gpc_string($_GPC["app"]);
			$data["appshow"] = safe_gpc_string($_GPC["appshow"]);
			$data["apporder"] = safe_gpc_string($_GPC["apporder"]);
			$data["xcx"] = safe_gpc_string($_GPC["xcx"]);
			$data["xcxshow"] = safe_gpc_string($_GPC["xcxshow"]);
			$data["xcxorder"] = safe_gpc_string($_GPC["xcxorder"]);
			$data["qudao"] = safe_gpc_string($_GPC["qudao"]);
			$data["qudaoshow"] = safe_gpc_string($_GPC["qudaoshow"]);
			$data["qudaoorder"] = safe_gpc_string($_GPC["qudaoorder"]);
			$data["about"] = safe_gpc_string($_GPC["about"]);
			$data["aboutshow"] = safe_gpc_string($_GPC["aboutshow"]);
			$data["aboutorder"] = safe_gpc_string($_GPC["aboutorder"]);
			$data["help"] = safe_gpc_string($_GPC["help"]);
			$data["helpshow"] = safe_gpc_string($_GPC["helpshow"]);
			$data["helporder"] = safe_gpc_string($_GPC["helporder"]);
			$data["xxx"] = safe_gpc_string($_GPC["xxx"]);
			$data["xxxshow"] = safe_gpc_string($_GPC["xxxshow"]);
			$data["xxxorder"] = safe_gpc_string($_GPC["xxxorder"]);
			$data["yyy"] = safe_gpc_string($_GPC["yyy"]);
			$data["yyyshow"] = safe_gpc_string($_GPC["yyyshow"]);
			$data["yyyorder"] = safe_gpc_string($_GPC["yyyorder"]);
			$data["xxx2"] = safe_gpc_string($_GPC["xxx2"]);
			
			$data["yyy2"] = safe_gpc_string($_GPC["yyy2"]);
			$seri = iserializer($data);
			pdo_update('mogucms_diy_mysite', array("menu"=>$seri),array("username"=>$_W["username"]));
			itoast('成功', referer());
		}else{
			$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
			$setting = array();
			if(!empty($set["menu"])){
				$setting = iunserializer($set["menu"]);
			}
			include $this->template("admin/$this->tpl");
		}
	}
	public function doWebWebset(){
		global $_GPC, $_W;
		self::issite();
		if($_W['ispost']){
			$data["company"] = safe_gpc_string($_GPC["company"]);
			$data["logo"] = safe_gpc_string($_GPC["logo"]);
			$data["rewrite"] = safe_gpc_int($_GPC["rewrite"]);
			$data["indexall"] = safe_gpc_int($_GPC["indexall"]);
			$data["tel"] = safe_gpc_string($_GPC["tel"]);
			$data["phone"] = safe_gpc_string($_GPC["phone"]);
			$data["qq"] = safe_gpc_string($_GPC["qq"]);
			$data["email"] = safe_gpc_string($_GPC["email"]);
			$data["address"] = safe_gpc_string($_GPC["address"]);
			$data["erweima"] = safe_gpc_string($_GPC["erweima"]);
			$data["corp"] = safe_gpc_string($_GPC["corp"]);
			$data["beian"] = safe_gpc_string($_GPC["beian"]);
			$data["lxr"] = safe_gpc_string($_GPC["lxr"]);
			$data["description"] = safe_gpc_string($_GPC["description"]);
			$data["keyword"] = safe_gpc_string($_GPC["keyword"]);
			$data["icon"] = safe_gpc_string($_GPC["icon"]);
			$data["skin"] = safe_gpc_string($_GPC["skin"]);
			$data["homeskin"] = safe_gpc_string($_GPC["homeskin"]);
			$data["home_title1"] = safe_gpc_string($_GPC["home_title1"]);
			$data["home_sub1"] = safe_gpc_string($_GPC["home_sub1"]);
			$data["home_title2"] = safe_gpc_string($_GPC["home_title2"]);
			$data["home_sub2"] = safe_gpc_string($_GPC["home_sub2"]);
			$data["home_title3"] = safe_gpc_string($_GPC["home_title3"]);
			$data["home_sub3"] = safe_gpc_string($_GPC["home_sub3"]);
			$data["home_title4"] = safe_gpc_string($_GPC["home_title4"]);
			$data["home_sub4"] = safe_gpc_string($_GPC["home_sub4"]);
			$data["home_title5"] = safe_gpc_string($_GPC["home_title5"]);
			$data["home_sub5"] = safe_gpc_string($_GPC["home_sub5"]);
			$data["app_title1"] = safe_gpc_string($_GPC["app_title1"]);
			$data["app_sub1"] = safe_gpc_string($_GPC["app_sub1"]);
			$data["xcx_title1"] = safe_gpc_string($_GPC["xcx_title1"]);
			$data["xcx_title2"] = safe_gpc_string($_GPC["xcx_title2"]);
			$data["xcx_sub2"] = safe_gpc_string($_GPC["xcx_sub2"]);
			$data["xcx_title3"] = safe_gpc_string($_GPC["xcx_title3"]);
			$data["agent_title1"] = safe_gpc_string($_GPC["agent_title1"]);
			$data["agent_title2"] = safe_gpc_string($_GPC["agent_title2"]);
			$data["agent_title3"] = safe_gpc_string($_GPC["agent_title3"]);
			$data["agent_title4"] = safe_gpc_string($_GPC["agent_title4"]);
			$data["agent_title5"] = safe_gpc_string($_GPC["agent_title5"]);
			$data["about_title1"] = safe_gpc_string($_GPC["about_title1"]);
			$data["about_title2"] = safe_gpc_string($_GPC["about_title2"]);
			$data["about_title3"] = safe_gpc_string($_GPC["about_title3"]);
			$data["about_title4"] = safe_gpc_string($_GPC["about_title4"]);
			$data["about_sub3"] = safe_gpc_string($_GPC["about_sub3"]);
			$data["gongan"] = safe_gpc_string($_GPC["gongan"]);
			$data["gonganurl"] = safe_gpc_string($_GPC["gonganurl"]);
			$data["zdyreg"] = safe_gpc_string($_GPC["zdyreg"]);
			$data["zdylogin"] = safe_gpc_string($_GPC["zdylogin"]);
			$data["onlylogin"] = safe_gpc_string($_GPC["onlylogin"]);
			$data["gsimg"] = safe_gpc_string($_GPC["gsimg"]);
			$data["gsurl"] = safe_gpc_string($_GPC["gsurl"]);
			$data["tongji"] = safe_gpc_string($_GPC["tongji"]);
			$data["yqlj"] = safe_gpc_string($_GPC["yqlj"]);
			$data["message"] = safe_gpc_int($_GPC["message"]);
			$data["islogin"] = safe_gpc_int($_GPC["islogin"]);
			$seri = iserializer($data);
			pdo_update('mogucms_diy_mysite', array("webset"=>$seri),array("username"=>$_W["username"]));
			itoast('成功', referer());
		}else{
			$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
			$setting = array();
			if(!empty($set["webset"])){
				$setting = iunserializer($set["webset"]);
			}
			include $this->template("admin/$this->tpl");
		}
	}

	public function getEid(){
		global $_W,$_GPC;
		$info = pdo_get("modules_bindings",array("module"=>"mogucms_diy","entry"=>"menu"));
		return $info['eid'];
	}
	public function issite(){
		global $_W,$_GPC;
		$temp = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
		if(empty($temp)){

			itoast('该登录用户还没有建立站点,请联系创始人创建', referer());exit;
		}
	}
	public function doWebTitle(){
		global $_GPC, $_W;
		self::issite();
		if($_W['ispost']){
			$data["home"] = safe_gpc_string($_GPC["home"]);
			$data["login"] = safe_gpc_string($_GPC["login"]);
			$data["reg"] = safe_gpc_string($_GPC["reg"]);
			$data["app"] = safe_gpc_string($_GPC["app"]);
			$data["xcx"] = safe_gpc_string($_GPC["xcx"]);
			$data["qudao"] = safe_gpc_string($_GPC["qudao"]);
			$data["about"] = safe_gpc_string($_GPC["about"]);
			$data["help"] = safe_gpc_string($_GPC["help"]);
			
			$seri = iserializer($data);
			pdo_update('mogucms_diy_mysite', array("title"=>$seri),array("username"=>$_W["username"]));
			itoast('成功', referer());
		}else{
			$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
			$setting = array();
			if(!empty($set["title"])){
				$setting = iunserializer($set["title"]);
			}
			include $this->template("admin/$this->tpl");
		}
	}
	public function doWebLink(){
		global $_W,$_GPC;
		self::issite();
		if($this->tpl=="link_list"){
			$siteid = $this->getsiteid();
			$links = pdo_getall("mogucms_diy_link",array("siteid"=>$siteid));
			include $this->template("admin/link_list");
		}else if($this->tpl=="link_del"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_link",array("id"=>$id));
			itoast('删除成功', $this->geturl("link.list"),"success");
		}else if($this->tpl=="link_edit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["url"] = safe_gpc_string($_GPC['url']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('姓名不能为空', referer());
				}
				pdo_update("mogucms_diy_link",$data,array("id"=>$id));
				$this->header("link.list");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_link",array("id"=>$id));
				include $this->template("admin/link_edit");
			}
		}else if($this->tpl=="link_add"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["url"] = safe_gpc_string($_GPC['url']);
				if(empty($data["name"])){
					itoast('名字不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				pdo_insert("mogucms_diy_link",$data);
				$this->header("link.list");
			}else{
				include $this->template("admin/link_add");
			}
		}
	}

	public function geturl($r){
		global $_W,$_GPC;
		$str = "/web/index.php?c=site&a=entry&eid=".self::getEid()."&r=".$r;
		return $str;
	}

	public function header($r){
		header("Location:".$this->geturl($r));
	}

	

	public function getset($key){
		global $_W,$_GPC;
		$domain = $_SERVER['HTTP_HOST'];
		$temp = pdo_get("mogucms_diy_domain",array("domain"=>$domain));
		if(empty($temp)){
			die("该域名没有绑定");
		}
		$set = pdo_get("mogucms_diy_mysite",array("id"=>$temp['mysiteid']));
		$setting = array();
		if(!empty($set["$key"])){
			$setting = iunserializer($set["$key"]);
		}
		return $setting;
	}

	//获取用户站点id
	public function getsiteid(){
		global $_W,$_GPC;
		$temp = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
		return $temp['id'];
	}

	//获取用户站点id
	public function getsiteidBydomain(){
		global $_W,$_GPC;
		$domain = $_SERVER['HTTP_HOST'];
		$temp = pdo_get("mogucms_diy_domain",array("domain"=>$domain));
		return $temp['mysiteid'];
	}
	public function doWebBanner(){
		global $_GPC, $_W;
		self::issite();
		if($_W['ispost']){
			$data["home1"] = safe_gpc_string($_GPC["home1"]);
			$data["home2"] = safe_gpc_string($_GPC["home2"]);
			$data["home3"] = safe_gpc_string($_GPC["home3"]);
			$data["homemobile1"] = safe_gpc_string($_GPC["homemobile1"]);
			$data["homemobile2"] = safe_gpc_string($_GPC["homemobile2"]);
			$data["homemobile3"] = safe_gpc_string($_GPC["homemobile3"]);
			$data["homeurl1"] = safe_gpc_string($_GPC["homeurl1"]);
			$data["homeurl2"] = safe_gpc_string($_GPC["homeurl2"]);
			$data["homeurl3"] = safe_gpc_string($_GPC["homeurl3"]);
			$data["app"] = safe_gpc_string($_GPC["app"]);
			$data["apptitle"] = safe_gpc_string($_GPC["apptitle"]);
			$data["apptitle1"] = safe_gpc_string($_GPC["apptitle1"]);
			$data["apptitle2"] = safe_gpc_string($_GPC["apptitle2"]);
			$data["apptitle3"] = safe_gpc_string($_GPC["apptitle3"]);
			$data["apptitle4"] = safe_gpc_string($_GPC["apptitle4"]);
			$data["xcx"] = safe_gpc_string($_GPC["xcx"]);
			$data["qudao"] = safe_gpc_string($_GPC["qudao"]);
			$data["qudaot1"] = safe_gpc_string($_GPC["qudaot1"]);
			$data["qudaot2"] = safe_gpc_string($_GPC["qudaot2"]);
			$data["qudaot3"] = safe_gpc_string($_GPC["qudaot3"]);
			$data["about"] = safe_gpc_string($_GPC["about"]);
			$data["help"] = safe_gpc_string($_GPC["help"]);
			$data["help2"] = safe_gpc_string($_GPC["help2"]);
			$data["homeurl4"] = safe_gpc_string($_GPC["homeurl4"]);
			$data["homeurl5"] = safe_gpc_string($_GPC["homeurl5"]);
			$data["home4"] = safe_gpc_string($_GPC["home4"]);
			$data["home5"] = safe_gpc_string($_GPC["home5"]);
			$data["homemobile4"] = safe_gpc_string($_GPC["homemobile4"]);
			$data["homemobile5"] = safe_gpc_string($_GPC["homemobile5"]);
			$seri = iserializer($data);
			pdo_update('mogucms_diy_mysite', array("banner"=>$seri),array("username"=>$_W["username"]));
			itoast('成功', referer());
		}else{
			$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
			$setting = array();
			if(!empty($set["banner"])){
				$setting = iunserializer($set["banner"]);
			}
			include $this->template("admin/$this->tpl");
		}
	}
	public function doWebMessage(){
		global $_W,$_GPC;
		self::issite();
		$siteid = $this->getsiteid();
		if($this->tpl=="message_list"){
			$cates = pdo_fetchall("select * from ".tablename("mogucms_diy_message")." where siteid=$siteid order by id desc");
			include $this->template("admin/message_list");
		}else if($this->tpl=="message_del"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_message",array("id"=>$id));
			itoast('删除成功', $this->geturl("message.list"),"success");
		}else if($this->tpl=="message_info"){
			$id = safe_gpc_int($_GPC['id']);
			pdo_update("mogucms_diy_message",array("status"=>1),array("id"=>$id));
			$info = pdo_get("mogucms_diy_message",array("id"=>$id));
			include $this->template("admin/message_info");
		}
	}
	public function doWebApp(){
		global $_W,$_GPC;
		self::issite();
		if($this->tpl=="app_cate"){
			$siteid = $this->getsiteid();
			$cates = pdo_getall("mogucms_diy_appcategory",array("siteid"=>$siteid));
			include $this->template("admin/app_cate");
		}else if($this->tpl=="app_catedel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_appcategory",array("id"=>$id));
			itoast('删除成功', $this->geturl("app.cate"),"success");
		}else if($this->tpl=="app_cateedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('分类不能为空', referer());
				}
				pdo_update("mogucms_diy_appcategory",$data,array("id"=>$id));
				$this->header("app.cate");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_appcategory",array("id"=>$id));
				include $this->template("admin/app_cateedit");
			}
		}else if($this->tpl=="app_cateadd"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				if(empty($data["name"])){
					itoast('分类不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				$data["addtime"] = time();
				pdo_insert("mogucms_diy_appcategory",$data);
				$this->header("app.cate");
			}else{
				include $this->template("admin/app_cateadd");
			}
		}else if($this->tpl=="app_app"){
			$siteid = $this->getsiteid();
			$page = max(1, intval($_GPC['page']));
			$psize = 10;
			$allcount = pdo_fetch("select count(*) as num from ".tablename("mogucms_diy_app")." where siteid=$siteid");
			$allpages = ceil($allcount['num']/$psize);
			$start = ($page-1)*$psize;
			$apps = pdo_fetchall("select * from ".tablename("mogucms_diy_app")." where siteid=$siteid order by id desc limit $start,$psize");
			include $this->template("admin/app_app");
		}else if($this->tpl=="app_appadd"){
			if($_W['ispost']){

				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["smallimage"] = safe_gpc_string($_GPC['smallimage']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["content"] = safe_gpc_string($_GPC['content']);
				$data["cateid"] = safe_gpc_string($_GPC['cateid']);
				$data["buyurl"] = safe_gpc_string($_GPC['buyurl']);
				$data["paixu"] = safe_gpc_int($_GPC['paixu']);
				if(empty($data["name"])){
					itoast('应用名不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				$data["addtime"] = time();
				pdo_insert("mogucms_diy_app",$data);
				$this->header("app.app");
			}else{
				$siteid = $this->getsiteid();
				$cates = pdo_getall("mogucms_diy_appcategory",array("siteid"=>$siteid));
				$apps = pdo_getall("mogucms_diy_app",array("siteid"=>$siteid));
				include $this->template("admin/app_appadd");
			}
			
		}else if($this->tpl=="app_appdel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_app",array("id"=>$id));
			itoast('删除成功', $this->geturl("app.app"),"success");
		}else if($this->tpl=="app_appedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["smallimage"] = safe_gpc_string($_GPC['smallimage']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["content"] = safe_gpc_string($_GPC['content']);
				$data["cateid"] = safe_gpc_string($_GPC['cateid']);
				$data["buyurl"] = safe_gpc_string($_GPC['buyurl']);
				$data["paixu"] = safe_gpc_int($_GPC['paixu']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('应用名不能为空', referer());
				}
				pdo_update("mogucms_diy_app",$data,array("id"=>$id));
				$this->header("app.app");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_app",array("id"=>$id));
				$siteid = $this->getsiteid();
				$cates = pdo_getall("mogucms_diy_appcategory",array("siteid"=>$siteid));
				include $this->template("admin/app_appedit");
			}
		}else if($this->tpl=="app_anli"){
			$siteid = $this->getsiteid();
			$page = max(1, intval($_GPC['page']));
			$psize = 10;
			$allcount = pdo_fetch("select count(*) as num from ".tablename("mogucms_diy_appanli")." where siteid=$siteid");
			$allpages = ceil($allcount['num']/$psize);
			$start = ($page-1)*$psize;
			$anlis = pdo_fetchall("select * from ".tablename("mogucms_diy_appanli")." where siteid=$siteid order by id desc limit $start,$psize");
			include $this->template("admin/app_anli");
		}else if($this->tpl=="app_anliadd"){
			if($_W['ispost']){

				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["erweima"] = safe_gpc_string($_GPC['erweima']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["cateid"] = safe_gpc_string($_GPC['cateid']);
				$data["paixu"] = safe_gpc_int($_GPC['paixu']);
				if(empty($data["name"])){
					itoast('案例名不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				$data["addtime"] = time();
				pdo_insert("mogucms_diy_appanli",$data);
				$this->header("app.anli");
			}else{
				$siteid = $this->getsiteid();
				$cates = pdo_getall("mogucms_diy_appcategory",array("siteid"=>$siteid));
				include $this->template("admin/app_anliadd");
			}
			
		}else if($this->tpl=="app_anlidel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_appanli",array("id"=>$id));
			itoast('删除成功', $this->geturl("app.anli"),"success");
		}else if($this->tpl=="app_anliedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["erweima"] = safe_gpc_string($_GPC['erweima']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["cateid"] = safe_gpc_string($_GPC['cateid']);
				$data["paixu"] = safe_gpc_int($_GPC['paixu']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('案例名不能为空', referer());
				}
				pdo_update("mogucms_diy_appanli",$data,array("id"=>$id));
				$this->header("app.app");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_appanli",array("id"=>$id));
				$siteid = $this->getsiteid();
				$cates = pdo_getall("mogucms_diy_appcategory",array("siteid"=>$siteid));
				include $this->template("admin/app_anliedit");
			}
		}
	}

	public function doWebHome(){
		global $_GPC, $_W;
		self::issite();
		if($this->tpl=="home_xcx"){
			if($_W['ispost']){
				$data["image1"] = safe_gpc_string($_GPC["image1"]);
				$data["image2"] = safe_gpc_string($_GPC["image2"]);
				$data["image3"] = safe_gpc_string($_GPC["image3"]);
				$data["image4"] = safe_gpc_string($_GPC["image4"]);
				$data["title1"] = safe_gpc_string($_GPC["title1"]);
				$data["desc1"] = safe_gpc_string($_GPC["desc1"]);
				$data["title2"] = safe_gpc_string($_GPC["title2"]);
				$data["desc2"] = safe_gpc_string($_GPC["desc2"]);
				$data["title3"] = safe_gpc_string($_GPC["title3"]);
				$data["desc3"] = safe_gpc_string($_GPC["desc3"]);
				$data["title4"] = safe_gpc_string($_GPC["title4"]);
				$data["desc4"] = safe_gpc_string($_GPC["desc4"]);
				$seri = iserializer($data);
				pdo_update('mogucms_diy_mysite', array("homexcx"=>$seri),array("username"=>$_W["username"]));
				itoast('成功', referer());
			}else{
				$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
				$setting = array();
				if(!empty($set["homexcx"])){
					$setting = iunserializer($set["homexcx"]);
				}
				include $this->template("admin/$this->tpl");
			}
		}else if($this->tpl=="home_youshi"){
			if($_W['ispost']){
				$data["image1"] = safe_gpc_string($_GPC["image1"]);
				$data["image2"] = safe_gpc_string($_GPC["image2"]);
				$data["image3"] = safe_gpc_string($_GPC["image3"]);
				$data["image4"] = safe_gpc_string($_GPC["image4"]);
				$data["image5"] = safe_gpc_string($_GPC["image5"]);
				$data["image6"] = safe_gpc_string($_GPC["image6"]);
				$data["image7"] = safe_gpc_string($_GPC["image7"]);
				$data["image8"] = safe_gpc_string($_GPC["image8"]);
				$data["title1"] = safe_gpc_string($_GPC["title1"]);
				$data["desc1"] = safe_gpc_string($_GPC["desc1"]);
				$data["title2"] = safe_gpc_string($_GPC["title2"]);
				$data["desc2"] = safe_gpc_string($_GPC["desc2"]);
				$data["title3"] = safe_gpc_string($_GPC["title3"]);
				$data["desc3"] = safe_gpc_string($_GPC["desc3"]);
				$data["title4"] = safe_gpc_string($_GPC["title4"]);
				$data["desc4"] = safe_gpc_string($_GPC["desc4"]);
				$data["title5"] = safe_gpc_string($_GPC["title5"]);
				$data["desc5"] = safe_gpc_string($_GPC["desc5"]);
				$data["title6"] = safe_gpc_string($_GPC["title6"]);
				$data["desc6"] = safe_gpc_string($_GPC["desc6"]);
				$data["title7"] = safe_gpc_string($_GPC["title7"]);
				$data["desc7"] = safe_gpc_string($_GPC["desc7"]);
				$data["title8"] = safe_gpc_string($_GPC["title8"]);
				$data["desc8"] = safe_gpc_string($_GPC["desc8"]);
				
				$seri = iserializer($data);
				pdo_update('mogucms_diy_mysite', array("homeyoushi"=>$seri),array("username"=>$_W["username"]));
				itoast('成功', referer());
			}else{
				$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
				$setting = array();
				if(!empty($set["homeyoushi"])){
					$setting = iunserializer($set["homeyoushi"]);
				}
				include $this->template("admin/$this->tpl");
			}
		}
	}

		public function doWebAgent(){
		global $_GPC, $_W;
		self::issite();
		if($this->tpl=="agent_agent1"){
			if($_W['ispost']){
				$data["image"] = safe_gpc_string($_GPC["image"]);
				$data["title1"] = safe_gpc_string($_GPC["title1"]);
				$data["desc1"] = safe_gpc_string($_GPC["desc1"]);
				$data["title2"] = safe_gpc_string($_GPC["title2"]);
				$data["desc2"] = safe_gpc_string($_GPC["desc2"]);
				$data["title3"] = safe_gpc_string($_GPC["title3"]);
				$data["desc3"] = safe_gpc_string($_GPC["desc3"]);
				$data["title4"] = safe_gpc_string($_GPC["title4"]);
				$data["desc4"] = safe_gpc_string($_GPC["desc4"]);
				$data["title5"] = safe_gpc_string($_GPC["title5"]);
				$data["desc5"] = safe_gpc_string($_GPC["desc5"]);
				$data["title6"] = safe_gpc_string($_GPC["title6"]);
				$data["desc6"] = safe_gpc_string($_GPC["desc6"]);
				
				$seri = iserializer($data);
				pdo_update('mogucms_diy_mysite', array("agent1"=>$seri),array("username"=>$_W["username"]));
				itoast('成功', referer());
			}else{
				$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
				$setting = array();
				if(!empty($set["agent1"])){
					$setting = iunserializer($set["agent1"]);
				}
				include $this->template("admin/$this->tpl");
			}
		}else if($this->tpl=="agent_agent2"){
			if($_W['ispost']){
				$data["image1"] = safe_gpc_string($_GPC["image1"]);
				$data["image2"] = safe_gpc_string($_GPC["image2"]);
				$data["image3"] = safe_gpc_string($_GPC["image3"]);
				$data["image4"] = safe_gpc_string($_GPC["image4"]);
				$data["image5"] = safe_gpc_string($_GPC["image5"]);
				$data["image6"] = safe_gpc_string($_GPC["image6"]);
				$data["image7"] = safe_gpc_string($_GPC["image7"]);
				$data["image8"] = safe_gpc_string($_GPC["image8"]);
				$data["title1"] = safe_gpc_string($_GPC["title1"]);
				$data["desc1"] = safe_gpc_string($_GPC["desc1"]);
				$data["title2"] = safe_gpc_string($_GPC["title2"]);
				$data["desc2"] = safe_gpc_string($_GPC["desc2"]);
				$data["title3"] = safe_gpc_string($_GPC["title3"]);
				$data["desc3"] = safe_gpc_string($_GPC["desc3"]);
				$data["title4"] = safe_gpc_string($_GPC["title4"]);
				$data["desc4"] = safe_gpc_string($_GPC["desc4"]);
				$data["title5"] = safe_gpc_string($_GPC["title5"]);
				$data["desc5"] = safe_gpc_string($_GPC["desc5"]);
				$data["title6"] = safe_gpc_string($_GPC["title6"]);
				$data["desc6"] = safe_gpc_string($_GPC["desc6"]);
				$data["title7"] = safe_gpc_string($_GPC["title7"]);
				$data["desc7"] = safe_gpc_string($_GPC["desc7"]);
				$data["title8"] = safe_gpc_string($_GPC["title8"]);
				$data["desc8"] = safe_gpc_string($_GPC["desc8"]);
				
				$seri = iserializer($data);
				pdo_update('mogucms_diy_mysite', array("agent2"=>$seri),array("username"=>$_W["username"]));
				itoast('成功', referer());
			}else{
				$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
				$setting = array();
				if(!empty($set["agent2"])){
					$setting = iunserializer($set["agent2"]);
				}
				include $this->template("admin/$this->tpl");
			}
		}else if($this->tpl=="agent_agent3"){
			if($_W['ispost']){
				$data["title1"] = safe_gpc_string($_GPC["title1"]);
				$data["title2"] = safe_gpc_string($_GPC["title2"]);
				$data["title3"] = safe_gpc_string($_GPC["title3"]);
				$data["title4"] = safe_gpc_string($_GPC["title4"]);
				
				
				
				$seri = iserializer($data);
				pdo_update('mogucms_diy_mysite', array("agent3"=>$seri),array("username"=>$_W["username"]));
				itoast('成功', referer());
			}else{
				$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
				$setting = array();
				if(!empty($set["agent3"])){
					$setting = iunserializer($set["agent3"]);
				}
				include $this->template("admin/$this->tpl");
			}
		}else if($this->tpl=="agent_agent4"){
			if($_W['ispost']){
				$data["image1"] = safe_gpc_string($_GPC["image1"]);
				$data["image2"] = safe_gpc_string($_GPC["image2"]);
				$data["image3"] = safe_gpc_string($_GPC["image3"]);
				$data["image4"] = safe_gpc_string($_GPC["image4"]);
				
				$data["title1"] = safe_gpc_string($_GPC["title1"]);
				$data["desc1"] = safe_gpc_string($_GPC["desc1"]);
				$data["title2"] = safe_gpc_string($_GPC["title2"]);
				$data["desc2"] = safe_gpc_string($_GPC["desc2"]);
				$data["title3"] = safe_gpc_string($_GPC["title3"]);
				$data["desc3"] = safe_gpc_string($_GPC["desc3"]);
				$data["title4"] = safe_gpc_string($_GPC["title4"]);
				$data["desc4"] = safe_gpc_string($_GPC["desc4"]);
				
				
				$seri = iserializer($data);
				pdo_update('mogucms_diy_mysite', array("agent4"=>$seri),array("username"=>$_W["username"]));
				itoast('成功', referer());
			}else{
				$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
				$setting = array();
				if(!empty($set["agent4"])){
					$setting = iunserializer($set["agent4"]);
				}
				include $this->template("admin/$this->tpl");
			}
		}
	}

	public function doWebXcx(){
		global $_W,$_GPC;
		self::issite();
		if($this->tpl=="xcx_anli"){
			$siteid = $this->getsiteid();
			$cates = pdo_getall("mogucms_diy_xcxanli",array("siteid"=>$siteid));
			include $this->template("admin/xcx_anli");
		}else if($this->tpl=="xcx_anlidel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_xcxanli",array("id"=>$id));
			itoast('删除成功', $this->geturl("xcx.anli"),"success");
		}else if($this->tpl=="xcx_anliedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["erweima"] = safe_gpc_string($_GPC['erweima']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["cateid"] = safe_gpc_string($_GPC['cateid']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('名字不能为空', referer());
				}
				pdo_update("mogucms_diy_xcxanli",$data,array("id"=>$id));
				$this->header("xcx.anli");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_xcxanli",array("id"=>$id));
				$siteid = $this->getsiteid();
				$cates = pdo_getall("mogucms_diy_xcxcategory",array("siteid"=>$siteid));
				include $this->template("admin/xcx_anliedit");
			}
		}else if($this->tpl=="xcx_anliadd"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["erweima"] = safe_gpc_string($_GPC['erweima']);
				$data["cateid"] = safe_gpc_string($_GPC['cateid']);
				if(empty($data["name"])){
					itoast('名字不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				pdo_insert("mogucms_diy_xcxanli",$data);
				$this->header("xcx.anli");
			}else{
				$siteid = $this->getsiteid();
				$cates = pdo_getall("mogucms_diy_xcxcategory",array("siteid"=>$siteid));
				include $this->template("admin/xcx_anliadd");
			}
		}else if($this->tpl=="xcx_cate"){
			$siteid = $this->getsiteid();
			$cates = pdo_getall("mogucms_diy_xcxcategory",array("siteid"=>$siteid));
			include $this->template("admin/xcx_cate");
		}else if($this->tpl=="xcx_catedel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_xcxcategory",array("id"=>$id));
			itoast('删除成功', $this->geturl("xcx.cate"),"success");
		}else if($this->tpl=="xcx_cateedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('分类不能为空', referer());
				}
				pdo_update("mogucms_diy_xcxcategory",$data,array("id"=>$id));
				$this->header("xcx.cate");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_xcxcategory",array("id"=>$id));
				include $this->template("admin/xcx_cateedit");
			}
		}else if($this->tpl=="xcx_cateadd"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				if(empty($data["name"])){
					itoast('分类不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				$data["addtime"] = time();
				pdo_insert("mogucms_diy_xcxcategory",$data);
				$this->header("xcx.cate");
			}else{
				include $this->template("admin/xcx_cateadd");
			}
		}else if($this->tpl=="xcx_rukou"){
			$siteid = $this->getsiteid();
			$rukous = pdo_getall("mogucms_diy_rukou",array("siteid"=>$siteid));
			include $this->template("admin/xcx_rukou");
		}else if($this->tpl=="xcx_rukouadd"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["addtime"] = time();
				if(empty($data["name"])){
					itoast('名字不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				pdo_insert("mogucms_diy_rukou",$data);
				$this->header("xcx.rukou");
			}else{

				include $this->template("admin/xcx_rukouadd");
			}
		}else if($this->tpl=="xcx_rukoudel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_rukou",array("id"=>$id));
			itoast('删除成功', $this->geturl("xcx.rukou"),"success");
		}else if($this->tpl=="xcx_rukouedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('名字不能为空', referer());
				}
				pdo_update("mogucms_diy_rukou",$data,array("id"=>$id));
				$this->header("xcx.rukou");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_rukou",array("id"=>$id));
				include $this->template("admin/xcx_rukouedit");
			}
		}else if($this->tpl=="xcx_kehu"){
			$siteid = $this->getsiteid();
			$kehus = pdo_getall("mogucms_diy_kehu",array("siteid"=>$siteid));
			include $this->template("admin/xcx_kehu");
		}else if($this->tpl=="xcx_kehuadd"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["addtime"] = time();
				if(empty($data["name"])){
					itoast('名字不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				pdo_insert("mogucms_diy_kehu",$data);
				$this->header("xcx.kehu");
			}else{

				include $this->template("admin/xcx_kehuadd");
			}
		}else if($this->tpl=="xcx_kehudel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_kehu",array("id"=>$id));
			itoast('删除成功', $this->geturl("xcx.kehu"),"success");
		}else if($this->tpl=="xcx_kehuedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('名字不能为空', referer());
				}
				pdo_update("mogucms_diy_kehu",$data,array("id"=>$id));
				$this->header("xcx.kehu");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_kehu",array("id"=>$id));
				include $this->template("admin/xcx_kehuedit");
			}
		}
	}

		public function doWebHelp(){
		global $_W,$_GPC;
		self::issite();
		if($this->tpl=="help_cate"){
			$siteid = $this->getsiteid();
			$cates = pdo_getall("mogucms_diy_helpcategory",array("siteid"=>$siteid));
			include $this->template("admin/help_cate");
		}else if($this->tpl=="help_catedel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_helpcategory",array("id"=>$id));
			itoast('删除成功', $this->geturl("help.cate"),"success");
		}else if($this->tpl=="help_cateedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["paixu"] = safe_gpc_int($_GPC['paixu']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('分类不能为空', referer());
				}
				pdo_update("mogucms_diy_helpcategory",$data,array("id"=>$id));
				$this->header("help.cate");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_helpcategory",array("id"=>$id));
				include $this->template("admin/help_cateedit");
			}
		}else if($this->tpl=="help_cateadd"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["paixu"] = safe_gpc_int($_GPC['paixu']);
				if(empty($data["name"])){
					itoast('分类不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				$data["addtime"] = time();
				pdo_insert("mogucms_diy_helpcategory",$data);
				$this->header("help.cate");
			}else{
				include $this->template("admin/help_cateadd");
			}
		}else if($this->tpl=="help_list"){
			$siteid = $this->getsiteid();
			$page = max(1, intval($_GPC['page']));
			$psize = 10;
			$allcount = pdo_fetch("select count(*) as num from ".tablename("mogucms_diy_help")." where siteid=$siteid");
			$allpages = ceil($allcount['num']/$psize);
			$start = ($page-1)*$psize;
			$lists = pdo_fetchall("select * from ".tablename("mogucms_diy_help")." where siteid=$siteid order by id desc limit $start,$psize");
			include $this->template("admin/help_list");
		}else if($this->tpl=="help_add"){
			if($_W['ispost']){
				$data["title"] = safe_gpc_string($_GPC['title']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["cateid"] = safe_gpc_string($_GPC['cateid']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["content"] = safe_gpc_string($_GPC['content']);
				$data["paixu"] = safe_gpc_int($_GPC['paixu']);
				$data["siteid"] = $this->getsiteid();
				$data["addtime"] = time();
				if(empty($data["title"]) || empty($data["image"])){
					itoast('分类和封面图不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				$data["addtime"] = time();
				pdo_insert("mogucms_diy_help",$data);
				$this->header("help.list");
			}else{
				$siteid = $this->getsiteid();
				$cates = pdo_getall("mogucms_diy_helpcategory",array("siteid"=>$siteid));

				include $this->template("admin/help_add");
			}
		}else if($this->tpl=="help_edit"){
			if($_W['ispost']){
				$id = safe_gpc_int($_GPC['id']);
				$data["title"] = safe_gpc_string($_GPC['title']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["cateid"] = safe_gpc_string($_GPC['cateid']);
				$data["desc"] = safe_gpc_string($_GPC['desc']);
				$data["content"] = safe_gpc_string($_GPC['content']);
				$data["paixu"] = safe_gpc_int($_GPC['paixu']);
				if(empty($data["title"]) || empty($data["image"])){
					itoast('分类和封面图不能为空', referer());
				}
				pdo_update("mogucms_diy_help",$data,array("id"=>$id));
				$this->header("help.list");
			}else{
				$siteid = $this->getsiteid();
				$cates = pdo_getall("mogucms_diy_helpcategory",array("siteid"=>$siteid));
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_help",array("id"=>$id));
				
				include $this->template("admin/help_edit");
			}
		}else if($this->tpl=="help_del"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_help",array("id"=>$id));
			itoast('删除成功', $this->geturl("help.list"),"success");
		}
	}

	public function doWebAbout(){
		global $_W,$_GPC;
		self::issite();
		if($this->tpl=="about_whoami"){
			if($_W['ispost']){
				$data["image"] = safe_gpc_string($_GPC["image"]);
				$data["content"] = safe_gpc_string($_GPC["content"]);
				
				$seri = iserializer($data);
				pdo_update('mogucms_diy_mysite', array("about"=>$seri),array("username"=>$_W["username"]));
				itoast('成功', referer());
			}else{
				$set = pdo_get("mogucms_diy_mysite",array("username"=>$_W["username"]));
				$setting = array();
				if(!empty($set["about"])){
					$setting = iunserializer($set["about"]);
				}
				include $this->template("admin/about_whoami");
			}
		}else if($this->tpl=="about_cert"){
			$siteid = $this->getsiteid();
			$cates = pdo_getall("mogucms_diy_cert",array("siteid"=>$siteid));
			include $this->template("admin/about_cert");
		}else if($this->tpl=="about_certdel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_cert",array("id"=>$id));
			itoast('删除成功', $this->geturl("about.cert"),"success");
		}else if($this->tpl=="about_certedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('证书名不能为空', referer());
				}
				pdo_update("mogucms_diy_cert",$data,array("id"=>$id));
				$this->header("about.cert");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_cert",array("id"=>$id));
				include $this->template("admin/about_certedit");
			}
		}else if($this->tpl=="about_certadd"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				if(empty($data["name"])){
					itoast('证书名不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				pdo_insert("mogucms_diy_cert",$data);
				$this->header("about.cert");
			}else{
				include $this->template("admin/about_certadd");
			}
		}else if($this->tpl=="about_team"){
			$siteid = $this->getsiteid();
			$cates = pdo_getall("mogucms_diy_team",array("siteid"=>$siteid));
			include $this->template("admin/about_team");
		}else if($this->tpl=="about_teamdel"){
			$id = safe_gpc_string($_GPC['id']);
			pdo_delete("mogucms_diy_team",array("id"=>$id));
			itoast('删除成功', $this->geturl("about.team"),"success");
		}else if($this->tpl=="about_teamedit"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["zhiwei"] = safe_gpc_string($_GPC['zhiwei']);
				$id = safe_gpc_int($_GPC['id']);
				if(empty($data["name"])){
					itoast('姓名不能为空', referer());
				}
				pdo_update("mogucms_diy_team",$data,array("id"=>$id));
				$this->header("about.team");
			}else{
				$id = safe_gpc_int($_GPC['id']);
				$info = pdo_get("mogucms_diy_team",array("id"=>$id));
				include $this->template("admin/about_teamedit");
			}
		}else if($this->tpl=="about_teamadd"){
			if($_W['ispost']){
				$data["name"] = safe_gpc_string($_GPC['name']);
				$data["image"] = safe_gpc_string($_GPC['image']);
				$data["zhiwei"] = safe_gpc_string($_GPC['zhiwei']);
				if(empty($data["name"])){
					itoast('姓名不能为空', referer());
				}
				$data['siteid'] = $this->getsiteid();
				pdo_insert("mogucms_diy_team",$data);
				$this->header("about.team");
			}else{
				include $this->template("admin/about_teamadd");
			}
		}
	}
}