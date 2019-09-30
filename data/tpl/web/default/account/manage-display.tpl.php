<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div  id="js-system-account-display" ng-controller="SystemAccountDisplay" ng-cloak>

	<div class="clearfix ">
		<div class="search-box we7-margin-bottom" ng-show="!showActionStatus">
			<select name="" class="we7-margin-right">
				<option data-url="<?php  echo filter_url('account_type:');?>" >帐号类型筛选</option>
				<?php  if(is_array($account_all_type_sign)) { foreach($account_all_type_sign as $type_sign => $type_sign_info) { ?>
					<?php  if($type_sign_info['account_num'] && $type_sign_info['account_num'] > 0) { ?>
					<option data-url="<?php  echo filter_url('account_type:' . $type_sign);?>" <?php  if($_GPC['account_type'] == $type_sign) { ?> selected<?php  } ?>><?php  echo $type_sign_info['title'];?></option>
					<?php  } ?>
				<?php  } } ?>
			</select>
			<select name="" id="" class="we7-margin-right">
				<option data-url="<?php  echo filter_url('order:asc');?>" >创建时间正序</option>
				<option data-url="<?php  echo filter_url('order:desc');?>" <?php  if($_GPC['order'] == 'desc') { ?> selected<?php  } ?>>创建时间倒序</option>
			</select>
			<select name="" id="" class="we7-margin-right">
				<option data-url="<?php  echo filter_url('type:all');?>" <?php  if($_GPC['type'] == 'all') { ?> selected<?php  } ?>>到期筛选</option>
				<option data-url="<?php  echo filter_url('type:expire');?>" <?php  if($_GPC['type'] == 'expire') { ?> selected<?php  } ?>>已到期</option>
				<option data-url="<?php  echo filter_url('type:unexpire');?>" <?php  if($_GPC['type'] == 'unexpire') { ?> selected<?php  } ?>>未到期</option>		
			</select>
			<form action="" class="search-form " method="get">
				<input type="hidden" name="c" value="account">
				<input type="hidden" name="a" value="manage">
				<div class="input-group" style="width: 400px;">
					<input type="text" name="keyword" value="<?php  echo $_GPC['keyword'];?>" class="form-control" placeholder="搜索关键字"/>
					<span class="input-group-btn"><button class="btn btn-default"><i class="wi wi-search"></i></button></span>
				</div>
			</form>
			<a href="javascript:;"  class="btn btn-default we7-padding-horizontal we7-margin-right" ng-click="showActionStatus = true">批量操作</a>
			<a href="javascript:;" data-toggle="modal" data-target="#owner-modal" class="btn btn-primary we7-padding-horizontal">添加平台</a>
		</div>
		<div class="search-box we7-margin-bottom action-box" ng-show="showActionStatus">
			<button href="javascript:;" ng-disabled="!checkNum" class="btn btn-default we7-padding-horizontal " ng-click="postAction('disabled')">停用</button>
			<form action="" class="search-form " method="get">
			</form>
			<a href="javascript:;"  class="btn btn-default we7-padding-horizontal " ng-click="showActionStatus = false">退出批量操作</a>
		</div>
	</div>

	<!-- 列表数据 start -->
	<table class="table we7-table table-hover vertical-middle table-manage">
		<col width="100px" ng-if="showActionStatus">
		<col width="100px" />
		<col width="400px"/>
		<col width=""/>
		<col width=""/>
		<col width="260px" />
		<tr>
			<th class="we7-form" ng-if="showActionStatus">
				<input type="checkbox" we7-check-all="1" id="uid-all" ng-model="$parent.checkAllStatus" ng-change="checkAll()" class="">
				<label for="uid-all">已选{{checkNum}}个</label>
			</th>
			<th colspan="2" class="text-left">名称</th>
			<th>平台过期时间</th>
			<th>主管理员</th>
			<th class="text-right">操作</th>
		</tr>
		<tr class="color-gray" ng-repeat="list in lists" ng-show="list.current_user_role != 'clerk'">
			<td class="we7-form table-action-td" ng-if="showActionStatus" >
				<input type="checkbox" we7-check-all="1" id="{{'uid-' + list.acid}}" class="" ng-model="list['checked']"  ng-change="checkItem(list['checked'])">
				<label for="{{'uid-' + list.acid}}">&nbsp;</label>
			</td>
			<td class="text-left td-link">
				<a href="javascript:;"><img src="{{list.logo}}" class="img-responsive account-img icon"></a>
			</td>
			<td class="text-left">
				<p class="color-dark" ng-bind="list.name"></p>
				<div ng-if="list.type_sign == 'account'">
					<span class="color-gray" ng-if="list.level == 1">类型：普通订阅号</span>
					<span class="color-gray" ng-if="list.level == 2">类型：普通服务号</span>
					<span class="color-gray" ng-if="list.level == 3">类型：认证订阅号</span>
					<span class="color-gray" ng-if="list.level == 4" title="认证服务号/认证媒体/政府订阅号">类型：认证服务号</span>
					<span class="color-red" ng-if="list.isconnect == 0" ><i class="wi wi-error-sign"></i>未接入</span>
					<span class="color-green" ng-if="list.isconnect == 1"><i class="wi wi-right-sign"></i>已接入</span>
				</div>
				<div ng-if="list.type_sign != 'account'">
					<span class="color-gray">类型：{{ list.type_name }}</span>
				</div>
			</td>
			<td>
				<p ng-bind="list.end"></p>
			</td>
			<td><p ng-bind="list.owner_name"></p></td>
			<td class="vertical-middle table-manage-td">
				<div class="link-group">
					<a ng-href="{{links.switch}}uniacid={{list.uniacid}}&type={{list.type}}"  ng-if="!list.support_version" class="">进入{{ list.type_name }}</a>
					<a ng-href="{{links.switch}}uniacid={{list.uniacid}}&version_id={{list.current_version.id}}&type={{list.type}}" ng-if="list.support_version" class="">进入{{ list.type_name }}</a>
					<a ng-href="{{links.post}}&uniacid={{list.uniacid}}&account_type={{list.type}}" ng-if="list.manage_premission">管理设置</a>
				</div>

				<div class="manage-option text-right" ng-if="list.manage_premission">
					<a ng-if="list.current_user_role == 'founder' || list.current_user_role == 'vice_founder' || list.current_user_role == 'owner'"
					   href="{{links.post}}&uniacid={{list.uniacid}}&account_type={{list.type}}">基础信息</a>

					<a ng-if="list.current_user_role == 'founder' || list.current_user_role == 'vice_founder' || list.current_user_role == 'owner'"
					   href="{{links.post}}&do=sms&uniacid={{list.uniacid}}&account_type={{list.type}}" ng-if="list.type_sign == 'account'">短信信息</a>

					<a href="{{links.postUser}}&do=edit&uniacid={{list.uniacid}}&&account_type={{list.type}}">使用者管理</a>
					<a href="{{links.post}}&do=modules_tpl&uniacid={{list.uniacid}}&account_type={{list.type}}">可用应用模板/模块</a>

					<a ng-if="list.current_user_role == 'founder' || list.current_user_role == 'vice_founder' || list.current_user_role == 'owner'"
					   href="{{links.post}}&do=operators&uniacid={{list.uniacid}}&account_type={{list.type}}">应用操作员管理</a>

					<a ng-if="list.current_user_role == 'founder' || list.current_user_role == 'vice_founder' || list.current_user_role == 'owner'"
					   href="javascript:void(0);" ng-click="receiveAccount(links.del, [list.uniacid], '')" class="del">停用</a>
				</div>
			</td>
		</tr>
	</table>
	<!-- 列表数据 end -->

	<div class="text-right">
		<?php  echo $pager;?>
	</div>

	<!-- 添加帐号弹窗 start -->
	<div class="modal fade modal-type" tabindex="-1" role="dialog" id="owner-modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header clearfix">
					新建
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="type-list">
						<a class="item" ng-href="{{item.createurl}}" ng-if="item.can_create" ng-repeat="item in createInfo">
							<i class="{{item.icon}}"></i>
							<div class="name">新建{{item.title}}</div>
							<div class="mark">去新建</div>
						</a>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default"  data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 添加帐号弹窗 end -->
</div>
<script>
	$(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	angular.module('accountApp').value('config', {
		lists: <?php echo !empty($list) ? json_encode($list) : 'null'?>,
		links: {
			switch: "<?php  echo url('account/display/switch')?>",
			getAccountDetailInfo: "<?php  echo url('account/manage/account_detailinfo')?>",
			post: "<?php  echo url('account/post')?>",
			postUser: "<?php  echo url('account/post-user')?>",
			del: "<?php  echo url('account/manage/delete')?>",
			accountCreateInfo: "<?php  echo url('account/manage/account_create_info')?>",
		},
	});
	angular.bootstrap($('#js-system-account-display'), ['accountApp']);
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>