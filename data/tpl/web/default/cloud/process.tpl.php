<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<script type="text/javascript">
<!--
	var packet = <?php echo $packet ? json_encode($packet) : 'null';?>;
	angular.module('cloudApp');
	angular.module('cloudApp')
	.controller('FileProcessorCtrl', function($scope, $http, config) {
		$scope.files = config.files;
		$scope.fails = [];

		var total = $scope.files.length;
		var i = 1;
		var errormsg = '';
		var tasknum = config.tasknum && config.type != '' ? config.tasknum : 1;
		if (tasknum > total) {
			tasknum = 1;
		}
		var proc = function() {
			var path = $scope.files.pop();
			if(!path && i >= total) {
				if ($scope.fails && $scope.fails.length > 0) {
					util.message('文件同步失败，可能是目录权限问题，请重试同步成功后继续。', './index.php?c=cloud&a=upgrade&', 'info');
				} else {
					var targetUrl = '';
					if (config.type == 'theme') {
						targetUrl = './index.php?c=cloud&a=process&step=schemas&t=' + config.appname + '&is_upgrade=' + config.is_upgrade;
					} else if (config.type == 'webtheme') {
						targetUrl = './index.php?c=cloud&a=process&step=schemas&w=' + config.appname + '&is_upgrade=' + config.is_upgrade;
					} else {
						targetUrl = './index.php?c=cloud&a=process&step=schemas&m=' + config.appname + '&is_upgrade=' + config.is_upgrade + '&batch=1&support=' + config.account_type + '&has_new_support=<?php  echo $has_new_support;?>';
					}
					util.message('文件同步完成，正在处理数据同步......', targetUrl, 'success');
				}
				return;
			}
			$scope.file = path;
			$scope.pragress = i + '/' + total;
			$scope.pragressPer = Math.floor((i / total) * 100);
			$scope.topPragress = $scope.pragressPer < 50 ? $scope.pragressPer * 3.6 - 135 : 45;
			$scope.bottomPragress = $scope.pragressPer > 50 ? ($scope.pragressPer - 50) * 3.6 - 135 : -135;
			var params = {path: path, type : config.type};
			$http.post(location.href, params).success(function(dat){
				i++;
				if(dat != 'success') {
					$scope.fails.push('['+dat+'] ' + path);
					errormsg = dat;
				}
				proc();
			}).error(function(){
				i++;
				$scope.fails.push(path);
				proc();
			});
		}
		for (j = 0; j < tasknum; j++) {
			proc();
		}
	})
	.controller('SchemasProcessorCtrl', function($scope, $http, config){
		if (packet && (packet.files.length > 0)) {
			util.message('请先完成文件同步', './index.php?c=cloud&a=upgrade');
			return false;
		}
		$scope.schemas = config.schemas;
		$scope.fails = [];
		var is_m_install = config.is_module_install;
		var total = $scope.schemas.length;
		var i = 1;
		var error = function() {
			util.message('未能成功执行处理数据库, 请联系开发商解决. ');
		}
		var proc = function() {
			var schema = $scope.schemas.pop();
			if(!schema) {
				if($scope.fails.length > 0) {
					error();
					return;
				} else {
					if(is_m_install == 1) {
						location.href = '';
					} else {
						location.href = '';
					}
					return;
				}
			}
			$scope.schema = schema;
			$scope.pragress = i + '/' + total;
			$scope.pragressPer = Math.floor((i / total) * 100);
			$scope.topPragress = $scope.pragressPer < 50 ? $scope.pragressPer * 3.6 - 135 : 45;
			$scope.bottomPragress = $scope.pragressPer > 50 ? ($scope.pragressPer - 50) * 3.6 - 135 : -135;
			var params = {table: schema};
			$http.post(location.href, params).success(function(dat){
				i++;
				if(dat != 'success') {
					$scope.fails.push(schema)
				}
				if (dat['message']) {
					util.message(dat['message']);
					return;
				}
				proc();
			}).error(function(){
				i++;
				$scope.fails.push(schema);
				proc();
			});
		}
		proc();
	})
	.controller('processor', function($scope, $http){
		if (packet && (packet.files.length > 0 || packet.files.schemas > 0)) {
			util.message('请先完成文件或是数据库同步', './index.php?c=cloud&a=upgrade');
			return false;
		}
		$scope.scripts = <?php  echo json_encode($scripts);?>;
		$scope.fails = [];
		
		var is_upgrade = "<?php  echo $is_upgrade?>";
		var total = $scope.scripts.length;
		var i = 1;
		var error = function() {
			util.message('未能成功执行清理升级操作, 请联系开发者. ');
		}
		var proc = function() {
			var script = $scope.scripts.shift();
			if(!script) {
				if($scope.fails.length > 0) {
					error();
				} else {
					if(is_upgrade == 1) {
						<?php  if($_GPC['batch']) { ?>
							location.href = '<?php  echo url("system/module/upgrade", array("m" => $m, "flag" => 1, "batch_from_cloud" => 1));?>';
						<?php  } else { ?>
							location.href = '<?php  echo url("system/module/upgrade", array("m" => $m, "flag" => 1));?>';
						<?php  } ?>
						return;
					}
					
					var is_confirm = "<?php  echo $_GPC['is_confirm']?>";
					if(is_confirm == 1) {
						if(confirm('已经成功执行升级操作! '+"\n"+' 由于数据库更新, 可能会产生多余的字段. 你可以按照需要删除')) {
							location.href = '<?php  echo url("cloud/upgrade");?>';
						} else {
							location.href = '<?php  echo url("cloud/upgrade");?>';
						}
					} else {
						util.message('已经成功执行升级操作! '+"\n"+' 由于数据库更新, 可能会产生多余的字段. 你可以按照需要删除.', '<?php  echo url("cloud/upgrade");?>');
					}
					return;
				}
			}
			$scope.script = script.fname;
			$scope.message = script.message;
			$scope.pragress = i + '/' + total;
			$scope.pragressPer = Math.floor((i / total) * 100);
			$scope.topPragress = $scope.pragressPer < 50 ? $scope.pragressPer * 3.6 - 135 : 45;
			$scope.bottomPragress = $scope.pragressPer > 50 ? ($scope.pragressPer - 50) * 3.6 - 135 : -135;
			var params = {fname: script.fname};
			$http.post(location.href, params).success(function(dat){
				i++;
				if(dat != 'success') {
					$scope.fails.push(script.fname)
					error();
					return;
				}
				proc();
			}).error(function(){
				i++;
				$scope.fails.push(script.fname);
				error();
			});
		}
		proc();
	});
