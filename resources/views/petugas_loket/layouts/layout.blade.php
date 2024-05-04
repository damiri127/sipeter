<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SIPETER - SP2TP CANTIGI INDRAMAYU</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset("layout_asset/examples/assets/img/logo_1.png")}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset("layout_asset/examples/assets/js/plugin/webfont/webfont.min.js")}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset("layout_asset/examples/assets/css/fonts.min.css")}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset("layout_asset/examples/assets/css/bootstrap.min.css")}}">
	<link rel="stylesheet" href="{{asset("layout_asset/examples/assets/css/atlantis.min.css")}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset("layout_asset/examples/assets/css/demo.css")}}">
</head>
<body>
	<div class="wrapper">
		{{-- Logo and Navbar Header --}}
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="#" class="logo">
					<img src="{{ asset("layout_asset/examples/assets/img/logo_header.png") }}" alt="navbar brand" class="navbar-brand" >
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			@include('petugas_loket.layouts.navbar')
		</div>

		<!-- Sidebar -->
		@include('petugas_loket.layouts.sidebar')
		<!-- End Sidebar -->

		<!-- Main content -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					@yield('content')
				</div>
			</div>
		</div>
		<!-- End Main content -->
	</div>

	

	{{-- JAVASCRIPT --}}
	@include('petugas_loket.layouts.javascript')
</body>
</html>