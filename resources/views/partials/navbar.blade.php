<nav class="nb">
    <div class="cn ni">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/nexgen_logo.png') }}?v=2" alt="NEXGEN" />
            <span class="logo-name">NEX<b>GEN</b></span>
        </a>
        <div class="nmn">
            <a href="/" class="active">Home</a>
            <a href="/about">About</a>
            <a href="/services">Services</a>
            <a href="/products">Products</a>
            <a href="/reviews">Reviews</a>
            <a href="/contact">Contact</a>
        </div>
        <div class="nr">
            <button class="nsr" id="nsrBtn" aria-label="Search products"><i class="fas fa-search"></i></button>
            <div><a href="/contact" class="btn btn-nq">Get Quote</a></div>
            <button class="hbr" id="hbrBtn" onclick="document.getElementById('mobn').classList.toggle('open')">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>

<!-- Global Search Overlay -->
<div class="nso" id="nsoOverlay" role="dialog" aria-modal="true" aria-label="Search">
    <div class="nso-box">
        <i class="fas fa-search nso-ico"></i>
        <input type="text" id="nsoInput" placeholder="Search CCTV cameras, products..." autocomplete="off">
        <button class="nso-close" id="nsoClose" aria-label="Close search"><i class="fas fa-times"></i></button>
    </div>
    <div class="nso-results" id="nsoResults"></div>
    <p class="nso-hint" id="nsoHint">Type to search &mdash; press <kbd>Esc</kbd> to close</p>
</div>
