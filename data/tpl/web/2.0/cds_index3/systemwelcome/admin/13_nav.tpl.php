<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="clearfix">
	<form class="we7-form" method="post" action="" enctype="multipart/form-data" id="sham_form">

		<div class="form-group">
			<label for="title1" class=" col-sm-2 col-md-2 control-label">导航一标题</label>
			<div class="col-sm-8 col-xs-8">
				<input type="text" class="form-control" id="title1" name="title1" placeholder="请输入导航一标题" value="<?php  echo $tpl_data['title1'];?>">
			</div>
			<div class="col-sm-2 col-xs-2 form-control-static">
				
				<input type="checkbox" name="is_show1" id="is_show1" <?php  if(isset($tpl_data['is_show1']) && $tpl_data['is_show1']==1){echo 'checked';} ?> value="1">
				<label class="radio-inline" for="is_show1">显示</label>
			</div>
		</div>
		<div class="form-group">
			<label for="title2" class=" col-sm-2 col-md-2 control-label">导航二标题</label>
			<div class="col-sm-8 col-xs-8">
				<input type="text" class="form-control" id="title2" name="title2" placeholder="请输入导航二标题" value="<?php  echo $tpl_data['title2'];?>">
			</div>
			<div class="col-sm-2 col-xs-2 form-control-static">
				
				<input type="checkbox" name="is_show2" id="is_show2" <?php  if(isset($tpl_data['is_show2']) && $tpl_data['is_show2']==1){echo 'checked';} ?> value="1">
				<label class="radio-inline" for="is_show2">显示</label>
			</div>
		</div>
		<div class="form-group">
			<label for="title3" class=" col-sm-2 col-md-2 control-label">导航三标题</label>
			<div class="col-sm-8 col-xs-8">
				<input type="text" class="form-control" id="title3" name="title3" placeholder="请输入导航三标题" value="<?php  echo $tpl_data['title3'];?>">
			</div>
			<div class="col-sm-2 col-xs-2 form-control-static">
				
				<input type="checkbox" name="is_show3" id="is_show3" <?php  if(isset($tpl_data['is_show3']) && $tpl_data['is_show3']==1){echo 'checked';} ?> value="1">
				<label class="radio-inline" for="is_show3">显示</label>
			</div>
		</div>
		<div class="form-group">
			<label for="title4" class=" col-sm-2 col-md-2 control-label">导航四标题</label>
			<div class="col-sm-8 col-xs-8">
				<input type="text" class="form-control" id="title4" name="title4" placeholder="请输入导航四标题" value="<?php  echo $tpl_data['title4'];?>">
			</div>
			<div class="col-sm-2 col-xs-2 form-control-static">
				
				<input type="checkbox" name="is_show4" id="is_show4" <?php  if(isset($tpl_data['is_show4']) && $tpl_data['is_show4']==1){echo 'checked';} ?> value="1">
				<label class="radio-inline" for="is_show4">显示</label>
			</div>
		</div>
		<div class="form-group">
			<label for="title5" class=" col-sm-2 col-md-2 control-label">导航五标题</label>
			<div class="col-sm-8 col-xs-8">
				<input type="text" class="form-control" id="title5" name="title5" placeholder="请输入导航五标题" value="<?php  echo $tpl_data['title5'];?>">
			</div>
			<div class="col-sm-2 col-xs-2 form-control-static">
				
				<input type="checkbox" name="is_show5" id="is_show5" <?php  if(isset($tpl_data['is_show5']) && $tpl_data['is_show5']==1){echo 'checked';} ?> value="1">
				<label class="radio-inline" for="is_show5">显示</label>
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



</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

