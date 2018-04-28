<?php $__env->startSection('module-name','Leave history'); ?>
<?php $__env->startSection('content'); ?>
<table class="table table-striped">
  <thead>
    <th>Leave Type</th>
    <th>Description</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Status</th>
  </thead>
  <tbody>
    <?php if(isset($leaves)): ?>
    <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($leave->leavetype->leave_name); ?></td>
      <td><?php echo e($leave->leave_desc); ?></td>
      <td><?php echo e($leave->from_date); ?></td>
      <td><?php echo e($leave->to_date); ?></td>
      <td>
        <?php if($leave->status === 1): ?>
       <button class="btn btn-success">Approved</button>
        <?php elseif($leave->status === 2): ?>
        <button  class="btn btn-warning">Rejected</button>
        <?php else: ?>
        <button  class="btn btn-primary">Pending</button>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>
  </tbody>
</table>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>