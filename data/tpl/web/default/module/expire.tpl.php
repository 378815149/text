<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="alert we7-page-alert" >
    <p><i class="wi wi-info"></i>应用停用后，会导致用户前台无法正常访问，自定义提示，可仔细说明停用原因及解决办法。若不设置，则使用系统默认提示</p>
</div>
<div class="search-box we7-margin-bottom">
    <div class="search-form"></div>
    <a href="<?php  echo url('module/expire/save_expire')?>" class="btn btn-primary">添加提醒</a>
</div>
<div id="js-system-account-expired-message" ng-controller="SystemAccountExpiredMessageCtrl" ng-cloak>
    <!-- 列表数据 start -->
    <table class="table we7-table table-hover vertical-middle table-manage">
        <col width=""/>
        <col width=""/>
        <col width="100px"/>
        <tr>
            <th colspan="2">提示语</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        <tr>
            <td>系统提示</td>
            <td>
                {{system_module_expire}}
            </td>
            <td></td>
            <td class="form-file"></td>
        </tr>
        <tr ng-repeat="(index, item) in module_expire" >
            <td ng-bind="item.title"></td>
            <td>{{item.notice}}</td>
            <td>
                <label>
                    <div class="switch" ng-class="{switchOn: item.status == 1}"  ng-click="changeStatus(index)"></div>
                </label>
            </td>
            <td class="form-file">
                <div class="form-edit">
                    <a ng-href="{{links.editSettingUrl + '&id=' + index}}" class="color-default">编辑</a>
                    <a href="javascript:;" class="color-default" ng-click="deleteItem(index)">删除</a>
                </div>
            </td>
        </tr>
    </table>
    <!-- 列表数据 end -->
</div>
<script>
    angular.module('moduleApp').value('config', {
        module_expire: <?php echo !empty($module_expire) ? json_encode($module_expire) : 'null'?>,
        system_module_expire: "<?php  echo $system_module_expire;?>",
        links: {
            editSettingUrl: "<?php  echo url('module/expire/update_expire')?>",
            changeStatusUrl: "<?php  echo url('module/expire/change_status')?>",
            deleteSettingUrl: "<?php  echo url('module/expire/delete_expire')?>"
        }
    });
    angular.bootstrap($('#js-system-account-expired-message'), ['moduleApp']);
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>