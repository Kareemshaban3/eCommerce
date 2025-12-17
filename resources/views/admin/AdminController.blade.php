@extends('layouts.masterChange')

@section('content')
    @extends('layouts.masterHandling')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.dataTables.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.min.js"></script>

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">{{ __('string.product') }} {{ __('string.list') ?? 'List' }}</h2>
            <a href="{{ route('products.create') }}" class="btn btn-warning" style="background-color: #f28123; color: #fff; ">
                <i class="fas fa-cart-plus"></i> {{ __('string.add_product') }}
            </a>
        </div>

        <table id="myTable" class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('string.name') }}</th>
                    <th>{{ __('string.price') }}</th>
                    <th>{{ __('string.quantity') }}</th>
                    <th>{{ __('string.product_image') }}</th>
                    <th>{{ __('string.actions') ?? 'Actions' }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if (app()->getLocale() == 'ar' && !empty($product->name_ar))
                                {{ $product->name_ar }}
                            @else
                                {{ $product->name }}
                            @endif
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <img src="{{ asset($product->imagePath) }}" alt="" width="100" height="100">
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="editCart-btn">
                                <i class="fas fa-edit"></i> {{ __('string.edit_product') }}
                            </a>
                            <a href="{{ route('products.delete', $product->id) }}" class="delete-btn">
                                <i class="fas fa-trash"></i> {{ __('string.remove_product') }}
                            </a>
                            <a href="{{ route('products.addImage', $product->id) }}" class="add-btn">
                                <i class="fas fa-image"></i> {{ __('string.add_images') ?? 'Add Images' }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable');
        });
    </script>

    <style>
        body {
            background-color: #051922;
            color: #fff;
            font-family: "Segoe UI", sans-serif;
        }
    </style>
@endsection
