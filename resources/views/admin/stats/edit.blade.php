@extends('layouts.admin')

@section('title', 'Edit Stat - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <h1 class="fs-3 mb-1">Edit Stat</h1>
        <p class="mb-0"><a href="{{ route('admin.stats.index') }}">Why Choose Us Stats</a> / Edit</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.stats.update', $stat) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Icon <small class="text-muted">(Font Awesome class)</small></label>
                        <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror"
                               value="{{ old('icon', $stat->icon) }}" placeholder="e.g. fas fa-video">
                        @error('icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text">Preview: <i class="{{ old('icon', $stat->icon) }}"></i> &nbsp;<code>{{ old('icon', $stat->icon) }}</code></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Value</label>
                        <input type="text" name="value" class="form-control @error('value') is-invalid @enderror"
                               value="{{ old('value', $stat->value) }}" placeholder="e.g. 15,000+">
                        @error('value')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Label</label>
                        <input type="text" name="label" class="form-control @error('label') is-invalid @enderror"
                               value="{{ old('label', $stat->label) }}" placeholder="e.g. Cameras Installed">
                        @error('label')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                               value="{{ old('sort_order', $stat->sort_order) }}" min="0" style="max-width:120px;">
                        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text">Lower numbers appear first.</div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-check me-1"></i>Update Stat
                        </button>
                        <a href="{{ route('admin.stats.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
