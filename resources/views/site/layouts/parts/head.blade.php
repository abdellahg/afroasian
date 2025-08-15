<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">

<head>
    
    <title>{{getSetting()}} @yield('title') </title>
    <!-- SEO Meta -->
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="author" content="Abdellah Gaballah" site="https://abdellahgaballah.com">
    @yield('seo')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- end SEO Meta -->
    <!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/img/logo-invert.png') }}">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/mystyles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/custom/custom_style.css') }}">
    
    @yield('style')
    
    <script src="{{ asset('assets/site/js/modernizr.js') }}"></script>
    
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCR5PFyvraK8Cqbu-vQu7UAR-NkcABHNuw&amp;sensor=false&amp;libraries=places"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143063304-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-143063304-1');
    </script>

</head>

<body>