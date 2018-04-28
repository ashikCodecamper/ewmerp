<?php echo $__env->make('_inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('_inc.stylesheet', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('_inc.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('_inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $__env->yieldContent('module-name'); ?>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $__env->yieldContent('content'); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
      <b>Version</b> 1.0 Beta
    </div>Copyright &copy; 2017 <a href="https://www.softbd.com">Soft Tech Innovation Ltd</a>. All Rights Reserved.
  </footer>



  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->



	<?php echo $__env->make('_inc.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</body>


</html>
