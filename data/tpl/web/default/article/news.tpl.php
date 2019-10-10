<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('article/common', TEMPLATE_INCLUDEPATH)) : (include template('article/common', TEMPLATE_INCLUDEPATH));?>
<?php  if($do == 'list') { ?>
<div class="clearfix">
	<div class="search-box we7-margin-bottom ">
		<select name="" id="" class="we7-margin-right">
			<option data-url="<?php  echo filter_url('cateid:0');?>" <?php  if($_GPC['cateid'] == 0) { ?>selected<?php  } ?>>新闻分类</option>
			<?php  if(is_array($categorys)) { foreach($categorys as $category) { ?>
			<option data-url="<?php  echo filter_url('cateid:' . $category['id']);?>" <?php  if($_GPC['cateid'] == $category['id']) { ?>selected<?php  } ?>><?php  echo $category['title'];?></option>
			<?php  } } ?>
		</select>
		<select name="" id="" class="we7-margin-right">
			<option data-url="<?php  echo filter_url('createtime:0');?>" <?php  if($_GPC['createtime'] == 0) { ?>selected<?php  } ?>>时间</option>
			<option data-url="<?php  echo filter_url('createtime:3');?>" <?php  if($_GPC['createtime'] == 3) { ?>selected<?php  } ?>>三天内</option>
			<option data-url="<?php  echo filter_url('createtime:7');?>" <?php  if($_GPC['createtime'] == 7) { ?>selected<?php  } ?>>一周内</option>
			<option data-url="<?php  echo filter_url('createtime:30');?>" <?php  if($_GPC['createtime'] == 30) { ?>selected<?php  } ?>>一月内</option>
			<option data-url="<?php  echo filter_url('createtime:90');?>" <?php  if($_GPC['createtime'] == 90) { ?>selected<?php  } ?>>三月内</option>
		</select>
		<form action="" method="get" class="search-form " role="form">
			<input type="hidden" name="c" value="article">
			<input type="hidden" name="a" value="news">
			<input type="hidden" name="do" value="list">
			<input type="hidden" name="cateid" value="<?php  echo $_GPC['cateid'];?>">
			<input type="hidden" name="createtime" value="<?php  echo $_GPC['createtime'];?>">
			
			<div class=" ">
				<div class="input-group">
					<input class="form-control" name="title" id="" placeholder="标题" type="text" value="<?php  echo $_GPC['title'];?>">
					<div class="input-group-btn">
						<button class="btn btn-default"><i class="fa fa-search"></i> </button>
					</div>
				</div>
			</div>
		</form>
		<a href="javascript:;" data-toggle="modal" data-target="#displaysetting" class="btn btn-primary we7-margin-right">排序设置</a>
		<a href="<?php  echo url('article/news/post');?>" class="btn btn-primary">添加新闻</a>
	</div>
	
	<table class="table we7-table table-hover">
		<col width="80px"/>
		<col width="90px"/>
		<col width="150px"/>
		<col width="100px"/>
		<col width="90px"/>
		<col width="80px"/>
		<col width="140px"/>
		<col width="120px"/>
		<tr>
			<th>排序</th>
			<th>阅读次数</th>
			<th>标题</th>
			<th>所属分类</th>
			<th>在首页显示</th>
			<th>是否显示</th>
			<th>添加时间</th>
			<th class="text-right">操作</th>
		</tr>
		<?php  if(is_array($news)) { foreach($news as $new) { ?>
		<tr>
			<td>
				<span><?php  echo $new['displayorder'];?></span>
			</td>
			<td>
				<span><?php  echo $new['click'];?></span>
			</td>
			<td>
				<span><?php  echo $new['title'];?></span>
			</td>
			<td><?php  echo $categorys[$new['cateid']]['title'];?></td>
			<td>
				<?php  if($new['is_show_home'] == 1) { ?>
				<span class="label label-success">是</span>
				<?php  } else { ?>
				<span class="label label-danger">否</span>
				<?php  } ?>
			</td>
			<td>
				<?php  if($new['is_display'] == 1) { ?>
					<span class="label label-success">显示中</span>
				<?php  } else { ?>
					<span class="label label-danger">已隐藏</span>
				<?php  } ?>
			</td>
			<td class=""><?php  echo date('Y-m-d H:i', $new['createtime']);?></td>
			<td>
				<div class="link-group">
					<a href="<?php  echo url('article/news-show/detail', array('id' => $new['id']));?>" target="_blank">预览</a>
					<a href="<?php  echo url('article/news/post', array('id' => $new['id']));?>">编辑</a>
					<a href="javascript:void(0);" class="del" data-id="<?php  echo $new['id']?>" onclick="deleteArticle('<?php  echo $new["id"]?>')">删除</a>
				</div>
			</td>
		</tr>
		<?php  } } ?>
		<?php  if(!$news) { ?>
		<tr>
			<td colspan="100">
				<div class="we7-empty-block">暂无新闻</div>
			</td>
		</tr>
		<?php  } ?>
	</table>
	<div class="modal fade" id="displaysetting" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="we7-modal-dialog modal-dialog we7-form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改新闻排序设置</div>
				</div>
				<form action="" method="get">
					<input type="hidden" name="c" value="article">
					<input type="hidden" name="a" value="news">
					<input type="hidden" name="do" value="displaysetting">
					<div class="modal-body">
						<div class="form-group">
							<select name="setting" class="we7-select">
								<option value="order">按排序数字大小倒序</option>
								<option value="createtime">按添加时间倒序</option>
							</select>
							<span class="help-block"></span>
						</div>
					</div>
					<div class="modal-footer">
						<button name="submit" class="btn btn-primary" value="submit">确定</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="text-right">
		<?php  echo $pager;?>
	</div>
</div>
<?php  } else if($do == 'post') { ?>
<div class="clearfix">
	<form action="<?php  echo url('article/news/post');?>" method="post" class="we7-form" role="form" id="form1">
		<input type="hidden" name="id" value="<?php  echo $new['id'];?>"/>
		
				<div class="form-group">
					<label class="col-sm-2 control-label">新闻标题</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="title" value="<?php  echo $new['title'];?>" placeholder="新闻标题"/>
						<div class="help-block">请填写新闻标题</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">新闻分类</label>
					<div class="col-sm-8">
						<select name="cateid" id="cateid" class="form-control">
							<option value="">==请选择新闻分类==</option>
							<?php  if(is_array($categorys)) { foreach($categorys as $category) { ?>
							<option value="<?php  echo $category['id'];?>" <?php  if($new['cateid'] == $category['id']) { ?>selected<?php  } ?>><?php  echo $category['title'];?></option>
							<?php  } } ?>
						</select>
						<div class="help-block">还没有分类，点我 <a href="<?php  echo url('article/news/category_post');?>" target="_blank"><i class="fa fa-plus-circle"></i> 添加分类</a></div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">缩略图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('thumb', $new['thumb'], '', array('dest_dir' => 'articles'));?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-8">
						<div class="help-block"><input type="checkbox" id="autolitpic" name="autolitpic" value="1"<?php  if(empty($item['thumb'])) { ?> checked="true"<?php  } ?>><><label for="autolitpic">提取内容的第一个图片为缩略图</label></div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">内容</label>
					<div class="col-sm-8">
						<?php  echo tpl_ueditor('content', $new['content']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">新闻来源</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="source" value="<?php  echo $new['source'];?>" placeholder="新闻来源"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">新闻作者</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="author" value="<?php  echo $new['author'];?>" placeholder="新闻作者"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">阅读次数</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="click" value="<?php  echo $new['click'];?>" placeholder="阅读次数"/>
						<div class="help-block">默认为0。您可以设置一个初始值,阅读次数会在该初始值上增加。</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">排序</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="displayorder" value="<?php  echo $new['displayorder'];?>" placeholder="阅读次数"/>
						<div class="help-block">数字越大，越靠前。</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">是否显示</label>
					<div class="col-sm-8">
						<input id="is_display-1" type="radio" name="is_display" value="1" <?php  if($new['is_display'] == 1) { ?> checked<?php  } ?>> <label for="is_display-1">显示</label>
						<input id="is_display-2" type="radio" name="is_display" value="0" <?php  if($new['is_display'] == 0) { ?> checked<?php  } ?>> <label for="is_display-2">不显示</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">显示在首页</label>
					<div class="col-sm-8">
						<input type="radio" id="is_show_home-1" name="is_show_home" value="1" <?php  if($new['is_show_home'] == 1) { ?> checked<?php  } ?>><label class="radio-inline" for="is_show_home-1"> 是</label>
						<input type="radio" id="is_show_home-2" name="is_show_home" value="0" <?php  if($new['is_show_home'] == 0) { ?> checked<?php  } ?>><label class="radio-inline" for="is_show_home-1"> 否</label>
					</div>
				</div>
			
		
		<div class="form-group">
			<div class="">
				<input type="submit" class="btn btn-primary" name="submit" value="提交" />
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</div>
	</form>
</div>
<?php  } ?>
<script>

	function deleteArticle(id) {
		var url = "<?php  echo url('article/news/del', array('id' => $new['id']));?>";
		url += "&id=" + id;
		util.confirm(function () {
			window.location.href = url;
		}, function () {

		}, '确认删除吗?');
	}

	$(function(){
		$('#form1').submit(function(){
			if(!$.trim($(':text[name="title"]').val())) {
				util.message('请填写新闻标题', '', 'error');
				return false;
			}
			if(!$.trim($('#cateid').val())) {
				util.message('请选择新闻分类', '', 'error');
				return false;
			}
			if(!$.trim($('textarea[name="content"]').val())) {
				util.message('请填写新闻内容', '', 'error');
				return false;
			}
			return true;
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
