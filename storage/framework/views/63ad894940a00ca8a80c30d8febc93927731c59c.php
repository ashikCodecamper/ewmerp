
<?php $__env->startSection('module-name','Account'); ?>
<?php $__env->startSection('stylesheet'); ?><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <form data-parsley-validate class="col s12" method="post" action="<?php echo e(route('bank.save')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input name="bank_name" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Bank Name</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">business</i>
                    <input name="branch_name" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Branch Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input name="account_no" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Account No</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">account_balance</i>
                    <input name="address" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Adress</label>
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