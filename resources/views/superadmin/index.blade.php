<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>EWM - Dashboard </title>

	<!-- bootstrap 4.0 -->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

	<!-- font awesome -->
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.css">

	<!-- ionicons -->
	<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.css">

	<!-- theme style -->
	<link rel="stylesheet" href="css/master_style.css">

	<!-- mpt_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="css/skins/_all-skins.css">

	<!-- jvectormap -->
	<link rel="stylesheet" href="assets/vendor_components/jvectormap/jquery-jvectormap.css">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


  </head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="Dashboard.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>EWM</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="uploads/2.png" class="user-image rounded" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <img src="uploads/2.png" class="rounded float-left" alt="User Image">
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">

                  <a href="#" class="btn btn-danger">Sign out</a>

              </li>
            </ul>
          </li>



        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
          <img src="uploads/2.png" class="rounded" alt="User Image">
        </div>
        <div class="info float-left">
          <p>EWM User</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>

      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{route('cmpHome')}}">
            <i class="fa fa-th"></i>
            <span>Compliance</span>
          </a>

        </li>
        <li>
          <a href="{{route('dcpdashboard')}}">
            <i class="fa fa-files-o"></i>
            <span>Development CP</span>

          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Production CP</span>
          </a>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Shipping</span>
          </a>

        </li>
        <li>
          <a href="{{route('adashboard')}}">
            <i class="fa fa-laptop"></i>
            <span>Accounts</span>

          </a>
        </li>
        <li>
          <a href="{{route('hrdashboard')}}">
            <i class="fa fa-edit"></i> <span>HR & Admin</span>
          </a>
        </li>

      </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">90</span>
              <span class="info-box-text">Protopack</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-thumbsup"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">41,410</span>
              <span class="info-box-text">Development</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-12 col-md-6 col-lg-3">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion ion-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">37987</span>
              <span class="info-box-text">Shipped</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">17</span>
              <span class="info-box-text">User</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Status</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn  btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-wrench"></i>
				  </button>

                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 col-lg-8">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2017 - 30 Jul, 2017</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-12 col-lg-4">
                  <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Products Under Development</span>
                    <span class="progress-number"><b>140</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 70%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Products Under Production</span>
                    <span class="progress-number"><b>300</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 75%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Products Under Shipment</span>
                    <span class="progress-number"><b>400</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 50%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Send Inquiries</span>
                    <span class="progress-number"><b>425</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 85%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-6 col-sm-3">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$3,249.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-6 col-sm-3">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 70%</span>
                    <h5 class="description-header">$2,376.90</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-6 col-sm-3">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 80%</span>
                    <h5 class="description-header">$1,795.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-6 col-sm-3">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 28%</span>
                    <h5 class="description-header">1800</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-lg-12 col-xl-8">




          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Shipment Status</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-responsive no-margin">
                  <thead>
                  <tr>
                    <th>Order No</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">ODN84952</a></td>
                    <td>Country Rose</td>
                    <td><span class="label bg-purple">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#7460ee" data-height="20">09-09-2017</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">ODN84845</a></td>
                    <td>Jane Norman</td>
                    <td><span class="label bg-yellow">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">09-12-2017</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">ODN84982</a></td>
                    <td>Austin Reed</td>
                    <td><span class="label bg-green">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#41b613" data-height="20">02-06-2017</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">ODN85452</a></td>
                    <td>One Valley</td>
                    <td><span class="label bg-blue">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#389af0" data-height="20">10-09-2017</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">ODN94992</a></td>
                    <td>James Pringle Knitwear</td>
                    <td><span class="label bg-red">Canceled</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">09-09-2017</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">ODN98952</a></td>
                    <td>James Pringle Prem</td>
                     <td><span class="label bg-green">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#41b613" data-height="20">09-09-2017</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">ODN88989</a></td>
                    <td>Greg Norman</td>
                    <td><span class="label bg-purple">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#7460ee" data-height="20">09-09-2017</div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->


          <!-- /.info-box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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



	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.js"></script>

	<!-- jQuery UI 1.11.4 -->
	<script src="assets/vendor_components/jquery-ui/jquery-ui.js"></script>

	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>

	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.0 -->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>

	<!-- Sparkline -->
	<script src="assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>

	<!-- jvectormap  -->
	<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

	<!-- SlimScroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- ChartJS -->
	<script src="assets/vendor_components/chart-js/chart.js"></script>

	<!-- mpt_admin App -->
	<script src="js/template.js"></script>


	<!-- EWM_admin dashboard demo (This is only for demo purposes) -->
	<script src="js/pages/dashboard2.js"></script>

	<!-- mpt_admin for demo purposes -->
	<script src="js/demo.js"></script>


</body>


</html>