//-->
</script>
<?php  if($step == 'files') { ?>
<?php  if(!empty($_GPC['m'])) { ?>
<ul class="we7-step">
	<li class="active"><span class="content">1 安装应用</span></li>
	<li ><span class="content">2 分配应用权限</span> </li>
	<li><span class="content">3 安装成功</span> </li>
</ul>
<?php  } ?>
<div class="clearfix js-processor" ng-controller="FileProcessorCtrl" ng-cloak>
	<div class="upgrade-pragress we7-margin-bottom">
		<div class="wrapper top">
            <div class="circleProgress topcircle" ng-style="{transform: 'rotate('+ topPragress +'deg)'}"></div>
        </div>
        <div class="wrapper bottom">
            <div class="circleProgress bottomcircle" ng-style="{transform: 'rotate('+ bottomPragress +'deg)'}"></div>
        </div>
		<div class="circle">
			<img src="./resource/images/upgrade.png" alt="">
			<div class="pragress">
				{{pragressPer}}%
			</div>
		</div>
	</div>
	<div class="alert we7-page-alert">
		正在更新系统文件, 请不要关闭窗口
	</div>
	<div class="alert we7-page-alert">
		如果下载文件失败，可能造成的原因：写入失败，请仔细检查写入权限是否正确。
	</div>
	<div class="alert alert-info form-horizontal ng-cloak" >
		<dl class="dl-horizontal">
			<dt>整体进度</dt>
			<dd>{{pragress}}</dd>
			<dt>正在下载文件</dt>
			<dd class="text-over">{{file}}</dd>
		</dl>
		<dl class="dl-horizontal" ng-show="fails.length > 0">
			<dt>下载失败的文件</dt>
			<dd>
				<p class="text-danger text-over" ng-repeat="file in fails" style="margin:0;">{{file}}</p>
			</dd>
		</dl>
	</div>
	<script type="text/javascript">
		angular.module('cloudApp').value('config', {
			files : <?php echo $packet['files'] ? json_encode($packet['files']) : '[]'?>,
			type : '<?php  echo $type;?>',
			appname : '<?php  echo $m;?>',
			is_upgrade : '<?php  echo $is_upgrade;?>',
			account_type : "<?php  echo $_GPC['support'];?>",
			tasknum : "<?php  echo $packet['task'];?>",
		});
		angular.bootstrap($('.js-processor'), ['cloudApp']);
	</script>
</div>
<?php  } ?>
<?php  if($step == 'schemas') { ?>
<div class="clearfix js-processor" ng-cloak ng-controller="SchemasProcessorCtrl">
	<?php  if(empty($packet['schemas'])) { ?>
		<!-- 如果是安装模块,数据库操作完成后,不处理script,直接跳转到system/module/install -->
		<!-- 安装 -->
		<?php  if(!empty($packet['install'])) { ?>
			<?php  if($packet['type'] == 'theme') { ?>
			<script>
				location.href = '<?php  echo url("system/template/install", array("templateid" => $m, "flag" => 1));?>';
			</script>
			<?php  } else if($packet['type'] == 'webtheme') { ?>
			<script>
				location.href = '<?php  echo url("system/webtheme/install", array("webtheme" => $m, "flag" => 1));?>';
			</script>
			<?php  } else { ?>
			<script>
				location.href = '<?php  echo url("module/manage-system/install", array("module_name" => $m, "flag" => 1, "support" => $_GPC["support"]));?>';
			</script>
			<?php  } ?>
		<?php  } ?>
		<!-- 升级 -->
		<?php  if($packet['type'] == 'theme') { ?>
		<script>
			location.href = '<?php  echo url("cloud/process", array("step" => "scripts", "t" => $m, "is_upgrade" => $is_upgrade));?>';
		</script>
		<?php  } else if($packet['type'] == 'webtheme') { ?>
		<script>
			location.href = '<?php  echo url("cloud/process", array("step" => "scripts", "w" => $m, "is_upgrade" => $is_upgrade));?>';
		</script>
		<?php  } else { ?>
		<script>
			<?php  if($_GPC['batch']) { ?>
				location.href = '<?php  echo url("cloud/process", array("step" => "scripts", "m" => $m, "is_upgrade" => $is_upgrade, "batch" => 1, "support" => $_GPC["support"], "has_new_support" => $has_new_support));?>';
			<?php  } else { ?>
				location.href = '<?php  echo url("cloud/process", array("step" => "scripts", "m" => $m, "is_upgrade" => $is_upgrade, "support" => $_GPC["support"], "has_new_support" => $has_new_support));?>';
			<?php  } ?>
		</script>
		<?php  } ?>

	<?php  } ?>
	<div class="upgrade-pragress we7-margin-bottom">
		<div class="wrapper top">
			<div class="circleProgress topcircle" ng-style="{transform: 'rotate('+ topPragress +'deg)'}"></div>
		</div>
		<div class="wrapper bottom">
			<div class="circleProgress bottomcircle" ng-style="{transform: 'rotate('+ bottomPragress +'deg)'}"></div>
		</div>
		<div class="circle">
			<img src="./resource/images/upgrade.png" alt="">
			<div class="pragress">
				{{pragressPer}}%
			</div>
		</div>
	</div>
	<div class="alert alert-warning we7-page-alert">
		正在更新数据库, 请不要关闭窗口.
	</div>
	<div class="alert alert-info form-horizontal" >
		<dl class="dl-horizontal">
			<dt>整体进度</dt>
			<dd>{{pragress}}</dd>
			<dt>正在处理数据表</dt>
			<dd>{{schema}}</dd>
		</dl>
		<dl class="dl-horizontal" ng-show="fails.length > 0">
			<dt>处理失败的数据表</dt>
			<dd>
				<p class="text-danger" ng-repeat="schema in fails" style="margin:0;">{{schema}}</p>
			</dd>
		</dl>
	</div>
	<script type="text/javascript">
		angular.module('cloudApp').value('config', {
			schemas : <?php echo $schemas ? json_encode($schemas) : '[]'?>,
			is_module_install : <?php echo !empty($packet['install']) ? 'true' : 'false'?>,
		});
		angular.bootstrap($('.js-processor'), ['cloudApp']);
	</script>
</div>
<?php  } ?>
<?php  if($step == 'scripts') { ?>
<div class="clearfix js-processor" ng-cloak  ng-controller="processor">
	<?php  if(empty($packet['scripts']) || !empty($packet['type'])) { ?>
		<!-- 如果是更新模块,跳转到system/module/upgrade -->
		<?php  if($is_upgrade == 1) { ?>
			<?php  if($packet['type'] == 'theme') { ?>
			<script>
				location.href = '<?php  echo url("system/template/upgrade", array("templateid" => $m, "flag" => 1));?>';
			</script>
			<?php  } else if($packet['type'] == 'webtheme') { ?>
			<script>
				location.href = '<?php  echo url("system/webtheme/upgrade", array("webthemeid" => $m, "flag" => 1));?>';
			</script>
			<?php  } else { ?>
			<script>
				location.href = '<?php  echo url("module/manage-system/upgrade", array("module_name" => $m, "flag" => 1, "support" => $_GPC["support"], "has_new_support" => $has_new_support));?>';
			</script>
			<?php  } ?>
			
		<?php  } ?>
		<script>
			var is_confirm = "<?php  echo $_GPC['is_confirm']?>";
			if(is_confirm == 1) {
				if(confirm('已经成功执行升级操作! '+"\n"+' 由于数据库更新, 可能会产生多余的字段. 你可以按照需要删除')) {
					location.href = '<?php  echo url("cloud/upgrade");?>';
				} else {
					location.href = '<?php  echo url("cloud/upgrade");?>';
				}
			} else {
				require(['util'], function(u){
					u.message('已经成功执行升级操作! '+"\n"+' 由于数据库更新, 可能会产生多余的字段. 你可以按照需要删除.', '<?php  echo url("cloud/upgrade");?>');
				});
			}
		</script>
	<?php  } ?>
	<div class="upgrade-pragress we7-margin-bottom">
		<div class="wrapper top">
			<div class="circleProgress topcircle" ng-style="{transform: 'rotate('+ topPragress +'deg)'}"></div>
		</div>
		<div class="wrapper bottom">
			<div class="circleProgress bottomcircle" ng-style="{transform: 'rotate('+ bottomPragress +'deg)'}"></div>
		</div>
		<div class="circle">
			<img src="./resource/images/upgrade.png" alt="">
			<div class="pragress">
				{{pragressPer}}%
			</div>
		</div>
	</div>
	<div class="alert alert-warning we7-page-alert">
		正在数据迁移及清理操作, 请不要关闭窗口.
	</div>
	<div class="alert alert-info form-horizontal " >
		<dl class="dl-horizontal">
			<dt>整体进度</dt>
			<dd>{{pragress}}</dd>
			<dt>正在处理</dt>
			<dd>{{script}}<br />{{message}}</dd>
		</dl>
		<dl class="dl-horizontal" ng-show="fails.length > 0">
			<dt>处理失败的操作</dt>
			<dd>
				<p class="text-danger" ng-repeat="script in fails" style="margin:0;">{{script}}</p>
			</dd>
		</dl>
	</div>
	<script>
		angular.bootstrap($('.js-processor'), ['cloudApp']);
	</script>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>