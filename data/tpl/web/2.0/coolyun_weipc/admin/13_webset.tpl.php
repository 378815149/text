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
                                <strong>站点信息</strong> 
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="col-lg-10">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">站点名称</label></div>
										<div class="col-12 col-md-6"><input type="text" name="webname" value="<?php  echo $setting['webname'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">站点logo</label></div>
										<div class="col-12 col-md-9">
										<?php  echo tpl_form_field_image('logo', $setting['logo'], '', array('global' => true));?>
										</div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">公司名称</label></div>
										<div class="col-12 col-md-6"><input type="text" name="name" value="<?php  echo $setting['name'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">公司电话</label></div>
										<div class="col-12 col-md-6"><input type="text" name="phone" value="<?php  echo $setting['phone'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">客服QQ</label></div>
										<div class="col-12 col-md-6"><input type="text" name="qq" value="<?php  echo $setting['qq'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">客服邮箱</label></div>
										<div class="col-12 col-md-6"><input type="text" name="email" value="<?php  echo $setting['email'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">备案号</label></div>
										<div class="col-12 col-md-6"><input type="text" name="beian" value="<?php  echo $setting['beian'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">公司地址</label></div>
										<div class="col-12 col-md-9"><input type="text" name="address" value="<?php  echo $setting['address'];?>" class="form-control"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-6">
                                                <label for="cc-exp" class="control-label mb-1">地图坐标</label>
                                                <input type="text" class="form-control cc-exp" name="longitude" value="<?php  echo $setting['longitude'];?>" placeholder="经度">
												<small class="help-block form-text">请输入百度地图经纬度坐标</small>
												<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#largeModal">拾取坐标</button>
										</div>
                                        <div class="col-6">
										        <label for="cc-exp" class="control-label mb-1"></label>
                                                 <input type="text" class="form-control cc-cvc" name="latitude" value="<?php  echo $setting['latitude'];?>" placeholder="纬度" autocomplete="off">
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
			
			<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModalLabel">坐标拾取</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
<iframe src="http://api.map.baidu.com/lbsapi/getpoint/index.html" width="100%" height="500" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template("admin/footer", TEMPLATE_INCLUDEPATH)) : (include template("admin/footer", TEMPLATE_INCLUDEPATH));?>