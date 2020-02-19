<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- css -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
	<link href="{{ asset('plugins/flexslider/flexslider.css') }}" rel="stylesheet" media="screen" />
	<link href="{{ asset('css/cubeportfolio.min.css" rel="stylesheet') }}" />
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" />

	<!-- Theme skin -->
	<link id="t-colors" href="{{ asset('skins/primary.css') }}" rel="stylesheet" />

	<!-- boxed bg -->
	<!-- <link id="bodybg" href="{{ asset('bodybg/bg3.css') }}" rel="stylesheet" type="text/css" /> -->
</head>
<body>
    <div id="app wrapper">
        @include('partials.nav')
        @yield('content')
        @include('partials.footer')
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/modernizr.custom.js') }}"></script>
	<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugins/flexslider/jquery.flexslider-min.js') }}"></script>
	<script src="{{ asset('plugins/flexslider/flexslider.config.js') }}"></script>
	<script src="{{ asset('js/jquery.appear.js') }}"></script>
	<script src="{{ asset('js/stellar.js') }}"></script>
	<script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/uisearch.js') }}"></script>
	<script src="{{ asset('js/jquery.cubeportfolio.min.js') }}"></script>
	<script src="{{ asset('js/google-code-prettify/prettify.js') }}"></script>
	<script src="{{ asset('js/animate.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
