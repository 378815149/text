<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if($do == 'display') { ?>
<div class="js-system-module_group" ng-controller="moduleGroupCtrl" ng-cloak>
	<div class="combo-list">
		<div class="search-box we7-margin-bottom clearfix">
			<form action="" method="get" class="search-form">
				<input type="hidden" name="c" value="module">
				<input type="hidden" name="a" value="group">
				<input type="hidden" name="do" value="display">
				<div class="input-group">
					<input class="form-control" name="name" value="<?php  echo $_GPC['name'];?>" type="text" placeholder="名称" >
					<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
				</div>
			</form>
			<?php  if(permission_check_account_user('see_module_manage_system_group_add')) { ?>
			<a href="<?php  echo url('module/group/post')?>" class="btn btn-primary">添加应用权限套餐</a>
			<?php  } ?>
		</div>
		<table class="table we7-table table-hover ">
			<col width="200px" />
			<col>
			<col width="200px" />
			<tr>
				<th class="text-left">套餐名称</th>
				<th>包含应用和模块</th>
				<th class="text-right">操作</th>
			</tr>
			<?php  if(is_array($modules_group_list)) { foreach($modules_group_list as $module_group) { ?>
			<tr >
				<td class="text-left"><?php  echo $module_group['name'];?></td>
				<td>
					<div class="we7-group-app hideall" >
						<?php  if(is_array($module_group['modules_all'])) { foreach($module_group['modules_all'] as $module) { ?>
						<div class="item media">
							<div class="media-left media-middle">
								<a href="#">
									<img class="media-object logo module-img" src="<?php  echo $module['logo'];?>" alt="...">
								</a>
							</div>
							<div class="media-body media-middle">
								<h4 class="media-heading title"><?php  echo $module['title'];?></h4>
								<div class="support-list">
									<?php  if(is_array($module['group_support'])) { ?>
									<?php  if(is_array($module['group_support'])) { foreach($module['group_support'] as $support) { ?>
									<i class="wi wi-<?php  if($support == 'phoneapp') { ?>app<?php  } else { ?><?php  echo $support;?><?php  } ?>"></i>
									<?php  } } ?>
									<?php  } ?>
								</div>
							</div>
						</div>
						<?php  } } ?>
						<?php  if(is_array($module_group['templates'])) { foreach($module_group['templates'] as $template) { ?>
						<div class="item media">
							<div class="media-left media-middle">
								<a href="#">
									<img class="media-object logo template-img" src="<?php  echo $template['logo'];?>" alt="...">
								</a>
							</div>
							<div class="media-body media-middle">
								<h4 class="media-heading title"><?php  echo $template['title'];?></h4>
								<div class="support-list">
									<i class="wi wi-template"></i>
								</div>
							</div>
						</div>
						<?php  } } ?>
					</div>
				</td>
				<td>
					<div class="link-group">
						<?php if(($module_group['modules_all'] ? count($module_group['modules_all']) : 0) + ($module_group['templates'] ? count($module_group['templates']) : 0) > 5) { ?>
						<a href="javascript:;" class="color-default js-unfold" ng-click="changeText($event)">展开</a>
						<?php  } ?>
						
						
							<?php  if($_W['role'] == ACCOUNT_MANAGE_NAME_FOUNDER) { ?>
							<a href="<?php  echo url('module/group/post', array('id' => $module_group['id']))?>">编辑套餐</a>
							<a href="javascript:void(0);" class="del" ng-click="delUniGroup('<?php  echo url("module/group/delete", array("id" => $module_group["id"]))?>')">删除</a>
							<?php  } ?>
						
					</div>
				</td>
			</tr>
			<?php  } } ?>
		</table>
		<div class="pull-right">
			<?php  echo $pager;?>
		</div>
	</div>
</div>
<script>
	angular.bootstrap($('.js-system-module_group'), ['moduleApp']);
</script>
<?php  } else if($do == 'post') { ?>
<div id="js-module-group-edit" ng-controller="moduleGroupEditCtrl" ng-cloak>
	<ol class="breadcrumb we7-breadcrumb">
		<a href="<?php  echo url('module/group')?>"><i class="wi wi-back-circle"></i> </a>
		<li><a href="<?php  echo url('module/group') ?>">套餐应用列表</a></li>
		<li>添加套餐应用列表</li>
	</ol>
	<div class="we7-form">
		<div class="form-group">
			<label class="control-label col-sm-2">应用套餐组名称</label>
			<div class="form-controls col-sm-4">
				<input type="text" name="group_name" class="form-control" ng-model="module_name">
				<span class="help-block">请输入应用套餐组</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">添加应用</label>
			<div class="form-controls col-sm-10">
				<div class="group-post-mudules">
					<div class="module-item" ng-repeat="module in module_list.modules" ng-if="module.checked == 1">
						<div class="logo">
							<img ng-src="{{module.logo}}" class="module-img" alt="">
						</div>
						<div class="info">
							<div ng-bind="module.title" class="title text-over">1213</div>
							<div class="icon">
								<i class="{{module.support | moduleInfo:'icon'}}"></i>
							</div>
						</div>
						<div class="delete">
							<i class="wi wi-error" ng-click="deleteModuleSupport([module.support], module.name)"></i>
						</div>
					</div>
					<div class="module-item" ng-repeat="template in module_list.templates"  ng-if="template.checked == 1">
						<div class="logo">
							<img ng-src="{{template.logo}}" class="template-img" alt="">
						</div>
						<div class="info">
							<div class="name text-over" ng-bind="template.title">1213</div>
							<div class="icon">
								<i class="wi wi-template"></i>
							</div>
						</div>
						<div class="delete">
							<i class="wi wi-error" ng-click="deleteTemplate(template)"></i>
						</div>
					</div>
					<we7-modal-app module-list="module_list" title="'添加应用'" multiple="true" >
						<div class="module-item add"  >
							<i class="wi wi-plus"></i> 添加应用
						</div>
					</we7-modal-app>
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2"></label>
			<div class="form-controls col-sm-8">
				<button class="btn btn-primary we7-padding-horizontal" ng-click="saveGroup()">提 交</button>
			</div>
		</div>
	</div>
</div>
<script>
	angular.module('moduleApp').value('config', {
		group_id: '<?php  echo $group_id;?>',
		module_name: '<?php  echo $group["name"];?>',
		save_module_group_url: "<?php  echo url('module/group/save')?>",
		module_list: <?php  echo json_encode($module_list)?>,
	});
	angular.bootstrap($('#js-module-group-edit'), ['moduleApp']);
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>