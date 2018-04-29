
<?php $__env->startSection('stylesheet'); ?><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('module-name','balanceexpenseReport'); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
        <form data-parsley-validate class="col l10" method="post" action="<?php echo e(route('balanceexpenseReport')); ?>">
            <?php echo e(csrf_field()); ?>


            <div class="row">
                <div class="input-field col s4 ">
                    <i class="material-icons prefix icon-blue">date_range</i>
                    <input  class="datepicker" name="start" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">From</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">date_range</i>
                    <input class="datepicker1" name="end" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">To</label>
                </div>
            </div>
            <div class="row">
            	<div class="input-field col s6">
                    <button class="btn btn-large btn-register waves-effect waves-light" type="submit">save
                        <i class="material-icons right">done</i>
                    </button>
                </div>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript">

       $(document).ready(function() {
            $('select').material_select();
        });
         $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: true,
            format: 'yyyy-mm-dd' 
        });

        $('.datepicker1').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: true,
            format: 'yyyy-mm-dd' 
        });

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>