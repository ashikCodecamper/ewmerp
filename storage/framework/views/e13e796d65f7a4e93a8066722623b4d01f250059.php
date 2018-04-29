<?php $__env->startSection('module-name','Production Critical Path'); ?>
<?php $__env->startSection('stylesheet'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<link rel="stylesheet" href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/material.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
     <div>
       <h3></h3>
     </div>
     <div class="col-12">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sealing-Process-04</h3>

              <div class="box-tools" style="float:right;">
                      <a href="<?php echo e(route('seal04.index')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>List<strong></button></a>
              </div>
              <hr>
            </div>
            <form method="post" action="<?php echo e(route('seal04.store')); ?>" data-parsley-validate>
              <?php echo e(csrf_field()); ?>


          <div class="row">

            <div class="col-md-2">
              <div class="form-group">
              <label>Proto no.</label>
              <select required id="proto_id" class="form-control" name="proto">
                <option value="">-Select Proto-</option>
                <?php $__currentLoopData = $protos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($proto->dcpstepone->id); ?>"><?php echo e($proto->dcpstepone->proto); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
            </div>
            <div class="col-md-2"></div>

            <div class="col-md-2" id="targetdate">
              <p>Bulk/Production sample Approval target date: </p>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-9"></div>
          <div class="col-md-3">
            <div class="form-group">
              <label id="remaining" style="background-color:green;color:white;padding:5px">Remaining Days:Over 10 Days </label>
            </div>
          </div>
        </div>

        <hr>

        <div id="sealone">
        <div class="row">

        <div class="col-md-2">
          <div class="form-group">
            <label>Plan Date</label>
            <input required type="text" name="plandate" class="form-control plandate" required="" data-parsley-error-message="Enter Date" placeholder="YYYY-MM-DD" id="plandate">
          </div>

        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Actual Date of Submission</label>
          <input required type="text" name="actsum" id="actsubdate" class="form-control actsubdate" placeholder="YYYY-MM-DD">
          </div>

        </div>


       <div class="col-md-2" id="uardate">
          <div class="form-group">
             <label>AWB details</label>
        <textarea required name="awb" rows="2" class="form-control"></textarea>
          </div>
        </div>

         <div class="col-md-2" id="uardate">
          <div class="form-group">
             <label>Comment</label>
             <select name="comment" class="form-control">
               <option value="Approved">Approved</option>
               <option value="Rejected">Rejected</option>
             </select>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
             <label>Comment Date</label>
    <input required type="text" name="cmntdate" id="cmntsdate" class="form-control cmntsdate" placeholder="YYYY-MM-DD">
          </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
              <label>Remarks</label>
              <textarea required rows="1" cols="25" name="rev_comment" placeholder="Revised Comment"></textarea>
            </div>
        </div>

       </div>
       </div>

       <hr>


       <div class="row"><hr></div>
       <div class="row">

          <div class="col-md-4"></div>
  <div class="col-md-4"><input type="submit" name="submit" class="btn btn-info btn-block" value="SAVE"></div>
            <div class="col-md-4"></div>

       </div>
       </form>
     </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>

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

  $('#sudate').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });

  console.log('started');
  $("#actsubdate").change(function() {
    let submitted_date = moment($("#actsubdate").val());
      console.log("submitted date => ",submitted_date.format('YYYY-MM-DD'));

      $.ajax({
        url: "<?php echo e(route('seal01.exfactory')); ?>",
        data: {
          id: $("#proto_id").val()

        },
        success: function(result){
          console.log(result)
          var result = JSON.parse(result);

          var exfactory_date = moment(result.exfactory);

          console.log('proto receive date = > ', result.rcv_date);

          console.log("exfactory date => ", exfactory_date.format('YYYY-MM-DD'));


          var approval_date = exfactory_date.subtract(14, 'days');
          $("#targetdate").html("Bulk/Production sample Approval target date: <br> " + approval_date.format('YYYY-MM-DD'))
          console.log("approval date(exfactory_date-14) => ", approval_date.format('YYYY-MM-DD'));

          var remaining_days = approval_date.diff(submitted_date, 'days');
          console.log('remaining_days(approval date - exfactory date => ', remaining_days);

          var rem_text = remaining_days >= 0 ? `Remaingin days of exfactory - ${remaining_days}` :`overdays of exfactory${remaining_days}`

          $('#remaining').text(rem_text);


          if (remaining_days >= 0) {
            $("#targetdate").css("background-color", "#43a047 green darken-1");
            $("#actsubdate").css("background-color", '#43a047 green darken-1');
          } else if (remaining_days < 0 && remaining_days >= -5) {
            $("#targetdate").css("background-color", "#ffff00 yellow accent-2");
            $("#actsubdate").css("background-color", '#ffff00 yellow accent-2');
          } else if (remaining_days < -5) {
            $("#targetdate").css("background-color", "#ff7043 deep-orange lighten-1");
            $("#actsubdate").css("background-color", '#ff7043 deep-orange lighten-1');
          }
        }
      });

  })
  });
</script>


<script type="text/javascript">

  $(document).ready(function(){
    var seal1="<div class='row'>"+$('#sealone .row').first().html()+"</div>";

    $('.add').click(function(){
       $('#sealone').append(seal1);
       $('#sealone .row').last();
    });

    $('.remove').click(function(){
      if($('#sealone .row').length>1)
      {
        $('#sealone .row').last().remove();
      }
      else
      {
        alert('You Can\'t Remove this row');
      }
    });


  });
</script>


<script type="text/javascript">
    $(document).ready(function(){
      $('#sealone').on("focusin",'.plandate',function(){
          $(this).bootstrapMaterialDatePicker
          ({
            time: false,
            clearButton: true
          });
      });


       $('#sealone').on('focusin','.actsubdate',function(){

          $(this).bootstrapMaterialDatePicker
        ({
          time: false,
          clearButton: true
        });
      });



       $('#sealone').on("focusin",'.cmntsdate',function(){

          $(this).bootstrapMaterialDatePicker
          ({
            time: false,
            clearButton: true
          });
      });



      $.material.init()

      // material init

    });
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>