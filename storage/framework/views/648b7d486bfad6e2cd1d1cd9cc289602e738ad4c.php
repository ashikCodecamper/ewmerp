
<?php $__env->startSection('module-name','Confirmed Order List'); ?>
<?php $__env->startSection('stylesheet'); ?>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
     <div>
       <h3></h3>
     </div>
     <div class="col-12">
     	 <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools" style="float:right;">
                  <a href="<?php echo e(route('orderprocess.index')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Confirmed Order List<strong></button></a>
              </div>
              <hr>
            </div>
            <form method="post" action="<?php echo e(route('orderprocess.store')); ?>" data-parsley-validate>
              <?php echo e(csrf_field()); ?>

              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                   <label>BD/PO Sheet Received Date</label>
                <input type="text" name="porcvdate" value="" class="form-control" id="porcv">
                  <span class="text-danger"></span>
                </div>
               </div>
               <div class="col-md-2">
               <div class="form-group">
                  <label>Proto No.</label>
               <select class="form-control" name="srcno" required data-parsley-error-message="Select Source No.">
                 <option value="">-Select Proto-</option>
                 <?php $__currentLoopData = $srcno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $src): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($src->source_id); ?>"><?php echo e($src->proto); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
                 <span class="text-danger"></span>
               </div>
              </div>

               <div class="col-md-2">
                 <div class="form-group">
                   <label>PO Number</label>
                <input type="text" name="ponumber" value="" class="form-control" required data-parsley-error-message="Enter PO Number." >
                  <span class="text-danger"></span>
                </div>
               </div>
               <div class="col-md-2"></div>
               <div class="col-md-3">
                 <a href="#" class="btn btn-success add">ADD</a>&nbsp;
                 <a href="#" class="btn btn-warning remove">Remove</a>
               </div>
              </div>
              <hr>
<!--Bulk KnitDown Dynamic Part -->
          <div id="bul_container">
             <div id="bulk">
             <div class="row">
                 <div class="col-md-2">
                   <div class="form-group">
                     <label>Main-Color</label>
                     <input type="text" name="color[]" class="form-control" required data-parsley-error-message="Enter Color Name or Code">
                   </div>

                 </div>
                 <div class="col-md-2">
                   <div class="form-group">
                     <label>Order Quantity</label>
                     <input type="text" name="qty[]" class="form-control" required data-parsley-error-message="Enter Quantity">
                   </div>
                 </div>

                 <div class="col-md-2">
                   <div class="form-group">
                     <label for="">ETD</label>
                     <input type="text" name="etd[]" value="" class="form-control etd" required data-parsley-error-message="Enter ETD Date.">
                   </div>
                 </div>

                 <div class="col-md-2">
                   <div class="form-group">
                      <label>Ex-Factory Date</label>
                     <input type="text" class="form-control exfact" name="exfactdate[]" placeholder="" required data-parsley-error-message="Select Date">
                   </div>
                 </div>
                 <div class="col-md-2">
                   <div class="form-group">
                     <label for="">Warehouse Date</label>
                     <input type="text" name="warehouse[]" value="" class="form-control warehouse" readonly>
                   </div>
                 </div>

                  <div class="col-md-2">
                   <div class="form-group">
                     <label for="">Ship Mode</label>
                    <select name="shipmode[]" class="form-control" required data-parsley-error-message="Select Option.">
                      <option value="">--Select Mode--</option>
                      <option value="air">Air</option>
                       <option value="ship">Ship</option>
                    </select>
                   </div>
                 </div>
                </div>
                </div>
          </div>
<!-- END Bulk KnitDown Dynamic Part -->


       <div class="row"></div>
       <div class="row">

       		<div class="col-md-2">
       			<input type="submit" name="submit" class="btn btn-info" value="SAVE">
       		</div>
       </div>
       </form>
     </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $('#date-picker').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });

   $('#date-picker1').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
    $('#porcv').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
     $('#sudate').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });


  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

    var bulknitdown="<div class='row'>"+$('#bulk .row').first().html()+"</div>";
    $('.add').click(function(){

            $('#bulk').append(bulknitdown);
            $('#bulk .row').last();

    });
    $('.remove').click(function(){
      if($('#bulk .row').length>1){
        $('#bulk .row').last().remove();
      }
      else{
       alert("You can't Remove this Row");
      }
    });


    //Date for Ex-Factory.
    $('#bulk').on('focusin',".exfact",function(){
      $(this).daterangepicker({locale: {
        format: 'YYYY-MM-DD',
      }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
    });

     $('#bulk').on('focusin',".etd",function(){
      $(this).daterangepicker({locale: {
        format: 'YYYY-MM-DD',
      }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
    });

    $('#bulk').on('focusout',".exfact",function(){
         var date=$(this).val();
         var parent=$(this).closest('.row');

           var w=moment(date).add(42, 'days').format('Y-M-D');
            parent.find('.warehouse').val(w);
    });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>