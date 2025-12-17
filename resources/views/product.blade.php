@extends('layouts.masterChange')

@section('content')
    <!-- products -->

    @include('layouts.masterHandling')

    <div class="product-section mt-150 mb-150">
        <div class="container">

            @if (!isset($AllCategory))
                <a href="{{ route('categories.index') }}" class="cart-btn">
                    <i class="fas fa-shopping-cart"></i> {{ __('string.browse_categories') }}
                </a>
            @endif

            <h1 class="mb-30 text-center">
                {{ $categoryName }}
            </h1>

            <div class="row product-lists">
                @if (isset($AllCategory))
                    @foreach ($AllCategory as $category)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="{{ route('categories.index') }}">
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
                @endif

                @if (isset($AllCategory))
                    <div class="col-lg-12 product-section mt-100 mb-150 text-center">
                        <h1><span class="orange-text">{{ __('string.all') }}</span> {{ __('string.product') }}</h1>
                    </div>
                @endif

                @foreach ($products->shuffle()->take(30) as $product)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('products.SinglePage', $product->id) }}">
                                    <img src="{{ asset($product->imagePath) }}" alt="{{ $product->name }}" width="200">
                                </a>
                            </div>
                            @if (app()->getLocale() == 'ar')
                                <h3>{{ $product->name_ar }}</h3>
                            @else
                                <h3>{{ $product->name }}</h3>
                            @endif

                            <p class="product-price">{{ $product->price }}</p>

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

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap custom-pagination">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end products -->
@endsection
