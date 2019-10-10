<?php
defined('IN_IA') or exit('Access Denied');
		global $_W, $_GPC;
		if($_W['isfounder']){
        			$sql = 'SELECT * FROM ' . tablename('uni_account_modules') . ' WHERE  `module` = :module order by id desc' ;
                    $setting = pdo_fetch($sql, array(':module' => 'dx_zh'));
                    $settings = iunserializer($setting['settings']);
                    if ($_POST){
                        $a = serialize($_POST);
                        $user_data = array(
                            'settings' => $a,
                            'enabled'=>1
                        );


                        if (empty($setting)) {
                            //$user_data['uniacid']=$_W['uniacid'];
                            $user_data['module']='dx_zh';
                            $user_data['enabled']=1;
                            $result = pdo_insert('uni_account_modules', $user_data);
                        }else{

                            $result = pdo_update('uni_account_modules', $user_data, array('module' => 'dx_zh'));

                        }

                        if (!empty($result)) {
                            message('更新成功',$this->createWebUrl('set'));
                        }
                    }
                    include $this->template('web/set');
        }else{
             message('请使用创始人账号进行设置。');
        }
