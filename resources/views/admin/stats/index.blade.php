@extends('layouts.admin')

@section('title', 'Why Choose Us Stats - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fs-3 mb-1">Why Choose Us — Stats</h1>
                <p class="mb-0">Manage the counter stats shown on the homepage</p>
            </div>
            <a href="{{ route('admin.stats.create') }}" class="btn btn-primary">
                <i class="ti ti-plus me-2"></i>Add Stat
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
                <h3 class="card-title mb-0">All Stats ({{ $stats->count() }})</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order</th>
                            <th>Icon</th>
                            <th>Value</th>
                            <th>Label</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stats as $stat)
                        <tr>
                            <td>{{ $stat->sort_order }}</td>
                            <td>
                                <i class="{{ $stat->icon }}" style="font-size:1.2rem;"></i>
                                <small class="text-muted ms-2">{{ $stat->icon }}</small>
                            </td>
                            <td><strong>{{ $stat->value }}</strong></td>
                            <td>{{ $stat->label }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.stats.edit', $stat) }}"
                                       class="btn btn-sm btn-light" title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.stats.destroy', $stat) }}"
                                          onsubmit="return confirm('Delete this stat?')">
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
                                No stats yet. <a href="{{ route('admin.stats.create') }}">Add one</a>.
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
