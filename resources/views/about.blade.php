@extends('layouts.masterChange')

@section('content')
    <!-- featured section -->
    <div class="feature-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="featured-text">
                        <h2 class="pb-3">{{ __('string.why') ?? 'Why' }} <span class="orange-text">Fruitkha</span></h2>
                        <div class="row">
                            <!-- مميزات -->
                            @foreach ([['icon' => 'fas fa-shipping-fast', 'title' => __('string.home_delivery') ?? 'Home Delivery'], ['icon' => 'fas fa-money-bill-alt', 'title' => __('string.best_price') ?? 'Best Price'], ['icon' => 'fas fa-briefcase', 'title' => __('string.custom_box') ?? 'Custom Box'], ['icon' => 'fas fa-sync-alt', 'title' => __('string.quick_refund') ?? 'Quick Refund']] as $feature)
                                <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                    <div class="list-box d-flex">
                                        <div class="list-icon">
                                            <i class="{{ $feature['icon'] }}"></i>
                                        </div>
                                        <div class="content">
                                            <h3>{{ $feature['title'] }}</h3>
                                            <p>{{ __('string.feature_text') ?? 'sit voluptatem accusantium dolore mque laudantium...' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end featured section -->

    <!-- shop banner -->
    <section class="shop-banner">
        <div class="container">
            <h3>{{ __('string.december_sale') }} <br> {{ __('string.big_discount') }}</h3>
            <div class="sale-percent"><span>{{ __('string.sale_label') }} <br> {{ __('string.upto_discount') }}</span>
            </div>
            <a href="{{ route('products.index') }}" class="cart-btn btn-lg">{{ __('string.shop_now') }}</a>
        </div>
    </section>
    <!-- end shop banner -->

    <!-- team section -->
    <div class="mt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>{{ __('string.our_team') ?? 'Our' }} <span
                                class="orange-text">{{ __('string.team') ?? 'Team' }}</span></h3>
                        <p>{{ __('string.team_text') ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ([['name' => 'Jimmy Doe', 'role' => __('string.farmer') ?? 'Farmer', 'bg' => 'team-bg-1'], ['name' => 'Marry Doe', 'role' => __('string.farmer') ?? 'Farmer', 'bg' => 'team-bg-2'], ['name' => 'Simon Joe', 'role' => __('string.farmer') ?? 'Farmer', 'bg' => 'team-bg-3']] as $member)
                    <div class="col-lg-4 col-md-6 {{ $loop->last ? 'offset-md-3 offset-lg-0' : '' }}">
                        <div class="single-team-item">
                            <div class="team-bg {{ $member['bg'] }}"></div>
                            <h4>{{ $member['name'] }} <span>{{ $member['role'] }}</span></h4>
                            <ul class="social-link-team">
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end team section -->

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        @foreach ($Reviews as $Review)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img style="height: 90px;" src="{{ asset($Review->imagePath) }}"
                                        alt="{{ $Review->name }}" />
                                </div>
                                <div class="client-meta">
                                    @if (app()->getLocale() == 'ar' && !empty($Review->name_ar))
                                        <h3>{{ $Review->name_ar }} <span>{{ $Review->email }}</span></h3>
                                    @else
                                        <h3>{{ $Review->name }} <span>{{ $Review->email }}</span></h3>
                                    @endif

                                    <p class="testimonial-body">
                                        @if (app()->getLocale() == 'ar' && !empty($Review->massage_ar))
                                            {{ $Review->massage_ar }}
                                        @else
                                            {{ $Review->massage }}
                                        @endif
                                    </p>
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
@endsection
