<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="we7-page-tab">
	<li class="active">第一页配置</li>
</ul>
<div class="clearfix">
	<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="sham_form">
		
		<div class="form-group">
			<label for="icon1" class="col-xs-12 col-sm-2 col-md-2 control-label">上一图标</label>
			<div class="col-sm-5 col-xs-5">
				<input type="text" class="form-control" id="icon1" name="icon1" placeholder="例子：fa-lightbulb-o" value="<?php  echo $tpl_data['icon1'];?>">
			</div>
			<div class="col-sm-5 col-xs-5">图标获取地址：<a href="http://www.fontawesome.com.cn/">http://www.fontawesome.com.cn/</a></div>
		</div>
		<div class="form-group">
			<label for="title1" class="col-xs-12 col-sm-3 col-md-2 control-label">上一标题</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="title1" name="title1" placeholder="请输入上一标题" value="<?php  echo $tpl_data['title1'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="content1" class="col-xs-12 col-sm-3 col-md-2 control-label">上一内容</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="content1" name="content1" placeholder="请输入上一内容" value="<?php  echo $tpl_data['content1'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="icon2" class="col-xs-12 col-sm-2 col-md-2 control-label">上二图标</label>
			<div class="col-sm-5 col-xs-5">
				<input type="text" class="form-control" id="icon2" name="icon2" placeholder="例子：fa-lightbulb-o" value="<?php  echo $tpl_data['icon2'];?>">
			</div>
			<div class="col-sm-5 col-xs-5">图标获取地址：<a href="http://www.fontawesome.com.cn/">http://www.fontawesome.com.cn/</a></div>
		</div>
		<div class="form-group">
			<label for="title2" class="col-xs-12 col-sm-3 col-md-2 control-label">上二标题</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="title2" name="title2" placeholder="请输入上二标题" value="<?php  echo $tpl_data['title2'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="content2" class="col-xs-12 col-sm-2 col-md-2 control-label">上二内容</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="content2" name="content2" placeholder="请输入上二内容" value="<?php  echo $tpl_data['content2'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="icon3" class="col-xs-12 col-sm-3 col-md-2 control-label">上三图标</label>
			<div class="col-sm-5 col-xs-5">
				<input type="text" class="form-control" id="icon3" name="icon3" placeholder="例子：fa-lightbulb-o" value="<?php  echo $tpl_data['icon3'];?>">
			</div>
			<div class="col-sm-5 col-xs-5">图标获取地址：<a href="http://www.fontawesome.com.cn/">http://www.fontawesome.com.cn/</a></div>
		</div>
		<div class="form-group">
			<label for="title3" class="col-xs-12 col-sm-3 col-md-2 control-label">上三标题</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="title3" name="title3" placeholder="请输入上三标题" value="<?php  echo $tpl_data['title3'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="content3" class="col-xs-12 col-sm-3 col-md-2 control-label">上三内容</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="content3" name="content3" placeholder="请输入上三内容" value="<?php  echo $tpl_data['content3'];?>">
			</div>
		</div>

		<div class="form-group">
			<label for="num_icon1" class="col-sm-2 col-md-2 control-label">下一</label>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num_icon1" name="num_icon1" placeholder="请输入下一图标" value="<?php  echo $tpl_data['num_icon1'];?>">
			</div>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num1" name="num1" placeholder="请输入下一数字" value="<?php  echo $tpl_data['num1'];?>">
			</div>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num_text1" name="num_text1" placeholder="请输入下一文字" value="<?php  echo $tpl_data['num_text1'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="num_icon2" class="col-sm-2 col-md-2 control-label">下二</label>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num_icon2" name="num_icon2" placeholder="请输入下二图标" value="<?php  echo $tpl_data['num_icon2'];?>">
			</div>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num2" name="num2" placeholder="请输入下二数字" value="<?php  echo $tpl_data['num2'];?>">
			</div>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num_text2" name="num_text2" placeholder="请输入下二文字" value="<?php  echo $tpl_data['num_text2'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="num_icon3" class="col-sm-2 col-md-2 control-label">下三</label>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num_icon3" name="num_icon3" placeholder="请输入下三图标" value="<?php  echo $tpl_data['num_icon3'];?>">
			</div>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num3" name="num3" placeholder="请输入下三数字" value="<?php  echo $tpl_data['num3'];?>">
			</div>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num_text3" name="num_text3" placeholder="请输入下三文字" value="<?php  echo $tpl_data['num_text3'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="num_icon4" class="col-sm-2 col-md-2 control-label">下四</label>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num_icon4" name="num_icon4" placeholder="请输入下四图标" value="<?php  echo $tpl_data['num_icon4'];?>">
			</div>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num4" name="num4" placeholder="请输入下四数字" value="<?php  echo $tpl_data['num4'];?>">
			</div>
			<div class="col-sm-3 col-md-3">
				<input type="text" class="form-control" id="num_text4" name="num_text4" placeholder="请输入下四文字" value="<?php  echo $tpl_data['num_text4'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="hidden" name="op" value="modify"/>
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

