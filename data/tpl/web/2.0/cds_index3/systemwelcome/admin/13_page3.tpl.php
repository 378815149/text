<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="we7-page-tab">
	<li <?php  if($op=='list') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('page3',array('op'=>'list'))?>">列表</a></li>
	<li <?php  if($op=='modify') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('page3',array('op'=>'modify'))?>">添加</a></li>
</ul>
<?php  if($op == 'list') { ?>
<table class="table we7-table table-hover vertical-middle table-manage">
	<tr>
		<th>图标</th>
		<th>图片</th>
		<th>标题</th>
		<th>跳转网址</th>
		<th width="80">排序</th>
		<th width="80">状态</th>
		<th class="text-right">操作</th>
	</tr>
	<?php  if(is_array($list)) { foreach($list as $l) { ?>
	<tr>
		<td><i class="fa <?php  echo $l['icon'];?> fa-3x"></i></td>
		<td><img src="<?php  echo $_W['attachurl'];?><?php  echo $l['img'];?>" width="100px"  class="img-rounded" /></td>
		<td><?php  echo $l['title'];?></td>
		<td><?php  echo $l['url'];?></td>
		<td><?php  echo $l['sort'];?></td>
		<td><?php echo $l['status']==1?'显示':'隐藏';?></td>
		<td>
			<div class="link-group">
			<a href="<?php  echo $this->createWebUrl('page3',array('id'=>$l['id'],'op'=>'modify'))?>" >修改</a>
			<a href="<?php  echo $this->createWebUrl('page3',array('id'=>$l['id'],'op'=>'del'))?>"  onclick="return confirm('确定要删除吗？')">删除</a>
			</div>
		</td>
	</tr>
	<?php  } } ?>
</table>
<?php  } ?>
<?php  if($op == 'modify') { ?>
<div class="clearfix">
	<form class="we7-form" method="post" action="" enctype="multipart/form-data" id="sham_form">
		<div class="form-group">
			<label for="img" class="col-xs-12 col-sm-3 col-md-2 control-label">图片</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('img',$tpl_data['img']);?>
			</div>
			<span>建议300*250</span>
		</div>
		<div class="form-group">
			<label for="icon" class="col-xs-12 col-sm-2 col-md-2 control-label">图标</label>
			<div class="col-sm-5 col-xs-5">
				<input type="text" class="form-control" id="icon" name="icon" placeholder="例子：fa-lightbulb-o" value="<?php  echo $tpl_data['icon'];?>">
			</div>
			<div class="col-sm-5 col-xs-5">图标获取地址：<a href="http://www.fontawesome.com.cn/">http://www.fontawesome.com.cn/</a></div>
		</div>
		<div class="form-group">
			<label for="title" class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="title" name="title" placeholder="请输入标题" value="<?php  echo $tpl_data['title'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="content" class="col-xs-12 col-sm-3 col-md-2 control-label">介绍</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="content" name="content" placeholder="请输入介绍" value="<?php  echo $tpl_data['content'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="url" class="col-xs-12 col-sm-3 col-md-2 control-label">跳转地址</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="url" name="url" placeholder="请输入标题" value="<?php  echo $tpl_data['url'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="sort" class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" id="sort" name="sort" placeholder="请输入数字排序" value="<?php  echo $tpl_data['sort'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">状态</label>
			<div class="col-sm-8 form-control-static">
				<input type="radio" name="status" id="status1" <?php  if($tpl_data['status'] == 1 || !isset($tpl_data['status'])){echo 'checked';} ?> value="1">
				<label class="radio-inline" for="status1">显示</label>
				<input type="radio" name="status" id="status0" <?php  if(isset($tpl_data['status']) && $tpl_data['status']==0){echo 'checked';} ?> value="0">
				<label class="radio-inline" for="status0">隐藏</label>
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
<?php  } ?>
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

