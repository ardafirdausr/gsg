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
		@include('layouts.header')
		<section id="content">
			@yield('content')
		</section>
		@include('layouts.footer')
	</div>

	<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
<style>
#content{
	min-height: calc(100vh - 62px);
}
#navbar{
	box-shadow: 2px 2px 3px #eaeaea;
}
</style>
</html>
