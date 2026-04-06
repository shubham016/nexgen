@extends('layouts.admin')

@section('title', 'Inventory - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fs-3 mb-1">Inventory Management</h1>
                <p class="mb-0">Manage your CCTV products and stock</p>
            </div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="ti ti-plus me-2"></i>Add New Product
            </a>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <form method="GET" action="{{ route('admin.inventory') }}" class="d-flex justify-content-between align-items-center gap-2">
                    <h3 class="card-title mb-0">All Products ({{ $products->total() }})</h3>
                    <div class="d-flex gap-2">
                        <input type="search" name="search" class="form-control form-control-sm" placeholder="Search products..." value="{{ request('search') }}">
                        <select name="category" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @selected(request('category') == $cat->id)>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Filter</button>
                    </div>
                </form>
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
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width:40px;height:40px;object-fit:cover;border-radius:6px;">
                                        @else
                                            <div class="icon-shape bg-primary bg-opacity-10 text-primary">
                                                <i class="ti ti-camera"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $product->name }}</h6>
                                            <small class="text-muted">Model: {{ $product->sku ?? '—' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $product->category?->name ?? '—' }}</td>
                                <td>
                                    Rs {{ number_format($product->price, 0) }}
                                    @if($product->old_price)
                                        <br><small class="text-muted text-decoration-line-through">Rs {{ number_format($product->old_price, 0) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($product->stock > 10)
                                        <span class="badge bg-success">In Stock ({{ $product->stock }})</span>
                                    @elseif($product->stock > 0)
                                        <span class="badge bg-warning">Low Stock ({{ $product->stock }})</span>
                                    @else
                                        <span class="badge bg-danger">Out of Stock</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1 align-items-center">
                                        <i class="ti ti-star-filled text-warning"></i>
                                        <span>{{ number_format($product->rating, 1) }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if($product->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @elseif($product->status === 'draft')
                                        <span class="badge bg-secondary">Draft</span>
                                    @else
                                        <span class="badge bg-danger">Archived</span>
                                    @endif
                                    @if($product->badge)
                                        <span class="badge bg-info ms-1">{{ ucfirst($product->badge) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-light" title="Edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                              onsubmit="return confirm('Delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger" title="Delete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    No products found. <a href="{{ route('admin.products.create') }}">Add your first product</a>.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-muted small">
                        Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                    </p>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
