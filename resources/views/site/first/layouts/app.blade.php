<!DOCTYPE html>
<html lang="en">
<head>
    @php
        session('lang') ?? session()->put('lang', app()->getLocale());
    @endphp


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{ setting('meta_keywords') }}" />
    <meta name="author" content="{{ setting('meta_author') }}" />
    <meta name="description" content="{{ setting('meta_description') }}" />
    <meta property="og:title" content="Industry - Factory & Industrial HTML Template" />
    <meta property="og:description" content="Industry - Factory & Industrial HTML Template" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link href="{{ asset('site/images/india.png') }}" rel="shortcut icon" type="image/x-icon">

    <!-- PAGE TITLE HERE -->
    <title> {{ setting('title') }} </title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ asset('site/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/css-font.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/icon.css') }}" rel="stylesheet">
    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('site/css/master.css') }}" rel="stylesheet">

    @if(session('lang') == 'ar')
        <link href="{{ asset('site/css/style-ar.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/slick.css') }}" />

    @stack('styles')

    <style>
        /* Dropdown Button */
        .dropbtn {
            /*background-color: #E22A6D;*/
            color: white;
            padding: 16px;
            font-size: 14px;
            border: none;
            font-weight: 500 !important;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: fixed;
            background-color: #194788;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: white;

            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #ddd;}

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {display: block;}

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {    background-color: #194788;}
    </style>

    <style>
        /* Fixed/sticky icon bar (vertically aligned 50% from the top of the screen) */
        .icon-bar {
            position: fixed;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        /* Style the icon bar links */
        .icon-bar a {
            display: block;
            text-align: center;
            padding: 16px;
            transition: all 0.3s ease;
            color: white;
            font-size: 20px;
        }

        /* Style the social media icons with color, if you want */
        .icon-bar a:hover {
            background-color: #000;
        }

        .whatsapp {
            background: #46a049 ;
            color: white;
        }

    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('google_analytics') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{ setting('google_analytics') }}');
    </script>

</head>
<body>
    <div class="preloader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <a id="start"></a>

<div class="main-container">


    @yield('content')

    @include('site.first.layouts.footer')

<!-- back to top arrow -->
    <a class="back-to-top inner-link" href="#" data-scroll-class="100vh:active">
        <i class="ti-arrow-up"></i>
    </a>

        <div class="icon-bar">
            <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
        </div>

</div>

<!-- JAVASCRIPT FILES ========================================= -->
    <script src="{{ asset('site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('site/js/granim.min.js') }}"></script>
    <script src="{{ asset('site/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('site/js/aos.js') }}"></script>
    <script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/js/slick.min.js') }}"></script>
    <script src="{{ asset('site/js/scripts.js') }}"></script>
    <script src="{{ asset('site/js/common.js') }}"></script>
    <script src="{{ asset('site/js/page/home.js') }}"></script>
@stack('scripts')

</body>
</html>
