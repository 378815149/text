<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="we7-page-tab">
	<li class="active">基本配置</li>
</ul>
<div class="clearfix">
	<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="sham_form">
		<div class="form-group">
			<label for="title" class="col-xs-12 col-sm-3 col-md-2 control-label">网页标题</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="title" name="title" placeholder="请输入默认网页标题" value="<?php  echo $tpl_data['title'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="keywords" class="col-xs-12 col-sm-3 col-md-2 control-label">seo关键字</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="keywords" name="keywords" placeholder="请输入seo关键字" value="<?php  echo $tpl_data['keywords'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-xs-12 col-sm-3 col-md-2 control-label">seo描述</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="description" name="description" placeholder="请输入seo描述" value="<?php  echo $tpl_data['description'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="logo" class="col-xs-12 col-sm-3 col-md-2 control-label">网站logo</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('logo',$tpl_data['logo']);?>
				<span class="help-block">图片建议大小285px*55px </span>
			</div>
		</div>
		<div class="form-group">
			<label for="logo" class="col-xs-12 col-sm-3 col-md-2 control-label">二维码</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('ewm',$tpl_data['ewm']);?>
			</div>
		</div>
		<div class="form-group">
			<label for="register_url" class="col-xs-12 col-sm-3 col-md-2 control-label">注册按钮</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="register_url" name="register_url" placeholder="请输入注册地址" value="<?php  echo $tpl_data['register_url'];?>">
				<span class="help-block">默认为主站注册地址</span>
			</div>
		</div>
		<div class="form-group">
			<label for="login_url" class="col-xs-12 col-sm-3 col-md-2 control-label">登录按钮</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="login_url" name="login_url" placeholder="请输入登录地址" value="<?php  echo $tpl_data['login_url'];?>">
				<span class="help-block">默认为主站登录地址</span>
			</div>
		</div>
		<div class="form-group">
			<label for="mobile" class="col-xs-12 col-sm-3 col-md-2 control-label">电话号码</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="mobile" name="mobile" placeholder="请输入电话号码" value="<?php  echo $tpl_data['mobile'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="fax" class="col-xs-12 col-sm-3 col-md-2 control-label">传真号码</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="fax" name="fax" placeholder="请输入电话号码" value="<?php  echo $tpl_data['fax'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-xs-12 col-sm-3 col-md-2 control-label">邮件</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="email" name="email" placeholder="请输入邮件" value="<?php  echo $tpl_data['email'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-xs-12 col-sm-3 col-md-2 control-label">公司地址</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="address" name="address" placeholder="请输入公司地址" value="<?php  echo $tpl_data['address'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="contact" class="col-xs-12 col-sm-3 col-md-2 control-label">关于我们</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="contact" name="contact" placeholder="请输入关于我们" value="<?php  echo $tpl_data['contact'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="copyright" class="col-xs-12 col-sm-3 col-md-2 control-label">版权icp</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="copyright" name="copyright" placeholder="请输入版权icp" value="<?php  echo $tpl_data['copyright'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
				<input type="hidden" name="submit" value="1"/>
				<button type="submit" class="btn btn-primary" id="sub_sham">保存</button>
			</div>
		</div>
	</form>
</div>
<script>

	$(function(){

		$('#sham_form').submit(function(){
			/*
			if(!$.trim($(':textarea[name="release_agreement"]').val())) {
				util.message('发布协议不能为空', '', 'error');
				return false;
			}*/
		});
	});

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

