<?php $__env->startSection('title','takealeave'); ?>;
<?php $__env->startSection('module-name','Leave Application'); ?>
<?php $__env->startSection('stylesheet'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Apply For Leave</h3>

              <div class="box-tools" style="float:right;">
                    <button type="buton" class="btn bg-purple btn-lg" data-toggle="modal" data-target="#exampleModal"><strong>Leave List<strong></button>
              </div>
            </div>
            <div class="box-body">
              <form class="" action="index.html" method="post">
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label>Available Leave balance</label>
                      <input type="text" readonly name="" value="12" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>Leave Type</label>
                      <select class="form-control leavedays" name="">
                        <option>--</option>
                        <?php $__currentLoopData = $leavetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leavetype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($leavetype->max_allowed_days); ?>"><?php echo e($leavetype->leave_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>From date</label>
                      <input type="date" id="firstDate" name="" value="" class="form-control datepicker">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>To date</label>
                      <input type="date" id="secondDate" name="" value="" class="form-control datepicker">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
$(document).ready(function(){
  $('.leavedays').on('change',function(){
    selectdays = $('.leavedays').val();
    console.log(selectdays);
  });

  $("#secondDate").datepicker({
      onSelect: function () {
        var start= $("#firstDate").datepicker("getDate");
        var end= $("#secondDate").datepicker("getDate");
        var days = (end- start) / (1000 * 60 * 60 * 24);
        if(Math.round(days)>selectdays) {
          alert("You have only "+selectdays.toString()+" days allowed for leave");
          $("#secondDate").val('');
        }
      },
  });

  $( ".datepicker" ).datepicker({
    changeYear:true,
    changeMonth: true,
    dateFormat:'yy-mm-dd',
  });






});
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>