<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Fruitkha - Slider Version</title>

    <!-- favicon -->
    {{-- <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}"> --}}

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/solid.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    {{-- File css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">


</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Main Wrapper -->
    <div id="main-wrapper" class="d-flex">
        <div class="sidebar">
            <!-- Sidebar -->
            {{-- <div class="sidebar-header">
                <div class="lg-logo"><a href="index.html"><img src="./assets/images/dark-logo.png"
                            class="large-logo-img" alt="logo large"></a></div>
                <div class="sm-logo"><a href="index.html"><img src="./assets/images/small-logo.png"
                            class="small-logo-img" alt="logo small"></a></div>
            </div> --}}
            <div class="sidebar-body  custom-scrollbar">
                <ul class="sidebar-menu">
                    <li class="sidebar-label">Main</li>
                    <li><a href="{{ route('admin.panel') }}" class="sidebar-link active"><i
                                class="fa-solid fa-house"></i>
                            <p>Dashboard</p>
                        </a></li>
                    <li><a href="{{ route('admin.product') }}" class="sidebar-link"><i class="fa-solid fa-box"></i>
                            <p>Product</p>
                        </a></li>
                    <li><a href="{{ route('products.create') }}" class="sidebar-link"><i class="fa-solid fa-plus"></i>
                            <p>Add Product</p>
                        </a></li>
                    <li><a href="{{route('admin.orders') }}" class="sidebar-link"><i class="fa-solid fa-cart-shopping"></i>
                            <p>Order</p>
                        </a></li>

                    <li><a href="{{ route('admin.customers') }}" class="sidebar-link"><i class="fa-solid fa-users"></i>
                            <p>Customer</p>
                        </a></li>

                    <li><a href="#" class="sidebar-link submenu-parent"><i class="fa-solid fa-list"></i>
                            <p>Pages <i class="fa-solid fa-chevron-right right-icon"></i></p>
                        </a>
                        <ul class="sidebar-submenu">
                            <!-- الصفحات العامة -->
                            <li><a href="{{ route('homePage') }}" class="submenu-link"><i class="fa-solid fa-house"></i>
                                    <p>Home</p>
                                </a></li>
                            <li><a href="{{ route('categories.index') }}" class="submenu-link"><i
                                        class="fa-solid fa-list"></i>
                                    <p>Categories</p>
                                </a></li>
                            <li><a href="{{ route('about') }}" class="submenu-link"><i
                                        class="fa-solid fa-circle-info"></i>
                                    <p>About</p>
                                </a></li>

                            <!-- المنتجات -->
                            <li><a href="{{ route('products.index') }}" class="submenu-link"><i
                                        class="fa-solid fa-box"></i>
                                    <p>Products</p>
                                </a></li>
                            <li><a href="{{ route('products.create') }}" class="submenu-link"><i
                                        class="fa-solid fa-plus"></i>
                                    <p>Add Product</p>
                                </a></li>

                            <!-- المراجعات -->
                            <li><a href="{{ route('reviews.index') }}" class="submenu-link"><i
                                        class="fa-solid fa-star"></i>
                                    <p>Reviews</p>
                                </a></li>

                            <!-- السلة -->
                            <li><a href="{{ route('cart.index') }}" class="submenu-link"><i
                                        class="fa-solid fa-cart-shopping"></i>
                                    <p>Cart</p>
                                </a></li>


                            <!-- إنهاء الطلب -->
                            <li><a href="{{ route('OrderFinished.index') }}" class="submenu-link"><i
                                        class="fa-solid fa-check"></i>
                                    <p>Order Finished</p>
                                </a></li>


                        </ul>
                    </li>



                </ul>
            </div>
        </div>


        <!-- Header -->
        <div class="header-overlay"></div>
        <div class="header d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="menu-toggle me-3 d-block d-lg-none text-color-1"><span><i
                            class="fa-solid fa-bars font-size-24"></i></span></div>
                <div class="collapse-sidebar me-3 d-none d-lg-block text-color-1"><span><i
                            class="fa-solid font-size-24 fa-bars"></i></span></div>
                <div>
                    <h1 class="page-title">Dashboard</h1>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="d-none d-md-block d-lg-block me-4">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Search anything...">
                    </div>
                </div>
            </div>
        </div>

    </div>




    <!-- Content -->
    <div class="content-wrapper w-75 ">
        @yield('contentAdmin')
    </div>


    </div>



    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/chart.js') }}"></script>
    <script src="{{ asset('assets/js/mainAdmin.js') }}"></script>

</body>

</html>
