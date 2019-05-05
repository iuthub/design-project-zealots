<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="https://api-maps.yandex.ru/2.1/?apikey=53aec716-0db9-4fbd-9ddc-ab87990ae22f
&lang=en_US" type="text/javascript"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-dark bg-dark navbar-expand-md navbar-light navbar-laravel fixed-top">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'BrandShop') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="{{ route("aboutus") }}" class="nav-link">About us</a>
						</li>
						<li class="nav-item">
							<a href="{{ route("contact") }}" class="nav-link">Contact us</a>
						</li>
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						
						@if (isset($cart))
							<li class="nav-item">
								<a href="{{ route("cart.index") }}" class="nav-link cart">
									{{ count($cart->products) }} <i class="fas fa-shopping-cart"></i> 
								</a>
							</li>
							<li class="nav-item">
								<h4 class="nav-link" style="color: #fff; font-weight: bold;">CALL: +998 (97) 777-22-77</h4>
							</li>
						@endif

						<!-- Authentication Links -->
						@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main>
			@yield('content')
		</main>

		<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
						<div id="map" style="width: 100%; height: 400px"></div>
					</div>
					<div class="col-lg-6 f-contact">
						<h4 style="color: #000; font-weight: bold;">CALL: +998 (97) 777-22-77</h4>
						<h2>Our company is here!</h2>
						<p>We are really old and honored company!. If you need to buy electronic products or want to sell them you must come to us!</p>
						<p>We will wait for you 24/7 11/2.</p>
						<p>Find us on map below!</p>
						<p>Or contact us thorugh Contact us page.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam est neque sequi odit, dolor illum pariatur atque, inventore nobis molestiae natus, ratione debitis ducimus. Nobis quasi, temporibus eligendi doloribus neque!</p>
					</div>
				</div>
			</div>
		</footer>

		<script type="text/javascript">
			ymaps.ready(init);
			var myMap, myPlacemark;

			function init(){
				myMap = new ymaps.Map("map", {
					center: [41.338646, 69.334777],
					zoom: 16
				});
				myPlacemark = new ymaps.Placemark([41.338646, 69.334777], { hintContent: 'Inha!'});
				myMap.geoObjects.add(myPlacemark);
			}
		</script>
	</div>
</body>
</html>
