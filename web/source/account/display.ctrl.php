<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');

load()->model('miniapp');
load()->model('phoneapp');

$dos = array('rank', 'display', 'switch', 'platform');
$do = in_array($_GPC['do'], $dos) ? $do : 'display';

if ('platform' == $do) {
	$url = url('account/display');
	$last_uniacid = switch_get_account_display();
	if (empty($last_uniacid)) {
		itoast('', $url, 'info');
	}
	if (!empty($last_uniacid) && $last_uniacid != $_W['uniacid']) {
		switch_save_account_display($last_uniacid);
	}
	$permission = permission_account_user_role($_W['uid'], $last_uniacid);
	if (empty($permission)) {
		itoast('', $url, 'info');
	}
	$account_info = uni_fetch($last_uniacid);

	if (ACCOUNT_TYPE_SIGN == $account_info['type_sign'] || XZAPP_TYPE_SIGN == $account_info['type_sign']) {
		$url = url('home/welcome');
	} elseif (WEBAPP_TYPE_SIGN == $account_info['type_sign']) {
		$url = url('webapp/home/display');
	} else {
		$last_version = miniapp_fetch($last_uniacid);
		if (!empty($last_version)) {
			$url = url('miniapp/version/home', array('version_id' => $last_version['version']['id']));
		}
	}
	itoast('', $url);
}

if ('display' == $do) {
	$account_info = permission_user_account_num($_W['uid']);
	$user_founder_info = table('users_founder_own_users')->getFounderByUid($_W['uid']);
	$user_founder_uid = !empty($user_founder_info) && !empty($user_founder_info['founder_uid']) ? $user_founder_info['founder_uid'] : 0;

	if (user_is_founder($_W['uid'], true)) {
		$founders = pdo_getall('users', array('founder_groupid' => 2), array('uid', 'username'), 'uid');
		$founder_id = intval($_GPC['founder_id']);
	}
	$pindex = max(1, intval($_GPC['page']));
	$psize = 20;

	$title = safe_gpc_string($_GPC['title']);
	$type = in_array($_GPC['type'], array_keys($account_all_type_sign)) ? $_GPC['type'] : 'all';

	if ('all' == $type) {
		$condition = array_keys($account_all_type);
	} else {
		$condition = $account_all_type_sign[$type]['contain_type'];
	}

	$table = table('account');
	$table->searchWithType($condition);
	$keyword = safe_gpc_string($_GPC['keyword']);
	if (!empty($keyword)) {
		$table->searchWithKeyword($keyword);
	}
	$letter = safe_gpc_string($_GPC['letter']);
	if (!empty($letter) && '全部' != $letter) {
		$table->searchWithLetter($letter);
	}

	if ('all' == $type) {
		$total_list = array();
		foreach ($account_all_type as $account_type) {
			$total_list[$account_type['type_sign']] = 0;
		}

		if (!empty($founder_id)) {
			$table->searchWithViceFounder($founder_id);
		}
		$account_total = $table->searchAccounTotal(false);
		$table->searchWithType($condition);
		$table->searchWithKeyword($keyword);
		$table->searchWithLetter($letter);
		foreach ($account_total as $row) {
			if (in_array($row['type'], array(ACCOUNT_TYPE_OFFCIAL_NORMAL, ACCOUNT_TYPE_OFFCIAL_AUTH))) {
				$total_list['account'] += $row['total'];
			} elseif (in_array($row['type'], array(ACCOUNT_TYPE_XZAPP_NORMAL, ACCOUNT_TYPE_XZAPP_AUTH))) {
				$total_list['xzapp'] += $row['total'];
			} elseif (in_array($row['type'], array(ACCOUNT_TYPE_APP_NORMAL, ACCOUNT_TYPE_APP_AUTH))) {
				$total_list['wxapp'] += $row['total'];
			} else {
				foreach ($account_all_type as $type_key => $type_info) {
					if ($type_key == $row['type']) {
						$total_list[$type_info['type_sign']] += $row['total'];
					}
				}
			}
		}
	}

	$table->accountRankOrder();
	$table->accountUniacidOrder();
	$table->searchWithPage($pindex, $psize);
	$list = $table->searchAccountList(false);
	$total = $table->getLastQueryTotal();
	if (!empty($list)) {
		if (!user_is_founder($_W['uid'])) {
			$account_user_roles = table('uni_account_users')->where('uid', $_W['uid'])->getall('uniacid');
		}
		foreach ($list as $k => &$account) {
			$account = uni_fetch($account['uniacid']);
			$account['support_version'] = $account->supportVersion;
			$account['type_name'] = $account->typeName;
			$account['user_role'] = $account_user_roles[$account['uniacid']]['role'];
			if (ACCOUNT_MANAGE_NAME_CLERK == $account['user_role']) {
				unset($list[$k]);
				continue;
			}

			if (USER_ENDTIME_GROUP_EMPTY_TYPE != $account['endtime'] && USER_ENDTIME_GROUP_UNLIMIT_TYPE != $account['endtime'] && $account['endtime'] < TIMESTAMP) {
				$account['endtime_status'] = 1;
			} else {
				$account['endtime_status'] = 0;
			}

			if (WXAPP_TYPE_SIGN == $account->typeSign) {
				$version_info = miniapp_version_all($account['uniacid']);
				if (empty($version_info)) {
					continue;
				}
				foreach ($version_info as $version_key => $version_val) {
					$last_modules = $version_val['last_modules'] ? current($version_val['last_modules']) : array();
				}
				if (!empty($version_info[0]['modules'])) {
					$modules = current($version_info[0]['modules']);
					$account['need_upload'] = $last_modules['version'] < $modules['version'] ? 1 : 0;
				}
			}

			switch ($account['type']) {
				case ACCOUNT_TYPE_APP_NORMAL:
				case ACCOUNT_TYPE_APP_AUTH:
				case ACCOUNT_TYPE_ALIAPP_NORMAL:
				case ACCOUNT_TYPE_BAIDUAPP_NORMAL:
				case ACCOUNT_TYPE_TOUTIAOAPP_NORMAL:
					$account['versions'] = miniapp_get_some_lastversions($account['uniacid']);
					if (!empty($account['versions'])) {
						foreach ($account['versions'] as $version) {
							if (!empty($version['current'])) {
								$account['current_version'] = $version;
							}
						}
					}
					break;
				case ACCOUNT_TYPE_PHONEAPP_NORMAL:
					$account['versions'] = phoneapp_get_some_lastversions($account['uniacid']);
					if (!empty($account['versions'])) {
						foreach ($account['versions'] as $version) {
							if (!empty($version['current'])) {
								$account['current_version'] = $version;
							}
						}
					}
					break;
			}
		}
		if (!empty($list)) {
			$list = array_values($list);
		}
	}
	if ($_W['ispost']) {
		iajax(0, $list);
	}
	template('account/display');
}

