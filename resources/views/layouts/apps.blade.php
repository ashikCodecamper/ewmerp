@include('_inc.header')
@include('_inc.stylesheet')
@include('_inc.navbar')    
@include('_inc.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('module-name')
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>Copyright &copy; 2017 <a href="https://www.softbd.com">Soft Tech Innovation Ltd</a>. All Rights Reserved.
  </footer>

 
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	  
	@include('_inc.script')

	
</body>


</html>
