<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template("admin/header", TEMPLATE_INCLUDEPATH)) : (include template("admin/header", TEMPLATE_INCLUDEPATH));?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>控制面板</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title" style="display:none;">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
               
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>联系我们</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="col-lg-10">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label">头部标题</label></div>
										<div class="col-12 col-md-6"><input type="text" name="title" value="<?php  echo $setting['title'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class="form-control-label">头部banner</label></div>
										
										<div class="col-12 col-md-9">
										<?php  echo tpl_form_field_image('banner', $setting['banner'], '', array('global' => true));?>
										</div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">是否开启留言</label></div>
										<div class="col-12 col-md-6">
										    <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label ">
                                                    <input type="radio" id="inline-radio1" name="message" value="1" class="form-check-input"<?php  if($setting['message']==1) { ?>checked<?php  } ?>>开启
                                                </label>
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio" id="inline-radio2" name="message" value="0" class="form-check-input" <?php  if($setting['message']==0) { ?>checked<?php  } ?>>关闭
                                                </label>
                                            </div>
									    </div>
                                    </div>
								<div class="row form-group">
								<div class="col-6">
								<button type="submit" class="btn btn-success btn-sm">提交</button>
								</div>
								</div>									
								</div>

                                </form>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>

                    </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template("admin/footer", TEMPLATE_INCLUDEPATH)) : (include template("admin/footer", TEMPLATE_INCLUDEPATH));?>