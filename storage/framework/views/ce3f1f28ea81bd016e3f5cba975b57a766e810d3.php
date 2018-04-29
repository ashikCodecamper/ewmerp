
<?php $__env->startSection('module-name','Account'); ?>
<?php $__env->startSection('stylesheet'); ?><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .icon-red{
            color: #f44336;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <table class="highlight bordered z-depth-3 centered">

            <thead>
            <tr class="teal lighten-2">
                <th>Date</th>
                <th>Received</th>
                <th>Withdrawn</th>
                <th>Description</th>
                <th>Current Balance</th>
            </tr>
            </thead>


            <tbody>
                <tr>
                    <td>Opening Balance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo e(number_format($openning)); ?></td>

                </tr>
                <?php $__currentLoopData = $finals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $final): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($final->date); ?></td>
                    <?php if(isset($final->amount_received)): ?>
                    <td><?php echo e(number_format($final->amount_received)); ?></td>
                    <?php else: ?>
                    <td>0</td>
                    <?php endif; ?>
                    <?php if(isset($final->amount_paid)): ?>
                    <td><?php echo e(number_format($final->amount_paid)); ?></td>
                    <?php else: ?>
                    <td>0</td>
                    <?php endif; ?>
                    <?php if(isset($final->description)): ?>
                    <td><?php echo e($final->description); ?></td>
                    <?php else: ?>
                    <td>0</td>
                    <?php endif; ?>
                    <?php 
                        if(isset($final->amount_received)) {
                            $openning += $final->amount_received;
                        }
                        if (isset($final->amount_paid)) {
                            $openning -= $final->amount_paid;
                        }
                    ?>
                    <td><?php echo e(number_format($openning)); ?></td>
                    </tr>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>closing Balance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo e(number_format($openning)); ?></td>

                </tr>
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