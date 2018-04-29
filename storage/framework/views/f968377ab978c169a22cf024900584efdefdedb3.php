
<?php $__env->startSection('module-name','Development Critical Path'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Proto Information Entry</h3>

              <div class="box-tools" style="float:right;">
                  <a href="<?php echo e(route('dcpsteponecreate')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Proto/Style<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>Sl no.</th>
                  <th>Season</th>
                  <th>Brand</th>
                  <th>Level</th>
                  <th>Category</th>
                  <th>Proto.</th>
                  <th>Color</th>
                  <th>Style</th>
                  <th>Yarn</th>
                  <th class="text-right">Action</th>
                </tr>
              <?php if(!empty($data)): ?>
              	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($loop->iteration); ?></td>
                  <td><a href="javascript:void(0)"><?php echo e($d->sl_no); ?></a></td>
                  <td><?php echo e($d->sea_name); ?></td>
                  <td><?php echo e($d->brand_name); ?></td>
                  <td><?php echo e($d->label_name); ?></td>
                  <td><?php echo e($d->name); ?></td>
                  <td><?php echo e($d->proto); ?></td>
                  <td><?php echo e($d->clr_name); ?></td>
                  <td><?php echo e($d->style_code); ?></td>
                  <td><?php echo e($d->yarn); ?></td>
                  <td class="text-right">
                    <a href="<?php echo e(route('dcpsteponedit',$d->id)); ?>"><span class="btn label-warning">Edit</span></a>
                    <form  action="<?php echo e(route('dcpdestroy',$d->id)); ?>" method="post" style="display:inline-block" id="form2">
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