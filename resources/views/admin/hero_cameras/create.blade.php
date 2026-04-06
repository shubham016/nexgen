@extends('layouts.admin')

@section('title', 'Add Camera Feed - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <h1 class="fs-3 mb-1">Add Camera Feed</h1>
        <p class="mb-0"><a href="{{ route('admin.hero-cameras.index') }}">Hero Camera Feeds</a> / New</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.hero-cameras.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Camera Label</label>
                        <input type="text" name="label" class="form-control @error('label') is-invalid @enderror"
                               value="{{ old('label') }}" placeholder="e.g. cam 01 - front gate">
                        @error('label')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text">Shown as the camera name overlay on the video screen.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Video File</label>
                        <input type="file" name="video" id="videoInput"
                               class="form-control @error('video') is-invalid @enderror"
                               accept="video/mp4,video/webm,video/ogg">
                        @error('video')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text">MP4, WebM or OGG — max 50 MB. Leave blank to use the default video.</div>
                        <video id="videoPreview" muted controls
                               style="display:none;margin-top:10px;width:100%;max-width:320px;border-radius:8px;background:#000;"></video>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                                   value="{{ old('sort_order', 0) }}" min="0">
                            @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <div class="form-text">Lower numbers appear first (top-left to bottom-right).</div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                       id="isActive" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="isActive">Active (visible on website)</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-check me-1"></i>Save Camera
                        </button>
                        <a href="{{ route('admin.hero-cameras.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('videoInput').addEventListener('change', function () {
    const preview = document.getElementById('videoPreview');
    const file = this.files[0];
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
        preview.src = '';
    }
});
</script>
@endsection
