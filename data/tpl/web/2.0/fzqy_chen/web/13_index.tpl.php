<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>


<link href="../addons/<?php  echo $this->modulename?>/template/public/ygcsslist.css" rel="stylesheet">
<style type="text/css">
    .navback{display: none;}
    .yg_back{margin-left: 170px;}
    .yg9_content{padding:0px;}
    .yg9_content>li>.col-md-12{
        height: 130px;
        box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        border-radius: 6px;
        overflow: hidden;
    }    

    .tmoney{font-size: 26px;margin-top: 30px;text-align: center;}
    .today{font-size: 14px;text-align: center;}
    .vipbanner{padding:0px;}
    .vipbox{
        background-color: white;
        box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        border-radius: 6px;
        overflow: hidden;
    }
    .vipbig1{padding-left: 0px;} 
    .vipbig2{padding-right: 0px;}
    .vipcontent{
        border-bottom: 1px solid #E4EAEC;
        height: 60px;
        line-height: 60px;
        padding:0px;
    }  
    .vipright{float: right;}
    .vipleft{float: left;}
    .vipleft>img{
        width: 20px;
        height: 20px;
    }
    .vipadd{
        height: 210px;
        text-align: center;
    }
    .vipadd>li{
        padding-top: 50px;
    }
    .font1{font-size: 30px;color: #333;}
    .font2{font-size: 15px;color: #666;margin-top: 15px;}
    .vipsell{padding:0px;}
    .vipsell>li:nth-child(1){padding-left: 0px;}
    .vipsell>li:nth-child(2){padding-right: 0px;}
    .vipsell{
        height: 210px;
        padding: 25px 0px;
    }
    .vipsell>li{height: 100%;}
    .vipsell>li>div{
        background-color: #F7F7F7;
        height: 100%;
        border-radius: 6px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .xuni{color: #666;text-align: center;}
    .xuni>span{color: #ff6363;}
    .viptitle{
        color: #333;
        border-bottom:1px solid #DEDEDE;
        padding-bottom: 15px;
        margin-bottom: 20px;
        text-align: center;
        width: 50%;
        font-size: 16px;
    }
    .botul{
        display: flex;
    }
    .botul>li{
        width: 13%;
        margin-right: 1.5%;
        height: 220px;
        background-color: white;
        padding: 50px 0px;
    }
    .botul>li:last-child{
        margin-right:0px;
        box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
    }
    .boxcon{
        width: 100%;
        height: 100%;
        text-align: center;
    }
    .boxcon>img{
        margin-bottom: 10px;
        width: 55px;
        height: 55px;
    }
    .bfont1{
        color: #666;
        font-size: 15px;
        margin-bottom: 5px;
    }
    .bfont2{
        color: #ED5D5D;
        font-size: 20px;
    }
    .backimg{
        width: 71px;
        height: 74px;
        margin-top: 30px;
    }
</style>

 <!--<div class="main" style="height: 270px;">-->
    <!--<div class="col-md-12 vipbanner">-->
        <!--<div class="col-md-6 vipbig1">-->
            <!--<div class="col-md-12 vipbox">-->
                <!--<div class="col-md-12 vipcontent">-->
                    <!--<div class="vipleft">-->
                        <!--<img src="../addons/<?php  echo $this->modulename?>/template/images/ygrz.png">-->
                        <!--<span>用户总览</span>-->
                    <!--</div>-->
                    <!--<div class="vipright">(单位：人)</div>-->
                <!--</div>-->
                <!--<ul class="col-md-12 vipadd">-->
                    <!--<li class="col-md-3">-->
                        <!--<p class="font1"><?php  echo $info['today_user'];?></p>-->
                        <!--<p class="font2">今日新增</p>-->
                    <!--</li>-->
                    <!--<li class="col-md-3">-->
                        <!--<p class="font1"><?php  echo $info['yesterday_user'];?></p>-->
                        <!--<p class="font2">昨日新增</p>-->
                    <!--</li>-->
                    <!--<li class="col-md-3">-->
                        <!--<p class="font1"><?php  echo $info['month_user'];?></p>-->
                        <!--<p class="font2">本月新增</p>-->
                    <!--</li>-->
                    <!--<li class="col-md-3">-->
                        <!--<p class="font1"><?php  echo $info['user'];?></p>-->
                        <!--<p class="font2">会员总数</p>-->
                    <!--</li>-->
                <!--</ul>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="col-md-6 vipbig2">-->
            <!--<div class="col-md-12 vipbox">-->
                <!--<div class="col-md-12 vipcontent">-->
                    <!--<div class="vipleft">-->
                        <!--<img src="../addons/<?php  echo $this->modulename?>/template/images/6.png">-->
                        <!--<span>数据总览</span>-->
                    <!--</div>-->
                    <!--&lt;!&ndash;<div class="vipright">(单位：辆)</div>&ndash;&gt;-->
                <!--</div>-->
                <!--<ul class="col-md-12 vipsell">-->
                    <!--<li class="col-md-6">-->
                        <!--<div>-->
                            <!--<div class="viptitle">套餐</div>-->
                            <!--<div class="col-md-12">-->
                                <!--<div class="col-md-6 xuni">套餐数量：<span><?php  echo $info['package'];?></span></div>-->
                                <!--<div class="col-md-6 xuni">已上架：<span><?php  echo $info['package_num'];?></span></div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="col-md-6">-->
                        <!--<div>-->
                            <!--<div class="viptitle">方案</div>-->
                            <!--<div class="col-md-12">-->
                                <!--<div class="col-md-6 xuni">方案数量：<span><?php  echo $info['cases'];?></span></div>-->
                                <!--<div class="col-md-6 xuni">已上架：<span><?php  echo $info['cases_num'];?></span></div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</li>-->
                <!--</ul>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>-->


<div class="main">
    <div class="panel panel-default">
        <div class="panel-heading">
            前台访问地址
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1" style="height: 50px;">
                        <td class="col-md-1">入口名称</td>
                        <td class="col-md-1">访问地址</td>
                    </tr>

                    <tr class="yg5_tr2" >
                        <td>首页入口</td>
                        <td><a style="color: #428bca;" href="<?php  echo $this->createMobileUrl('index',array('act'=>'index'));?>" target="_blank"><?php  echo $this->createMobileUrl('index',array('act'=>'index'));?></a></td>
                    </tr>
                    <tr class="yg5_tr2" >
                        <td>产品中心</td>
                        <td><a style="color: #428bca;" href="<?php  echo $this->createMobileUrl('index',array('act'=>'products'));?>" target="_blank"><?php  echo $this->createMobileUrl('index',array('act'=>'products'));?></a></td>
                    </tr>
                    <tr class="yg5_tr2" >
                        <td>关于我们</td>
                        <td><a style="color: #428bca;" href="<?php  echo $this->createMobileUrl('index',array('act'=>'about'));?>" target="_blank"><?php  echo $this->createMobileUrl('index',array('act'=>'about'));?></a></td>
                    </tr>
                    <tr class="yg5_tr2" >
                        <td>企业动态</td>
                        <td><a style="color: #428bca;" href="<?php  echo $this->createMobileUrl('index',array('act'=>'news'));?>" target="_blank"><?php  echo $this->createMobileUrl('index',array('act'=>'news'));?></a></td>
                    </tr>
                    <tr class="yg5_tr2" >
                        <td>联系我们</td>
                        <td><a style="color: #428bca;" href="<?php  echo $this->createMobileUrl('index',array('act'=>'contact'));?>" target="_blank"><?php  echo $this->createMobileUrl('index',array('act'=>'contact'));?></a></td>
                    </tr>



                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(function(){
        $("#yframe-index").addClass("wyactive");
    })
</script>