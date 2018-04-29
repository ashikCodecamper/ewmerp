
<?php $__env->startSection('module-name','Account'); ?>
<?php $__env->startSection('stylesheet'); ?><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
        <form class="col l12" method="post" action="<?php echo e(route('expense.update', ['id'=>$expense->id])); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="input-field col s4 ">
                    <i class="material-icons prefix icon-blue">date_range</i>
                    <input value="<?php echo e($expense->recording_date); ?>" class="datepicker" name="recording_date" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Recording Date</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">date_range</i>
                    <input value="<?php echo e($expense->invoice_date); ?>"  class="datepicker1" name="invoice_date" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Invoice Date</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <input value="<?php echo e($expense->voucher_no); ?>"  name="voucher_no" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Voucher No</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <?php if($expense->particulars): ?>
                    <input value="<?php echo e($expense->particulars); ?>" name="particulars" id="icon_telephone" type="text" class="validate" required>
                    <?php else: ?>
                    <input name="particulars" id="icon_telephone" type="text" class="validate" required>
                    <?php endif; ?>                    
                    <label for="icon_telephone">Particulars</label>
                </div>
            </div>

            <div class="row">
               <div class="input-field col s6">
                    <i class="material-icons prefix">description</i>
                    <select name="head">
                      <?php if($expense->head): ?>
                        <option value="<?php echo e($expense->head->id); ?>" selected><?php echo e($expense->head->name); ?></option>
                        <?php $__currentLoopData = $heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($h->id != $expense->head->id): ?>
                            <option value="<?php echo e($h->id); ?>"><?php echo e($h->name); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php else: ?>
                      <?php $__currentLoopData = $heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($h->id); ?>"><?php echo e($h->name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>

                     
                    </select>
                    <label>Account Head</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <select name="party">
                        <?php if($expense->party): ?>
                            <option value="<?php echo e($expense->party->id); ?>" selected><?php echo e($expense->party->party_name); ?></option>
                            <?php $__currentLoopData = $parties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($p->id != $expense->party->id): ?>
                                    <option value="<?php echo e($p->id); ?>"><?php echo e($p->party_name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php $__currentLoopData = $parties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($p->id); ?>"><?php echo e($p->party_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    
                    </select>
                    <label>Party</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <?php if($expense->details_description): ?>
                        <input value="<?php echo e($expense->details_description); ?>" name="details_description" id="icon_prefix" type="text" class="validate" required>
                    <?php else: ?>
                    <input name="details_description" id="icon_prefix" type="text" class="validate" required>
                    <?php endif; ?>
                    <label for="icon_prefix">Details Description</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">attach_money</i>
                    <select name="payment_type">
                      <option value="<?php echo e($expense->mode_of_payment); ?>" selected><?php echo e($expense->mode_of_payment); ?></option>
                      <?php if($expense->mode_of_payment == "cash"): ?>
                        <option value="cheque">Cheque</option>
                      <?php else: ?>
                        <option value="cash">Cash</option>
                      <?php endif; ?>    
                    </select>
                    <label>Payment type</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input value="<?php echo e($expense->cheque_no); ?>" name="cheque_no" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Cheque No</label>
                </div>

                <div class="input-field col s6">
                   <i class="material-icons prefix">attach_money</i>
                    <input value="<?php echo e($expense->expense_amount); ?>" name="amount" id="icon_prefix" type="text" class="validate" required>
                    <label for="icon_prefix">Ammount</label>
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