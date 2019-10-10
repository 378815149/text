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
                                <strong class="card-title">留言列表</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">ID</th>
                                            <th>姓名</th>
                                            <th>电话</th>
											<th>时间</th>
                                            <th>管理</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php  if(is_array($messages)) { foreach($messages as $message) { ?>
                                        <tr>
                                            <td class="serial"><?php  echo $message['id'];?>.</td>
                                            <td>  <span class="name"><?php  echo $message['name'];?></span> </td>
                                            <td>  <span class="name"><?php  echo $message['phonenumber'];?></span> </td>
											<td>  <span class="name"><?php  echo date("Y-m-d h:i:s",$message['updatetime'])?></span> </td>
                                            <td>
                                                <a class="btn btn-success btn-sm" style="color:#ffffff" href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=about.messagedetail&id=<?php  echo $message['id'];?>"><i class="fa fa-list-alt"></i>&nbsp; 查看</a>
												<a class="btn btn-danger btn-sm" style="color:#ffffff" href="/web/index.php?c=site&a=entry&eid=<?php  echo $this->getEid();?>&p=about.messagedel&id=<?php  echo $message['id'];?>"><i class="fa fa-trash-o"></i>&nbsp; 删除</a>
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