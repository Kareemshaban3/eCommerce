@extends('layouts.masterChange')

@section('content')
    {{-- Start Add review --}}
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text"></span> {{ __('string.add_review') }}</h3>
                        <p>{{ __('string.add_review_text') }}</p>
                    </div>
                </div>
            </div>

            @include('layouts.masterHandling')

            <div class="row">
                <div class="col-lg-12 mb-lg-0">
                    <div class="contact-form">
                        <form method="POST" action="{{ route('reviews.store') }}" id="Review"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Name --}}
                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="{{ __('string.name') }}"
                                    name="name" id="name" value="{{ old('name') }}">
                            </div>

                            {{-- Email --}}
                            <div class="form-group">
                                <input type="email" class="form-control" required placeholder="{{ __('string.email') }}"
                                    name="email" id="email" value="{{ old('email') }}">
                            </div>

                            {{-- Image Upload --}}
                            <div class="form-group">
                                <label for="imagePath" class="fw-bold">{{ __('string.upload_image') }}</label>
                                <input type="file" name="imagePath" id="imagePath" class="form-control" accept="image/*"
                                    required>
                            </div>

                            {{-- Message --}}
                            <div class="form-group">
                                <textarea class="form-control" name="massage" id="massage" cols="30" rows="5"
                                    placeholder="{{ __('string.message') }}">{{ old('massage') }}</textarea>
                            </div>

                            {{-- Submit --}}
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" value="{{ __('string.save_review') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Add review --}}

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
@endsection
