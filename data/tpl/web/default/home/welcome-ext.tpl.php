<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div></div>
<script>
    $(function () {
        $('.loader').show();
        $.ajax({
            type: 'POST',
            url: "<?php  echo url('module/welcome/get_module_info', array('m' => $modulename, 'uniacid' => $redirect_uniacid))?>",
            dataType: 'json',
            success: function (data) {
                var redirect_url = '';
                if (data.message && data.message.errno == 0 && data.message.message.module_info.welcome_display) {
                    redirect_url = "<?php  echo url('module/welcome/welcome_display', array('m' => $modulename, 'uniacid' => $redirect_uniacid, 'version_id' => intval($_GPC['version_id'])))?>";
                } else {
                    redirect_url = "<?php  echo url('module/welcome/display', array('m' => $modulename, 'uniacid' => $redirect_uniacid, 'version_id' => intval($_GPC['version_id'])))?>";
                }
                location.href = redirect_url;
            },
            error: function () {
                location.href = "<?php  echo url('module/welcome/display', array('m' => $modulename, 'uniacid' => $redirect_uniacid, 'version_id' => intval($_GPC['version_id'])))?>";
            },
        })
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
