@extends('layouts.admin')

@section('title', 'Reports - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <h1 class="fs-3 mb-1">Reports & Analytics</h1>
            <p class="mb-0">Live product and inventory analytics</p>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-shape bg-primary bg-opacity-10 text-primary">
                        <i class="ti ti-box-seam"></i>
                    </div>
                </div>
                <h3 class="mb-1">{{ $totalProducts }}</h3>
                <p class="mb-0 text-muted small">Active Products</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-shape bg-success bg-opacity-10 text-success">
                        <i class="ti ti-tag"></i>
                    </div>
                </div>
                <h3 class="mb-1">{{ $totalCategories }}</h3>
                <p class="mb-0 text-muted small">Total Categories</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="icon-shape bg-warning bg-opacity-10 text-warning">
                        <i class="ti ti-currency-rupee"></i>
                    </div>
                </div>
                <h3 class="mb-1">Rs {{ number_format($totalStockValue, 0) }}</h3>
                <p class="mb-0 text-muted small">Total Stock Value</p>
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
                </div>
                <h3 class="mb-1">Rs {{ number_format($avgPrice, 0) }}</h3>
                <p class="mb-0 text-muted small">Avg Product Price</p>
            </div>
        </div>
    </div>
</div>

<!-- Category Breakdown + Stock Status -->
<div class="row g-3 mb-4">
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Products by Category</h3>
            </div>
            <div class="card-body">
                @if($byCategory->isEmpty())
                    <p class="text-muted text-center py-4 mb-0">No category data yet.</p>
                @else
                @php $maxCount = $byCategory->max('products_count') ?: 1; @endphp
                <div class="d-flex flex-column gap-3">
                    @foreach($byCategory as $cat)
                    <div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small fw-semibold">{{ $cat->name }}</span>
                            <span class="small text-muted">{{ $cat->products_count }} product{{ $cat->products_count !== 1 ? 's' : '' }}</span>
                        </div>
                        <div class="progress" style="height:8px;">
                            <div class="progress-bar bg-primary" style="width:{{ round(($cat->products_count / $maxCount) * 100) }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Stock Status</h3>
            </div>
            <div class="card-body d-flex flex-column gap-3">
                <div class="d-flex justify-content-between align-items-center p-3 rounded-2 bg-success bg-opacity-10">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-circle-check text-success fs-5"></i>
                        <span class="fw-semibold">In Stock</span>
                    </div>
                    <span class="badge bg-success fs-6">{{ $inStock }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 rounded-2 bg-warning bg-opacity-10">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-alert-triangle text-warning fs-5"></i>
                        <span class="fw-semibold">Low Stock</span>
                    </div>
                    <span class="badge bg-warning fs-6">{{ $lowStock }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 rounded-2 bg-danger bg-opacity-10">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-circle-x text-danger fs-5"></i>
                        <span class="fw-semibold">Out of Stock</span>
                    </div>
                    <span class="badge bg-danger fs-6">{{ $outOfStock }}</span>
                </div>
                @php $total = $inStock + $lowStock + $outOfStock; @endphp
                @if($total > 0)
                <div class="mt-auto pt-2">
                    <div class="progress" style="height:10px;border-radius:5px;">
                        <div class="progress-bar bg-success" style="width:{{ round(($inStock/$total)*100) }}%" title="In Stock"></div>
                        <div class="progress-bar bg-warning" style="width:{{ round(($lowStock/$total)*100) }}%" title="Low Stock"></div>
                        <div class="progress-bar bg-danger"  style="width:{{ round(($outOfStock/$total)*100) }}%" title="Out of Stock"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-1">
                        <small class="text-muted">Total: {{ $total }} products</small>
                        <small class="text-success">{{ round(($inStock/$total)*100) }}% in stock</small>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Top Rated Products -->
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Top Rated Products</h3>
                <a href="{{ route('admin.inventory') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Rating</th>
                                <th>Badge</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topRated as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                 style="width:36px;height:36px;object-fit:cover;border-radius:6px;">
                                        @else
                                            <div class="icon-shape bg-primary bg-opacity-10 text-primary" style="width:36px;height:36px;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                                                <i class="ti ti-camera"></i>
                                            </div>
                                        @endif
                                        <span class="fw-semibold small">{{ Str::limit($product->name, 35) }}</span>
                                    </div>
                                </td>
                                <td>{{ $product->category?->name ?? '—' }}</td>
                                <td>Rs {{ number_format($product->price, 0) }}</td>
                                <td>
                                    @if($product->stock > 10)
                                        <span class="badge bg-success">{{ $product->stock }}</span>
                                    @elseif($product->stock > 0)
                                        <span class="badge bg-warning">{{ $product->stock }}</span>
                                    @else
                                        <span class="badge bg-danger">0</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="ti ti-star-filled text-warning" style="font-size:.8rem"></i>
                                        <span class="fw-semibold">{{ number_format($product->rating, 1) }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if($product->badge)
                                        <span class="badge {{ $product->badge === 'hot' ? 'bg-danger' : ($product->badge === 'new' ? 'bg-primary' : 'bg-warning text-dark') }}">
                                            {{ ucfirst($product->badge) }}
                                        </span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No products yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Export Options -->
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Export Reports</h3>
            </div>
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <a href="{{ route('admin.reports.print') }}" target="_blank" class="btn btn-danger w-100">
                            <i class="ti ti-file-type-pdf me-2"></i>Export as PDF
                        </a>
                        <small class="text-muted d-block mt-1 text-center">Opens print preview → Save as PDF</small>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.reports.csv') }}" class="btn btn-outline-success w-100">
                            <i class="ti ti-file-spreadsheet me-2"></i>Download CSV / Excel
                        </a>
                        <small class="text-muted d-block mt-1 text-center">Downloads full product list as .csv</small>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.reports.print') }}" target="_blank" class="btn btn-outline-secondary w-100">
                            <i class="ti ti-printer me-2"></i>Print Report
                        </a>
                        <small class="text-muted d-block mt-1 text-center">Open print dialog directly</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recently Added Products -->
<div class="row g-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Recently Added Products</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock Value</th>
                                <th>Status</th>
                                <th>Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentProducts as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                 style="width:36px;height:36px;object-fit:cover;border-radius:6px;">
                                        @else
                                            <div class="icon-shape bg-primary bg-opacity-10 text-primary" style="width:36px;height:36px;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                                                <i class="ti ti-camera"></i>
                                            </div>
                                        @endif
                                        <span class="fw-semibold small">{{ Str::limit($product->name, 30) }}</span>
                                    </div>
                                </td>
                                <td>{{ $product->category?->name ?? '—' }}</td>
                                <td>Rs {{ number_format($product->price, 0) }}</td>
                                <td>Rs {{ number_format($product->price * $product->stock, 0) }}</td>
                                <td>
                                    @if($product->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @elseif($product->status === 'draft')
                                        <span class="badge bg-secondary">Draft</span>
                                    @else
                                        <span class="badge bg-danger">Archived</span>
                                    @endif
                                </td>
                                <td class="text-muted small">{{ $product->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No products yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
