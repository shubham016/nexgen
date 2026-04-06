@extends('layouts.admin')

@section('title', 'Edit Product - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <h1 class="fs-3 mb-1">Edit Product</h1>
            <p class="mb-0">Update product details</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Product Information</h3>
            </div>
            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $product->name) }}">
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @selected(old('category_id', $product->category_id) == $cat->id)>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Model</label>
                        <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                               value="{{ old('sku', $product->sku) }}">
                        @error('sku')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              rows="4">{{ old('description', $product->description) }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Price (Rs) <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                               min="0" step="0.01" value="{{ old('price', $product->price) }}">
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Old Price (Rs)</label>
                        <input type="number" name="old_price" class="form-control @error('old_price') is-invalid @enderror"
                               min="0" step="0.01" value="{{ old('old_price', $product->old_price) }}">
                        @error('old_price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Stock Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                               min="0" value="{{ old('stock', $product->stock) }}">
                        @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    @if($product->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                 style="height:80px;border-radius:6px;object-fit:cover;">
                            <small class="text-muted ms-2">Current image</small>
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Leave empty to keep current image. Max 2MB.</small>
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Features</label>
                    <textarea name="features" class="form-control" rows="3"
                              placeholder="Enter product features (one per line)">{{ old('features', $product->features) }}</textarea>
                </div>

                @include('admin.products.partials.rating-field', [
                    'currentRating' => old('rating', $product->rating),
                ])
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Status & Options</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Product Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select">
                        <option value="active"   @selected(old('status', $product->status) === 'active')>Active</option>
                        <option value="draft"    @selected(old('status', $product->status) === 'draft')>Draft</option>
                        <option value="archived" @selected(old('status', $product->status) === 'archived')>Archived</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Badge (Optional)</label>
                    <select name="badge" class="form-select">
                        <option value="">No Badge</option>
                        <option value="hot"  @selected(old('badge', $product->badge) === 'hot')>Hot</option>
                        <option value="new"  @selected(old('badge', $product->badge) === 'new')>New</option>
                        <option value="sale" @selected(old('badge', $product->badge) === 'sale')>Sale</option>
                    </select>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="featured" value="1"
                           @checked(old('is_featured', $product->is_featured))>
                    <label class="form-check-label" for="featured">Featured Product</label>
                    <div class="form-text">Featured products appear first on the website.</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-check me-2"></i>Save Changes
                    </button>
                    <a href="{{ route('admin.inventory') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
@endsection
