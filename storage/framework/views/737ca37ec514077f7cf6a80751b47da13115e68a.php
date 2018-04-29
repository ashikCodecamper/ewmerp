
<?php $__env->startSection('module-name','Approved List'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DCP-Approved List</h3>

              <div class="box-tools" style="float:right;">
                <form action="<?php echo e(route('excelexport')); ?>" enctype="multipart/form-data">
                    <button class="btn btn-info" type="submit">Excel Export</button>
                    <hr>
                </form> &nbsp;
              
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Sl no.</th>
                  <th>Brand</th>
                  <th>Supplier</th>
                  <th>Proto No.</th>
                  <th>Proto Received Date</th>
                  <th>Yarn/Febric Composition</th>
                  <th>Product Description</th>
                  <th>FOB Price</th>
                  <th>Target Price</th>
                 
                </tr>
              <?php if(!empty($steptwolist)): ?>
              	 <?php $__currentLoopData = $steptwolist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="javascript:void(0)"><?php echo e($st->sl_no); ?></a></td>
                
                  <td><?php echo e($st->brand_name); ?></td>
               
                  <td><?php echo e($st->sup_name); ?></td>
                  <td><?php echo e($st->proto); ?></td>
                  <td><?php echo e($st->proto_rcv_date); ?></td>
                  <td><?php echo e($st->yarn); ?></td>
                  <td><?php echo e($st->prdct_des); ?></td>
                  <td><?php echo e($st->fob_price); ?></td>
                  <td ><?php echo e($st->target_price); ?></td>
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