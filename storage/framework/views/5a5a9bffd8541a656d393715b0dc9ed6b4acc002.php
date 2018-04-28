
<?php $__env->startSection('module-name','Human Resources'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-sm-6">
            <h4>Employee and Attendance</h4>
            <ul>
                <li><a href="<?php echo e(route('profile.index')); ?>">Employee</a></li>
                <li><a href="<?php echo e(route('attend')); ?>">Attendance</a></li>
                <li><a href="#">Upload Attendance</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h4>Recruitment</h4>
            <ul>
                <li><a href="<?php echo e(route('jobapplicant.index')); ?>">Job Applicant</a></li>
                <li><a href="<?php echo e('jobopenning'); ?>">Job Opening</a></li>
                <li><a href="#">Offer Letter</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h4>Leaves and Holiday</h4>
            <ul>
                <li><a href="<?php echo e(route('viewleaveapp')); ?>">Leave Application</a></li>
                <li><a href="<?php echo e(route('leavetype.index')); ?>">Leave Type</a></li>
                <li><a href="<?php echo e(route('holidays')); ?>">Holiday List</a></li>
                <li><a href="#">Leave Allocation</a></li>
            </ul>
        </div>
        <div class="col-sm-6">
          <h4>Attendance Settings</h4>
          <ul>
              <li><a href="<?php echo e(route('officetime')); ?>">Checkin Time Setup</a></li>
              <li><a href="<?php echo e(route('graceperiod')); ?>">Grace Period Setup</a></li>
              <li><a href="<?php echo e(route('officeouttime')); ?>">Check Out Time Setup</a></li>
          </ul>
        </div>
        <div class="col-sm-6">
            <h4>HR Settings</h4>
            <ul>
                <li><a href="<?php echo e(route('emptype.index')); ?>">Employment Type</a></li>
                <li><a href="<?php echo e(route('section.index')); ?>">Section</a></li>
                <li><a href="<?php echo e(route('department.index')); ?>">Department</a></li>
                <li><a href="<?php echo e(route('designation.index')); ?>">Designation</a></li>
            </ul>
        </div>
        <div class="col-sm-6">
          <h4>Reports</h4>
          <ul>
              <li><a href="#">Employees working on a holiday</a></li>
              <li><a href="#">Monthly Attendance Sheet</a></li>
          </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>