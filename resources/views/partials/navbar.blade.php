<nav class="nb">
    <div class="cn ni">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="NEX Gen" />
            <span class="logo-name">NEX <b>Gen</b></span>
        </a>
        <div class="nmn">
            <a href="{{ url('/#home') }}" class="active">Home</a>
            <a href="{{ url('/#about') }}">About</a>
            <a href="{{ url('/#services') }}">Services</a>
            <a href="{{ url('/#products') }}">Products</a>
            <a href="{{ url('/#testi') }}">Reviews</a>
            <a href="{{ url('/#contact') }}">Contact</a>
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
