<!DOCTYPE html>
<html>
	<head>

		<meta charset="UTF-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel demo - @yield('title')</title>
		<link type="text/css" rel="stylesheet" href="{{ URL::asset('sass/app.scss') }}">
		<link type="text/css" rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
	</head>
	<body>
		@include('partials.header')
		
		<div class="container">
			@if(Session::has('success'))
				<div class="alert alert-success">{{ Session::get('success')}}</div>
			@endif
			@if(Session::has('error'))
				<div class="alert alert-danger">{{ Session::get('error') }}</div>
			@endif
		</div>
		<section class="container">
			@yield('content')
		</section>
		
		<script src="{{ URL::asset('js/app.js') }}"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="{{ URL::asset('js/bootstrap.js') }}"></script>
	</body>
</html>