@extends('layouts.masterChange')

@section('content')
    <a class="OrderFinished" href="{{ route('OrderFinished.index') }}">
        {{ __('string.order_finished') }}
    </a>
    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            @include('layouts.masterHandling')
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">{{ __('string.product_image') }}</th>
                                    <th class="product-name">{{ __('string.name') }}</th>
                                    <th class="product-price">{{ __('string.price') }}</th>
                                    <th class="product-quantity">{{ __('string.quantity') }}</th>
                                    <th class="product-total">{{ __('string.total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr class="table-body-row">
                                        <td class="product-remove">
                                            <a href="{{ route('cart.delete', $item->product_id) }}">
                                                <i class="far fa-window-close"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <img src="{{ asset($item->product->imagePath) }}" width="75" height="75"
                                                alt="">
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('products.SinglePage', $item->product->id) }}">
                                                {{ $item->product->name }}
                                            </a>
                                        </td>
                                        <td class="product-price">{{ number_format($item->product->price, 2) }} $</td>
                                        <td class="product-quantity">
                                            <a class="btn btn-sm btn-outline-primary mx-1"
                                                href="{{ route('cart.store', $item->product_id) }}">+</a>
                                            <span class="mx-1">{{ $item->quantity }}</span>
                                            <a class="btn btn-sm btn-outline-danger mx-1"
                                                href="{{ route('cart.Decrease', $item->product_id) }}">−</a>
                                        </td>
                                        <td class="product-total">
                                            {{ number_format($item->product->price * $item->quantity, 2) }} $
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        @php
                            $subtotal = $items->sum(fn($item) => $item->product->price * $item->quantity);
                            $shipping = 45;
                            $total = $subtotal + $shipping;
                        @endphp

                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>{{ __('string.total') }}</th>
                                    <th>{{ __('string.price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>{{ __('string.subtotal') }}:</strong></td>
                                    <td>{{ number_format($subtotal, 2) }} $</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>{{ __('string.shipping') }}:</strong></td>
                                    <td>{{ number_format($shipping, 2) }} $</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>{{ __('string.total') }}:</strong></td>
                                    <td>{{ number_format($total, 2) }} $</td>
                                </tr>
                                <tr class="total-data">
                                    <td colspan="2">
                                        <label for="tip"><strong>{{ __('string.tip') }} :</strong></label>
                                        <input style="width: 100%" type="number" id="tip" class="form-control mt-2"
                                            min="0" step="0.01" placeholder="{{ __('string.enter_tip') }}">
                                    </td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>{{ __('string.final_total') }}:</strong></td>
                                    <td><span id="finalTotal">{{ number_format($total, 2) }}</span> $</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="cart-buttons mt-3">
                            <form method="POST" action="{{ route('Checkout.index') }}">
                                @csrf
                                {{-- Loop through cart items and send product data --}}
                                @foreach ($items as $item)
                                    <input type="hidden" name="products[{{ $loop->index }}][name]"
                                        value="{{ $item->product->name }}">
                                    <input type="hidden" name="products[{{ $loop->index }}][price]"
                                        value="{{ $item->product->price }}">
                                    <input type="hidden" name="products[{{ $loop->index }}][quantity]"
                                        value="{{ $item->quantity }}">
                                @endforeach

                                {{-- Tip and Final Total --}}
                                <input type="hidden" name="tip" id="tipInputHidden" value="0">
                                <input type="hidden" name="final_total" id="finalTotalInputHidden"
                                    value="{{ $total }}">

                                <button style="background: #f28123; border:none; padding: 13px; border-radius: 10px"
                                    type="submit">
                                    {{ __('string.checkout') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript لحساب التيبس -->
    <script>
        const tipInput = document.getElementById('tip');
        const finalTotalSpan = document.getElementById('finalTotal');
        const baseTotal = {{ $total }};
        const tipInputHidden = document.getElementById('tipInputHidden');
        const finalTotalInputHidden = document.getElementById('finalTotalInputHidden');

        tipInput.addEventListener('input', function() {
            const tip = parseFloat(this.value) || 0;
            const finalTotal = baseTotal + tip;

            finalTotalSpan.textContent = finalTotal.toFixed(2);
            tipInputHidden.value = tip.toFixed(2);
            finalTotalInputHidden.value = finalTotal.toFixed(2);
        });
    </script>
@endsection
