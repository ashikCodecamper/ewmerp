
<?php $__env->startSection('module-name','Confirmed Order List'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools" style="float:right;">
                  <a href="<?php echo e(route('orderprocess.create')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Create<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>Proto</th>
                  <th>PO Number</th>
                  <th>BD/PO Sheet Received Date</th>
                  <th>Color</th>
                  <th>Quantity</th>
                  <th>Ex-Factory Date</th>
                  <th>Warehouse Date</th>
                  <th class="text-right">Action</th>
                </tr>
                <?php $__currentLoopData = $ordr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($loop->iteration); ?></td>
                  <td><?php echo e($op->proto); ?></td>
                  <td><?php echo e($op->po_number); ?></td>
                  <td><?php echo e($op->po_sheet_rcv); ?></td>
                  <td><?php echo e($op->color); ?></td>
                  <td><?php echo e($op->quantity); ?></td>
                  <td><?php echo e($op->ex_factory_date); ?></td>
                  <td><?php echo e($op->warehouse_date); ?></td>


                  <td class="text-right">
                    <a href="<?php echo e(route('orderprocess.edit',$op->id)); ?>"><span class="btn label-warning">Edit</span></a>
                    <form  action="<?php echo e(route('orderprocess.delete',$op->id)); ?>" method="post" style="display:inline-block" id="form2">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE" id="form1">
                      <input class="btn label-danger" type="submit" value="Delete">
                    </form>

                  </td>
				        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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