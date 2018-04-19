
<?php $__env->startSection('module-name','Employee Dashboard'); ?>
<?php $__env->startSection('content'); ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="<?php echo e(route('profile.index')); ?>">Employee List</a></h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                   <a href="<?php echo e(route('profile.create')); ?>"><button class="btn btn-primary">Add new Employee</button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <form action="/search" method="POST" role="search">
          			   <?php echo e(csrf_field()); ?>

            			<div class="input-group">
            				<input type="text" class="form-control" name="q"
            					placeholder="Search users">
            					<button type="submit" class="btn btn-primary btn-lg">
            						<i class="fa fa-search"></i>
            					</button>
            				</span>
            			</div>
		            </form>
  <?php if(isset($users)): ?>
              <table class="table table-hover table-responsive">
                <tbody><tr>
                  <th>Picture</th>
                  <th>Employee Name</th>
                  <th>Designation</th>
                  <th>Email Address</th>
                  <th>Phone Number</th>
                  <th>Blood Group</th>
                  <th>Action</th>
                </tr>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
        <td>
          <?php if($user->profile !=null): ?>
            <img src="/uploads/<?php echo e($user->profile->avatar); ?>" height="40px" width="40px">
          <?php else: ?>
            <img src="/uploads/2.png" height="40px" width="40px">
          <?php endif; ?>

        </td>
        <td><a href="javascript:void(0)"><?php echo e($user->name); ?></a></td>
        <td>
          <?php if($user->profile !=null): ?>
            <?php echo e($user->profile->designation); ?>

          <?php endif; ?>

        </td>
        <td><?php echo e($user->email); ?></td>
        <td> <?php if($user->profile): ?>
             <?php echo e($user->profile->mobile_number); ?>

          <?php endif; ?></td>
        <td>
          <?php if($user->profile): ?>
             <?php echo e($user->profile->blood_group); ?>

          <?php endif; ?>
        </td>
        <td>
         <a href="<?php echo e(route('profile.edit',$user->id)); ?>"> <label class="label label-danger">Edit</label></a>
         <a href="<?php echo e(route('profile.show',$user->id)); ?>"> <span class="label label-success">Details</span></a>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody></table>
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  <?php echo e($users->links()); ?>

                  </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <?php endif; ?>
          <div class="container">
              <?php if(isset($details)): ?>
                  <p> The Search results for your query <b> <?php echo e($query); ?> </b> are :</p>
              <h2>Employee details</h2>
              <table class="table table-hover table-responsive">
                <tbody><tr>
                  <th>Picture</th>
                  <th>Employee Name</th>
                  <th>Designation</th>
                  <th>Email Address</th>
                  <th>Phone Number</th>
                  <th>Blood Group</th>
                  <th>Action</th>
                </tr>
    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
        <td>
          <?php if($user->profile !=null): ?>
            <img src="/uploads/<?php echo e($user->profile->avatar); ?>" height="40px" width="40px">
          <?php else: ?>
            <img src="/uploads/2.png" height="40px" width="40px">
          <?php endif; ?>

        </td>
        <td><a href="javascript:void(0)"><?php echo e($user->name); ?></a></td>
        <td>
          <?php if($user->profile !=null): ?>
            <?php echo e($user->profile->designation); ?>

          <?php endif; ?>

        </td>
        <td><?php echo e($user->email); ?></td>
        <td> <?php if($user->profile): ?>
             <?php echo e($user->profile->mobile_number); ?>

          <?php endif; ?></td>
        <td>
          <?php if($user->profile): ?>
             <?php echo e($user->profile->blood_group); ?>

          <?php endif; ?>
        </td>
        <td>
         <a href="<?php echo e(route('profile.edit',$user->id)); ?>"> <label class="label label-danger">Edit</label></a>
         <a href="<?php echo e(route('profile.show',$user->id)); ?>"> <span class="label label-success">Details</span></a>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody></table>
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  <?php echo e($details->links()); ?>

                  </div>
              </div>
  <?php else: ?>
  <h4><?php if(isset($message)): ?><?php echo e($message); ?><?php endif; ?></h4>
  <?php endif; ?>
          </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>