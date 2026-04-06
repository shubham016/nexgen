<nav class="nb">
    <div class="cn ni">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}?v=2" alt="NEXGEN" />
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
            <div class="nsr"><i class="fas fa-search"></i></div>
            <div><a href="{{ url('/#contact') }}" class="btn btn-nq">Get Quote</a></div>
            <button class="hbr" onclick="document.getElementById('mobn').classList.add('open')">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>
