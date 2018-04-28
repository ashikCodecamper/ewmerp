<?php $__env->startSection('module-name','Employee Attendance'); ?>
<?php $__env->startSection('content'); ?>
<table class="table table-striped">
  <thead>
    <th>Date</th>
    <th>Employee Name</th>
    <th>In Time</th>
    <th>Out Time</th>
    <th>Status</th>
  </thead>
  <tbody>
  <?php $__currentLoopData = $attends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($attend->created_at->format('d M Y')); ?></td>
      <td><?php echo e($attend->user->name); ?></td>
      <td><?php echo e($attend->in_time); ?></td>
      <td><?php echo e($attend->out_time); ?></td>
      <td>
        <button class="btn btn-primary">Present</button>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>