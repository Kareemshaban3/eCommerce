@extends('layouts.masterChange')

@section('content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container-fluid">
            <div class="row">

                <!-- Guest User: View Their Own Orders -->
                @guest
                    <div class="col-lg-10 offset-lg-1">
                        <div class="checkout-accordion-wrap">
                            <div class="accordion" id="accordionGuest">

                                @forelse($orders as $index => $order)
                                    <div class="card single-accordion">
                                        <div class="card-header" id="headingGuest{{ $index }}">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#collapseGuest{{ $index }}"
                                                    aria-expanded="false"
                                                    aria-controls="collapseGuest{{ $index }}">
                                                    {{ __('string.order_finished') }} #{{ $loop->iteration }}
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseGuest{{ $index }}" class="collapse"
                                            aria-labelledby="headingGuest{{ $index }}"
                                            data-parent="#accordionGuest">
                                            <div class="card-body">
                                                <!-- Customer Info -->
                                                <div class="billing-address-form">
                                                    <form>
                                                        <p><input type="text" readonly value="{{ $order->name }}" placeholder="{{ __('string.name') }}"></p>
                                                        <p><input type="email" readonly value="{{ $order->email }}" placeholder="{{ __('string.email') }}"></p>
                                                        <p><input type="text" readonly value="{{ $order->address }}" placeholder="{{ __('string.address') }}"></p>
                                                        <p><input type="tel" readonly value="{{ $order->phone }}" placeholder="{{ __('string.phone') }}"></p>
                                                        <p><input type="text" readonly value="{{ $order->created_at->format('d/m/Y H:i') }}" placeholder="{{ __('string.created_at') }}"></p>

                                                        @if($order->note)
                                                            <p><textarea readonly cols="30" rows="5" placeholder="{{ __('string.note_placeholder') }}">{{ $order->note }}</textarea></p>
                                                        @else
                                                            <p class="text-muted">{{ __('string.no_note') }}</p>
                                                        @endif
                                                    </form>
                                                </div>

                                                <h3 class="text-center my-4 orange-text">{{ __('string.orders') }}</h3>

                                                <!-- Order Items Table -->
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
                                                            @forelse($order->checkOutDetails as $item)
                                                                <tr class="table-body-row">
                                                                    <td><img src="{{ asset($item->product->imagePath) }}" width="75" height="75" alt="{{ $item->product->name }}"></td>
                                                                    <td><a href="{{ route('products.SinglePage', $item->product->id) }}">{{ $item->product->name }}</a></td>
                                                                    <td>{{ number_format($item->product->price, 2) }} $</td>
                                                                    <td>{{ $item->quantity }}</td>
                                                                    <td>{{ number_format($item->product->price * $item->quantity, 2) }} $</td>
                                                                </tr>
                                                            @empty
                                                                <tr><td colspan="5" class="text-center">{{ __('string.no_products') }}</td></tr>
                                                            @endforelse

                                                            @if($order->checkOutDetails->isNotEmpty())
                                                                <tr class="table-total-row">
                                                                    <td colspan="4" class="text-end fw-bold">{{ __('string.all_total') }}</td>
                                                                    <td class="fw-bold text-success fs-5">
                                                                        {{ number_format($order->checkOutDetails->sum(fn($i) => $i->product->price * $i->quantity), 2) }} $
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-5">
                                        <p>{{ __('string.no_orders_yet') }}</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endguest

                <!-- Admin User: View All Orders -->
                @auth
                    @if(Auth::user()->is_admin)
                        <div class="col-lg-12">
                            <h2 class="text-center mb-5">{{ __('string.all') }} {{ __('string.order_finished') }}</h2>

                            <div class="checkout-accordion-wrap">
                                <div class="accordion" id="accordionAdmin">

                                    @forelse($ordersAdmin as $index => $order)
                                        <div class="card single-accordion mb-3">
                                            <div class="card-header" id="headingAdmin{{ $index }}">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapseAdmin{{ $index }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapseAdmin{{ $index }}">
                                                        {{ __('string.order_finished') }} #{{ $loop->iteration }} - {{ $order->name }} ({{ $order->created_at->format('d/m/Y') }})
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseAdmin{{ $index }}" class="collapse"
                                                aria-labelledby="headingAdmin{{ $index }}"
                                                data-parent="#accordionAdmin">
                                                <div class="card-body">
                                                    <!-- Same content as guest, but with better total highlight for admin -->
                                                    <div class="billing-address-form">
                                                        <form>
                                                            <p><input type="text" readonly value="{{ $order->name }}"></p>
                                                            <p><input type="email" readonly value="{{ $order->email }}"></p>
                                                            <p><input type="text" readonly value="{{ $order->address }}"></p>
                                                            <p><input type="tel" readonly value="{{ $order->phone }}"></p>
                                                            <p><input type="text" readonly value="{{ $order->created_at->format('d/m/Y H:i') }}"></p>
                                                            @if($order->note)
                                                                <p><textarea readonly cols="30" rows="5">{{ $order->note }}</textarea></p>
                                                            @else
                                                                <p class="text-muted">{{ __('string.no_note') }}</p>
                                                            @endif
                                                        </form>
                                                    </div>

                                                    <h3 class="text-center my-4 orange-text">{{ __('string.orders') }}</h3>

                                                    <div class="cart-table-wrap">
                                                        <table class="cart-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ __('string.product_image') }}</th>
                                                                    <th>{{ __('string.name') }}</th>
                                                                    <th>{{ __('string.price') }}</th>
                                                                    <th>{{ __('string.quantity') }}</th>
                                                                    <th>{{ __('string.total') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse($order->checkOutDetails as $item)
                                                                    <tr>
                                                                        <td><img src="{{ asset($item->product->imagePath) }}" width="75" height="75"></td>
                                                                        <td><a href="{{ route('products.SinglePage', $item->product->id) }}">{{ $item->product->name }}</a></td>
                                                                        <td>{{ number_format($item->product->price, 2) }} $</td>
                                                                        <td>{{ $item->quantity }}</td>
                                                                        <td>{{ number_format($item->product->price * $item->quantity, 2) }} $</td>
                                                                    </tr>
                                                                @empty
                                                                    <tr><td colspan="5">{{ __('string.no_products') }}</td></tr>
                                                                @endforelse

                                                                @if($order->checkOutDetails->isNotEmpty())
                                                                    <tr class="table-total-row">
                                                                        <td colspan="4" class="text-end fw-bold fs-5">{{ __('string.all_total') }}</td>
                                                                        <td class="fw-bold text-success fs-4">
                                                                            {{ number_format($order->checkOutDetails->sum(fn($i) => $i->product->price * $i->quantity), 2) }} $
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-info text-center">
                                            {{ __('string.no_orders_found') }}
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    @endif
                @endauth

                <!-- Back to Cart Button -->

            </div>
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('cart.index') }}" class="btn btn-warning btn-lg CartInOrderFinished">
                {{ __('string.cart') }} <i class="fas fa-shopping-cart ml-2"></i>
            </a>
        </div>
    </div>
@endsection
