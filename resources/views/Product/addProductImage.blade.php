@extends('layouts.masterChange')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{ __('string.add') }}</span> {{ __('string.images') }}</h3>
                        <p>{{ __('string.add_images_description') }}</p>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('products.StoreImage') }}" id="StoreImage" enctype="multipart/form-data">
                @csrf

                {{-- Image Upload --}}
                <div class="form-group">
                    <label for="photo" style="font-weight: bold;">{{ __('string.upload_image') }}</label>
                    <input type="file" name="photo" id="photo" class="form-control" style="padding: 5px !important"
                        accept="image/*" required>
                </div>

                <input type="hidden" name="ProductId" id="ProductId" value="{{ $currentProduct->id }}">

                {{-- Submit --}}
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="{{ __('string.add_image') }}">
                </div>
            </form>

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center mt-5">
                    <div class="section-title">
                        <h3>{{ __('string.images') }}</h3>
                    </div>
                </div>
                <div class="col-lg-12 mb-3">
                    <div class="">
                        <a href="" class="product-image-link">
                            <img src="{{ asset($currentProduct->imagePath) }}" alt="{{ __('string.product_image') }}">
                        </a>
                    </div>
                </div>
                <div class="row">
                    @foreach ($AllProductImage as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm position-relative">
                                <!-- صورة المنتج -->
                                <a href="#" class="d-block">
                                    <img style="min-height: 300px !important ; max-height: 300px !important; width: 700px !important;"
                                        src="{{ asset($item->imagePath) }}" class="card-img-top img-fluid rounded"
                                        alt="{{ __('string.product_image') }}">
                                </a>

                                <!-- زر الحذف -->
                                <a href="{{ route('products.remove', $item->id) }}"
                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2"
                                    title="{{ __('string.remove_image') }}">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
