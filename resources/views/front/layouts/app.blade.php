<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> فلذات | الرئيسية</title>
    <link href="{{ asset('front-assets/kids/images/logo(فلذات).PNG') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('front-assets/vendor/css/bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/vendor/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/vendor/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/vendor/css/cubeportfolio.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/kids/css/tooltipster.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/vendor/css/revolution-settings.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/kids/css/revolution/navigation.css') }}">
    <link href="{{ asset('front-assets/vendor/css/LineIcons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-assets/kids/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/kids/css/style.css') }}">

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;600&display=swap" rel="stylesheet"> -->
    @yield('styles')
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">
<!--PreLoader-->
<div class="loader">
    <div class="loader-spinner"></div>
</div>
<!--PreLoader Ends-->

@include('front.includes.header')

@yield('content')

@include('front.includes.footer')

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('front-assets/vendor/js/bundle.min.js') }}"></script>
<!--to view items on reach-->
<script src="{{ asset('front-assets/vendor/js/jquery.appear.js') }}"></script>
<!--Owl Slider-->
<script src="{{ asset('front-assets/vendor/js/owl.carousel.min.js') }}"></script>
<!--Parallax Background-->
<script src="{{ asset('front-assets/vendor/js/parallaxie.min.js') }}"></script>
<!--Cubefolio Gallery-->
<script src="{{ asset('front-assets/vendor/js/jquery.cubeportfolio.min.js') }}"></script>
<!--Fancybox js-->
<script src="{{ asset('front-assets/vendor/js/jquery.fancybox.min.js') }}"></script>
<!--wow js-->
<script src="{{ asset('front-assets/vendor/js/wow.min.js') }}"></script>
<!--number counters-->
<script src="{{ asset('front-assets/kids/js/jquery-countTo.js') }}"></script>
<!--tooltip js-->
<script src="{{ asset('front-assets/kids/js/tooltipster.min.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ asset('front-assets/vendor/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('front-assets/vendor/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- SLIDER REVOLUTION EXTENSIONS -->
<script src="{{ asset('front-assets/vendor/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('front-assets/vendor/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('front-assets/vendor/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('front-assets/vendor/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('front-assets/vendor/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('front-assets/vendor/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('front-assets/vendor/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('front-assets/vendor/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('front-assets/vendor/js/extensions/revolution.extension.video.min.js') }}"></script>
<!-- font awesome -->
<script src="https://kit.fontawesome.com/385d561a40.js" crossorigin="anonymous"></script>
<!--custom functions and script-->
<script src="{{ asset('front-assets/kids/js/functions.js') }}"></script>
@yield('scripts')
</body>

</html>