if ('rank' == $do && $_W['isajax'] && $_W['ispost']) {
	$uniacid = intval($_GPC['uniacid']);
	if (!empty($uniacid)) {
		$exist = uni_fetch($uniacid);
		if (!$exist) {
			iajax(1, '账号信息不存在', '');
		}
	}
	uni_account_rank_top($uniacid);
	iajax(0, '更新成功！', '');
}

if ('switch' == $do) {
	$uniacid = intval($_GPC['uniacid']);
	if (!empty($uniacid)) {
		$role = permission_account_user_role($_W['uid'], $uniacid);
		if (empty($role)) {
			itoast('操作失败, 非法访问.', '', 'error');
		}
		$account_info = uni_fetch($uniacid);

		if (USER_ENDTIME_GROUP_EMPTY_TYPE != $account_info['endtime'] && USER_ENDTIME_GROUP_UNLIMIT_TYPE != $account_info['endtime'] && TIMESTAMP > $account_info['endtime'] && !user_is_founder($_W['uid'], true)) {
			$type_sign = $account_info->typeSign;
			$expired_message_settings = setting_load('account_expired_message');
			$expired_message_settings = $expired_message_settings['account_expired_message'][$type_sign];
			if (!empty($expired_message_settings) && !empty($expired_message_settings['status']) && !empty($expired_message_settings['message'])) {
				itoast($expired_message_settings['message']);
			} else {
				itoast('抱歉，您的平台账号服务已过期，请及时联系管理员');
			}
		}
		$type = $account_info['type'];
		$module_name = safe_gpc_string($_GPC['module_name']);
		$version_id = intval($_GPC['version_id']);

		if (STATUS_ON != $account_info->supportVersion) {
			if (empty($module_name)) {
				$url = url('home/welcome');
				if (ACCOUNT_TYPE_WEBAPP_NORMAL == $type) {
					$url = url('webapp/home/display');
				}
			} else {
				$url = url('home/welcome/ext', array('m' => $module_name));
				$main_uniacid = table('uni_link_uniacid')->getMainUniacid($uniacid, $module_name);
				if (!empty($main_uniacid)) {
					$uniacid = $main_uniacid;
					$account_info = uni_fetch($main_uniacid);
				}
			}
		} else {
			if (empty($version_id)) {
				if (ACCOUNT_TYPE_PHONEAPP_NORMAL == $type) {
					$versions = phoneapp_get_some_lastversions($uniacid);
				} else {
					$versions = miniapp_get_some_lastversions($uniacid);
				}
				foreach ($versions as $val) {
					if ($val['current']) {
						$version_id = $val['id'];
					}
				}
			}
			if (!empty($module_name) && !empty($version_id)) {
				$url = url('home/welcome/ext/', array('m' => $module_name));
				$main_uniacid = table('uni_link_uniacid')->getMainUniacid($uniacid, $module_name);
				if (!empty($main_uniacid)) {
					$uniacid = $main_uniacid;
					$account_info = uni_fetch($main_uniacid);
				} else {
					$url .= '&version_id=' . $version_id;
				}
			} else {
				miniapp_update_last_use_version($uniacid, $version_id);
				$url = url('miniapp/version/home', array('version_id' => $version_id));
			}
		}
		$url .= '&uniacid=' . $uniacid;
		if (empty($_GPC['switch_uniacid'])) {
			switch_save_account_display($uniacid);
		} else {
			switch_save_uniacid($uniacid);
		}
		if (!empty($_GPC['tohome'])) {
			$url .= '&tohome=1';
		}

		if (!empty($_GPC['miniapp_version_referer'])) {
			$url .= '&miniapp_version_referer=1';
		}

		if (!empty($_GPC['redirect'])) {
			$url = safe_gpc_url($_GPC['redirect']);
		}
		itoast('', $url);
	}
}