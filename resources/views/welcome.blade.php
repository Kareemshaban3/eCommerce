@extends('layouts.master')
@section('content')
    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>{{ __('string.free_shipping') }}</h3>
                            <p>{{ __('string.free_shipping_text') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>{{ __('string.support') }}</h3>
                            <p>{{ __('string.support_text') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>{{ __('string.refund') }}</h3>
                            <p>{{ __('string.refund_text') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end features list section -->

    <div class="product-section mt-150 mb-150">
        <div class="container">
            @include('layouts.masterHandling')
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{ __('string.some_products') }}</span></h3>
                        <p>{{ __('string.some_products_text') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories->slice(2, 3) as $category)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('products.index', $category->id) }}">
                                    <img src="{{ asset($category->imagePath) }}" alt="{{ $category->name }}"
                                        style="max-height: 250px !important; min-height: 250px !important;">
                                </a>
                            </div>

                            @if (app()->getLocale() == 'ar')
                                <h3>{{ $category->name_ar }}</h3>
                                <p>{{ $category->description_ar }}</p>
                            @else
                                <h3>{{ $category->name }}</h3>
                                <p>{{ $category->description }}</p>
                            @endif

                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12 text-center">
                    <a href="{{ route('products.index') }}" class="boxed-btn">{{ __('string.more_products') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- cart banner section -->
    <section class="cart-banner pt-100 pb-100">
        <div class="container">
            <div class="row clearfix">
                <!--Image Column-->
                <div class="image-column col-lg-6">
                    <div class="image">
                        <div class="price-box">
                            <div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> <br />
                                    {{ __('string.off_per_kg') }}
                                </span>
                            </div>
                        </div>
                        <img src="assets/img/a.jpg" alt="" />
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
                    <h3><span class="orange-text">{{ __('string.deal_of_month') }}</span></h3>
                    <h4>{{ __('string.hikan_strawberry') }}</h4>
                    <div class="text">
                        {{ __('string.deal_description') }}
                    </div>
                    <!--Countdown Timer-->
                    <div class="time-counter">
                        <div class="time-countdown clearfix" data-countdown="2020/2/01">
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>{{ __('string.days') }}</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>{{ __('string.hours') }}</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>{{ __('string.mins') }}</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>{{ __('string.secs') }}</div>
                            </div>
                        </div>
                    </div>
                    <a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i>
                        {{ __('string.add_to_cart') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->


    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        @foreach ($Reviews as $Review)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="{{ asset($Review->imagePath) }}" alt="{{ $Review->name }}" />
                                </div>
                                <div class="client-meta">
                                    <h3>{{ $Review->name }} <span>{{ $Review->email }}</span></h3>
                                    <p class="testimonial-body">{{ $Review->massage }}</p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->

    <!-- advertisement section -->
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg">
                        <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-text">
                        <p class="top-sub">{{ __('string.since_year') }}</p>
                        <h2>{{ __('string.we_are_fruitkha') }}</h2>
                        <p>{{ __('string.about_paragraph_1') }}</p>
                        <p>{{ __('string.about_paragraph_2') }}</p>
                        <a href="about.html" class="boxed-btn mt-4">{{ __('string.know_more') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end advertisement section -->

    <!-- shop banner -->
    <section class="shop-banner">
        <div class="container">
            <h3>
                {{ __('string.december_sale') }} <br />
                {{ __('string.big_discount') }}
            </h3>
            <div class="sale-percent">
                <span>{{ __('string.sale_label') }} <br /> {{ __('string.upto_discount') }}</span>
            </div>
            <a href="shop.html" class="cart-btn btn-lg">{{ __('string.shop_now') }}</a>
        </div>
    </section>
    <!-- end shop banner -->

    <!-- latest news -->
    <div class="latest-news pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{ __('string.our_news') }}</span></h3>
                        <p>{{ __('string.our_news_paragraph') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html">
                            <div class="latest-news-bg news-bg-1"></div>
                        </a>
                        <div class="news-text-box">
                            <h3>
                                <a href="single-news.html">{{ __('string.news_title_1') }}</a>
                            </h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i>
                                    {{ __('string.blog_meta_admin_label') }}</span>
                                <span class="date"><i class="fas fa-calendar"></i>
                                    {{ __('string.blog_meta_date_sample') }}</span>
                            </p>
                            <p class="excerpt">{{ __('string.news_excerpt') }}</p>
                            <a href="single-news.html" class="read-more-btn">{{ __('string.read_more') }} <i
                                    class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html">
                            <div class="latest-news-bg news-bg-2"></div>
                        </a>
                        <div class="news-text-box">
                            <h3>
                                <a href="single-news.html">{{ __('string.news_title_2') }}</a>
                            </h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i>
                                    {{ __('string.blog_meta_admin_label') }}</span>
                                <span class="date"><i class="fas fa-calendar"></i>
                                    {{ __('string.blog_meta_date_sample') }}</span>
                            </p>
                            <p class="excerpt">{{ __('string.news_excerpt') }}</p>
                            <a href="single-news.html" class="read-more-btn">{{ __('string.read_more') }} <i
                                    class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-latest-news">
                        <a href="single-news.html">
                            <div class="latest-news-bg news-bg-3"></div>
                        </a>
                        <div class="news-text-box">
                            <h3>
                                <a href="single-news.html">{{ __('string.news_title_3') }}</a>
                            </h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i>
                                    {{ __('string.blog_meta_admin_label') }}</span>
                                <span class="date"><i class="fas fa-calendar"></i>
                                    {{ __('string.blog_meta_date_sample') }}</span>
                            </p>
                            <p class="excerpt">{{ __('string.news_excerpt') }}</p>
                            <a href="single-news.html" class="read-more-btn">{{ __('string.read_more') }} <i
                                    class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="news.html" class="boxed-btn">{{ __('string.more_news') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->
@endsection
