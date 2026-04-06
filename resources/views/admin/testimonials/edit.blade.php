@extends('layouts.admin')

@section('title', 'Edit Testimonial - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <h1 class="fs-3 mb-1">Edit Testimonial</h1>
        <p class="mb-0"><a href="{{ route('admin.testimonials.index') }}">Testimonials</a> / Edit</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quote</label>
                        <textarea name="quote" rows="4" class="form-control @error('quote') is-invalid @enderror"
                                  placeholder="What the client said...">{{ old('quote', $testimonial->quote) }}</textarea>
                        @error('quote')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Client Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $testimonial->name) }}" placeholder="e.g. Bikash Thapa">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Avatar Initials</label>
                            <input type="text" name="avatar" class="form-control @error('avatar') is-invalid @enderror"
                                   value="{{ old('avatar', $testimonial->avatar) }}" placeholder="e.g. BT" maxlength="5">
                            @error('avatar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <div class="form-text">Fallback initials if no photo is uploaded.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Client Photo <small class="text-muted">(optional)</small></label>

                        @if($testimonial->photo)
                        <div class="mb-2 d-flex align-items-center gap-3">
                            <img src="{{ $testimonial->photoUrl() }}" alt="{{ $testimonial->name }}"
                                 style="width:64px;height:64px;border-radius:50%;object-fit:cover;border:2px solid #e2e8f0;">
                            <small class="text-muted">Current photo — upload a new one to replace it.</small>
                        </div>
                        @endif

                        <input type="file" name="photo" id="photoInput"
                               class="form-control @error('photo') is-invalid @enderror"
                               accept="image/*">
                        @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text">JPG, PNG, WebP — max 2 MB.</div>
                        <img id="photoPreview" src="#" alt="Preview"
                             style="display:none;margin-top:10px;width:64px;height:64px;border-radius:50%;object-fit:cover;border:2px solid #e2e8f0;">
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Role / Company</label>
                            <input type="text" name="role" class="form-control @error('role') is-invalid @enderror"
                                   value="{{ old('role', $testimonial->role) }}" placeholder="e.g. Hotel Owner, Pokhara">
                            @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Rating</label>
                            <select name="rating" class="form-select @error('rating') is-invalid @enderror">
                                @foreach([5, 4.5, 4, 3.5, 3] as $r)
                                    <option value="{{ $r }}" {{ old('rating', $testimonial->rating) == $r ? 'selected' : '' }}>
                                        ★ {{ $r }}
                                    </option>
                                @endforeach
                            </select>
                            @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                                   value="{{ old('sort_order', $testimonial->sort_order) }}" min="0">
                            @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <div class="form-text">Lower numbers appear first.</div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                       id="isActive" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="isActive">Active (visible on website)</label>
                            </div>
                        </div>
                    </div>

                    <script>
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
                            <i class="ti ti-check me-1"></i>Update Testimonial
                        </button>
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
