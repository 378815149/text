<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="we7-page-tab">
	<li <?php  if($do == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo url('message/notice/display');?>">消息列表</a></li>
	<li <?php  if($do == 'setting') { ?>class="active"<?php  } ?>><a href="<?php  echo url('message/notice/setting');?>">消息设置</a></li>
	<?php  if(user_is_founder($_W['uid'], true)) { ?>
	<li <?php  if($do == 'wechat_setting') { ?>class="active"<?php  } ?>><a href="<?php  echo url('message/notice/wechat_setting');?>">微信提醒设置</a></li>
	<?php  } ?>
</ul>
<div id="message-notice"  ng-controller="messageNoticeCtrl" ng-cloak>
<?php  if($do == 'display') { ?>
	<?php  if(!empty($wechat_setting['uniacid'])) { ?>
	<div class="module-link-box">
		<div class="alert we7-page-alert" style="padding: 20px">
			<p><i class="wi wi-info"></i> 扫码关注公众号，站内消息随时了解。</p>
			<p><i class="wi wi-info"></i> 账号需绑定微信号 <a href="<?php  echo url('user/profile/bind')?>" class="color-default">去绑定微信></a> </p>
			<img ng-src="<?php  echo $uni_account['qrcode'];?>" width="70px" height="70px" style="float:right;margin-top:-58px;"/>
		</div>
	</div>
	<?php  } ?>
	<div class="search-box we7-margin-bottom">
		<div class="search-form">
			<select name="" id="" class="we7-margin-right">
				<option value="" data-url="<?php  echo url('message/notice')?>" <?php  if(empty($type)) { ?> selected <?php  } ?>>消息类型</option>
				
				<option data-url="<?php  echo url('message/notice', array('type' => MESSAGE_ACCOUNT_EXPIRE_TYPE))?>" <?php  if($type == MESSAGE_ACCOUNT_EXPIRE_TYPE) { ?> selected <?php  } ?>>到期消息</a>
				<?php  if(permission_check_account_user('see_message_register')) { ?>
				<option data-url="<?php  echo url('message/notice', array('type' => MESSAGE_REGISTER_TYPE))?>" <?php  if($type == MESSAGE_REGISTER_TYPE) { ?> selected <?php  } ?>>注册提醒</a>
				<?php  } ?>
				<?php  if(permission_check_account_user('see_message_worker')) { ?>
				<option data-url="<?php  echo url('message/notice', array('type' => MESSAGE_WORKORDER_TYPE))?>" <?php  if($type == MESSAGE_WORKORDER_TYPE) { ?> selected <?php  } ?>>工单提醒</a>
				<?php  } ?>
				<?php  if(permission_check_account_user('see_message_official')) { ?>
				<option data-url="<?php  echo url('message/notice', array('type' => MESSAGE_SYSTEM_UPGRADE))?>" <?php  if($type == MESSAGE_SYSTEM_UPGRADE) { ?> selected <?php  } ?>>系统更新</a>
				<option data-url="<?php  echo url('message/notice', array('type' => MESSAGE_OFFICIAL_DYNAMICS))?>" <?php  if($type == MESSAGE_OFFICIAL_DYNAMICS) { ?> selected <?php  } ?>">官方动态</a>
				<?php  } ?>
			</select>
			<select name="" id="">
				<option data-url="<?php  echo filter_url('is_read:');?>" class="active">消息状态</option>
				<option data-url="<?php  echo filter_url('is_read:' . MESSAGE_READ);?>" class="active">已读消息</option>
				<option data-url="<?php  echo filter_url('is_read:' . MESSAGE_NOREAD);?>" class="active">未读消息</option>
			</select>
		</div>
		<a href="javascript:;" ng-click="allRead()" class="btn btn-primary">已读所有消息</a>
	</div>
	<table class="table we7-table table-hover vertical-middle" >
		<col>
		<col>
		<col>
		<tr>
			<th>标题内容</th>
			<th class="text-center" ng-if="type==4" >来源</th>
			<th class="text-center">时间</th>
			<th class="text-right">操作</th>
		</tr>
		<tr ng-repeat="list in lists">
			<td class="tip-before we7-padding-left unread" ng-if ="list.is_read == 1 || list.is_read == 0">{{list.message}} {{type != 4 && list.source ? '(' + list.source + ')' : ''}}</td>
			<td class="tip-before we7-padding-left" ng-if ="list.is_read == 2">{{list.message}} {{type != 4 && list.source ? '(' + list.source + ')' : ''}}</td>
			<td class="text-muted text-center" ng-if="type==4" ng-bind = "list.source"></td>
			<td class="text-muted text-center" ng-bind = "list.create_time"></td>
			<td>
				<div class="link-group">
					
					<a ng-href="{{list.url}}" ng-if="list.type==3">进入工单</a>
					<a ng-href="{{list.url}}" ng-if="list.type==2">查看公众号</a>
					<a ng-href="{{list.url}}" ng-if="list.type==5">查看小程序</a>
					<a ng-href="{{list.url}}" ng-if="list.type==6">查看pc</a>
					<a ng-href="{{list.url}}" ng-if="list.type==4 && list.status==1">查看我的待审核用户</a>
					<a ng-href="{{list.url}}" ng-if="list.type==7">查看我的账号</a>
					<a href="javascript:;" ng-if="list.type==10 || list.type==11" ng-click="getOfficialMsg(list.id, list.url)">查看</a>
				</div>
			</td>
		</tr>
	</table>
	<?php  echo $pager;?>
<?php  } ?>
<?php  if($do == 'setting') { ?>
	<div class="clearfix"></div>
	<div class="table we7-tables we7-padding-bottom">
		<table class="table we7-table table-hover">
			<col width="80px"/>
			<col width="300px"/>
			<col width="100px"/>
			<tr>
				<th>消息类型</th>
				<th>提醒说明</th>
				<th class="text-right">操作</th>
			</tr>
			<?php  if(is_array($setting)) { foreach($setting as $types) { ?>
			<?php  if($_W['isfounder'] || (!$_W['isfounder'] && empty($types['permission']))) { ?>
			<tr>
				<th height="50px"><?php  echo $types['title'];?></th>
				<th><?php  echo $types['msg'];?></th>
				<th></th>
			</tr>
			<?php  if(is_array($types['types'])) { foreach($types['types'] as $type => $info) { ?>
			<?php  if($_W['isfounder'] || (!$_W['isfounder'] && empty($info['permission']))) { ?>
			<tr height="50px">
				<td class="vertical-middle"><?php  echo $info['title'];?></td>
				<td class="vertical-middle"><?php  echo $info['msg'];?></td>
				<td class="text-right vertical-middle">
					<?php  if((!empty($founder_notice_setting[$type]) && $founder_notice_setting[$type] == MESSAGE_DISABLE)) { ?>
					<div>未开启全局提醒</div>
					<?php  } else { ?>
					<label>
						<div class="switch <?php  if(empty($info['status']) || $info['status'] == MESSAGE_ENABLE) { ?> switchOn<?php  } ?>" id="key-<?php  echo $type;?>" ng-click="changeStatus(0, <?php  echo $type;?>)"></div>
					</label>
					<?php  } ?>
				</td>
			</tr>
			<?php  } ?>
			<?php  } } ?>
			<?php  } ?>
			<?php  } } ?>
		</table>
	</div>
<?php  } ?>
<?php  if($do == 'wechat_setting') { ?>
	<div class="module-link-box">
		<div class="alert">
			<p><i class="wi wi-info"></i> 微信提醒接入的公众号须为认证服务号，且与“用户登录/注册设置”中配置的微信登录同属一个微信开放平台，否则无效。</p>
			<p><i class="wi wi-info"></i> 选择好公众号后，须给选定的公众设置指定的模板消息。</p>
			<p><i class="wi wi-info"></i> 用户账号需绑定微信号，并关注该公众号才能接收消息（如未能正常接收，尝试重新绑定并同步公众号下该用户的粉丝信息）。 </p>
		</div>
		<div class="panel we7-panel">
			<div id="select-account">
				<div class="panel-heading">选择公众号</div>
				<div class="panel-body">
					<div class="app-info">
						<?php  if(!empty($account)) { ?>
						<img ng-src="<?php  echo $account['logo'];?>" class="logo" alt="">
						<div class="info">
							<div class="title"><?php  echo $account['name'];?></div>
							<div class="type">
								类型：
								<?php  if($account['level'] == 1) { ?>普通订阅号<?php  } ?>
								<?php  if($account['level'] == 2) { ?>普通服务号<?php  } ?>
								<?php  if($account['level'] == 3) { ?>认证订阅号<?php  } ?>
								<?php  if($account['level'] == 4) { ?>认证服务号<?php  } ?>
								<?php  if($account['level'] == 0) { ?>---<?php  } ?>
								<?php  if($account['isconnect'] == 0) { ?>
								<span class="color-red">
								<i class="wi wi-error-cricle"></i>未接入
									<a href="<?php  echo url('account/post', array('uniacid' => $account['uniacid']))?>" class="color-default font-sm">立即接入></a>
								</span>
								<?php  } else { ?>
								<span class="color-green">
									<i class="wi wi-right-circle"></i>已接入
								</span>
								<?php  } ?>
							</div>
						</div>
						<a href="#" data-toggle="modal" data-target="#add_module" class="change">修改</a>
						<a href="#" class="change color-red we7-margin-left-sm delete-account">删除</a>
						<?php  } else { ?>
						<a href="#" data-toggle="modal" data-target="#add_module" class="add">选择公众号</a>
						<?php  } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="uploader-modal modal fade module" id="add_module"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog we7-modal-dialog" >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">选择公众号</h4>
					</div>
					<div class="modal-body material-content clearfix">
						<div class="material-search">
							<div class="input-group col-sm-5">
								<input class="form-control" name="keyword" ng-model="keyword" ng-change="searchInAccountData(keyword)" type="text" placeholder="请输入账号名称"  autocomplete="false">
							</div>
						</div>
						<div class="material-body">
							<div class="col-sm-2 ng-scope" ng-repeat="item in accounts" ng-click="setUniacid(item.uniacid)">
								<div class="item">
									<img ng-src="{{item.logo}}" class="icon">
									<div class="name">{{item.name}}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php  } ?>
</div>
<?php  if($do == 'wechat_setting') { ?>
<div id="js-profile-tplnotice" ng-controller="tplCtrl" ng-cloak>
	<table class="table we7-table table-hover table-form">
		<col width="200px " />
		<col />
		<col width="100px" />
		<tr>
			<th class="text-left" colspan="3">设置通知模板</th>
		</tr>
		<tr ng-repeat="(key, tpl) in tplList track by key">
			<td class="text-left">
				{{ tpl.name }}
			</td>
			<td class="text-left color-gray">
				{{ tpl.tpl }}
			</td>
			<td class="text-left ">
				<div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#jsauth_acid" ng-click="changeActive(key)">修改</a></div>
			</td>
		</tr>
	</table>
	<div class="modal fade" id="jsauth_acid" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">{{ tplList[active]['name'] }}</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="" name="" id="" ng-model="activetpl" class="form-control" placeholder="{{ tplList[active]['name'] }}" />
						<span class="help-block">{{ tplList[active]['help'] }}</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="saveTpl()">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    angular.module('profileApp').value('config', {
        'tplList' : <?php  echo json_encode($tpl_list)?>,
        'url' : "<?php  echo url('message/notice/wechat_setting')?>"
    });
    angular.bootstrap($('#js-profile-tplnotice'), ['profileApp']);
</script>
<?php  } ?>
<script type="text/javascript">
	angular.module('messageApp').value('config', {
		'type' : '<?php  echo $type?>',
		'lists': <?php echo !empty($lists) ? json_encode($lists) : 'null'?>,
		'is_read' : "<?php  echo $is_read;?>",
		'all_read_url' : "<?php  echo url('message/notice/all_read')?>",
		'mark_read_url' : "<?php  echo url('message/notice/read')?>",
		'wechat_setting_url' : "<?php  echo url('message/notice/wechat_setting')?>",
		'accounts' : <?php  echo json_encode($accounts)?>,
		'token' : "<?php  echo $_W['token'];?>",
	});
	angular.bootstrap($('#message-notice'), ['messageApp']);
	$('.delete-account').click(function () {
        util.confirm(function () {
            window.location.href = "<?php  echo url('message/notice/wechat_setting', array('delete'=>1))?>";
        }, function () {
            return false;
        }, '确认删除?');
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
