
<?php $__env->startSection('module-name','Leavetype settings'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Leavetype</h3>

              <div class="box-tools" style="float:right;">
                  <a href="<?php echo e(route('leavetype.create')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Leavetype<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Name</th>
                  <th>Max Allowed Days</th>
                  <th class="text-right">Action</th>
                </tr>
                <?php if(!empty($leavetypes)): ?>
                <?php $__currentLoopData = $leavetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leavetype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="javascript:void(0)"><h5><?php echo e($leavetype->leave_name); ?></h5></a></td>
                  <td><a href="javascript:void(0)"><h5><?php echo e($leavetype->max_allowed_days); ?></h5></a></td>
                  <td class="text-right">
                    <a href="<?php echo e(route('leavetype.edit',$leavetype->id)); ?>"><span class="btn label-warning">Edit</span></a>
                    <form  action="<?php echo e(route('leavetype.destroy',$leavetype->id)); ?>" method="post" style="display:inline-block" id="form2">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE" id="form1">
                      <input class="btn label-danger" type="submit" value="Delete">
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
  <script>
        document.getElementById('form2').addEventListener('submit', function(e) {
            var form = this;
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'welldone!',
                        text: 'successfully deleted!',
                        type: 'success'
                    }, function() {
                        form.submit();
                    });
                    
                } else {
                    swal("Cancelled", "Your  information is safe :)", "error");
                }
            });
        });

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>