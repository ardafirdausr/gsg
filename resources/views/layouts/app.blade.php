<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>{{ config('app.name', 'Galeri Seni Gajahyana') }}</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<nav id="navbar" class="navbar navbar-expand-md">
				<div class="container-fluid">
					{{-- Brand --}}
					<a class="navbar-brand" href="#">
						<img src="/assets/GSG-logoText2.svg" width="200px" class="d-inline-block align-top" alt="">
					</a>

					{{-- Collapse Button --}}
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					{{-- Navigation Item --}}
					<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
						<ul class="navbar-nav">
							<li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" >
								<a class="nav-link" href={{ route('home')}}>Home <span class="sr-only">(current)</span></a>
							</li>
							@guest
							<li class="nav-item {{ Route::currentRouteName() == 'login' ? 'active' : '' }}">
								<a class="nav-link" href={{ route('login')}}>Login<span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item {{ Route::currentRouteName() == 'register' ? 'active' : '' }}">
								<a class="nav-link" href={{ route('register')}}>Register<span class="sr-only">(current)</span></a>
							</li>
							@else
							<li class="nav-item {{ Route::currentRouteName() == 'register' ? 'active' : '' }}">
								<a class="nav-link" href={{ route('manage.contents.index')}}>Kelola Halaman<span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{auth()->user()->name}}
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Profil</a>
									<a class="dropdown-item" href="#">Ubah Password</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										Logout
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
									</form>
								</div>
							</li>
							@endguest
						</ul>
					</div>
				</div>
		</nav>
		<div id="content">
			@yield('content')
		</div>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
