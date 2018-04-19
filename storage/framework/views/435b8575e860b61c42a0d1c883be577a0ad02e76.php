
<?php $__env->startSection('module-name','Development Critical Path'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
      <div class="col-sm-6">
          <h4>Dcp Section</h4>
          <ul>
              <li><a href="<?php echo e(route('dcpsteponeindex')); ?>">Proto Information Entry</a></li>
              <li><a href="<?php echo e(route('dcpsteptwolist')); ?>">Price Matrix</a></li>
              <li><a href="<?php echo e(route('approvedlist')); ?>">Price Matrix Approved List</a></li>
              <li><a href="<?php echo e(route('orderprocess.index')); ?>">Order Receive Process</a></li>
          </ul>
      </div>
        <div class="col-sm-6">
            <h4>DCP Settings</h4>
            <ul>
                <li><a href="<?php echo e(route('season.index')); ?>">Season</a></li>
                <li><a href="<?php echo e(route('supplier.index')); ?>">Supplier</a></li>
                <li><a href="<?php echo e(route('brand.index')); ?>">Brand</a></li>
                <li><a href="<?php echo e(route('productstype.index')); ?>">Product Type</a></li>
                <li><a href="<?php echo e(route('productcategory.index')); ?>">Product Categories</a></li>
                <li><a href="<?php echo e(route('label.index')); ?>">Label</a></li>
                <li><a href="<?php echo e(route('courier.index')); ?>">Courier</a></li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>