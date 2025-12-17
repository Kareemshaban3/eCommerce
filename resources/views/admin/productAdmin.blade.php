@extends('admin.layouts.masterAdmin')

@section('contentAdmin')
<div class="container-fluid mt-5">


        @extends('layouts.masterHandling')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">{{ __('string.product') }} {{ __('string.list') ?? 'List' }}</h2>
        <a href="{{ route('products.create') }}" class="btn btn-warning">
            <i class="fas fa-cart-plus"></i> {{ __('string.add_product') }}
        </a>
    </div>

    <table id="myTable" class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
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
                        <img src="{{ asset($product->imagePath) }}" alt="Product Image" width="100" height="100" class="img-thumbnail">
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> {{ __('string.edit_product') }}
                        </a>

                        <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> {{ __('string.remove_product') }}
                            </button>
                        </form>

                        <a href="{{ route('products.addImage', $product->id) }}" class="btn btn-sm btn-success">
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
        $('#myTable').DataTable({
            responsive: true,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json"
            }
        });
    });
</script>
@endsection
