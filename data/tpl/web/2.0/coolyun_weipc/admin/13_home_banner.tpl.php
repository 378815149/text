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
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <a style="color: #03a9f3;" href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=home.bannerpost"><i class="fa fa-plus"></i>&nbsp; 添加banner</a>
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
                                <strong class="card-title">首页Banner</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">ID</th>
                                            <th>图片</th>
                                            <th>标题</th>
                                            <th>管理</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php  if(is_array($banners)) { foreach($banners as $banner) { ?>
                                        <tr>
                                            <td class="serial"><?php  echo $banner['id'];?>.</td>
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="<?php  echo $_W['attachurl'];?><?php  echo $banner['image'];?>" alt=""></a>
                                                </div>
                                            </td>
                                            <td>  <span class="name"><?php  echo $banner['title'];?></span> </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" style="color:#ffffff" href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=home.bannerpost&id=<?php  echo $banner['id'];?>"><i class="fa fa-edit"></i>&nbsp; 编辑</a>
												<a class="btn btn-danger btn-sm" style="color:#ffffff" href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=home.bannerdel&id=<?php  echo $banner['id'];?>"><i class="fa fa-trash-o"></i>&nbsp; 删除</a>
                                            </td>
                                        </tr>
									<?php  } } ?>	
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
						<div style="text-align:center;">
						<?php  echo $pager;?>
						</div>
                    </div>
                  
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template("admin/footer", TEMPLATE_INCLUDEPATH)) : (include template("admin/footer", TEMPLATE_INCLUDEPATH));?>