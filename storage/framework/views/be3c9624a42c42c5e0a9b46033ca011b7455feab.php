<!--  -->
<?php $__env->startSection('module-name','Employment'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Job Openning</h3>

              <div class="box-tools" style="float:right;">
                  <a href="<?php echo e(route('jobopenning.create')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Job<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-responsive">
                <tr>
                  <th>Title</th>
                  <th>No of Vacancy</th>
                  <th>Deadline</th>
                  <th class="text-right">Action</th>
                </tr>
                <?php if(!empty($jobopennings)): ?>
                <?php $__currentLoopData = $jobopennings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobopenning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($jobopenning->job_title); ?></td>
                  <td class="text-center"><?php echo e($jobopenning->job_vacancy); ?></td>
                  <td class="text-center"><?php echo e(date('d-m-Y', strtotime($jobopenning->job_deadline))); ?></td>
                  <td class="text-right">
                    <a href="<?php echo e(route('jobopenning.edit',$jobopenning->id)); ?>"><span class="btn label-warning">Edit</span></a>
                    <form  action="<?php echo e(route('jobopenning.destroy',$jobopenning->id)); ?>" method="post" style="display:inline-block" id="form1">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE">
                      <input class="btn label-danger" type="submit" value="Delete" >
                    </form>
                  </td>
				        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>