@extends('layouts.admin')

@section('title', 'Testimonials - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fs-3 mb-1">Testimonials</h1>
                <p class="mb-0">Manage client testimonials shown on the homepage</p>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                <i class="ti ti-plus me-2"></i>Add Testimonial
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">All Testimonials ({{ $testimonials->count() }})</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order</th>
                            <th>Client</th>
                            <th>Quote</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $t)
                        <tr>
                            <td>{{ $t->sort_order }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    @if($t->photo)
                                    <img src="{{ $t->photoUrl() }}" alt="{{ $t->name }}"
                                         style="width:36px;height:36px;border-radius:50%;object-fit:cover;flex-shrink:0;">
                                    @else
                                    <div style="width:36px;height:36px;border-radius:50%;background:#1a6dd4;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.75rem;flex-shrink:0;">
                                        {{ $t->avatar }}
                                    </div>
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $t->name }}</div>
                                        <small class="text-muted">{{ $t->role }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-muted" style="max-width:300px;">
                                <span title="{{ $t->quote }}">{{ Str::limit($t->quote, 80) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-warning bg-opacity-15 text-warning-emphasis">
                                    ★ {{ number_format($t->rating, 1) }}
                                </span>
                            </td>
                            <td>
                                @if($t->is_active)
                                    <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary">Hidden</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.testimonials.edit', $t) }}"
                                       class="btn btn-sm btn-light" title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}"
                                          onsubmit="return confirm('Delete testimonial by {{ $t->name }}?')">
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
                            <td colspan="6" class="text-center py-4 text-muted">
                                No testimonials yet. <a href="{{ route('admin.testimonials.create') }}">Add one</a>.
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
