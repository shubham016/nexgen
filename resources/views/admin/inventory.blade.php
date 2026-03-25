@extends('layouts.admin')

@section('title', 'Inventory - NEX Gen Admin')

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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">All Products</h3>
                <div class="d-flex gap-2">
                    <input type="search" class="form-control form-control-sm" placeholder="Search products...">
                    <select class="form-select form-select-sm" style="width: auto;">
                        <option>All Categories</option>
                        <option>Indoor Camera</option>
                        <option>Outdoor Camera</option>
                        <option>PTZ Camera</option>
                        <option>NVR System</option>
                    </select>
                </div>
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
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="icon-shape bg-primary bg-opacity-10 text-primary">
                                            <i class="ti ti-camera"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">4K Dome Camera IR Night Vision</h6>
                                            <small class="text-muted">SKU: CAM-001</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Indoor Camera</td>
                                <td>Rs 249</td>
                                <td><span class="badge bg-success">In Stock (50)</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <i class="ti ti-star-filled text-warning"></i>
                                        <span>4.5</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-light"><i class="ti ti-edit"></i></button>
                                        <button class="btn btn-sm btn-light"><i class="ti ti-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="icon-shape bg-success bg-opacity-10 text-success">
                                            <i class="ti ti-video"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Bullet Camera 8MP Weatherproof</h6>
                                            <small class="text-muted">SKU: CAM-002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Outdoor Camera</td>
                                <td>Rs 1,499</td>
                                <td><span class="badge bg-success">In Stock (35)</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <i class="ti ti-star-filled text-warning"></i>
                                        <span>5.0</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-light"><i class="ti ti-edit"></i></button>
                                        <button class="btn btn-sm btn-light"><i class="ti ti-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="icon-shape bg-warning bg-opacity-10 text-warning">
                                            <i class="ti ti-arrows-move"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">PTZ Pro 360 Pan-Tilt-Zoom 30x</h6>
                                            <small class="text-muted">SKU: CAM-003</small>
                                        </div>
                                    </div>
                                </td>
                                <td>PTZ Camera</td>
                                <td>Rs 749</td>
                                <td><span class="badge bg-warning">Low Stock (8)</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <i class="ti ti-star-filled text-warning"></i>
                                        <span>4.0</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-light"><i class="ti ti-edit"></i></button>
                                        <button class="btn btn-sm btn-light"><i class="ti ti-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="icon-shape bg-info bg-opacity-10 text-info">
                                            <i class="ti ti-server"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">16-Channel NVR 8TB HDD Storage</h6>
                                            <small class="text-muted">SKU: NVR-001</small>
                                        </div>
                                    </div>
                                </td>
                                <td>NVR System</td>
                                <td>Rs 1,499</td>
                                <td><span class="badge bg-success">In Stock (20)</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <i class="ti ti-star-filled text-warning"></i>
                                        <span>4.5</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-light"><i class="ti ti-edit"></i></button>
                                        <button class="btn btn-sm btn-light"><i class="ti ti-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="icon-shape bg-primary bg-opacity-10 text-primary">
                                            <i class="ti ti-wifi"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">WiFi Smart Camera 2-Way Audio</h6>
                                            <small class="text-muted">SKU: CAM-004</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Wireless</td>
                                <td>Rs 129</td>
                                <td><span class="badge bg-success">In Stock (100)</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <i class="ti ti-star-filled text-warning"></i>
                                        <span>5.0</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-light"><i class="ti ti-edit"></i></button>
                                        <button class="btn btn-sm btn-light"><i class="ti ti-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-muted small">Showing 5 of 8 products</p>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
