
<?php $__env->startSection('module-name','Account'); ?>
<?php $__env->startSection('stylesheet'); ?>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		
        <div class="col-sm-6">
            <h5>Party</h5>
             <ul>
                <li><a href="<?php echo e(route('party.index')); ?>">Party dashboard</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h5>Balance</h5>
            <ul>
                <li><a href="<?php echo e(route('balance.index')); ?>">Balance dashboard</a></li>
                <li><a href="<?php echo e(route('balanceexpense')); ?>">Balance expense </a></li>
                <li><a href="<?php echo e(route('balanceexpenseReportshow')); ?>">Balance expense report </a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h5>Bank</h5>
            <ul>
                <li><a href="<?php echo e(route('bank.index')); ?>">bank</a></li>
                <li><a href="<?php echo e(route('bankbalance.index')); ?>">bank balance</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h5>Account Head and subhead</h5>
            <ul>
                <li><a href="<?php echo e(route('accounthead.index')); ?>">Account Head </a></li>
                <li><a href="<?php echo e(route('accountsubhead.index')); ?>">Account Sub Head</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h5>Expense And Payable Expense</h5>
            <ul>
                <li><a href="<?php echo e(route('expense.index')); ?>">Expense</a></li>
                <li><a href="<?php echo e(route('payable.index')); ?>">Payable Expense</a></li>
            </ul>
        </div>
            
	</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>