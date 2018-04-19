
<?php $__env->startSection('module-name','Compliance'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Suppliers</h3>

          <div class="box-tools" style="float:right;">
              <a href="<?php echo e(route('supplierCreate')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Supplier<strong></button></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tr>
              <th>Supplier no</th>
              <th>Supplier Name</th>
              <th>Managing Director</th>
              <th>Supplier Corporate Office</th>

            </tr>
          <?php if(!empty($suppliers)): ?>
              <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><a href="<?php echo e(route("supplierShow",['id'=>$supplier->id])); ?>"><?php echo e($key+1); ?></a></td>
                  <td><a href="<?php echo e(route("supplierShow",['id'=>$supplier->id])); ?>"><?php echo e($supplier->name); ?></a></td>
                  <td><?php echo e($supplier->manaingDirectorDetails); ?></td>
                  <td><?php echo e($supplier->corporateOfficeDetails); ?></td>
                  <td class="text-right">
                    <form id="form234" action="<?php echo e(route('supplierDestroy',$supplier->id)); ?>" method="post" style="display:inline-block">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE">
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

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>