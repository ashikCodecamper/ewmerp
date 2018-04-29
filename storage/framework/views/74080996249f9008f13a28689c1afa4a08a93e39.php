<?php $__env->startSection('module-name','PCP :: Black/Fit Sample'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lab-Dip</h3>

              <div class="box-tools" style="float:right;">

                  <a href="<?php echo e(route('seal04.create')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Seal<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>Proto</th>
                  <th>Plan Date</th>
                  <th>Actual Submission Date</th>
                  <th>Awb Details</th>
                  <th>Comment</th>
                  <th>Comment Date</th>
                  <th>Remark</td>
                  <th class="text-right">Action</th>
                </tr>

                <?php $__currentLoopData = $sealones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sealone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($loop->index += 1); ?></td>
                  <td><?php echo e($sealone->dcpone->proto); ?></td>
                  <td><?php echo e($sealone->plan_date); ?></td>
                  <td><?php echo e($sealone->submission_date); ?></td>
                  <td><?php echo e($sealone->awb_details); ?></td>
                  <td><?php echo e($sealone->comment); ?></td>
                  <td><?php echo e($sealone->comment_date); ?></td>
                  <td><?php echo e($sealone->rev_comment); ?></td>
                  <td class="text-right">
                    <?php if($sealone->status): ?>
                      <a href="<?php echo e(route('seal04.approve', ['id'=>$sealone->id])); ?>"><span class="btn label-warning">undo approve</span></a>
                    <?php else: ?>
                      <a href="<?php echo e(route('seal04.edit', ['id'=>$sealone->id])); ?>"><span class="btn label-warning">edit</span></a>
                      <a href="<?php echo e(route('seal04.approve', ['id'=>$sealone->id])); ?>"><span class="btn label-success">approve</span></a>
                      <a href="<?php echo e(route('seal04.reject', ['id'=>$sealone->id])); ?>"><span class="btn label-primary">reject</span></a>
                      <a href="#"><span id=<?php echo e($sealone->id); ?> class="btn label-danger mshit">log</span></a>
                  <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center">seal submission log</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

<?php $__env->startSection('javascript'); ?>
  <script>
        document.getElementById('form2').addEventListener('submit', function(e) {
            var form = this;
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'welldone!',
                        text: 'successfully deleted!',
                        type: 'success'
                    }, function() {
                        form.submit();
                    });

                } else {
                    swal("Cancelled", "Your  information is safe :)", "error");
                }
            });
        });
    </script>

    <script type="text/javascript">
      $('document').ready(function () {
        $('.mshit').click(function () {

          console.log(this.id)
          var h = ""

          axios.get('<?php echo e(route('seal04.rejectlog')); ?>',{
            params: {
              id: this.id
            }
          }).then(function (res) {
            console.log(res)
            if (res.data.length) {

              h += "<table class='table'><tr><th>Plan Date</th><th>Submission Date</th><th>Awb awb_details</th><th>Comment</th><th>Comment Date</th><th>Remarks</th></tr>"

              res.data.forEach(function (el) {
                h += `<tr><td>${el.plan_date}</td><td>${el.submission_date}</td><td>${el.awb_details}</td><td>${el.comment}</td><td>${el.comment_date}</td><td>${el.rev_comment}</tr>`
              })
              h += "</table>"
            } else {
              h += "<h2> There is no rejections for this seal</h2>"
            }
             $('.modal-body').html(h);

          })
          .catch(function (err) {

          })

          $('#myModal').modal('show');
        })
      })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>