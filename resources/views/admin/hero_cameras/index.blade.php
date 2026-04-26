@extends('layouts.admin')

@section('title', 'Hero Camera Feeds - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fs-3 mb-1">Hero Camera Feeds</h1>
                <p class="mb-0">Manage the 4 video screens shown in the homepage hero section</p>
            </div>
            <a href="{{ route('admin.hero-cameras.create') }}" class="btn btn-primary">
                <i class="ti ti-plus me-2"></i>Add Camera
            </a>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="alert alert-info border-0 mb-4">
    <i class="ti ti-info-circle me-2"></i>
    Only the first <strong>4 active</strong> cameras (by sort order) are displayed in the hero section. If none are added, the default video plays on all 4 screens.
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">All Camera Feeds ({{ $cameras->count() }})</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order</th>
                            <th>Preview</th>
                            <th>Label</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cameras as $camera)
                        <tr>
                            <td>{{ $camera->sort_order }}</td>
                            <td>
                                <video src="{{ $camera->videoUrl() }}" muted
                                       style="width:90px;height:55px;object-fit:cover;border-radius:6px;background:#000;">
                                </video>
                            </td>
                            <td><strong>{{ $camera->label }}</strong></td>
                            <td>
                                @if($camera->is_active)
                                    <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary">Hidden</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.hero-cameras.edit', $camera) }}"
                                       class="btn btn-sm btn-light" title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.hero-cameras.destroy', $camera) }}"
                                          onsubmit="return confirm('Delete camera \'{{ $camera->label }}\'?')">
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
                            <td colspan="5" class="text-center py-4 text-muted">
                                No camera feeds yet. <a href="{{ route('admin.hero-cameras.create') }}">Add one</a>.
                            </td>
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
