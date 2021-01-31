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
	<script src="{{ asset('js/app.js') }}"></script>
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		@include('layouts.header')
		<div id="content">
			@yield('content')
		</div>
		@guest
			@include('guest.chats.chat-panel')
		@endguest
		@include('layouts.footer')
	</div>
	<!-- Scripts -->
</body>
<style>
#content{
	margin-top: 62px;
	min-height: calc(100vh - 62px);
}
#navbar{
	box-shadow: 2px 2px 3px #eaeaea;
}
</style>
</html>
