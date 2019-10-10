<?php defined('IN_IA') or exit('Access Denied');?>
    <div class="clearfix"></div>

    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    		<?php  if(empty($_W['setting']['copyright']['footerright'])) { ?>
			<a href="http://www.w7.cc">微信开发</a>
			<a href="http://s.w7.cc">微信应用</a>
			<a href="http://bbs.w7.cc">微擎论坛</a>
			<a href="http://s.w7.cc">小程序开发</a>
		<?php  } else { ?>
			<?php  echo $_W['setting']['copyright']['footerright'];?>
		<?php  } ?>
                </div>
                <div class="col-sm-6 text-right"> <?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="http://www.w7.cc"><b>微擎</b></a> v<?php echo IMS_VERSION;?> &copy; 2014-2018 <a href="http://www.w7.cc">www.w7.cc</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?>
                </div>
            </div>
        </div>
    </footer>

</div><!-- /#right-panel -->

<!-- Right Panel -->



	<?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>
	<?php  if(!empty($_GPC['m']) && !in_array($_GPC['m'], array('keyword', 'special', 'welcome', 'default', 'userapi')) || defined('IN_MODULE')) { ?>
	<script>
		if(typeof $.fn.tooltip != 'function' || typeof $.fn.tab != 'function' || typeof $.fn.modal != 'function' || typeof $.fn.dropdown != 'function') {
			require(['bootstrap']);
		}
		$('[data-toggle="tooltip"]').tooltip()
	</script>
	<?php  } ?>
	<?php  if(!defined('IN_MODULE')) { ?>
	<script>
		$(document).ready(function() {
			if($('select').niceSelect) {
				$('select').niceSelect();
			}
		});
	</script>
	<?php  } ?>
</body>
</html>