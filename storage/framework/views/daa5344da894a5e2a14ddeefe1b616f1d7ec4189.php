
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
          <img src="/uploads/<?php echo e(Auth::user()->profile->avatar); ?>" class="rounded" alt="User Image">
        </div>
        <div class="info float-left">
          <p>&nbsp; <?php if(!empty(Auth::user())): ?>
            <?php echo e(Auth::user()->name); ?>

            <?php else: ?>
            Admin
            <?php endif; ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php if (app('laratrust')->hasRole('hradmin')) : ?>
        <li>
          <a href="<?php echo e(route('hrdashboard')); ?>">
            <i class="fa fa-edit"></i> <span>HR & Admin</span>
          </a>
        </li>
        <?php endif; // app('laratrust')->hasRole ?>
         <?php if (app('laratrust')->hasRole('dcp')) : ?>
        
        <li class="treeview">
          <a href="<?php echo e(route('dcpdashboard')); ?>">
            <i class="fa fa-edit"></i> <span>Development CP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('dcpsteponeindex')); ?>">Proto Information Entry</a></li>
            <li><a href="<?php echo e(route('dcpsteptwolist')); ?>">Price Matrix</a></li>
            <li><a href="<?php echo e(route('approvedlist')); ?>">Price Matrix Approved List</a></li>
            <li><a href="<?php echo e(route('orderprocess.index')); ?>">Order Receive Process</a></li>
          </ul>
        </li>
        <?php endif; // app('laratrust')->hasRole ?>

        <li>
          <a href="<?php echo e(route('takealeave')); ?>">
            <i class="fa fa-edit"></i> <span>Take a Leave</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('leavehistory')); ?>">
            <i class="fa fa-archive"></i> <span>Your Leave History</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('holidaycalender')); ?>">
            <i class="fa fa-calendar"></i> <span>Holiday Calender</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle"></i> <span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('checkin')); ?>"><i class="fa fa-arrow-up"></i>Check In</a></li>
            <li><a href="<?php echo e(route('checkout')); ?>"><i class="fa fa-arrow-down"></i>Check Out</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Update your profile</a></li>

          </ul>
        </li>
      </ul>
    </section>
  </aside>
