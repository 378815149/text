<?php
/**
 * cds_index3模块system_welcome接口定义
 *
 * @author 84867006
 * @url 
 */
defined('IN_IA') or exit('Access Denied');
	
class Cds_index3ModuleSystemWelcome extends WeModuleSystemWelcome {
	public function systemWelcomeDisplay() {
		global $_W, $_GPC;
		if(checksubmit()){
			print_r($_GPC);
		}else{
			$config = pdo_get('cds_index3_config',array('uniacid'=>0));
			$nav = pdo_get('cds_index3_nav',array('uniacid'=>0));
			$banner = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_banner')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			$page1 = pdo_get('cds_index3_page1',array('uniacid'=>0));
			$page2 = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_page2')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			$page3 = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_page3')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			$page4 = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_page4')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			$page5 = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_page5')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			include $this->template('systemwelcome/home/index');
		}
	}

	public function doPageConfig(){
		global $_GPC, $_W;
		if(checksubmit()){
			$post_data['title'] 		= $_GPC['title'];
			$post_data['keywords'] 		= $_GPC['keywords'];
			$post_data['description'] 	= $_GPC['description'];
			$post_data['logo']			= $_GPC['logo'];
			$post_data['login_url']		= $_GPC['login_url'];
			$post_data['register_url'] 	= $_GPC['register_url'];
			$post_data['mobile'] 		= $_GPC['mobile'];
			$post_data['address'] 		= $_GPC['address'];
			$post_data['copyright'] 	= $_GPC['copyright'];
			$post_data['email'] 		= $_GPC['email'];
			$post_data['fax'] 			= $_GPC['fax'];
			$post_data['ewm'] 			= $_GPC['ewm'];
			$post_data['contact'] 		= $_GPC['contact'];
			$is_con = pdo_get('cds_index3_config',array('id'=>1));
			if($is_con){
				$res = pdo_update('cds_index3_config',$post_data,['uniacid'=>0]);
				if(!$res){
					message('保存失败',referer(),'error');
				}else{
					message('保存成功',$this->createWebUrl('config'),'success');
				}
			}else{
				$res = pdo_insert('cds_index3_config',$post_data);
				if(!$res){
					message('保存失败',referer(),'error');
				}else{
					message('保存成功',$this->createWebUrl('config'),'success');
				}
			}
		}else{
			$tpl_data = pdo_get('cds_index3_config',array('uniacid'=>0));
			include $this->template('systemwelcome/admin/config');
		}
	}
	public function doPageNav(){
		global $_GPC, $_W;
		if(checksubmit()){
			$post_data['uniacid'] 		= 0;
			$post_data['title1'] 		= $_GPC['title1'];
			$post_data['title2'] 		= $_GPC['title2'];
			$post_data['title3'] 		= $_GPC['title3'];
			$post_data['title4'] 		= $_GPC['title4'];
			$post_data['title5'] 		= $_GPC['title5'];
			$post_data['is_show1'] 		= $_GPC['is_show1']?1:0;
			$post_data['is_show2'] 		= $_GPC['is_show2']?1:0;
			$post_data['is_show3'] 		= $_GPC['is_show3']?1:0;
			$post_data['is_show4'] 		= $_GPC['is_show4']?1:0;
			$post_data['is_show5'] 		= $_GPC['is_show5']?1:0;
			$is_con = pdo_get('cds_index3_nav',array('uniacid'=>0));
			if($is_con){
				$res = pdo_update('cds_index3_nav',$post_data,['uniacid'=>0]);
				if(!$res){
					message('保存失败',referer(),'error');
				}else{
					message('保存成功',$this->createWebUrl('nav'),'success');
				}
			}else{
				$res = pdo_insert('cds_index3_nav',$post_data);
				if(!$res){
					message('保存失败',referer(),'error');
				}else{
					message('保存成功',$this->createWebUrl('nav'),'success');
				}
			}
		}else{
			$tpl_data = pdo_get('cds_index3_nav',array('uniacid'=>0));
			include $this->template('systemwelcome/admin/nav');
		}
	}
	public function doPageBanner(){
		global $_GPC, $_W;
		$op = $_GPC['op']?$_GPC['op']:'list';
		if($op == 'list'){
			$list = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_banner')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			include $this->template('systemwelcome/admin/banner');
		}
		if($op == 'modify'){
			if(checksubmit()){
				$post_data['uniacid'] 			= 0;
				$post_data['img'] 				= $_GPC['img'];
				$post_data['title1'] 			= $_GPC['title1'];
				$post_data['title2'] 			= $_GPC['title2'];
				$post_data['sort'] 				= $_GPC['sort'];
				$post_data['status'] 			= $_GPC['status'];
				if($_GPC['banner_id']){
					$res = pdo_update('cds_index3_banner',$post_data,['id'=>$_GPC['banner_id'],'uniacid'=>0]);
					if(!$res){
						message('修改失败',referer(),'error');
					}else{
						message('修改成功',$this->createWebUrl('banner'),'success');
					}
				}else{
					$res = pdo_insert('cds_index3_banner',$post_data);
					if(!$res){
						message('添加失败',referer(),'error');
					}else{
						message('添加成功',$this->createWebUrl('banner'),'success');
					}
				}
			}else{
				$tpl_data = pdo_get('cds_index3_banner',array('uniacid'=>0,'id'=>$_GPC['banner_id']));
				include $this->template('systemwelcome/admin/banner_modify');
			}
		}
		if($op == 'del'){
			$id = intval($_GPC['banner_id']);
			pdo_delete('cds_index3_banner', array('id' => $id, 'uniacid' => 0));
			message('删除成功', referer(), 'success');
		}
	}
	public function doPagePage1(){
		global $_GPC, $_W;
		if(checksubmit()){
			$post_data['uniacid'] 		= 0;
			$post_data['icon1'] 		= $_GPC['icon1'];
			$post_data['icon2'] 		= $_GPC['icon2'];
			$post_data['icon3'] 		= $_GPC['icon3'];
			$post_data['title1'] 		= $_GPC['title1'];
			$post_data['title2'] 		= $_GPC['title2'];
			$post_data['title3'] 		= $_GPC['title3'];
			$post_data['content1'] 		= $_GPC['content1'];
			$post_data['content2'] 		= $_GPC['content2'];
			$post_data['content3'] 		= $_GPC['content3'];
			$post_data['num_icon1'] 	= $_GPC['num_icon1'];
			$post_data['num_icon2'] 	= $_GPC['num_icon2'];
			$post_data['num_icon3'] 	= $_GPC['num_icon3'];
			$post_data['num_icon4'] 	= $_GPC['num_icon4'];
			$post_data['num1'] 			= $_GPC['num1'];
			$post_data['num2'] 			= $_GPC['num2'];
			$post_data['num3'] 			= $_GPC['num3'];
			$post_data['num4'] 			= $_GPC['num4'];
			$post_data['num_text1'] 	= $_GPC['num_text1'];
			$post_data['num_text2'] 	= $_GPC['num_text2'];
			$post_data['num_text3'] 	= $_GPC['num_text3'];
			$post_data['num_text4'] 	= $_GPC['num_text4'];
			$is_con = pdo_get('cds_index3_page1',array('uniacid'=>0));
			if($is_con){
				$res = pdo_update('cds_index3_page1',$post_data,['uniacid'=>0]);
				if(!$res){
					message('保存失败',referer(),'error');
				}else{
					message('保存成功',$this->createWebUrl('page1'),'success');
				}
			}else{
				$res = pdo_insert('cds_index3_page1',$post_data);
				if(!$res){
					message('保存失败',referer(),'error');
				}else{
					message('保存成功',$this->createWebUrl('page1'),'success');
				}
			}
		}else{
			$tpl_data = pdo_get('cds_index3_page1',array('uniacid'=>0));
			include $this->template('systemwelcome/admin/page1');
		}
	}
	public function doPagePage2(){
		global $_GPC, $_W;
		$op = $_GPC['op']?$_GPC['op']:'list';
		if($op == 'list'){
			$list = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_page2')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			include $this->template('systemwelcome/admin/page2');
		}
		if($op == 'modify'){
			if(checksubmit()){
				$post_data['uniacid'] 			= 0;
				$post_data['icon'] 				= $_GPC['icon'];
				$post_data['title'] 			= $_GPC['title'];
				$post_data['content'] 			= $_GPC['content'];
				$post_data['sort'] 				= $_GPC['sort'];
				$post_data['status'] 			= $_GPC['status'];
				if($_GPC['id']){
					$res = pdo_update('cds_index3_page2',$post_data,['id'=>$_GPC['id'],'uniacid'=>0]);
					if(!$res){
						message('修改失败',referer(),'error');
					}else{
						message('修改成功',$this->createWebUrl('page2'),'success');
					}
				}else{
					$res = pdo_insert('cds_index3_page2',$post_data);
					if(!$res){
						message('添加失败',referer(),'error');
					}else{
						message('添加成功',$this->createWebUrl('page2'),'success');
					}
				}
			}else{
				$tpl_data = pdo_get('cds_index3_page2',array('uniacid'=>0,'id'=>$_GPC['id']));
				include $this->template('systemwelcome/admin/page2');
			}
		}
		if($op == 'del'){
			$id = intval($_GPC['id']);
			pdo_delete('cds_index3_page2', array('id' => $id, 'uniacid' => 0));
			message('删除成功', referer(), 'success');
		}
	}
	public function doPagePage3(){
		global $_GPC, $_W;
		$op = $_GPC['op']?$_GPC['op']:'list';
		
		if($op == 'list'){
			$list = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_page3')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			include $this->template('systemwelcome/admin/page3');
		}
		if($op == 'modify'){
			if(checksubmit()){
				$post_data['uniacid'] 			= 0;
				$post_data['icon'] 				= $_GPC['icon'];
				$post_data['img'] 				= $_GPC['img'];
				$post_data['url'] 				= $_GPC['url'];
				$post_data['title'] 			= $_GPC['title'];
				$post_data['content'] 			= $_GPC['content'];
				$post_data['sort'] 				= $_GPC['sort'];
				$post_data['status'] 			= $_GPC['status'];
				if($_GPC['id']){
					$res = pdo_update('cds_index3_page3',$post_data,['id'=>$_GPC['id'],'uniacid'=>0]);
					if(!$res){
						message('修改失败',referer(),'error');
					}else{
						message('修改成功',$this->createWebUrl('page3'),'success');
					}
				}else{
					$res = pdo_insert('cds_index3_page3',$post_data);
					if(!$res){
						message('添加失败',referer(),'error');
					}else{
						message('添加成功',$this->createWebUrl('page3'),'success');
					}
				}
			}else{
				$tpl_data = pdo_get('cds_index3_page3',array('uniacid'=>0,'id'=>$_GPC['id']));
				include $this->template('systemwelcome/admin/page3');
			}
		}
		if($op == 'del'){
			$id = intval($_GPC['id']);
			pdo_delete('cds_index3_page3', array('id' => $id, 'uniacid' => 0));
			message('删除成功', referer(), 'success');
		}
	}
	public function doPagePage4(){
		global $_GPC, $_W;
		$op = $_GPC['op']?$_GPC['op']:'list';
		if($op == 'list'){
			$list = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_page4')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			include $this->template('systemwelcome/admin/page4');
		}
		if($op == 'modify'){
			if(checksubmit()){
				$post_data['uniacid'] 			= 0;
				$post_data['img'] 				= $_GPC['img'];
				$post_data['title'] 			= $_GPC['title'];
				$post_data['content'] 			= $_GPC['content'];
				$post_data['sort'] 				= $_GPC['sort'];
				$post_data['status'] 			= $_GPC['status'];
				if($_GPC['id']){
					$res = pdo_update('cds_index3_page4',$post_data,['id'=>$_GPC['id'],'uniacid'=>0]);
					if(!$res){
						message('修改失败',referer(),'error');
					}else{
						message('修改成功',$this->createWebUrl('page4'),'success');
					}
				}else{
					$res = pdo_insert('cds_index3_page4',$post_data);
					if(!$res){
						message('添加失败',referer(),'error');
					}else{
						message('添加成功',$this->createWebUrl('page4'),'success');
					}
				}
			}else{
				$tpl_data = pdo_get('cds_index3_page4',array('uniacid'=>0,'id'=>$_GPC['id']));
				include $this->template('systemwelcome/admin/page4');
			}
		}
		if($op == 'del'){
			$id = intval($_GPC['id']);
			pdo_delete('cds_index3_page4', array('id' => $id, 'uniacid' => 0));
			message('删除成功', referer(), 'success');
		}
	}
	public function doPagePage5(){
		global $_GPC, $_W;
		$op = $_GPC['op']?$_GPC['op']:'list';
		if($op == 'list'){
			$list = pdo_fetchall("SELECT * FROM ".tablename('cds_index3_page5')." WHERE uniacid = :uniacid", array(':uniacid' => 0));
			include $this->template('systemwelcome/admin/page5');
		}
		if($op == 'modify'){
			if(checksubmit()){
				$post_data['uniacid'] 			= 0;
				$post_data['title'] 			= $_GPC['title'];
				$post_data['url'] 				= $_GPC['url'];
				$post_data['money'] 			= $_GPC['money'];
				$post_data['text1'] 			= $_GPC['text1'];
				$post_data['text2'] 			= $_GPC['text2'];
				$post_data['text3'] 			= $_GPC['text3'];
				$post_data['text4'] 			= $_GPC['text4'];
				$post_data['text5'] 			= $_GPC['text5'];
				$post_data['text6'] 			= $_GPC['text6'];
				$post_data['sort'] 				= $_GPC['sort'];
				$post_data['status'] 			= $_GPC['status'];
				if($_GPC['id']){
					$res = pdo_update('cds_index3_page5',$post_data,['id'=>$_GPC['id'],'uniacid'=>0]);
					if(!$res){
						message('修改失败',referer(),'error');
					}else{
						message('修改成功',$this->createWebUrl('page5'),'success');
					}
				}else{
					$res = pdo_insert('cds_index3_page5',$post_data);
					if(!$res){
						message('添加失败',referer(),'error');
					}else{
						message('添加成功',$this->createWebUrl('page5'),'success');
					}
				}
			}else{
				$tpl_data = pdo_get('cds_index3_page5',array('uniacid'=>0,'id'=>$_GPC['id']));
				include $this->template('systemwelcome/admin/page5');
			}
		}
		if($op == 'del'){
			$id = intval($_GPC['id']);
			pdo_delete('cds_index3_page5', array('id' => $id, 'uniacid' => 0));
			message('删除成功', referer(), 'success');
		}
	}
	
}