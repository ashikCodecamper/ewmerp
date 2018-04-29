<?php $__env->startSection('stylesheet'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('module-name','PCP :: Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Dashboard</h3>
            </div>
            <div class="box-body">
              <div class="row">
                  <div class="col-lg-6">
                  <ul class="">
                    <li class=""><a href="<?php echo e(route('labdip.index')); ?>">Labdip</a></li>
                    <li class=""><a href="<?php echo e(route('seal01.index')); ?>">Red/Dev sample</a></li>
                    <li class=""><a href="<?php echo e(route('seal02.index')); ?>"> Black/Fit Sample</a></li>
                    <li class=""><a href="<?php echo e(route('seal03.index')); ?>">Gold/PP sample</a></li>
                    <li class=""><a href="<?php echo e(route('feedin.index')); ?>">Feed In Target</a></li>
                    <li class=""><a href="<?php echo e(route('seal04.index')); ?>"> Bulk/Production</a></li>
                  </div>
                </div>
            </div>
            </div>
          </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>