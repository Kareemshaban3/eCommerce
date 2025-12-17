@extends('layouts.masterChange')

@section('content')
    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            @include('layouts.masterHandling')
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">{{ __('string.all') }}</li>
                            @foreach ($AllCategory as $category)
                                @if (app()->getLocale() == 'ar')
                                    <li data-filter=".{{ $category->id }}">{{ $category->name_ar }}</li>
                                @else
                                    <li data-filter=".{{ $category->id }}">{{ $category->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($AllProduct as $product)
                    <div class="col-lg-4 col-md-6 text-center {{ $product->category_id }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('products.SinglePage', $product->id) }}">
                                    <img style="min-height: 250px !important; max-height: 250px !important;"
                                        src="{{ asset($product->imagePath) }}" alt="">
                                </a>
                            </div>

                            @if (app()->getLocale() == 'ar')
                                <h3>{{ $product->name_ar }}</h3>
                            @else
                                <h3>{{ $product->name }}</h3>
                            @endif


                            <p class="product-price"><span>{{ __('string.price') }} :</span> {{ $product->price }}</p>
                            <p class="product-price"><span>{{ __('string.quantity') }} :</span> {{ $product->quantity }}
                            </p>

                            <div class="btn-layout">
                                <a href="{{ route('cart.store', $product->id) }}" class="unified-btn cart-btn">
                                    <i class="fas fa-shopping-cart"></i> {{ __('string.add_to_cart') }}
                                </a>

                                @auth
                                    @if (Auth::user()->is_admin)
                                        <a href="{{ route('products.edit', $product->id) }}" class="unified-btn edit-btn">
                                            <i class="fas fa-edit"></i> {{ __('string.edit_product') }}
                                        </a>

                                        <a href="{{ route('products.delete', $product->id) }}" class="unified-btn remove-btn">
                                            <i class="fas fa-trash"></i> {{ __('string.remove_product') }}
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- end products -->
@endsection
