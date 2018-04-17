


	<!-- popper -->
	<script src="<?php echo e(asset("assets/vendor_components/popper/dist/popper.min.js")); ?>"></script>
	<script src="<?php echo e(asset("js/parsley.min.js")); ?>"></script>
	<!-- Bootstrap 4.0 -->
	<script src="<?php echo e(asset("assets/vendor_components/bootstrap/dist/js/bootstrap.js")); ?>"></script>

	<!-- FastClick -->
	<script src="<?php echo e(asset("assets/vendor_components/fastclick/lib/fastclick.js")); ?>"></script>

	<!-- Sparkline -->
	<script src="<?php echo e(asset("assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js")); ?>"></script>

	<!-- jvectormap  -->
	<script src="<?php echo e(asset("assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")); ?>"></script>
	<script src="<?php echo e(asset("assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js")); ?>"></script>

	<!-- SlimScroll -->
	<script src="<?php echo e(asset("assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js")); ?>"></script>

	<!-- ChartJS -->
	<script src="<?php echo e(asset("assets/vendor_components/chart-js/chart.js")); ?>"></script>

	<!-- mpt_admin App -->
	<script src="<?php echo e(asset("js/template.js")); ?>"></script>


	<!-- EWM_admin dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo e(asset("js/pages/dashboard2.js")); ?>"></script>

	<!-- mpt_admin for demo purposes -->
	<script src="<?php echo e(asset("js/demo.js")); ?>"></script>
	<script src="<?php echo e(asset("js/pages/toastr.js")); ?>"></script>
	<script src="<?php echo e(asset("assets/vendor_components/sweetalert/sweetalert.min.js")); ?>"></script>

    <?php echo $__env->yieldContent('javascript'); ?>
	<script>
		<?php if(Session::has('success')): ?>
			toastr.success("<?php echo e(Session::get('success')); ?>")
		<?php endif; ?>
	</script>
