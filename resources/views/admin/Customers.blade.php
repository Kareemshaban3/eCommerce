@extends('admin.layouts.masterAdmin')

@section('contentAdmin')
    <!-- Main Content -->
    <div class="main-content">


        @extends('layouts.masterHandling')
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">Customers</h5>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Orders</th>
                                <th>Spent</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($CustomerOrders as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://placehold.co/40" class="rounded-circle me-2" alt="Customer"
                                                width="40" height="40">
                                            <div>{{ $item->user->name }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>{{ $item->checkOutDetails->sum('quantity') }}</td>
                                    <td>${{ number_format($item->checkOutDetails->sum('price'), 2) }}</td>
                                    <td>
                                        @if ($item->user->is_online)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Offline</span>
                                        @endif
                                    </td>


                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
