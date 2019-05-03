<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Scripts -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/app.js') }}" defer></script>

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
		<link rel="stylesheet" href="{{ asset("css/dashboard.css") }}">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset("css/admin.css") }}">
	</head>
	<body>
		<div id="app">
			<nav class="navbar navbar-dark bg-primary fixed-top flex-md-nowrap p-0 shadow">
				<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/admin">Dashboard</a>
				<ul class="navbar-nav px-3">
					<li class="nav-item text-nowrap">
						<a class="nav-link" href="{{ route("logout") }}">Sign out</a>
					</li>
				</ul>
			</nav>
			<div class="container-fluid">
				<div class="row">
					<nav class="col-md-2 d-none d-md-block bg-light sidebar">
						<div class="sidebar-sticky">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link" href="https://getbootstrap.com/docs/4.3/examples/dashboard/#">
									<i class="fas fa-tachometer-alt"></i>
									Dashboard
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="https://getbootstrap.com/docs/4.3/examples/dashboard/#">
									<i class="fas fa-truck-loading"></i>
									Orders
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{ route("category.index") }}">
										<i class="fas fa-birthday-cake"></i>
										Categories
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{ route("product.index") }}">
										<i class="fas fa-coins"></i>
										Products
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{ route("post.index") }}">
										<i class="far fa-copy"></i>
										Posts
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{ route("slider.index") }}">
										<i class="fas fa-braille"></i>
										Sliders
									</a>
								</li>
							</ul>
						</div>
					</nav>
					<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
						@include('partials.breadcrumbs')
						@yield('content')
					</main>
				</div>
			</div>
		</div>
	</body>
</html>