<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>{!! $logo->name ?? 'Dhukuchhu Construction' !!} - {!! $logo->slogan ?? '' !!} | {!! $pageTitle !!}</title>


	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('storage/' . $logo->favicon) }}">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href="{{ asset('backend') }}/assets/css/icons.css" rel="stylesheet">

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- CSS -->
	<link href="{{ asset('backend') }}/assets/css/dashboard.css" rel="stylesheet" type="text/css">

	<!-- Data table css -->
	<link href="{{ asset('backend') }}/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

	<!-- Tabs CSS -->
	<link href="{{ asset('backend') }}/assets/plugins/tabs/style.css" rel="stylesheet" type="text/css">

	<!-- jvectormap CSS -->
    <link href="{{ asset('backend') }}/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

	<!-- Custom scroll bar css-->
	<link href="{{ asset('backend') }}/assets/plugins/customscroll/jquery.mCustomScrollbar.css" rel="stylesheet" />

	<!-- Sidemenu Css -->
	<link href="{{ asset('backend') }}/assets/plugins/toggle-sidebar/css/sidemenu.css" rel="stylesheet">
	
	<link href="{{ asset('backend') }}/assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">
	@yield('backendtopcss')
</head>
@auth
<body class="app sidebar-mini rtl">
	<div id="global-loader" ></div>
	<div class="page">
		<div class="page-main">
			<!-- Sidebar menu-->
			@include('user.layouts.sidemenu')
			<!-- Sidebar menu-->

			<!-- app-content-->
			<div class="app-content ">
				<div class="side-app">
					<div class="main-content">
						<!-- Top navbar -->
						@include('user.layouts.navbar')
						<!-- Top navbar-->

						<!-- Page content -->
						<div class="container-fluid pt-8">
                        @yield('backendcontent')
						<!-- Footer -->
                        @include('user.layouts.footer')
							<!-- Footer -->
						</div>
					</div>
				</div>
			</div>
			<!-- app-content-->
		</div>
	</div>
	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

	<!-- Scripts -->

	<!-- Core -->
	<script src="{{ asset('backend') }}/assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="{{ asset('backend') }}/assets/js/popper.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Echarts JS -->
	<script src="{{ asset('backend') }}/assets/plugins/chart-echarts/echarts.js"></script>

	<!-- Fullside-menu Js-->
	<script src="{{ asset('backend') }}/assets/plugins/toggle-sidebar/js/sidemenu.js"></script>

	<!-- Custom scroll bar Js-->
	<script src="{{ asset('backend') }}/assets/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- peitychart -->
	<script src="{{ asset('backend') }}/assets/plugins/peitychart/jquery.peity.min.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/peitychart/peitychart.init.js"></script>

	<!-- Vector Plugin -->
	<script src="{{ asset('backend') }}/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/jvectormap/gdp-data.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/jvectormap/jquery-jvectormap-au-mill.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/jvectormap/jquery-jvectormap-ca-lcc.js"></script>
	<script src="{{ asset('backend') }}/assets/js/dashboard2map.js"></script>

		<!-- Data tables -->
	<script src="{{ asset('backend') }}/assets/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>

	<!-- JS -->
	<script src="{{ asset('backend') }}/assets/js/custom.js"></script>
	<script src="{{ asset('backend') }}/assets/js/dashboard-sales.js"></script>

	<script>
		$(function(e) {
			$('#event').DataTable();
			$('#product').DataTable();
		} );

	</script>
	@yield('backendbottomscript')
</body>
@else
<body class="bg-gradient-primary">
	<div id="app">
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100 p-5">

					@yield('backendcontent')
					
				</div>
			</div>
		</div>
	</div>
	<!-- Ansta Scripts -->
	<!-- Core -->
	<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>


@endauth

</html>