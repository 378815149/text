<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(!in_array($do, array('install_success', 'module_detail')) && $module_support_name == 'welcome_support') { ?>
<ul class="we7-page-tab">
	<li <?php  if($do == 'installed') { ?>class="active"<?php  } ?>><a href="<?php  echo url('module/manage-system/installed', array('support' => $module_support_name))?>">已安装应用  </a></li>
	<?php  if(permission_check_account_user('see_module_manage_system_except_installed')) { ?>
	<li <?php  if($do == 'recycle' && $_GPC['type'] == MODULE_RECYCLE_INSTALL_DISABLED) { ?>class="active"<?php  } ?>>
	<a href="<?php  echo url('module/manage-system/recycle', array('support' => $module_support_name, 'type' => MODULE_RECYCLE_INSTALL_DISABLED))?>">
		已停用应用
	</a>
	</li>
	<li <?php  if($do == 'not_installed') { ?>class="active"<?php  } ?>>
	<a href="<?php  echo url('module/manage-system/not_installed', array('support' => $module_support_name))?>">
		未安装应用<span class="color-red">  (<?php  echo $module_uninstall_total;?>) </span>
	</a>
	</li>
	<li <?php  if($do == 'recycle' && $_GPC['type'] == MODULE_RECYCLE_UNINSTALL_IGNORE) { ?>class="active"<?php  } ?>>
	<a href="<?php  echo url('module/manage-system/recycle', array('support' => $module_support_name, 'type' => MODULE_RECYCLE_UNINSTALL_IGNORE))?>">
		回收站
	</a>
	</li>
	<?php  if($module_support_name == MODULE_SUPPORT_ACCOUNT_NAME) { ?>
	<li <?php  if($do == 'subscribe') { ?>class="active"<?php  } ?>><a href="<?php  echo url('module/manage-system/subscribe', array('support' => $module_support_name))?>">订阅管理</a></li>
	<?php  } ?>
	<?php  } ?>
</ul>
<?php  } ?>
<?php  if($do == 'installed') { ?>
<div id="js-system-module" ng-controller="installedCtrl" ng-cloak>
	<div class="search-box clearfix we7-margin-bottom ">
		<select name="" class="select-letter we7-margin-right"  ng-init="letter = '全部'" ng-model="letter" ng-change="searchLetter(letter)">
			<option value="{{item == '按字母筛选(全部)' ? '全部' : item}}"  ng-repeat="item in letters">{{item}}</option>
		</select>
		<select name="" id="" class="we7-margin-right">
			<option data-url="<?php  echo filter_url('support:all');?>" <?php  if($_GPC['support'] == '') { ?> selected <?php  } ?>>按应用类型筛选</option>
			<?php  if(is_array($account_all_type_sign)) { foreach($account_all_type_sign as $type_sign) { ?>
			<?php  $account_name = ''?>
			<?php  if(is_array($account_all_type)) { foreach($account_all_type as $account_type) { ?>
			<?php  if($type_sign == $account_type['type_sign']) { ?>
				<?php  $account_name = $account_type['title']?>
			<?php  } ?>
			<?php  } } ?>
			<option data-url="<?php  echo filter_url('support:' . $type_sign . '_support');?>" <?php  if($_GPC['support'] == $type_sign. '_support') { ?> selected <?php  } ?>><?php  echo $account_name;?></option>
			<?php  } } ?>
		</select>
		<div class="search-form">
			<div class="input-group">
				<input class="form-control" name="title" ng-model="search.moduleName"  ng-keyup="searchModuleName($event)" type="text" placeholder="名称" >
				<span class="input-group-btn"><button ng-click="searchModuleName()" class="btn btn-default" id="search"><i class="fa fa-search"></i></button></span>
			</div>
		</div>
		<?php  if(permission_check_account_user('see_module_manage_system_ugrade')) { ?>
		<div class="we7-form" ng-show="checkUpgradeSuccess">
			<input type="checkbox" name="" ng-click="filter()"  ng-model="search.newBranch" id="filter-1" value="1">
			<label class="checkbox-inline" for="filter-1">
				新分支
			</label>
			<span class="we7-margin-right"></span>
			<input type="checkbox" name="" ng-click="filter()" ng-model="search.newVersion" id="filter-2" value="1">
			<label class="checkbox-inline" for="filter-2">
				新版本
			</label>
		</div>
		<?php  } ?>
	</div>
	<form action="" method="get">
		<table class="table we7-table table-hover vertical-middle table-manage">
			<col width="140px" />
			<col width="250px"/>
			<?php  if(permission_check_account_user('see_module_manage_system_welcome_support') && $_GPC['support'] == 'welcome_support') { ?><col width="100px"><?php  } ?>
			<col width="500px" />
			<tr>
				<th class="text-left bg-light-gray">
					应用名/版本 <a href="javascript:;" class="color-default we7-margin-left-sm"></a>
				</th>
				<th></th>
				<?php  if(permission_check_account_user('see_module_manage_system_welcome_support') && $_GPC['support'] == 'welcome_support') { ?><th>启用</th><?php  } ?>
				<th class="text-left bg-light-gray">支持</th>
				<th class="text-left bg-light-gray">来源</th>
				<th class="text-right bg-light-gray">操作</th>
			</tr>
			<tr ng-repeat="module in moduleList">
				<td class="text-left module-img table-action-td">
					<img ng-click="initModuleLogo()"  ng-if="module.main_module == '' && module.logo" ng-src="{{ module.logo }}" class="img-responsive module-img icon"/>
					<img ng-click="initModuleLogo()" ng-show="module.main_module == '' && !module.logo" src="./resource/images/init_module_logo.png" class="img-responsive module-img icon"/>
					<div class="img" ng-if="module.main_module != ''">
						<img alt="子应用icon" class="plugin-img" ng-src="{{ module.logo }}"/>
						<img ng-click="initModuleLogo()" alt="子应用icon" class="plugin-img" src="./resource/images/init_module_logo.png" ng-if="!module.logo" />
						<img alt="主应用icon" class="module-img" ng-src="{{ module.main_module_logo }}"/>
						<img ng-click="initModuleLogo()" alt="主应用icon" class="module-img" src="./resource/images/init_module_logo.png" ng-if="!module.main_module_logo"/>
					</div>
				</td>
				<td class="text-left">
					<p>{{ module.title }}</p>
					<?php  if(permission_check_account_user('see_module_manage_system_newversion')) { ?>
					<span>版本：{{ module.version }} </span><span class="color-red" ng-if="module.new_version && isFounder == 1">发现新版本</span>

					<?php  } ?>
				</td>
				<?php  if(permission_check_account_user('see_module_manage_system_welcome_support') && $_GPC['support'] == 'welcome_support') { ?>
				<td><div class="switch" ng-class="{'switchOn' : welcome_module == module.name}" ng-click="change_welcome_module(module.name)"></div></td>
				<?php  } ?>
				<td class="text-left">
					{{ module.support_name }}
				</td>
				<td class="text-left" ng-switch="module.from">
					<span ng-switch-when="cloud">商城</span>
					<span ng-switch-when="">商城</span>
					<span ng-switch-when="local">本地</span>
				</td>
				<td class="vertical-middle <?php  if($_GPC['support'] != 'welcome_support') { ?> table-manage-td <?php  } ?>">
					<div class="link-group">
						<?php  if(permission_check_account_user('see_module_manage_system_ugrade')) { ?>
						<a href="<?php  echo url('module/manage-system/module_detail')?>&name={{ module.name }}&show=base" class="color-red del" ng-if="module.service_expire">服务费到期</a>
						<a href="<?php  echo url('module/manage-system/upgrade')?>&module_name={{module.name }}" class="color-red del" ng-if="module.new_version && module.from == 'local'">升级</a>
						<a href="<?php  echo url('module/manage-system/module_detail')?>&name={{ module.name }}&show=upgrade" class="color-red del" ng-if="module.new_branch">新分支</a>
						<a href="<?php  echo url('module/manage-system/module_detail')?>&name={{ module.name }}&show=upgrade" class="color-red del" ng-if="module.new_version">升级</a>
						<?php  } ?>

						<?php  if($module_support_name != 'all' && !empty($module_support_name)) { ?>
						<a href="<?php  echo url('module/manage-system/module_detail')?>&name={{ module.name }}&support=<?php  echo $module_support_name;?>&type=<?php echo ACCOUNT_TYPE_OFFCIAL_NORMAL;?>" ng-if="isFounder == 1">管理设置</a>
						<?php  } else { ?>
						<a href="<?php  echo url('module/manage-system/module_detail')?>&name={{ module.name }}&support={{ module.support }}&type=<?php echo ACCOUNT_TYPE_OFFCIAL_NORMAL;?>" ng-if="isFounder == 1">管理设置</a>
						<?php  } ?>

						<?php  if(permission_check_account_user('see_module_manage_system_stop') && $_GPC['support'] == 'welcome_support') { ?>
						<a href="<?php  echo url('module/manage-system/recycle_post')?>&module_name={{ module.name }}&support=<?php  echo $module_support_name;?>" onclick="return confirm('确认停用模块？')">停用</a>
						<a href="<?php  echo url('home/welcome/ext', array('system_welcome' => 1))?>&m={{ module.name }}" ng-if="isFounder == 1">管理</a>
						<?php  } ?>
					</div>
					<?php  if($_GPC['support'] != 'welcome_support') { ?>
					<div class="manage-option text-right">
						<a href="<?php  echo url('module/manage-system/module_detail')?>&name={{ module.name }}&support=<?php  echo $module_support_name;?>&type=<?php echo ACCOUNT_TYPE_OFFCIAL_NORMAL;?>" ng-if="isFounder == 1">基本信息</a>
						<a href="<?php  echo url('module/manage-system/module_detail')?>&name={{ module.name }}&support=<?php  echo $module_support_name;?>&type=<?php echo ACCOUNT_TYPE_OFFCIAL_NORMAL;?>&show=group" ng-if="isFounder == 1">应用权限组</a>
						<?php  if($module_support_name == MODULE_SUPPORT_ACCOUNT_NAME) { ?>
						<a href="<?php  echo url('module/manage-system/module_detail')?>&name={{ module.name }}&support=<?php  echo $module_support_name;?>&type=<?php echo ACCOUNT_TYPE_OFFCIAL_NORMAL;?>&show=subscribe" ng-if="isFounder == 1 && module.subscribes.length">订阅消息</a>
						<?php  } ?>
						<?php  if(permission_check_account_user('see_module_manage_system_stop')) { ?>
						<?php  if($module_support_name != 'all' && !empty($module_support_name)) { ?>
						<!-- <a href="<?php  echo url('module/manage-system/recycle_post')?>&module_name={{ module.name }}&support=<?php  echo $module_support_name;?>" onclick="return confirm('确认停用模块？')">停用</a> -->
						<a href="javascript:;" ng-click="recycle(module.name, '<?php  echo $module_support_name;?>')">停用</a>
						<?php  } else { ?>
						<!-- <a href="<?php  echo url('module/manage-system/recycle_post')?>&module_name={{ module.name }}&support={{ module.support }}" onclick="return confirm('确认停用模块？')">停用</a> -->
						<a href="javascript:;" ng-click="recycle(module.name, module.support)">停用</a>
						<?php  } ?>
						<?php  } ?>
					</div>
					<?php  } ?>
				</td>
			</tr>
			<tr ng-if="moduleList | we7IsEmpty">
				<td colspan="100">
					<div class="we7-empty-block">暂无</div>
				</td>
			</tr>
		</table>
		<div id="recycle" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
			<div class="modal-dialog modal-tip">
				<div class="modal-content">
					<div class="modal-header clearfix">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<div class="text-center">
							<i class="wi wi-info"></i>
							<p class="title">应用停用后，会导致用户前台无法正常访问，是否停用？</p>
							<p class="content">
								<a href="<?php  echo url('module/expire')?>" class="color-default">可自定义提示，立即去编辑></a>
							</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<a ng-href="{{deleteUrl + 'module_name=' + deleteData.module_name + '&support=' + deleteData.support}}" type="button" class="btn btn-primary ">确认</a>
						<button type="button" class="btn btn-default " data-dismiss="modal">取消</button>
					</div>
				</div>
			</div>
		</div>
		<div class="select-all" ng-hide="search.moduleName || (search.letter && search.letter != '全部') || search.newVersion || search.newBranch">
			<div class="we7-form text-right js-pager">
				<?php  echo $pager;?>
			</div>
		</div>
	</form>
</div>
<script>
	angular.module('moduleApp').value('config', {
		'isFounder' : '<?php  if($_W['isfounder']) { ?>1<?php  } else { ?>2<?php  } ?>',
		'moduleList': <?php  echo json_encode($module_list)?>,
		'editModuleUrl': "<?php  echo url('module/manage-system/get_module_info')?>",
		'saveModuleUrl' :  "<?php  echo url('module/manage-system/save_module_info')?>",
		'checkUpgradeUrl' : "<?php  echo url('module/manage-system/check_upgrade')?>",
		'getUpgradeInfoUrl' : "<?php  echo url('module/manage-system/get_upgrade_info')?>",
		'filterUrl' : "<?php  echo url('module/manage-system/filter')?>",
		'welcome_module' : '<?php  echo $_W['setting']['site_welcome_module'];?>',
		'set_site_welcome_url' : "<?php  echo url('module/manage-system/set_site_welcome_module')?>",
		'initModuleLogoUrl' : "<?php  echo url('module/manage-system/init_modules_logo')?>",
		'deleteUrl' : "<?php  echo url('module/manage-system/recycle_post')?>"
	});
	angular.bootstrap($('#js-system-module'), ['moduleApp']);
	require(['fileUploader']);
</script>
<?php  } else if($do == 'not_installed' || $do == 'recycle') { ?>
<div id="js-system-module-not_installed" ng-controller="notInstalledCtrl" ng-cloak>
	<div class="search-box clearfix we7-margin-bottom">

		<select name="" class="select-letter we7-margin-right"  ng-init="letter = '<?php echo $_GPC['letter']?$_GPC['letter']:'全部'?>'" ng-model="letter" ng-change="searchLetter(letter)">
			<option value="{{item == '按字母筛选(全部)' ? '全部' : item}}"  ng-repeat="item in letters">{{item}}</option>
		</select>
		<form action="" method="get" class="search-form">
			<input type="hidden" name="c" value="module">
			<input type="hidden" name="a" value="manage-system">
			<input type="hidden" name="do" value="<?php  echo $do;?>">
			<input type="hidden" name="type" value="<?php  echo $type;?>">
			<input type="hidden" name="support" value="<?php  echo $module_support_name;?>">
			<input type="hidden" name="letter" value="<?php  echo $letter;?>">
			<div class="input-group ">
				<input class="form-control" name="title" value="<?php  echo $title;?>" type="text" placeholder="名称" >
				<span class="input-group-btn"><button id="search" class="btn btn-default"><i class="fa fa-search"></i></button></span>
			</div>
		</form>
	</div>
	<div class="clearfix">	</div>

	<table class="table we7-table table-hover vertical-middle table-manage">
		<col width="90px">
		<col width="250px">
		<col>
		<col with="80px">
		<tr>
			<th class="text-left">应用名称</th>
			<th></th>
			<th >支持</th>
			<th class="text-right">操作</th>
		</tr>
		<tr ng-repeat="module in module_list">
			<td class="text-left module-img">
				<img ng-src="{{ module.logo }}" alt="" class="module-img ">
			</td>
			<td class="text-left">
				<p>{{ module.title }}</p>
				<span>版本：{{ module.version }} </span>
			</td>

			<?php  if($do == 'not_installed') { ?>
			<td class="text-left">
				<p ng-repeat="item in module | moduleInfo" ng-bind="item.name"></p>
			</td>
			<?php  } else { ?>
			<td class="text-left">
				<p>{{ module.support_name }}</p>
			</td>
			<?php  } ?>

			<td class="" ng-if="permission_check.see_module_manage_system_install">
				<!-- recycle start -->
				<div ng-if="do == 'recycle'" class="link-group">
					<?php  if(permission_check_account_user('see_module_manage_system_stop')) { ?>
						<?php  if($_GPC['support'] != 'all' && !empty($_GPC['support'])) { ?>
						<a href="<?php  echo url('module/manage-system/recycle_post', array('support' => $module_support_name))?>&module_name={{ module.name }}" class="">恢复</a>
						<?php  } else { ?>
						<a href="<?php  echo url('module/manage-system/recycle_post')?>&module_name={{ module.name }}&support={{ module.support }}" class="">恢复</a>
						<?php  } ?>
					<?php  } ?>

					<?php  if($type == MODULE_RECYCLE_INSTALL_DISABLED) { ?>
						<?php  if($module_support_name == 'all' || empty($module_support_name)) { ?>
							<a href="javascript:void(0);" class="" ng-click="uninstallModule('<?php  echo url("module/manage-system/uninstall")?>', module.name, module.support)">卸载</a>
						<?php  } else { ?>
							<a href="javascript:void(0);" class="" ng-click="uninstallModule('<?php  echo url("module/manage-system/uninstall", array("support" => $module_support_name))?>', module.name, '<?php  echo $module_support_name;?>')">卸载</a>
						<?php  } ?>
					<?php  } else { ?>
						<a ng-if="module.cloud_id > 0 && permission_check.see_module_manage_system_shopinfo" ng-href="{{ 'http://s.w7.cc/module-' + module.cloud_id + '.html' }}" target="_blank" >查看商城详情</a>
					<?php  } ?>
				</div>
				<!-- recycle end -->

				<!-- not_installed start -->
				<div class="link-group" ng-if="do == 'not_installed'">
					<!-- 安装 start-->
					<a href="javascript:;" multiple="true" we7-modal-type title="'选中安装应用类型'"  type-list="module.supportArray" ng-if="module.supportArray.length > 1" on-confirm="modalConfirm(type, module, 'install')"><?php  if($_GPC['status'] == 'recycle') { ?>启用<?php  } else { ?>安装<?php  } ?></a>

					<a href="javascript:;"  ng-if="module.supportArray.length == 1" ng-click="modalConfirm(module.supportArray, module, 'install')"><?php  if($_GPC['status'] == 'recycle') { ?>启用<?php  } else { ?>安装<?php  } ?></a>
					<!-- 安装 end-->
					<!-- 删除 -->
					<a href="javascript:;" we7-modal-type multiple="true"  type-list="module.supportArray" ng-if="module.supportArray.length > 1" on-confirm="modalConfirm(type, module, 'delete')">删除</a>

					<a href="javascript:;"  ng-if="module.supportArray.length == 1" ng-click="modalConfirm(module.supportArray, module, 'delete')">删除</a>
					<!--删除end-->

					<a ng-if="module.cloud_id > 0 && permission_check.see_module_manage_system_shopinfo" ng-href="{{ 'http://s.w7.cc/module-' + module.cloud_id + '.html' }}" target="_blank" >查看商城详情</a>
					<!-- 安装 end-->
				</div>
				<!-- not_installed end -->
			</td>
		</tr>

		<tr ng-if="module_list | we7IsEmpty">
			<td colspan="100">
				<div class="we7-empty-block">暂无</div>
			</td>
		</tr>
	</table>
	</form>
	<div class="js-pager text-right">
		<?php  echo $pager;?>
	</div>
</div>
<script>
	angular.module('moduleApp').value('config', {
		'module_list' : <?php  echo json_encode($modulelist)?>,
		'support': <?php  echo json_encode($_GPC['support'])?>,
		'module_support_types' : <?php  echo json_encode($module_support_types)?>,
		'permission_check' : <?php  echo json_encode($permission_check)?>,
		'do' : "<?php  echo $do?>",
		'support' : "<?php  echo $_GPC['support']?>",
		'install_url' : "<?php  echo url('module/manage-system/install')?>",
		'delete_url' : "<?php  echo url('module/manage-system/recycle_post')?>",
	});
	angular.bootstrap($('#js-system-module-not_installed'), ['moduleApp']);
</script>
<?php  } else if($do == 'module_detail') { ?>
<div class="js-system-module-detail" ng-controller="detailCtrl" ng-cloak>
	<ol class="breadcrumb we7-breadcrumb">
		<a href="<?php  echo url('module/manage-system/installed')?>"><i class="wi wi-back-circle"></i> </a>
		<li>
			<a href="<?php  echo url('module/manage-system/installed')?>">应用列表</a>
		</li>
		<li>
			应用管理
		</li>
	</ol>
	<div class="user-head-info ">
		<div class="img " ng-if="moduleinfo.main_module != ''">
			<img alt="子应用icon" class="plugin-img" ng-src="{{ moduleinfo.logo }}"/>
			<img alt="主应用icon" class="module-img" ng-src="{{ moduleinfo.main_module_logo }}"/>
		</div>
		<img ng-src="{{ moduleinfo.logo }}" class="user-avatar img-rounded pull-left" ng-if="moduleinfo.main_module == ''">
		<div class="info">
			<h3 class="title">{{ moduleinfo.title }}</h3>
			<i class="wi wi-wx-apply"  ng-if="moduleinfo.<?php echo MODULE_SUPPORT_ACCOUNT_NAME;?> == 2"></i>
			<i class="wi wi-wxapp-apply" ng-if="moduleinfo.wxapp_support == 2 && moduleinfo.<?php echo MODULE_SUPPORT_ACCOUNT_NAME;?> != 2"></i>
		</div>
		
		<?php  if(permission_check_account_user('see_module_manage_system_shopinfo')) { ?>
		<a ng-if="isFounder == 1 && moduleinfo.cloud_mid != ''" ng-href="{{ 'http://s.w7.cc/module-' + moduleinfo.cloud_mid + '.html' }}" target="_blank" class="btn btn-primary ">查看商城详情</a>
		<?php  } ?>
	</div>

	<div class="btn-group we7-btn-group we7-margin-bottom">
		<a href="javascript:;" ng-click="changeShow('base')" class="btn " ng-class="{'active' : show == 'base' || show == ''}">基本信息</a>
		<a href="javascript:;" ng-click="changeShow('plugin')" class="btn " ng-class="{'active' : show == 'plugin'}" ng-show="moduleinfo.main_module == '' && moduleinfo.plugin_list != undefined && moduleinfo.plugin_list != ''">模块子应用</a>
		<a href="javascript:;" ng-click="changeShow('group')" class="btn " ng-class="{'active' : show == 'group'}">应用权限组</a>
		<?php  if(!empty($module_info['subscribes'])) { ?>
		<a href="javascript:;" ng-click="changeShow('subscribe')" class="btn " ng-class="{'active' : show == 'subscribe'}">订阅消息</a>
		<?php  } ?>
		<?php  if(permission_check_account_user('see_module_manage_system_ugrade')) { ?>
		<a  href="javascript:;" ng-click="changeShow('upgrade')" class="btn " ng-class="{'active' : show == 'upgrade'}">升级</a>
		<?php  } ?>
		<?php  if(permission_check_account_user('see_workorder')) { ?>
		<a  href="javascript:;" ng-click="changeShow('workorder')" ng-class="{'active' : show == 'workorder'}" class="btn">工单系统</a>
		<?php  } ?>
	</div>
	<div id="iframepanel" ng-if="show == 'workorder'">
		<iframe src="" frameborder="0" width="100%"  scrolling="no" id="workorderiframe">
		</iframe>
	</div>
	<table class="table we7-table table-hover table-form" ng-show="show == 'base' || show == ''">
		<col width="140px">
		<col />
		<col width="100px">
		<tr>
			<th class="text-left" colspan="3">编辑模块基本信息</th>
		</tr>
		<tr>
			<td class="table-label">模块标题</td>
			<td>{{ moduleinfo.title }}</td>
			<?php  if(permission_check_account_user('see_module_manage_system_info_edit')) { ?>
			<td class="text-right">
				<div class="link-group"><a href="javascript:;" ng-click="editModule('title', moduleinfo.title)">修改</a></div>
			</td>
			<?php  } ?>
		</tr>
		<?php  if(permission_check_account_user('see_module_manage_system_detailinfo')) { ?>
		<tr>
			<td class="table-label">模块作者</td>
			<td >{{ moduleinfo.author }}</td>
			<td></td>
		</tr>
		<tr>
			<td class="table-label">模块版本</td>
			<td >{{ moduleinfo.version }}</td>
			<td></td>
		</tr>
		<?php  } ?>
		<tr>
			<td class="table-label">模块简述</td>
			<td>{{ moduleinfo.ability }}</td>
			<?php  if(permission_check_account_user('see_module_manage_system_info_edit')) { ?>
			<td class="text-right">
				<div class="link-group"><a href="javascript:;" ng-click="editModule('ability', moduleinfo.ability)">修改</a></div>
			</td>
			<?php  } ?>
		</tr>
		<tr>
			<td class="table-label">模块介绍</td>
			<td>{{ moduleinfo.description }}</td>
			<?php  if(permission_check_account_user('see_module_manage_system_info_edit')) { ?>
			<td class="text-right">
				<div class="link-group"><a href="javascript:;" ng-click="editModule('description', moduleinfo.description)">修改</a></div>
			</td>
			<?php  } ?>
		</tr>
		<tr>
			<td class="table-label">模块缩略图</td>
			<td><img ng-src="{{ moduleinfo.logo }}" alt="" style="width:65px; height:65px;" class="img-rounded"/></td>
			<?php  if(permission_check_account_user('see_module_manage_system_info_edit')) { ?>
			<td class="text-right">
				<div class="link-group"><a href="javascript:;" ng-click="editModule('logo', moduleinfo.logo)">修改</a></div>
			</td>
			<?php  } ?>
		</tr>
		<tr>
			<td class="table-label">模块封面</td>
			<td><img ng-src="{{ moduleinfo.preview }}" alt="" style="width:65px; height:65px;" class="img-rounded"/></td>
			<?php  if(permission_check_account_user('see_module_manage_system_info_edit')) { ?>
			<td class="text-right">
				<div class="link-group"><a href="javascript:;" ng-click="editModule('preview', moduleinfo.preview)">修改</a></div>
			</td>
			<?php  } ?>
		</tr>
	</table>

	<table class="table we7-table table-hover vertical-middle table-manage" ng-show="(show == '' || show == 'base') && moduleinfo.relation">
		<col width="150px"/>
		<col />
		<col />
		<tr>
			<th colspan="3" class="text-left">可关联</th>
		</tr>
		<tr ng-repeat="relation in moduleinfo.relation">
			<td class="text-left">
				{{ we7TypeDefault[relation].name }}
			</td>
			<td class="text-left">
				<img ng-src="{{ moduleinfo.logo }}" class="img-responsive pull-left" style="width: 50px;height: 50px; margin-right: 10px;"/>
				<p>{{ moduleinfo.title }}</p>
				<span class="color-gray">版本：{{ moduleinfo.version }} </span>
			</td>
			<td class="text-right">
				<div class="link-group"><a href="<?php  echo url('module/manage-system/module_detail')?>name={{moduleinfo.name}}&support={{relation}}&type={{moduleinfo.type}}">查看</a></div>
			</td>
		</tr>
	</table>

	<table class="table we7-table table-hover table-form" ng-show="(show == 'base' || show == '') && moduleinfo.service_expiretime">
		<col width="140px">
		<col />
		<col width="100px">
		<tr>
			<th class="text-left" colspan="3">应用服务费</th>
		</tr>
		<tr>
			<td class="table-label">到期时间</td>
			<td>
				{{ moduleinfo.service_expiretime }}
				<span ng-if="moduleinfo.service_expire > 0" class="color-red"><i class="wi wi-info-sign"></i>服务费已过期</span>
			</td>
			<td class="text-right">
				<div class="link-group"><a href="http://s.w7.cc/module-{{moduleinfo.cloud_mid}}.html" target="_blank">购买服务</a></div>
			</td>
		</tr>
	</table>

	<div class="panel we7-panel" ng-show="show == 'plugin' && moduleinfo.main_module == ''">
		<div class="panel-heading">
			模块子应用
		</div>
		<div class="panel-body">
			<div class="plugin-list clearfix">
				<div class="item" ng-repeat="plugin in moduleinfo.plugin_list">
					<a href="<?php  echo url('module/manage-system/module_detail')?>name={{plugin.name}}" target="_blank">
						<div class="img">
							<img ng-src="{{ plugin.logo }}" alt="子应用icon" class="plugin-img"/>
							<img ng-src="{{ moduleinfo.logo }}" alt="主应用icon" class="module-img"/>
						</div>
						<div class="name">{{ plugin.title }}</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<table class="table we7-table table-hover vertical-middle" ng-show="show == 'upgrade'" ng-if="isFounder == 1 && (localUpgradeInfo && !upgradeInfo || !upgradeInfo.branches)">
		<col width="300px"/>
		<col />
		<col width="200px;"/>
		<tr>
			<th>分支名称</th>
			<th>目前版本</th>
			<th>最新版本</th>
			<th class="text-right">操作</th>
		</tr>
		<tr>
			<td>---</td>
			<td>{{ moduleinfo.version }}</td>
			<td><span ng-if="localUpgradeInfo">本地：{{localUpgradeInfo.best_version}}</span></td>
			<td class="text-right">
				<?php  if(permission_check_account_user('see_module_manage_system_ugrade')) { ?>
				<a ng-if="localUpgradeInfo" href="<?php  echo url('module/manage-system/upgrade')?>module_name={{ moduleinfo.name }}" class="btn btn-primary">本地升级</a>
				<?php  } ?>
			</td>
		</tr>
	</table>
	<table class="table we7-table table-hover vertical-middle" ng-show="show == 'upgrade'" ng-if="isFounder == 1 && upgradeInfo.from == 'cloud' && branch.displayorder >= upgradeInfo.site_branch.displayorder" ng-repeat="branch in upgradeInfo.branches">
		<col width="300px"/>
		<!-- <col /> -->
		<col />
		<col />
		<col width="200px"/>
		<tr>
			<th class="text-left">分支名称</th>
			<!-- <th>分支价格</th> -->
			<th>目前版本</th>
			<th>最新版本</th>
			<th class="text-right">操作</th>
		</tr>
		<tbody>
		<tr>
			<td class="text-left">{{ branch.name }}</td>
			<!-- <td class="color-red">
				<span ng-if="branch.displayorder > upgradeInfo.site_branch.displayorder" ng-bind="branch.price"></span>
				<span ng-if="branch.displayorder == upgradeInfo.site_branch.displayorder && branch.id > upgradeInfo.site_branch.id" ng-bind="branch.upgrade_price"></span>
				<span class="label label-success" ng-if="branch.id == upgradeInfo.site_branch.id">当前分支</span>
			</td> -->
			<td>{{ upgradeInfo.site_branch.id == branch.id ? moduleinfo.version : ''}}</td>
			<td>线上：{{ branch.version.version }}<br><span ng-if="localUpgradeInfo">本地：{{localUpgradeInfo.best_version}}</span></td>
			<td class="text-right">
				<span class="text text-success" ng-if="branch.id == upgradeInfo.site_branch.id && branch.version.version ==  moduleinfo.version">无需升级</span>
				<?php  if(permission_check_account_user('see_module_manage_system_ugrade')) { ?>
				<a ng-if="localUpgradeInfo" href="<?php  echo url('module/manage-system/upgrade')?>module_name={{ moduleinfo.name }}" class="btn btn-primary">本地升级</a>
				<a href="javascript:;" ng-click="notice(service_expire, upgradeInfo.id, upgradeInfo.name)" ng-if="branch.id == upgradeInfo.site_branch.id && branch.version.version !=  moduleinfo.version" class="btn btn-primary">升级</a>
				<?php  } ?>
				<a href="javascript:;" ng-click="upgrade(branch.upgrade_price, upgradeInfo.name, upgradeInfo.id)" ng-if="branch.displayorder > upgradeInfo.site_branch.displayorder || (branch.displayorder == upgradeInfo.site_branch.displayorder && branch.id > upgradeInfo.site_branch.id)" class="btn btn-danger">购买</a>
			</td>
		</tr>
		<tr>
			<td class="text-left">{{ branch.id == upgradeInfo.site_branch.id ? '版本更新内容' : ''}}</td>
			<td colspan="4" class="text-right">
				<a class="color-default view-detail" ng-if="branch.id == upgradeInfo.site_branch.id && branch.version.version !=  moduleinfo.version" href="javascript:;" data-id="{{ branch.id }}" onclick="change($(this))">查看详情 <i class="wi wi-angle-down"></i></a>
				<a href="http://s.w7.cc/module-{{upgradeInfo.id}}.html" ng-if="branch.displayorder > upgradeInfo.site_branch.displayorder || (branch.displayorder == upgradeInfo.site_branch.displayorder && branch.id > upgradeInfo.site_branch.id)" class="color-default view-detail" target="_blank">查看分支详情</a>
			</td>
		</tr>
		<tr id="version-detail-{{ branch.id }}" style="display:none">
			<td colspan="5" class="details-versions">
				<div class="js-version-lists">

					<div class="details-version">
						<div class="details-version-time">
							<p class="time-d">{{ branch.day }}</p>
							<p class="time-y-m">{{ branch.month }}</p>
						</div>
						<i class="fa fa-circle-o"></i>
						<div class="details-version-content">
							<div class="panel panel-version">
								<div class="panel-heading">
									版本号：{{ branch.version.version }} - {{ branch.name }}  <span class="time-h" ng-bind="branch.hour"></span>
								</div>
								<div class="panel-body" ng-bind-html="branch.version.description">
								</div>
							</div>
						</div>
					</div>

				</div>
				<?php  if($recent_versions['total'] > 10) { ?>
				<div class="text-center">
					<a href="javascript:;" class="btn c-blue js-versions-more">加载更多<i class="fa fa-angle-down"></i></a>
				</div>
				<?php  } ?>
			</td>
		</tr>
		</tbody>
	</table>
	<div class="module-group" ng-if="isFounder == 1">
		<table class="table we7-table table-hover" ng-show="show == 'group'">
			<col />
			<col width="100px" />
			<tr>
				<th class="text-left">
					应用权限组
				</th>
				<th class="text-right">
					<?php  if(permission_check_account_user('see_module_manage_system_group_add')) { ?>
					<a href="<?php  echo url('module/group')?>" class="color-default">添加</a>
					<?php  } ?>
				</th>
			</tr>
			<tr>
				<td class="text-left">
					<span>所有服务</span>
				</td>
				<td>
				</td>
			</tr>
			<?php  if(is_array($module_group)) { foreach($module_group as $group) { ?>
			<tr>
				<td class="text-left">
					<span><?php  echo $group['name'];?></span>
				</td>
				<td class="text-right">
					<?php  if(permission_check_account_user('see_module_manage_system_group_add')) { ?>
					<div class="link-group"><a href="<?php  echo url('module/group/post', array('id' => $group['id']))?>">设置</a></div>
					<?php  } ?>
				</td>
			</tr>
			<?php  } } ?>
		</table>
	</div>
	<?php  if(!empty($module_info['subscribes'])) { ?>
	<div class="panel we7-panel module-subscription" ng-if="isFounder == 1" ng-show="show == 'subscribe'">
		<div class="panel-heading ">
			订阅详情
			<div class="pull-right subscription-switch">
				<span >启用订阅</span>
				<label>
					<input name="" id="" class="form-control" type="checkbox"  style="display: none;">
					<div class="switch" ng-class="{ 'switchOn' : !moduleinfo.is_receive_ban || moduleinfo.is_receive_ban == 0}" ng-click="changeSwitch()"></div>
				</label>
			</div>
		</div>
		<div class="panel-body">
			<ul>
				<?php  if(is_array($module_info['subscribes'])) { foreach($module_info['subscribes'] as $subscribe) { ?>
				<li><?php  echo $subscribes_type[$subscribe];?> <label ng-if="subscribe == 2" class="label label-danger">通讯失败</label>  </li>
				<?php  } } ?>
			</ul>
		</div>
	</div>
	<?php  } ?>
	<table class="table we7-table table-hover" ng-if="isFounder == 1">
		<col width="255px"/>
		<col width="130px"/>
		<col width="250px"/>
		<col width="122px"/>
		<col />
	</table>
	<div class="modal fade" id="module-info"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog we7-modal-dialog" style="width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">编辑模块信息</h4>
				</div>
				<div class="modal-body">
					<div class="form-group" ng-show="editType == 'title'">
						<label class="col-sm-2 control-label"> 模块标题</label>
						<div class="col-sm-10">
							<input type="text" name="title" ng-model="moduleOriginal.title" class="form-control">
							<span class="help-block">模块的名称, 显示在用户的模块列表中. 不要超过10个字符</span>
						</div>
					</div>
					<div class="form-group" ng-show="editType == 'ability'">
						<label class="col-sm-2 control-label"> 模块简述</label>
						<div class="col-sm-10">
							<input type="text" name="ability" ng-model="moduleOriginal.ability" class="form-control">
							<span class="help-block">模块功能描述, 使用简单的语言描述模块的作用, 来吸引用户</span>
						</div>
					</div>
					<div class="form-group" ng-show="editType == 'description'">
						<label class="col-sm-2 control-label"> 模块介绍</label>
						<div class="col-sm-10">
							<textarea type="text" name="description" ng-model="moduleOriginal.description" class="form-control" rows="5">{{ moduleinfo.description }}</textarea>
							<span class="help-block">模块详细描述, 详细介绍模块的功能和使用方法</span>
						</div>
					</div>
					<div class="form-group" ng-show="editType == 'logo'">
						<label class="col-sm-2 control-label"> 模块缩略图</label>
						<div class="col-sm-10">
							<div class="we7-input-img" ng-class="{ 'active' : moduleOriginal.logo }" style="width: 100px;height: 100px;">
								<img ng-src="{{ moduleOriginal.logo }}" ng-if="moduleOriginal.logo">
								<a href="javascript:;" class="input-addon" ng-hide="moduleOriginal.logo" ng-click="changePicture('logo')"><span>+</span></a>
								<input type="hidden" name="thumb">
								<div class="cover-dark">
									<a href="javascript:;" class="cut" ng-click="changePicture('logo')">更换</a>
									<a href="javascript:;" class="del" ng-click="delPicture('logo')"><i class="fa fa-times text-danger"></i></a>
								</div>
							</div>
							<span class="help-block">用 48*48 的图片来让你的模块更吸引眼球吧。仅支持jpg格式</span>
						</div>
					</div>
					<div class="form-group" ng-show="editType == 'preview'">
						<label class="col-sm-2 control-label"> 模块封面</label>
						<div class="col-sm-10">
							<div class="we7-input-img" ng-class="{ 'active' : moduleOriginal.preview}"  style="width: 100px;height: 100px;">
								<img ng-src="{{ moduleOriginal.preview }}">
								<a href="javascript:;" class="input-addon" ng-click="changePicture('preview')"><span>+</span></a>
								<input type="hidden" name="thumb">
								<div class="cover-dark">
									<a href="javascript:;" class="cut" ng-click="changePicture('preview')">更换</a>
									<a href="javascript:;" class="del" ng-click="delPicture('preview')"><i class="fa fa-times text-danger"></i></a>
								</div>
							</div>
							<span class="help-block">模块封面, 大小为 600*350, 更好的设计将会获得官方推荐位置。仅支持jpg格式</span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button  class="btn btn-primary" type="text" name="submit" ng-click="save()" data-dismiss="modal">保存</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<input type="hidden" name="token" value="c781f0df">
				</div>
			</div>
		</div>
	</div>

</div>

<script>
	require(['fileUploader'], function() {
		angular.module('moduleApp').value('config', {
			'isFounder' : "<?php  if($_W['isfounder']) { ?>1<?php  } else { ?>2<?php  } ?>",
			'show' : "<?php  echo $_GPC['show'];?>",
			'moduleInfo' : <?php  echo json_encode($module_info)?>,
			'receiveBanUrl' : "<?php  echo url('module/manage-system/change_receive_ban')?>",
			'editModuleUrl' : "<?php  echo url('module/manage-system/get_module_info')?>",
			'saveModuleUrl' : "<?php  echo url('module/manage-system/save_module_info')?>",
			'checkReceiveUrl' : "<?php  echo url('module/manage-system/check_subscribe')?>",
			'getUpgradeInfoUrl' : "<?php  echo url('module/manage-system/get_upgrade_info')?>",
			'getLocalUpgradeInfoUrl' : "<?php  echo url('module/manage-system/get_local_upgrade_info')?>",
			'getWorkorderIframeUrl' : "<?php  echo url('system/workorder/module')?>"
		});
		angular.bootstrap($('.js-system-module-detail'), ['moduleApp']);
	});

	if(window.addEventListener) {
		window.addEventListener('message', function(e){
			$('#workorderiframe').height(e.data.height+200); //选中图片导致高度又变高了
		});
	}
</script>
<?php  } else if($do == 'subscribe') { ?>
<div class="alert alert-info we7-page-alert">
	如果模块测试订阅消息失败，为了不影响系统整体通知，请禁用这些通知失败的模块
</div>
<div class="js-system-module-subscribe" ng-controller="subscribeCtrl" ng-cloak>
	<div class="panel we7-panel panel-table js-test" ng-repeat="(name, module) in subscribe_module track by name">
		<div class="panel-heading clearfix">
			<div class="pull-right" ng-click="change_ban(module.name)">
				<input class="form-control" type="checkbox"  style="display: none;">
				<div ng-class="module.receive_ban == 0 ? 'switch switchOn' : 'switch'"></div>
			</div>
			{{ module.title }}
		</div>
		<div class="panel-body clearfix">
			<div class="col-md-3 col-sm-4 col-xs-6 item" style="line-height: 30px; cursor:pointer;" ng-repeat="subscribe in module.subscribe" ng-if="subscribe != 'text'">
				{{ types[subscribe] }}
				<p class="pull-right">
					<span class="label label-success" ng-if="module.subscribe_success == 1">正常</span>
					<span class="label label-danger" ng-if="module.subscribe_success == 2">失败</span>
				</p>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	angular.module('moduleApp').value('config', {
		'subscribe_module' : <?php  echo json_encode($subscribe_module)?>,
		'types' : <?php  echo json_encode($subscribe_type)?>,
		'change_ban_url' : "<?php  echo url('module/manage-system/change_receive_ban')?>",
		'check_receive_url' : "<?php  echo url('module/manage-system/check_subscribe')?>"
	});
	angular.bootstrap($('.js-system-module-subscribe'), ['moduleApp']);
</script>
<?php  } else if($do == 'install_success') { ?>
<ul class="we7-step">
	<li class="new"><span class="content">1. 安装应用</span></li>
	<li class="new"><span class="content">2. 分配应用权限</span> </li>
	<li class="new active"><span class="content">3. 安装成功</span> </li>
</ul>
<div class="distribution-steps">
	<div class="we7-margin-bottom-sm font-lg">应用分配到公众号使用的流程说明</div>
	<div class="steps-container">
		<div>
			<div class="num">1</div>
			<div class="title">
				<span class="wi wi-appjurisdiction"></span>添加应用权限组
			</div>
			<div class="content">
				设置应用权限组名称，选择需要添加的公众号应用、小程序应用、微站模板，保存提交。
				<div><a href="<?php  echo url('module/group/post')?>" class="color-default">去添加应用组 ></a></div>
			</div>
		</div>
		<div>
			<div class="num">2</div>
			<div class="title">
				<span class="wi wi-userjurisdiction"></span>添加用户权限组
			</div>
			<div class="content">
				设置用户权限组名称，选择可以添加的的公众号，小程序数量、有效期并选择应用权限组，然后保存提交。
				<div><a href="<?php  echo url('user/group/post')?>" class="color-default">去添加用户权限组 ></a></div>
			</div>
		</div>
		<div>
			<div class="num">3</div>
			<div class="title">
				<span class="wi wi-user-group"></span>分配用户权限组
			</div>
			<div class="content">
				改用户组权限，分配成功后此用户组即可使用该应用组的所有应用。
				<div><a href="<?php  echo url('user/group')?>" class="color-default">去分配用户组 ></a></div>
			</div>
		</div>
	</div>
</div>
<div class="we7-margin-top">
	<?php  if($module_support_name == MODULE_SUPPORT_SYSTEMWELCOME_NAME) { ?>
	<a class="btn btn-primary" href="<?php  echo url('module/manage-system/installed', array('support' => MODULE_SUPPORT_SYSTEMWELCOME_NAME))?>">返回已安装应用列表</a>
	<?php  } else { ?>
	<a class="btn btn-primary" href="<?php  echo url('module/manage-system/installed')?>">返回已安装应用列表</a>
	<?php  } ?>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>