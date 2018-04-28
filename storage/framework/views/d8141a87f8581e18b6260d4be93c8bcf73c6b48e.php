<?php $__env->startSection('module-name','Check Out'); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('savecheckout')); ?>" method="post">
  <?php echo e(csrf_field()); ?>

<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <div class="row">
      <div class="col-5">
        <div class="form-group">
          <label>Office Check Out Time</label>
          <input type="text" readonly value="<?php echo e(date('h:i A', strtotime($out))); ?>" class="form-control">
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label>Current Time</label>
          <input type="text" readonly name="out_time" value="<?php echo e(date("h:i A")); ?>" class="form-control">
        </div>
      </div>
    </div>
    <button class="btn btn-primary" type="submit">Check Out</button>
  </div>
  <div class="col-3"></div>
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>