<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Fruitkha - Slider Version</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    {{-- File css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/fileCss.css') }}">

    {{-- Css Direction --}}
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    @endif
</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" id="sticker">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item">
                                    <a href="{{ route('homePage') }}">{{ __('string.home') }}</a>
                                </li>
                                <li><a href="{{ route('about') }}">{{ __('string.about') }}</a></li>
                                <li><a href="{{ route('products.index') }}">{{ __('string.product') }}</a></li>
                                <li><a href="{{ route('categories.index') }}">{{ __('string.category') }}</a></li>
                                <li><a href="{{ route('reviews.index') }}">{{ __('string.opinions') }}</a></li>

                                @auth
                                    @if (Auth::user()->is_admin)
                                        <li class="nav-item admin-menu">
                                            <a href="#"
                                                class="nav-link adminA text-white">{{ __('string.admin_page') }}</a>
                                            <div class="admin-submenu">
                                                <a
                                                    href="{{ route('products.create') }}">{{ __('string.add_product') }}</a>
                                                <a
                                                    href="{{ route('admin.index') }}">{{ __('string.admin_controller') }}</a>
                                                <a href="{{ route('OrderFinished.index') }}">{{ __('string.orders') }}</a>
                                            </div>
                                        </li>
                                    @endif
                                @endauth

                                @guest
                                    @if (Route::has('login'))
                                        <li><a href="{{ route('login') }}">{{ __('string.Login') }}</a></li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">{{ __('string.Register') }}</a></li>
                                    @endif
                                @else
                                    <li class="current-lists-item">
                                        <a href="#" title="Your Name">{{ Auth::user()->name }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('string.logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest



                                <!-- Icons -->
                                <li>
                                    <div class="header-icons">

                                        @auth

                                            @if (Auth::user()->is_admin)
                                                <a href="{{ route('admin.panel') }}" title="Admin Panel">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                </a>
                                            @endif

                                        @endauth


                                        <a class="shopping-cart" href="{{ route('cart.index') }}">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                        <a class="mobile-hide search-bar-icon" href="#">
                                            <i class="fas fa-search"></i>
                                        </a>


                                        <a>
                                            <form action="{{ route('locale.switch', app()->getLocale()) }}"
                                                method="GET" id="locale-form">
                                                <select name="locale"
                                                    onchange="document.getElementById('locale-form').action='{{ url('lang') }}/'+this.value; document.getElementById('locale-form').submit();"
                                                    class="locale-select">
                                                    <option value="ar"
                                                        {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>Ar
                                                    </option>
                                                    <option value="en"
                                                        {{ app()->getLocale() == 'en' ? 'selected' : '' }}>En
                                                    </option>
                                                </select>
                                            </form>
                                        </a>

                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>{{ __('string.search_for') }} oakkbaui</h3>
                            <form action="{{ route('products.search') }}" method="GET">
                                <input type="text" name="searchKey" placeholder="{{ __('string.keywords') }}">
                                <button type="submit">{{ __('string.search') }} <i
                                        class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->


    <!-- breadcrumb-section -->
    @include('Component.Breadcrumb')
    <!-- end breadcrumb section -->

    {{-- Content --}}


    @yield('content')


    {{-- EndContent --}}

    {{-- Footer --}}

    <!-- end logo carousel -->

    {{-- Footer --}}

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/1.png') }}" alt="Logo 1">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/2.png') }}" alt="Logo 2">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/3.png') }}" alt="Logo 3">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/4.png') }}" alt="Logo 4">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/5.png') }}" alt="Logo 5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->

    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">{{ __('string.about_us') }}</h2>
                        <p>{{ __('string.about_text') }}</p>
                    </div>
                </div>

                <!-- Get in Touch -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">{{ __('string.get_in_touch') }}</h2>
                        <ul>
                            <li>{{ __('string.address') }}</li>
                            <li>{{ __('string.email') }}</li>
                            <li>{{ __('string.phone') }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Pages -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">{{ __('string.pages') }}</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">{{ __('string.home') }}</a></li>
                            <li><a href="{{ route('about') }}">{{ __('string.about') }}</a></li>
                            <li><a href="{{ route('products.index') }}">{{ __('string.shop') }}</a></li>
                            <li><a href="{{ url('news.html') }}">{{ __('string.news') }}</a></li>
                            <li><a href="{{ url('contact.html') }}">{{ __('string.contact') }}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Subscribe -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">{{ __('string.subscribe') }}</h2>
                        <p>{{ __('string.subscribe_text') }}</p>
                        <form action="#">
                            <input type="email" placeholder="{{ __('string.email_label') }}">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>
                        Copyrights &copy; 2025 -
                        <a href="tel:+2001030707552">Kareem Shaban</a>, All Rights Reserved.<br>
                        Distributed By - <a href="tel:+2001030707552">Kareem</a>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->
    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
