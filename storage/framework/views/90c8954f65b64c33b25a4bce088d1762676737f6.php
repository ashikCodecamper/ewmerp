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
              <h3 class="box-title">Set In Time</h3>

              <div class="box-tools" style="float:right;">
                  <a href="#"><button type="buton" class="btn bg-purple btn-lg" ><strong>Time List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <?php if(isset($intime[0])): ?>
                    <table class="table table-stripe">
                      <th>
                        <tr>
                            <td>#</td>
                            <td>Time</td>
                            <td>Action</td>
                        </tr>
                      </th>
                      <tbody>

                          <?php $__currentLoopData = $intime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>#</td>
                            <td><?php echo e($t->in_time); ?></td>
                            <td><button class="btn btn-sm btn-warning">Edit</button</td>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <?php else: ?>
                        <h4>You haven't set office in time yet</h4>
                        <button class="btn btn-primary"><a href="<?php echo e(route('officetime')); ?>">Set In Time</a></button>
                        <?php endif; ?>

                    </table>
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
      $('#timepicker1').timepicker({
        timeFormat: 'HH:mm:ss',
      });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>