
<?php $__env->startSection('module-name','employment type settings'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employment Type</h3>

              <div class="box-tools" style="float:right;">
                  <a href="<?php echo e(route('emptype.create')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Employment type<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Name</th>
                  <th class="text-right">Action</th>
                </tr>
                <?php if(!empty($emptypes)): ?>
                <?php $__currentLoopData = $emptypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emptype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="javascript:void(0)"><h5><?php echo e($emptype->emp_name); ?></h5></a></td>
                  <td class="text-right">
                    <a href="<?php echo e(route('emptype.edit',$emptype->id)); ?>"><span class="btn label-warning">Edit</span></a>
                    <form  action="<?php echo e(route('emptype.destroy',$emptype->id)); ?>" method="post" style="display:inline-block" id="form1">
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
  <script>
        document.getElementById('form1').addEventListener('submit', function(e) {
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