
<?php $__env->startSection('module-name','Section settings'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create leavetype</h3>

              <div class="box-tools" style="float:right;">
                  <a href="<?php echo e(route('leavetype.index')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>leavetype List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="<?php echo e(route('leavetype.store')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <div class="form-group">
                        <label for="">leavetype Name</label>
                        <input type="text" name="leave_name" value="<?php echo e(old('leave_name')); ?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Max Allowed Day</label>
                        <input type="text" name="max_allowed_days" value="<?php echo e(old('max_allowed_days')); ?>" class="form-control">
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

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>