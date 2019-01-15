<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('website/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('website/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/responsive.css')}}" rel="stylesheet">
    <title>
        eShopper |
        @yield('title')
    </title>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
     @yield('header')
    
    
</head>
<body>
    <div id="app">
        @include('website.header.header')
        @yield('content')
        
        @include('website.footer.footer')
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('website/js/jquery.js')}}"></script>
	<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('website/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('website/js/price-range.js') }}"></script>
    <script src="{{asset('website/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('website/js/main.js')}}"></script>
    @yield('footer')
</body>
</html>
