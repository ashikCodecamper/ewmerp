<?php $__env->startSection('module-name','Shipment Process'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-sm-6">
            <h4>Shipment and Proccess Status</h4>
            <ul>
                <li><a href="<?php echo e(route('shipment.index')); ?>">Shipment</a></li>
                
            </ul>
        </div>

      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>