@extends('admin.layouts.masterAdmin')

@section('contentAdmin')

        <div class="row" style="margin-top: 15px "  >
            <div class="col-12 col-md-12 col-lg-12">
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

                                    <script>
                                        fetch('/api/dashboard')
                                            .then(response => response.json())
                                            .then(data => {
                                                let recentOrders = document.getElementById('recentOrders');
                                                if (recentOrders) {
                                                    recentOrders.innerHTML = '';

                                                    data.totalsOrders.forEach(orderTotal => {
                                                        let customer = data.CustomerOrders.find(c => c.id === orderTotal.check_out_id);
                                                        let orderDetail = data.OrderDetails.find(o => o.check_out_id === orderTotal
                                                            .check_out_id);

                                                        let date = new Date(orderDetail.created_at);
                                                        let formatted = date.toLocaleDateString('en-US', {
                                                            month: 'short',
                                                            day: 'numeric',
                                                            year: 'numeric'
                                                        });

                                                        recentOrders.innerHTML += `
                  <tr>
                      <td>#ORD-${orderTotal.check_out_id}</td>
                      <td>${customer ? customer.name : 'Unknown'}</td>
                      <td>${formatted}</td>
                      <td>$${Number(orderTotal.total_price).toFixed(2)}</td>
                      <td><span class="badge bg-success">Delivered</span></td>
                  </tr>
              `;
                                                    });
                                                }
                                            })
                                            .catch(error => console.error('Error:', error));
                                    </script>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
