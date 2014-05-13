<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Attributes Demo</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/demo.css">

</head>
<body>
		<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<div class="flux clearfix">
			<div class="flux--1"></div>
			<div class="flux--2"></div>
			<div class="flux--3"></div>
			<div class="flux--4"></div>
			<div class="flux--5"></div>
		</div>


		<div class="container">
			<nav class="navbar xnavbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ URL::to('/') }}">Cart</a>
				</div>

				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li {{ URL::current() === URL::to('') ? 'class="active"' : null }}><a href="{{URL::to('/')}}">Home</a></li>
						<li {{ URL::current() === URL::to('patients') ? 'class="active"' : null }}><a href="{{URL::to('patients')}}">Patients</a></li>
						<li {{ URL::current() === URL::to('attributes') ? 'class="active"' : null }}><a href="{{URL::to('attributes')}}">Attributes</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="https://cartalyst.com/manual/attributes">Manual</a></li>
					</ul>
				</div>
			</nav>

			@include('partials/notifications')

			@yield('content')

		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

		@section('scripts')
		@show

	</body>
	</html>
