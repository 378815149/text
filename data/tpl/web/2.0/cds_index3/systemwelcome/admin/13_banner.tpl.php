<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="we7-page-tab">
	<li class="active"><a href="<?php  echo $this->createWebUrl('banner',array('op'=>'list'))?>">轮播图列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('banner',array('op'=>'modify'))?>">添加轮播图</a></li>
</ul>
<table class="table we7-table table-hover vertical-middle table-manage">
	<tr>
		<th>图片</th>
		<th>标题一</th>
		<th>标题二</th>
		<th width="80">排序</th>
		<th width="80">状态</th>
		<th class="text-right">操作</th>
	</tr>
	<?php  if(is_array($list)) { foreach($list as $l) { ?>
	<tr>
		<td><img src="<?php  echo $_W['attachurl'];?><?php  echo $l['img'];?>" width="100px"  class="img-rounded" /></td>
		<td><?php  echo $l['title1'];?></td>
		<td><?php  echo $l['title2'];?></td>
		<td><?php  echo $l['sort'];?></td>
		<td><?php echo $l['status']==1?'显示':'隐藏';?></td>
		<td>
			<div class="link-group">
			<a href="<?php  echo $this->createWebUrl('banner',array('banner_id'=>$l['id'],'op'=>'modify'))?>" >修改</a>
			<a href="<?php  echo $this->createWebUrl('banner',array('banner_id'=>$l['id'],'op'=>'del'))?>"  onclick="return confirm('确定要删除吗？')">删除</a>
			</div>
		</td>
	</tr>
	<?php  } } ?>
</table>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>