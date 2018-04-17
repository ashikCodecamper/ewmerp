
	<!-- bootstrap 4.0 -->
	<link rel="stylesheet" href="<?php echo e(asset("assets/vendor_components/bootstrap/dist/css/bootstrap.css")); ?>" >

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="<?php echo e(asset("assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css")); ?>">

	<!-- font awesome -->
	<link rel="stylesheet" href="<?php echo e(asset("assets/vendor_components/font-awesome/css/font-awesome.css")); ?>">

	<!-- ionicons -->
	<link rel="stylesheet" href="<?php echo e(asset("assets/vendor_components/Ionicons/css/ionicons.css")); ?>">

	<!-- theme style -->
	<link rel="stylesheet" href="<?php echo e(asset("css/master_style.css")); ?>">

	<!-- mpt_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo e(asset("css/skins/_all-skins.css")); ?>">

	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo e(asset("assets/vendor_components/jvectormap/jquery-jvectormap.css")); ?>">
  <link rel="stylesheet" href="<?php echo e(asset("css/parsley.css")); ?>">
  <link rel="stylesheet" href="<?php echo e(asset("css/toastr.css")); ?>">
  <link rel="stylesheet" href="<?php echo e(asset("assets/vendor_components/sweetalert/sweetalert.css")); ?>">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<!-- jQuery 3 -->
<script src="<?php echo e(asset("assets/vendor_components/jquery/dist/jquery.js")); ?>"></script>

	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo e(asset("assets/vendor_components/jquery-ui/jquery-ui.js")); ?>"></script>
    <?php echo $__env->yieldContent('stylesheet'); ?>
    </head>
