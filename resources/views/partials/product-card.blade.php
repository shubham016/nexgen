<div class="pcd rv" data-pf-name="{{ strtolower($name) }}" data-pf-cat="{{ strtolower($category) }}">
    <div class="pim">
        @if(isset($image))
            <img src="{{ $image }}" alt="{{ $name }}" loading="lazy" />
        @elseif(isset($icon))
            <i class="{{ $icon }}"></i>
        @endif

        @if(isset($badge))
            <span class="pbdg {{ $badgeClass }}">{{ $badge }}</span>
        @endif

        <div class="pact">
            <button class="pab"
                data-image="{{ $image ?? '' }}"
                data-name="{{ $name }}"
                data-category="{{ $category }}"
                data-price="{{ $price }}"
                data-old-price="{{ $oldPrice ?? '' }}"
                data-badge="{{ $badge ?? '' }}"
                data-badge-class="{{ $badgeClass ?? '' }}"
                data-rating="{{ $rating }}"
                data-description="{{ $description ?? '' }}"
                data-features="{{ $features ?? '' }}"
                data-stock="{{ $stock ?? '' }}"
                data-sku="{{ $sku ?? '' }}"
            ><i class="fas fa-eye"></i></button>
        </div>
    </div>
    <div class="pinf">
        <div class="pcat">{{ $category }}</div>
        <h3>{{ $name }}</h3>
        <div class="prat">
            @php
                $fullStars = floor($rating);
                $hasHalfStar = ($rating - $fullStars) >= 0.5;
            @endphp

            @for($i = 0; $i < $fullStars; $i++)
                <i class="fas fa-star"></i>
            @endfor

            @if($hasHalfStar)
                <i class="fas fa-star-half-alt"></i>
            @endif

            @for($i = 0; $i < (5 - $fullStars - ($hasHalfStar ? 1 : 0)); $i++)
                <i class="far fa-star"></i>
            @endfor

        </div>
        <div class="pprow">
            <div class="pprc">{{ $price }} @if(isset($oldPrice))<span class="old">{{ $oldPrice }}</span>@endif</div>
        </div>
    </div>
</div>
