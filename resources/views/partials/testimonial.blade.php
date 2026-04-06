<div class="tcr rv">
    <div class="tqt">&ldquo;</div>
    <p class="ttx">{{ $quote }}</p>
    <div class="tau">
        <div class="tav">
            @if(!empty($photo))
                <img src="{{ $photo }}" alt="{{ $name }}"
                     style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
            @else
                {{ $avatar }}
            @endif
        </div>
        <div>
            <div class="tnm">{{ $name }}</div>
            <div class="trl">{{ $role }}</div>
            <div class="tst">
                @php
                    $fullStars = floor($rating);
                    $hasHalf   = ($rating - $fullStars) >= 0.5;
                @endphp
                @for($i = 0; $i < $fullStars; $i++)
                    <i class="fas fa-star"></i>
                @endfor
                @if($hasHalf)
                    <i class="fas fa-star-half-alt"></i>
                @endif
            </div>
        </div>
    </div>
</div>
