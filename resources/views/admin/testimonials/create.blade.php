@extends('layouts.admin')

@section('title', 'Add Testimonial - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <h1 class="fs-3 mb-1">Add Testimonial</h1>
        <p class="mb-0"><a href="{{ route('admin.testimonials.index') }}">Testimonials</a> / New</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quote</label>
                        <textarea name="quote" rows="4" class="form-control @error('quote') is-invalid @enderror"
                                  placeholder="What the client said...">{{ old('quote') }}</textarea>
                        @error('quote')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Client Name</label>
                            <input type="text" name="name" id="clientName"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" placeholder="e.g. Bikash Thapa">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Avatar Initials
                                <small class="text-muted fw-normal">(auto-filled)</small>
                            </label>
                            <input type="text" name="avatar" id="clientAvatar"
                                   class="form-control @error('avatar') is-invalid @enderror"
                                   value="{{ old('avatar') }}" placeholder="e.g. BT" maxlength="5">
                            @error('avatar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <div class="form-text">Fallback initials if no photo is uploaded.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Client Photo <small class="text-muted">(optional)</small></label>
                        <input type="file" name="photo" id="photoInput"
                               class="form-control @error('photo') is-invalid @enderror"
                               accept="image/*">
                        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text">JPG, PNG, WebP — max 2 MB. If left blank, initials are shown instead.</div>
                        <img id="photoPreview" src="#" alt="Preview"
                             style="display:none;margin-top:10px;width:64px;height:64px;border-radius:50%;object-fit:cover;border:2px solid #e2e8f0;">
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Role / Company</label>
                            <input type="text" name="role" class="form-control @error('role') is-invalid @enderror"
                                   value="{{ old('role') }}" placeholder="e.g. Hotel Owner, Pokhara">
                            @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Rating</label>
                            <select name="rating" class="form-select @error('rating') is-invalid @enderror">
                                @foreach([5, 4.5, 4, 3.5, 3] as $r)
                                    <option value="{{ $r }}" {{ old('rating', 5) == $r ? 'selected' : '' }}>
                                        ★ {{ $r }}
                                    </option>
                                @endforeach
                            </select>
                            @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                   id="isActive" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="isActive">Active (visible on website)</label>
                        </div>
                    </div>

                    <script>
                    // Auto-fill initials from name
                    document.getElementById('clientName').addEventListener('input', function () {
                        var avatarField = document.getElementById('clientAvatar');
                        var parts = this.value.trim().split(/\s+/).filter(Boolean);
                        if (parts.length === 0) { avatarField.value = ''; return; }
                        var initials = parts.length === 1
                            ? parts[0][0].toUpperCase()
                            : (parts[0][0] + parts[parts.length - 1][0]).toUpperCase();
                        avatarField.value = initials;
                    });

                    // Photo preview
                    document.getElementById('photoInput').addEventListener('change', function () {
                        var preview = document.getElementById('photoPreview');
                        if (this.files && this.files[0]) {
                            preview.src = URL.createObjectURL(this.files[0]);
                            preview.style.display = 'block';
                        } else {
                            preview.style.display = 'none';
                        }
                    });
                    </script>

                    <div class="d-flex gap-2 mt-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-check me-1"></i>Save Testimonial
                        </button>
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
