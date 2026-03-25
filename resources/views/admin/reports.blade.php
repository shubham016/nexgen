@extends('layouts.admin')

@section('title', 'Reports - NEX Gen Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <h1 class="fs-3 mb-1">Reports & Analytics</h1>
            <p class="mb-0">View sales reports and analytics</p>
        </div>
    </div>
</div>

<!-- Report Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-shape bg-primary bg-opacity-10 text-primary">
                        <i class="ti ti-currency-rupee"></i>
                    </div>
                    <span class="badge bg-success-subtle text-success">+15%</span>
                </div>
                <h3 class="mb-1">Rs 250,000</h3>
                <p class="mb-0 text-muted small">Total Revenue</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-shape bg-success bg-opacity-10 text-success">
                        <i class="ti ti-shopping-cart"></i>
                    </div>
                    <span class="badge bg-success-subtle text-success">+8%</span>
                </div>
                <h3 class="mb-1">1,245</h3>
                <p class="mb-0 text-muted small">Total Orders</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-shape bg-warning bg-opacity-10 text-warning">
                        <i class="ti ti-users"></i>
                    </div>
                    <span class="badge bg-success-subtle text-success">+12%</span>
                </div>
                <h3 class="mb-1">5,234</h3>
                <p class="mb-0 text-muted small">Total Customers</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-shape bg-info bg-opacity-10 text-info">
                        <i class="ti ti-chart-line"></i>
                    </div>
                    <span class="badge bg-success-subtle text-success">+5%</span>
                </div>
                <h3 class="mb-1">Rs 201</h3>
                <p class="mb-0 text-muted small">Avg Order Value</p>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Sales Overview</h3>
                <select class="form-select form-select-sm" style="width: auto;">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 90 days</option>
                    <option>Last year</option>
                </select>
            </div>
            <div class="card-body">
                <div class="text-center py-5">
                    <i class="ti ti-chart-bar fs-1 text-muted"></i>
                    <p class="text-muted">Sales chart will be displayed here</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Top Products</h3>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0 small">WiFi Smart Camera</h6>
                            <small class="text-muted">312 sold</small>
                        </div>
                        <span class="badge bg-success">+35%</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0 small">Bullet Camera</h6>
                            <small class="text-muted">256 sold</small>
                        </div>
                        <span class="badge bg-success">+28%</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0 small">8-Camera Kit</h6>
                            <small class="text-muted">445 sold</small>
                        </div>
                        <span class="badge bg-success">+42%</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0 small">4K Dome Camera</h6>
                            <small class="text-muted">128 sold</small>
                        </div>
                        <span class="badge bg-warning">+12%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Export Options -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Export Reports</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <button class="btn btn-outline-primary w-100">
                            <i class="ti ti-file-text me-2"></i>Export as PDF
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-success w-100">
                            <i class="ti ti-file-spreadsheet me-2"></i>Export as Excel
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-info w-100">
                            <i class="ti ti-file-csv me-2"></i>Export as CSV
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
