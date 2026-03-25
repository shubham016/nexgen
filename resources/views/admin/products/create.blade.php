@extends('layouts.admin')

@section('title', 'Add Product - NEX Gen Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <h1 class="fs-3 mb-1">Add New Product</h1>
            <p class="mb-0">Create a new CCTV product</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Product Information</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" placeholder="e.g. 4K Dome Camera IR Night Vision">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select">
                                <option selected>Select Category</option>
                                <option>Indoor Camera</option>
                                <option>Outdoor Camera</option>
                                <option>PTZ Camera</option>
                                <option>NVR System</option>
                                <option>Wireless</option>
                                <option>Solar Camera</option>
                                <option>Doorbell</option>
                                <option>Complete Kit</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" placeholder="e.g. CAM-005">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="4" placeholder="Enter product description..."></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Price (Rs)</label>
                            <input type="number" class="form-control" placeholder="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Old Price (Rs)</label>
                            <input type="number" class="form-control" placeholder="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" placeholder="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <input type="file" class="form-control">
                        <small class="text-muted">Upload product image (JPG, PNG - Max 2MB)</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Features</label>
                        <textarea class="form-control" rows="3" placeholder="Enter product features (one per line)"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">Status</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Product Status</label>
                    <select class="form-select">
                        <option value="active">Active</option>
                        <option value="draft">Draft</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Badge (Optional)</label>
                    <select class="form-select">
                        <option value="">No Badge</option>
                        <option value="hot">Hot</option>
                        <option value="new">New</option>
                        <option value="sale">Sale</option>
                    </select>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="featured">
                    <label class="form-check-label" for="featured">
                        Featured Product
                    </label>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-check me-2"></i>Create Product
                    </button>
                    <a href="{{ route('admin.inventory') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
