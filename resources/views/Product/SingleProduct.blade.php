@extends('layouts.masterChange')

@section('content')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img style="padding: 80px" src="{{ asset($ItemProduct->imagePath) }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        @if (app()->getLocale() == 'ar' && !empty($ItemProduct->name_ar))
                            <h3>{{ $ItemProduct->name_ar }}</h3>
                        @else
                            <h3>{{ $ItemProduct->name }}</h3>
                        @endif

                        <p class="single-product-pricing">
                            <span>{{ __('string.off_per_kg') }}</span> {{ $ItemProduct->price }} $
                        </p>

                        @if (app()->getLocale() == 'ar' && !empty($ItemProduct->description_ar))
                            <p>{{ $ItemProduct->description_ar }}</p>
                        @else
                            <p>{{ $ItemProduct->description }}</p>
                        @endif

                        <div class="single-product-form">
                            <form action="{{ route('cart.addCartFromSinglePage', $ItemProduct->id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" min="1" value="1"
                                    placeholder="{{ __('string.quantity') }}">
                                <br>
                                <button type="submit" class="BtnAddButton">
                                    <i class="fas fa-shopping-cart"></i> {{ __('string.add_to_cart') }}
                                </button>
                            </form>

                            <p><strong>{{ __('string.category') }}: </strong>{{ $categoryName }}, Organic</p>

                            <h5>{{ __('string.views') ?? 'View' }} : {{ $ItemProduct->views }}</h5>
                        </div>

                        <h4>{{ __('string.share') ?? 'Share' }}:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{ __('string.more') ?? 'More' }}</span>
                            {{ __('string.photo') ?? 'Photo' }}</h3>
                        <p>{{ __('string.some_pictures') ?? 'Some Picture For Product' }}</p>
                    </div>
                </div>
                @if ($itemProductImage->count() > 1)
                    @foreach ($itemProductImage as $image)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset($image->imagePath) }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif($itemProductImage->count() === 1)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="#"><img src="{{ asset($itemProductImage->first()->imagePath) }}"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- end more products -->

    <!-- related products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{ __('string.related') ?? 'Related' }}</span>
                            {{ __('string.product') }}</h3>
                        <p>{{ __('string.related_text') ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($AllProducts as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('products.SinglePage', $product->id) }}">
                                    <img src="{{ asset($product->imagePath) }}" alt="">
                                </a>
                            </div>
                            @if (app()->getLocale() == 'ar' && !empty($product->name_ar))
                                <h3>{{ $product->name_ar }}</h3>
                            @else
                                <h3>{{ $product->name }}</h3>
                            @endif

                            <p class="product-price"><span>{{ __('string.off_per_kg') }}</span> {{ $product->price }}$
                            </p>
                            <a href="{{ route('cart.store', $product->id) }}" class="unified-btn cart-btn">
                                <i class="fas fa-shopping-cart"></i> {{ __('string.add_to_cart') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap custom-pagination">
                        {{ $AllProducts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end related products -->
@endsection
