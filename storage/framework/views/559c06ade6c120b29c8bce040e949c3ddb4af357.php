<?php $__env->startSection('module-name','Office Time Setup'); ?>
<?php $__env->startSection('stylesheet'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Set Out Time</h3>

              <div class="box-tools" style="float:right;">
                  <a href="#"><button type="buton" class="btn bg-purple btn-lg" ><strong>Time List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="<?php echo e(route('saveofficeouttime')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <div class="form-group bootstrap-timepicker timepicker">
                        <label for="">Time</label>
                        <input type="text" id="timepicker1" name="out_time" value="" class="form-control">

                      </div>
                      <button type="submit" class="btn btn-large bg-green">Save</button>
                    </form>
                  </div>
                  <div class="col-md-2"></div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
      $('#timepicker1').timepicker();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>