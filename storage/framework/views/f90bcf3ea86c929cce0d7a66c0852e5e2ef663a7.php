
<?php $__env->startSection('module-name','Account'); ?>
<?php $__env->startSection('stylesheet'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .icon-red{
            color:  #f44336;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">

        <a class="waves-effect waves-light btn" href="<?php echo e(route('expense.create')); ?>">create expense</a>

        <table class="highlight bordered z-depth-3 striped">

            <thead>
            <tr class="teal lighten-2">
                <th>Sr</th>
                <th>Party Name</th>
                <th>Head Of Account</th>
                <th>Sub Head of Account</th>
                <th>Particulars</th>
                <th>Details Description</th>
                <th>Expense Amount</th>
                <th>Action</th>
            </tr>
            </thead>


            <tbody>

                <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $party): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <?php if($party->party): ?>
                    <td><?php echo e($party->party->party_name); ?></td>
                    <?php else: ?>
                    <td>unknown</td>
                    <?php endif; ?>
                    <?php if($party->head): ?>
                    <td><?php echo e($party->head->name); ?></td>
                    <?php else: ?>
                    <td>unknown</td>
                    <?php endif; ?>
                    <?php if($party->subhead): ?>
                        <td><?php echo e($party->subhead->name); ?></td>
                    <?php else: ?>
                        <td>unknown</td>
                    <?php endif; ?>
                    <?php if($party->particulars): ?>
                    <td><?php echo e($party->particulars); ?></td>
                    <?php else: ?>
                    <td>no particulars</td>
                    <?php endif; ?>
                    <?php if($party->details_description	): ?>
                    <td><?php echo e($party->details_description); ?></td>
                    <?php else: ?>
                    <td>no description</td>
                    <?php endif; ?>
                    <td><?php echo e(number_format($party->expense_amount)); ?></td>
                    <td>
                        <a href="<?php echo e(route('expense.edit', ['id'=>$party->id])); ?>"> <i class="small material-icons">edit</i> </a>
                        <a href="<?php echo e(route('expense.delete', ['id'=>$party->id])); ?>"> <i class="small material-icons icon-red">delete</i> </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#date-picker').daterangepicker({locale: {
                    format: 'YYYY-MM-DD',
                    startView: "years",
                }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>