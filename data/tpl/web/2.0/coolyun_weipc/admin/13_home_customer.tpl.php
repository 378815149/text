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
                                <strong>首页客户</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="col-lg-10">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo1</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo1', $setting['logo1'], '', array('global' => true));?>
										</div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo2</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo2', $setting['logo2'], '', array('global' => true));?>
										</div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo3</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo3', $setting['logo3'], '', array('global' => true));?>
										</div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo4</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo4', $setting['logo4'], '', array('global' => true));?>
										</div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo5</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo5', $setting['logo5'], '', array('global' => true));?>
										</div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo6</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo6', $setting['logo6'], '', array('global' => true));?>
										</div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo7</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo7', $setting['logo7'], '', array('global' => true));?>
										</div>
                                    </div>		
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo8</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo8', $setting['logo8'], '', array('global' => true));?>
										</div>
                                    </div>	
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo9</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo9', $setting['logo9'], '', array('global' => true));?>
										</div>
                                    </div>				
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">logo10</label></div>
										<div class="col-12 col-md-6">
										<?php  echo tpl_form_field_image('logo10', $setting['logo10'], '', array('global' => true));?>
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