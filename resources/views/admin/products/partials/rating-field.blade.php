<div class="mb-3">
    <label class="form-label">Rating & Reviews</label>
    <div class="d-flex align-items-center gap-2 mb-2">
        <div id="starPicker" class="d-flex gap-1">
            @for($i = 1; $i <= 5; $i++)
                <i class="ti ti-star star-btn"
                   data-value="{{ $i }}"
                   style="font-size:1.6rem;cursor:pointer;color:#dee2e6;transition:color .15s;"
                   title="{{ $i }} star{{ $i > 1 ? 's' : '' }}"></i>
            @endfor
        </div>
        <input type="number" name="rating" id="ratingInput"
               class="form-control form-control-sm @error('rating') is-invalid @enderror"
               style="width:75px;" min="0" max="5" step="0.5"
               value="{{ old('rating', $currentRating ?? 0) }}"
               placeholder="0.0">
        <span class="text-muted small">/ 5.0</span>
        @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="form-text">Set the product rating (0–5, supports 0.5 steps).</div>
</div>

@once
@push('scripts')
<script>
(function () {
    const stars      = document.querySelectorAll('#starPicker .star-btn');
    const ratingInput = document.getElementById('ratingInput');

    function paintStars(val) {
        stars.forEach(s => {
            const v = parseInt(s.dataset.value);
            if (val >= v) {
                s.classList.remove('ti-star');
                s.classList.add('ti-star-filled');
                s.style.color = '#ffc107';
            } else {
                s.classList.remove('ti-star-filled');
                s.classList.add('ti-star');
                s.style.color = '#dee2e6';
            }
        });
    }

    // Init from current value
    paintStars(parseFloat(ratingInput.value) || 0);

    // Click to set
    stars.forEach(s => {
        s.addEventListener('click', () => {
            ratingInput.value = s.dataset.value;
            paintStars(parseInt(s.dataset.value));
        });
        s.addEventListener('mouseenter', () => paintStars(parseInt(s.dataset.value)));
    });

    document.getElementById('starPicker').addEventListener('mouseleave', () => {
        paintStars(parseFloat(ratingInput.value) || 0);
    });

    // Sync when user types in the number input
    ratingInput.addEventListener('input', () => {
        paintStars(parseFloat(ratingInput.value) || 0);
    });
})();
</script>
@endpush
@endonce
