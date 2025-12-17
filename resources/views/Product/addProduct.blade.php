@extends('layouts.masterChange')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{ __('string.add') }}</span> {{ __('string.product') }}</h3>
                        <p>{{ __('string.add_product_description') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-lg-0">
                    <div class="contact-form">

                        @include('layouts.masterHandling')

                        <form method="POST" action="{{ route('products.store') }}" id="storProduct"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Name --}}
                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="{{ __('string.name') }}"
                                    name="name" id="name" value="{{ old('name') }}">
                            </div>

                            {{-- Name_ar --}}
                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="{{ __('string.name_ar') }}"
                                    dir="rtl" name="name_ar" id="name_ar" value="{{ old('name_ar') }}">
                            </div>

                            {{-- Price & Quantity --}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input style="width: 100% !important" type="number" required class="form-control"
                                            placeholder="{{ __('string.price') }}" name="price" id="price"
                                            value="{{ old('price') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" style="width: 100% !important" required class="form-control"
                                            placeholder="{{ __('string.quantity') }}" name="quantity" id="quantity"
                                            value="{{ old('quantity') }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Image Upload --}}
                            <div class="form-group">
                                <label for="imagePath" style="font-weight: bold;">{{ __('string.upload_image') }}</label>
                                <input type="file" name="imagePath" id="imagePath" style="padding: 5px !important"
                                    class="form-control" accept="image/*" required>
                            </div>

                            {{-- Category --}}
                            <div class="form-group">
                                <label for="category_id"
                                    style="font-weight: bold;">{{ __('string.select_category') }}</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    <option value="" disabled selected>{{ __('string.choose_category') }}</option>
                                    @foreach ($CategoryName as $Category)
                                        @if (app()->getLocale() == 'en')
                                            <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                                        @else
                                            <option value="{{ $Category->id }}">{{ $Category->name_ar }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                                    placeholder="{{ __('string.description') }}" required>{{ old('description') }}</textarea>
                            </div>

                            {{-- Description_ar --}}
                            <div class="form-group">
                                <textarea class="form-control" name="description_ar" id="description_ar" cols="30" rows="10"
                                    placeholder="{{ __('string.description_ar') }}" required>{{ old('description_ar') }}</textarea>
                            </div>

                            {{-- Submit --}}
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" value="{{ __('string.save_product') }}">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
