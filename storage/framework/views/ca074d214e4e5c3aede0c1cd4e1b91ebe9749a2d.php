
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

<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <form id = "editForms" class="col s12" method="post" action="">
            <?php echo e(csrf_field()); ?>

            <div class="row">
               <div class="input-field col s6 required">
                    <i class="material-icons prefix">description</i>
                    <select id="payment_type" name="payment_type">
                      <option value="" disabled selected>Choose payment type</option>
                      <option value="cash">cash</option>
                      <option value="cheque">cheque</option>
                    </select>
                    <label>Payment type</label>
                </div>

                 <div id="ch" class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input name="cheque_no" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Cheque No</label>
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
     <div class="modal-footer">
      <button id="close" class="modal-action icon-redd modal-close waves-effect waves-effect waves-light btn">Close</button>
    </div>
  </div>

    <div class="row">
        <a class="waves-effect waves-light btn" href="<?php echo e(route('payable.create')); ?>">create payable expense</a>
        <table class="highlight bordered z-depth-3 striped">

            <thead>
            <tr class="teal lighten-2">
                <th>Sr</th>
                <th>Party Name</th>
                <th>Head Of Account</th>
                <th>SubHead Of Account</th>
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
                        <a id= "<?php echo e($party->id); ?>" class="modal-trigger pay" href="#modal1"><i class="small material-icons">beenhere</i></a>
                        <a href="<?php echo e(route('payable.edit', ['id'=>$party->id])); ?>"> <i class="small material-icons">edit</i> </a>
                        <a href="<?php echo e(route('payable.delete', ['id'=>$party->id])); ?>"> <i class="small material-icons icon-red">delete</i> </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>





<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#date-picker').daterangepicker({locale: {
                    format: 'YYYY-MM-DD',
                    startView: "years",
                }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });

            $("#ch").hide();

            $('select').material_select();

            $("#payment_type").on('change', function() {
                    if ($(this).val() == "cheque") {
                         $("#ch").show();
                    }
                    else {
                        $("#ch").hide();
                    }
            });

             $('.pay').click(function(){

                    var id = this.id;

                    var url = 'pay/'+id;

                    $("#editForms").attr('action', url);


                    $("#close").click(function(){

                            $('#modal1').modal('close');
                    });

                    $('.modal').modal({
                      dismissible: false, // Modal can be dismissed by clicking outside of the modal
                      opacity: .5, // Opacity of modal background
                      inDuration: 400, // Transition in duration
                      outDuration: 400, // Transition out duration
                      startingTop: '4%', // Starting top style attribute
                      endingTop: '10%', // Ending top style attribute
                      ready: function(modal, trigger) {

                      },
                      //complete: function() { alert('Closed'); } // Callback for Modal close
                });
            })
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>