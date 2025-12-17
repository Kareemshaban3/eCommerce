@extends('layouts.masterChange')

@section('content')
    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <!-- Billing Address -->
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{ __('string.billing_address') }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form id="store-checkout" action="{{ route('checkouts.store') }}"
                                                method="POST">
                                                @csrf
                                                <p><input type="text" required id="name" name="name"
                                                        placeholder="{{ __('string.name') }}"></p>
                                                <p><input type="email" required id="email" name="email"
                                                        placeholder="{{ __('string.email') }}"></p>
                                                <p><input type="text" required id="address" name="address"
                                                        placeholder="{{ __('string.address') }}"></p>
                                                <p><input type="tel" required id="phone" name="phone"
                                                        placeholder="{{ __('string.phone') }}"></p>
                                                <p>
                                                    <textarea name="note" cols="30" rows="10" placeholder="{{ __('string.note_placeholder') }}"></textarea>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Details -->
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            {{ __('string.card_details') }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">

                                            @if (!$items || count($items) === 0)
                                                <p>{{ __('string.your_card_empty') }}</p>
                                            @else
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="cart-table-wrap">
                                                            <table class="cart-table">
                                                                <thead class="cart-table-head">
                                                                    <tr class="table-head-row">
                                                                        <th>{{ __('string.product_image') }}</th>
                                                                        <th>{{ __('string.name') }}</th>
                                                                        <th>{{ __('string.price') }}</th>
                                                                        <th>{{ __('string.quantity') }}</th>
                                                                        <th>{{ __('string.total') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($items as $item)
                                                                        <tr class="table-body-row">
                                                                            <td><img src="{{ asset($item->product->imagePath) }}"
                                                                                    width="75" height="75" alt=""></td>
                                                                            <td>
                                                                                <a href="{{ route('products.SinglePage', $item->product->id) }}">
                                                                                    {{ $item->product->name }}
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                {{ number_format($item->product->price, 2) }} $
                                                                            </td>
                                                                            <td>
                                                                                <span class="mx-1">{{ $item->quantity }}</span>
                                                                            </td>
                                                                            <td>
                                                                                {{ number_format($item->product->price * $item->quantity, 2) }} $
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end accordion -->
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>{{ __('string.your_order_details') }}</th>
                                    <th>{{ __('string.price') }}</th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body">
                                @php $subtotal = 0; @endphp
                                @foreach ($products as $product)
                                    @php
                                        $lineTotal = $product['price'] * $product['quantity'];
                                        $subtotal += $lineTotal;
                                    @endphp
                                    <tr>
                                        <td>{{ $product['name'] }} x {{ $product['quantity'] }}</td>
                                        <td>${{ number_format($lineTotal, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody class="checkout-details">
                                <tr>
                                    <td>{{ __('string.subtotal') }}</td>
                                    <td>${{ number_format($subtotal, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('string.shipping') }}</td>
                                    <td>$45.00</td>
                                </tr>
                                <tr>
                                    <td>{{ __('string.tip') }}</td>
                                    <td>${{ number_format($tip, 2) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>{{ __('string.total') }}</strong></td>
                                    <td><strong>${{ number_format($finalTotal, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <a type="submit"
                            onclick="event.preventDefault(); document.getElementById('store-checkout').submit();"
                            class="boxed-btn mt-3">{{ __('string.place_order') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection
