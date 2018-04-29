
<?php $__env->startSection('module-name','Account'); ?>
<?php $__env->startSection('stylesheet'); ?><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .icon-red{
            color: #f44336;
        }
        .icon-redd{
            background-color: #f44336;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



 <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
        <form id = "editForme" class="col s12" method="post" action="<?php echo e(route('accountsubhead.store')); ?>">
            <?php echo e(csrf_field()); ?>


            <div class="row">

                <div class="input-field col s4">
                    <select name="head">
                      <option value="" disabled selected>Choose Account Head</option>
                      <?php $__currentLoopData = $aheads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($h->id); ?>"><?php echo e($h->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label>Account Head</label>
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix">description</i>
                    <input placeholder="Placeholder" name="name" id="icon_prefix2" type="text" class="validate" required>
                    <label for="icon_prefix2">Sub Head Name</label>
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix">description</i>
                    <input placeholder="Placeholder" name="description" id="icon_prefix2" type="text" class="validate" required>
                    <label for="icon_prefix2">Description</label>
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


 <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <form id = "editForms" class="col s12" method="post" action="">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="input-field col s4">
                    <select name="heads" id="head">
                      <?php $__currentLoopData = $aheads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($h->id); ?>"><?php echo e($h->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <label>Account Head</label>
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix">description</i>
                    <input placeholder="Placeholder" name="name" id="icon_prefix22" type="text" class="validate" required>
                    <label for="icon_prefix2">Sub Head Name</label>
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix">description</i>
                    <input placeholder="Placeholder" name="description" id="icon_prefix2" type="text" class="validate" required>
                    <label for="icon_prefix2">Description</label>
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
            <div class="row">
                <div class="left">
                   <a class="modal-trigger e waves-effect waves-light btn-large" href="#modal2">Add Sub New Head</a>
                </div>
            </div>


        <table class="highlight bordered z-depth-3">

            <thead>
            <tr class="teal lighten-2">
                <th>Sr</th>
                <th>Account Head Name</th>
                <th>SubHead Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>


            <tbody>

                <?php $__currentLoopData = $heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($head->head->name); ?></td>
                    <td><?php echo e($head->name); ?></th>
                    <td><?php echo e($head->description); ?></td>
                    <td>
                        <a id= "<?php echo e($head->id); ?>" class="modal-trigger s" href="#modal1"><i class="small material-icons">edit</a>
                        <a href="<?php echo e(route('accountsubhead.delete', ['id'=>$head->id])); ?>"> <i class="small material-icons icon-red">delete</i> </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

 <!-- Modal Trigger -

  <!-- Modal Structure -->




<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {


                $('select').material_select();
                 $('.s').click(function(){

                    var id = this.id;

                    var url = 'accountsubhead/'+id+"/edit";

                    $("#editForms").attr('action', url);

                    $.ajax({
                            url: "<?php echo e(route('sbalance.json')); ?>",
                            dataType: 'text',

                            data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                                id: id
                            },
                            success: function (msg) {
                                msg = JSON.parse(msg);
                                console.log(msg.name);

                                $('#head').val(msg.head_id);
                                $('select').material_select();
                                $('#modal1 #icon_prefix22').val(msg.name);
                                $('#modal1 #icon_prefix2').val(msg.description);

                            },
                            complete: function () {

                            }
                    });

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

                   $('.e').click(function(){
                    $('select').material_select();
                    $("#close").click(function(){

                            $('#modal2').modal('close');
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