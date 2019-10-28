<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Attributes Demo</title>

    <link href="{{ url('/assets/demo/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ url('/assets/demo/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ url('/assets/demo/css/app.css') }}" rel="stylesheet" media="screen">
</head>
<body>
    <div class="flux clearfix">
        <div class="flux--1"></div>
        <div class="flux--2"></div>
        <div class="flux--3"></div>
        <div class="flux--4"></div>
        <div class="flux--5"></div>
    </div>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('demo.home') }}">Attributes</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item{!! request()->is('demo') ? ' active"' : null !!}"><a class="nav-link" href="{{ route('demo.home') }}">Home</a></li>
                    <li class="nav-item{!! request()->is('demo/patients*') ? ' active"' : null !!}"><a class="nav-link" href="{{ route('demo.patients.index') }}">Patients</a></li>
                    <li class="nav-item{!! request()->is('demo/attributes*') ? ' active"' : null !!}"><a class="nav-link" href="{{ route('demo.attributes.index') }}">Attributes</a></li>
                </ul>

                <ul class="navbar-nav navbar-right">
                    <li class="nav-item"><a class="nav-link" href="https://cartalyst.com/manual/attributes" target="_blank">Manual</a></li>
                </ul>
            </div>
        </nav>

        @include('demo/partials.notifications')

        @yield('content')
    </div>

    <script src="{{ url('/assets/demo/js/jquery.min.js') }}"></script>
    <script src="{{ url('/assets/demo/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/assets/demo/js/scripts.js') }}"></script>

    <script type="text/javascript">
        $('.tip').tooltip();
    </script>

    @yield('scripts')

    <!-- Google Analytics -->
    <script>
        window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
        ga('create', 'UA-26550564-1', 'auto');
        ga('send', 'pageview');
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>
    <!-- End Google Analytics -->
</body>
</html>
