


	<!-- popper -->
	<script src="{{asset("assets/vendor_components/popper/dist/popper.min.js")}}"></script>
	<script src="{{asset("js/parsley.min.js")}}"></script>
	<!-- Bootstrap 4.0 -->
	<script src="{{asset("assets/vendor_components/bootstrap/dist/js/bootstrap.js")}}"></script>

	<!-- FastClick -->
	<script src="{{asset("assets/vendor_components/fastclick/lib/fastclick.js")}}"></script>

	<!-- Sparkline -->
	<script src="{{asset("assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js")}}"></script>

	<!-- jvectormap  -->
	<script src="{{asset("assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
	<script src="{{asset("assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>

	<!-- SlimScroll -->
	<script src="{{asset("assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js")}}"></script>

	<!-- ChartJS -->
	<script src="{{asset("assets/vendor_components/chart-js/chart.js")}}"></script>

	<!-- mpt_admin App -->
	<script src="{{asset("js/template.js")}}"></script>


	<!-- EWM_admin dashboard demo (This is only for demo purposes) -->
	<script src="{{asset("js/pages/dashboard2.js")}}"></script>

	<!-- mpt_admin for demo purposes -->
	<script src="{{asset("js/demo.js")}}"></script>
	<script src="{{asset("js/pages/toastr.js")}}"></script>
	<script src="{{asset("assets/vendor_components/sweetalert/sweetalert.min.js")}}"></script>

    @yield('javascript')
	<script>
	$('.select2').select2({
		theme: "bootstrap4"
	});
		@if(Session::has('success'))
			toastr.success("{{Session::get('success')}}")
		@endif
	</script>
