@extends('layouts.admin')

@section('title', 'Dashboard - NEX Gen Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-6">
            <h1 class="fs-3 mb-1">Dashboard</h1>
            <p>Welcome to NEX Gen CCTV Admin Panel</p>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-3">
    <div class="col-lg-3 col-12">
        <div class="card p-4 bg-primary bg-opacity-10 border border-primary border-opacity-25 rounded-2">
            <div class="d-flex gap-3">
                <div class="icon-shape icon-md bg-primary text-white rounded-2">
                    <i class="ti ti-report-analytics fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-3 fs-6">Total Sales</h2>
                    <h3 class="fw-bold mb-0">Rs 250,000</h3>
                    <p class="text-primary mb-0 small">+5% since last month</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12">
        <div class="card p-4 bg-success bg-opacity-10 border border-success border-opacity-25 rounded-2">
            <div class="d-flex gap-3">
                <div class="icon-shape icon-md bg-success text-white rounded-2">
                    <i class="ti ti-box-seam fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-3 fs-6">Total Products</h2>
                    <h3 class="fw-bold mb-0">8</h3>
                    <p class="text-success mb-0 small">Active products</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12">
        <div class="card p-4 bg-info bg-opacity-10 border border-info border-opacity-25 rounded-2">
            <div class="d-flex gap-3">
                <div class="icon-shape icon-md bg-info text-white rounded-2">
                    <i class="ti ti-users fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-3 fs-6">Total Customers</h2>
                    <h3 class="fw-bold mb-0">5,000+</h3>
                    <p class="text-info mb-0 small">Happy clients</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12">
        <div class="card p-4 bg-warning bg-opacity-10 border border-warning border-opacity-25 rounded-2">
            <div class="d-flex gap-3">
                <div class="icon-shape icon-md bg-warning text-white rounded-2">
                    <i class="ti ti-video fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-3 fs-6">Cameras Installed</h2>
                    <h3 class="fw-bold mb-0">15,000+</h3>
                    <p class="text-warning mb-0 small">Across Nepal</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity & Quick Actions -->
<div class="row g-3 mb-3">
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Recent Sales</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#12345</td>
                                <td>Bikash Thapa</td>
                                <td>4K Dome Camera</td>
                                <td>Rs 249</td>
                                <td><span class="badge bg-success">Completed</span></td>
                            </tr>
                            <tr>
                                <td>#12344</td>
                                <td>Priya Sharma</td>
                                <td>PTZ Camera</td>
                                <td>Rs 749</td>
                                <td><span class="badge bg-warning">Processing</span></td>
                            </tr>
                            <tr>
                                <td>#12343</td>
                                <td>Ramesh Gurung</td>
                                <td>8-Camera Kit</td>
                                <td>Rs 2,499</td>
                                <td><span class="badge bg-info">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Quick Actions</h3>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-2"></i>Add New Product
                    </a>
                    <a href="{{ route('admin.inventory') }}" class="btn btn-outline-primary">
                        <i class="ti ti-box-seam me-2"></i>View Inventory
                    </a>
                    <a href="{{ route('admin.reports') }}" class="btn btn-outline-primary">
                        <i class="ti ti-receipt me-2"></i>Generate Report
                    </a>
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-secondary">
                        <i class="ti ti-world me-2"></i>View Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Top Selling Products -->
<div class="row g-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Top Selling Products</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-shape icon-lg bg-primary bg-opacity-10 text-primary rounded">
                                <i class="ti ti-camera fs-3"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">4K Dome Camera</h5>
                                <p class="mb-0 text-muted small">128 sold</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-shape icon-lg bg-success bg-opacity-10 text-success rounded">
                                <i class="ti ti-video fs-3"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Bullet Camera</h5>
                                <p class="mb-0 text-muted small">256 sold</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-shape icon-lg bg-warning bg-opacity-10 text-warning rounded">
                                <i class="ti ti-wifi fs-3"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">WiFi Camera</h5>
                                <p class="mb-0 text-muted small">312 sold</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-shape icon-lg bg-info bg-opacity-10 text-info rounded">
                                <i class="ti ti-box fs-3"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">8-Camera Kit</h5>
                                <p class="mb-0 text-muted small">445 sold</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
