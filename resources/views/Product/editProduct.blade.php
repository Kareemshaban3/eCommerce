@extends('layouts.masterChange')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{ __('string.edit_product_title') }}</span></h3>
                        <p>{{ __('string.edit_product_description') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-lg-0">
                    <div class="contact-form">
                        <form method="POST" action="{{ route('products.update', $currentProduct->id) }}" id="updateProduct"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- ID --}}
                            <div class="form-group">
                                <input type="text" readonly class="form-control" required placeholder="Id" name="id"
                                    id="id" value="{{ $currentProduct->id }}">
                            </div>

                            {{-- Name --}}
                            <div class="form-group group2">
                                <label for="name">{{ __('string.name') }}</label>
                                <input type="text" class="form-control" required placeholder="{{ __('string.name') }}"
                                    name="name" id="name" value="{{ $currentProduct->name }}">
                            </div>

                            {{-- Name_ar --}}
                            <div class="form-group group2">
                                <label for="name_ar">{{ __('string.name_ar') }}</label>
                                <input type="text" class="form-control" required placeholder="{{ __('string.name_ar') }}"
                                    dir="rtl" name="name_ar" id="name_ar" value="{{ $currentProduct->name_ar }}">
                            </div>

                            {{-- Price & Quantity --}}
                            <div class="form-group group3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="price">{{ __('string.price') }}</label>
                                        <input type="number" class="form-control w-100" required
                                            placeholder="{{ __('string.price') }}" name="price" id="price"
                                            value="{{ $currentProduct->price }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="quantity">{{ __('string.quantity') }}</label>
                                        <input type="number" class="form-control w-100" required
                                            placeholder="{{ __('string.quantity') }}" name="quantity" id="quantity"
                                            value="{{ $currentProduct->quantity }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="form-group Select">
                                <label for="category_id"
                                    style="font-weight: bold;">{{ __('string.select_category') }}</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    <option value="" disabled {{ $currentProduct->category_id ? '' : 'selected' }}>
                                        {{ __('string.select_category') }}
                                    </option>
                                    @foreach ($categoryName as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $currentProduct->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Image Upload --}}
                            <div class="form-group">
                                <label for="imagePath" style="font-weight: bold;">{{ __('string.upload_image') }}</label>
                                <input type="file" name="imagePath" id="imagePath" class="form-control" accept="image/*">
                                @if ($currentProduct->imagePath)
                                    <img src="{{ asset('storage/' . $currentProduct->imagePath) }}" alt="Current Image"
                                        class="mt-2" style="max-width:150px;">
                                @endif
                            </div>

                            {{-- Description --}}
                            <div class="form-group group4">
                                <label for="description">{{ __('string.description') }}</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="5"
                                    placeholder="{{ __('string.description') }}">{{ $currentProduct->description }}</textarea>
                            </div>

                            {{-- Description_ar --}}
                            <div class="form-group group4">
                                <label for="description_ar">{{ __('string.description_ar') }}</label>
                                <textarea class="form-control" name="description_ar" id="description_ar" cols="30" rows="5"
                                    placeholder="{{ __('string.description_ar') }}">{{ $currentProduct->description_ar }}</textarea>
                            </div>

                            {{-- Submit --}}
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" value="{{ __('string.update_product') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
