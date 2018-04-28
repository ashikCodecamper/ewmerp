
<?php $__env->startSection('module-name','Employee Dashboard'); ?>
<?php $__env->startSection('content'); ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Job vacancy List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">

                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover table-responsive">
                <tbody><tr>
                  <th>Applicant Name</th>
                  <th>Email Address</th>
                  <th>Phone Number</th>
                  <th>CV</th>
                  <th>Action</th>
                </tr>
      <?php $__currentLoopData = $jobapplicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobapplicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>

            <td><?php echo e($jobapplicant->full_name); ?></td>
            <td><?php echo e($jobapplicant->email); ?></td>
            <td>
            <?php echo e($jobapplicant->mobile); ?>

            </td>
            <td>
               <a href="<?php echo e(asset('storage/'.$jobapplicant->cv.'')); ?>" target="_blank">Download</a>
            </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody></table>
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>