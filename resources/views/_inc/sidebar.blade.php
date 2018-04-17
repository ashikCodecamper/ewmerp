
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
          <img src="/uploads/{{Auth::user()->profile->avatar}}" class="rounded" alt="User Image">
        </div>
        <div class="info float-left">
          <p>&nbsp; @if(!empty(Auth::user()))
            {{Auth::user()->name}}
            @else
            Admin
            @endif
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        @role('hradmin')
        <li>
          <a href="{{route('hrdashboard')}}">
            <i class="fa fa-edit"></i> <span>HR & Admin</span>
          </a>
        </li>
        @endrole
        @role('employee')
        <li>
          <a href="{{route('takealeave')}}">
            <i class="fa fa-edit"></i> <span>Take a Leave</span>
          </a>
        </li>
        <li>
          <a href="{{route('leavehistory')}}">
            <i class="fa fa-archive"></i> <span>Your Leave History</span>
          </a>
        </li>
        <li>
          <a href="{{route('holidaycalender')}}">
            <i class="fa fa-calendar"></i> <span>Holiday Calender</span>
          </a>
        </li>
        @endrole
         @role('dcp')
        {{--  <li>
          <a href="{{route('dcpdashboard')}}">
            <i class="fa fa-edit"></i> <span>Development CP</span>
          </a>
        </li>  --}}
        <li class="treeview">
          <a href="{{route('dcpdashboard')}}">
            <i class="fa fa-edit"></i> <span>Development CP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('dcpsteponeindex')}}">Proto Information Entry</a></li>
            <li><a href="{{route('dcpsteptwolist')}}">Price Matrix</a></li>
            <li><a href="{{route('approvedlist')}}">Price Matrix Approved List</a></li>
            <li><a href="{{route('orderprocess.index')}}">Order Receive Process</a></li>
          </ul>
        </li>
        @endrole
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle"></i> <span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-arrow-up"></i>Check In</a></li>
            <li><a href="#"><i class="fa fa-arrow-down"></i>Check Out</a></li>
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
