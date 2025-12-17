
@extends('admin.layouts.masterAdmin')


@section('contentAdmin')
    <!-- Main Content -->
    <div class="main-content">


        @extends('layouts.masterHandling')

        <div class="row mt-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card stat-card sales">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title text-muted">Total Sales</h6>
                                <h3 class="card-value" id="totalSales">$0</h3>
                                <p class="card-text"><span class="text-success" id="salesChange">
                                        <i class="bi bi-arrow-up"></i> 0%
                                    </span> vs last month</p>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-currency-dollar display-6 text-primary opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- نفس الفكرة لباقي الكروت -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card stat-card customers">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title text-muted">Customers</h6>
                                <h3 class="card-value" id="customers">0</h3>
                                <p class="card-text"><span class="text-success" id="customersChange">
                                        <i class="bi bi-arrow-up"></i> 0%
                                    </span> vs last month</p>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-people display-6 text-success opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card stat-card products">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title text-muted">Products</h6>
                                <h3 class="card-value" id="products">0</h3>
                                <p class="card-text"><span class="text-success" id="productsChange">
                                        <i class="bi bi-arrow-up"></i> 0%
                                    </span> vs last month</p>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-box display-6 text-info opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Avg Order Value -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card stat-card revenue">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title text-muted">Avg. Order Value</h6>
                                <h3 class="card-value" id="avgOrderValue">$0</h3>
                                <p class="card-text"><span class="text-success" id="avgOrderChange">
                                        <i class="bi bi-arrow-up"></i> 0%
                                    </span> vs last month</p>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-cart display-6 text-warning opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Revenue Overview</h5>
                        <div>
                            <select class="form-select">
                                <option selected="">All Categories</option>
                                <option>Electronics</option>
                                <option>Fashion</option>
                                <option>Home &amp; Kitchen</option>
                                <option>Books</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Sales Distribution</h5>
                        <div class="dropdown">
                            <button class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Share</a></li>
                                <li><a class="dropdown-item" href="#">Refresh</a></li>
                                <li><a class="dropdown-item" href="#">Review</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="salesDistributionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Recent Orders</h5>
                        <div class="dropdown">
                            <button class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Share</a></li>
                                <li><a class="dropdown-item" href="#">Refresh</a></li>
                                <li><a class="dropdown-item" href="#">Review</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="recentOrders">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Top Selling Products</h5>
                        <div class="dropdown">
                            <button class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Share</a></li>
                                <li><a class="dropdown-item" href="#">Refresh</a></li>
                                <li><a class="dropdown-item" href="#">Review</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Sold</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody id="topProducts">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
