@extends('layouts.admin')

@section('title', 'Dashboard - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <h1 class="fs-3 mb-1">Dashboard</h1>
            <p class="mb-0">Welcome to NEXGEN BuildTech Admin Panel</p>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-3">
    <div class="col-lg-3 col-6">
        <div class="card p-4 bg-primary bg-opacity-10 border border-primary border-opacity-25 rounded-2">
            <div class="d-flex gap-3">
                <div class="icon-shape icon-md bg-primary text-white rounded-2">
                    <i class="ti ti-box-seam fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-1 fs-6">Active Products</h2>
                    <h3 class="fw-bold mb-0">{{ $totalProducts }}</h3>
                    <a href="{{ route('admin.inventory') }}" class="text-primary small">View all</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="card p-4 bg-success bg-opacity-10 border border-success border-opacity-25 rounded-2">
            <div class="d-flex gap-3">
                <div class="icon-shape icon-md bg-success text-white rounded-2">
                    <i class="ti ti-tag fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-1 fs-6">Categories</h2>
                    <h3 class="fw-bold mb-0">{{ $totalCategories }}</h3>
                    <a href="{{ route('admin.categories.index') }}" class="text-success small">Manage</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="card p-4 bg-warning bg-opacity-10 border border-warning border-opacity-25 rounded-2">
            <div class="d-flex gap-3">
                <div class="icon-shape icon-md bg-warning text-white rounded-2">
                    <i class="ti ti-alert-triangle fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-1 fs-6">Low Stock</h2>
                    <h3 class="fw-bold mb-0">{{ $lowStockProducts }}</h3>
                    <span class="text-warning small">≤ 5 units left</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="card p-4 bg-danger bg-opacity-10 border border-danger border-opacity-25 rounded-2">
            <div class="d-flex gap-3">
                <div class="icon-shape icon-md bg-danger text-white rounded-2">
                    <i class="ti ti-circle-x fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-1 fs-6">Out of Stock</h2>
                    <h3 class="fw-bold mb-0">{{ $outOfStock }}</h3>
                    <span class="text-danger small">Need restocking</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recently Added Products & Quick Actions -->
<div class="row g-3 mb-3">
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Recently Added Products</h3>
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
                                <th>Status</th>
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
                                        <div>
                                            <div class="fw-semibold" style="font-size:.875rem">{{ Str::limit($product->name, 30) }}</div>
                                            <small class="text-muted">{{ $product->sku ?? '—' }}</small>
                                        </div>
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
                                    @if($product->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @elseif($product->status === 'draft')
                                        <span class="badge bg-secondary">Draft</span>
                                    @else
                                        <span class="badge bg-danger">Archived</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    No products yet. <a href="{{ route('admin.products.create') }}">Add your first product</a>.
                                </td>
                            </tr>
                            @endforelse
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
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-success">
                        <i class="ti ti-tag me-2"></i>Add Category
                    </a>
                    <a href="{{ route('admin.inventory') }}" class="btn btn-outline-primary">
                        <i class="ti ti-box-seam me-2"></i>View Inventory
                    </a>
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-secondary">
                        <i class="ti ti-world me-2"></i>View Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Top Rated Products -->
<div class="row g-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Top Rated Products</h3>
            </div>
            <div class="card-body">
                @if($topRated->isEmpty())
                    <p class="text-muted text-center py-2 mb-0">No products yet.</p>
                @else
                <div class="row g-3">
                    @foreach($topRated as $product)
                    <div class="col-md-3">
                        <div class="d-flex align-items-center gap-3">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     style="width:48px;height:48px;object-fit:cover;border-radius:8px;">
                            @else
                                <div class="icon-shape icon-lg bg-primary bg-opacity-10 text-primary rounded">
                                    <i class="ti ti-camera fs-3"></i>
                                </div>
                            @endif
                            <div>
                                <h6 class="mb-0">{{ Str::limit($product->name, 22) }}</h6>
                                <div class="d-flex align-items-center gap-1">
                                    <i class="ti ti-star-filled text-warning" style="font-size:.75rem"></i>
                                    <span class="small fw-semibold">{{ number_format($product->rating, 1) }}</span>
                                </div>
                                <small class="text-muted">{{ $product->category?->name ?? '—' }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
