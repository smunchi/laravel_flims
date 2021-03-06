<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!--Font Awesome css-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!--Magnific css-->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!--Owl-Carousel css-->
    <link rel="stylesheet" href="{{ asset('css/owl_002.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <!--Animate css-->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!--Slicknav css-->
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <!--Site Main Style css-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--Responsive css-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>
<body>
<div id="app">
<!-- Header Area Start -->
<header class="header-area">
    <!-- Main Header Area Start -->
    <div class="main-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="site-logo">
                        <a href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <!-- Responsive Menu Start -->
                    <div class="responsive-menu">
                        <div class="slicknav_menu"></div>
                    </div>
                    <!-- Responsive Menu End -->
                </div>
                <div class="col-lg-6">
                    <div class="mainmenu">
                        <nav>
                            <ul id="responsive_navigation">
                                <!-- Mobile Search Start -->
                                <li class="header-main-search hide-desktop">
                                    <form>
                                        <input type="search" placeholder="Search...">
                                        <button type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </li>
                                <!-- Mobile Search End -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}" role="menuitem" tabindex="-1">home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('flims') }}" role="menuitem" tabindex="-1">Movies</a>
                                </li>
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <div>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header Area End -->

</header>
<!-- Header Area End -->

<!-- Breadcrumb Area End -->
<main class="section_50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="alert-float alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{Session::get('success')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @yield('content')
</main>

<!-- Footer Area Start -->
<footer class="footer-area">
    <div class="footer-top-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="single-footer-widget">
                        <p>10 Manor Farm</p>
                        <p>Fox Road, NORWICH, NR14 7PZ, London</p>
                        <div class="footer-contact">
                            <p>mail us: <a href="#">support@flim.com</a></p>
                            <p>call us: <a href="#">+1 (800) 234-5678</a></p>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-box">
                        <p>{{ date('Y') }} © film. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

</div>
    <!-- Scripts -->
    @yield('route')
    @stack('js')
<!--Jquery js-->
<script src="{{ asset('js/jquery.js') }}"></script>
<!--Jquery-ui js-->
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<!--Bootstrap js-->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!--Owl-Carousel js-->
<script src="{{ asset('js/owl.js') }}"></script>
<!--SlickNav js-->
<script src="{{ asset('js/magnific-popup.js') }}"></script>
<!--Magnific js-->
<script src="{{ asset('js/slicknav.js') }}"></script>
<!--Main js-->
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
