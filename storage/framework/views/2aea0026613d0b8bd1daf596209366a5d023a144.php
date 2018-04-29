
<?php $__env->startSection('stylesheet'); ?><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('module-name','Account'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <form data-parsley-validate class="col l12" method="post" action="<?php echo e(route('payable.save')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="input-field col s4 ">
                    <i class="material-icons prefix icon-blue">date_range</i>
                    <input class="datepicker" name="recording_date" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Recording Date</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">date_range</i>
                    <input class="datepicker1" name="invoice_date" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Invoice Date</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <input name="voucher_no" id="icon_prefixvoucher" type="text" class="validate" required>
                    <label for="icon_prefix">Voucher No</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <input name="particulars" id="icon_telephone" type="text" class="validate">
                    <label for="icon_telephone">Particulars</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <select  id="head" name="head">
                      <option value="" disabled selected>Choose Account Head</option>
                      <?php $__currentLoopData = $heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($h->id); ?>"><?php echo e($h->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label>Account Head</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <select id="subhead" name="subhead">
                      <option value="" disabled selected>Choose Account SubHead</option>
                    </select>
                    <label>Account SubHead</label>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input name="details_description" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Details Description</label>
                </div>
                <div class="input-field col s6">
                   <i class="material-icons prefix">attach_money</i>
                    <input data-parsley-type="number" name="amount" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Ammount</label>
                </div>
            </div>
            <div class="row">
                  <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <select name="party">
                      <option value="" disabled selected>Choose Party</option>
                      <?php $__currentLoopData = $parties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->party_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label>Party</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <button class="btn btn-small btn-register waves-effect waves-light" type="submit">save
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

            $("#ch").hide();
            $('select').material_select();
            $("#s").on('change', function() {
                    if ($(this).val() == "cheque") {
                         $("#ch").show();
                    }
                    else {
                        $("#ch").hide();
                    }
            });

             $.ajax({
                        type: "get",
                        url: "<?php echo e(route('expense-month')); ?>",
                        success: function (msg) {
                           var month = moment().format('MMMM').substr(0, 3);
                           var year = moment().year().toString().substr(2,)
                           $('#icon_prefixvoucher').val(month+year+'-'+msg);
                        },
                        complete: function (msg) {
                            Materialize.updateTextFields();
                        }
            });

            //fetching the subhead after on head is selected
            $("#head").on('change', function() {
                   var id = $(this).val();
                    $.ajax({
                        type: "get",
                        url: "<?php echo e(route('head_subhead')); ?>",
                        dataType:'text',
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            id: id
                        },
                        success: function (msg) {
                            $('#subhead option').slice(1).remove()
                            var b = msg;
                            a = JSON.parse(b);
                            $.each(a, function (i, item) {
                                var o = new Option(item.name, item.id);
                                $('#subhead').append(o);
                                console.log($('#subhead'));
                            });
                        },
                        complete: function (msg) {
                             $('select').material_select();
                        }
                    });
            });

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