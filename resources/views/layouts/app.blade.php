<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>@yield('title', 'NEXGEN - Complete Security Camera Solutions')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/nexgen_logo.png') }}?v=2" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap" onload="this.onload=null;this.rel='stylesheet'" />
    <noscript><link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" /></noscript>
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" onload="this.onload=null;this.rel='stylesheet'" />
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" /></noscript>

    @include('partials.styles')

    @stack('styles')
</head>
<body>
    <!-- Mobile Navigation -->
    <div class="mobn" id="mobn">
        <a href="/" onclick="document.getElementById('mobn').classList.remove('open')">Home</a>
        <a href="/about" onclick="document.getElementById('mobn').classList.remove('open')">About</a>
        <a href="/services" onclick="document.getElementById('mobn').classList.remove('open')">Services</a>
        <a href="/products" onclick="document.getElementById('mobn').classList.remove('open')">Products</a>
        <a href="/reviews" onclick="document.getElementById('mobn').classList.remove('open')">Reviews</a>
        <a href="/contact" onclick="document.getElementById('mobn').classList.remove('open')">Contact</a>
    </div>

    @include('partials.topbar')
    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <!-- Scroll to Top Button -->
    <button class="stp" id="stp" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">
        <i class="fas fa-chevron-up"></i>
    </button>

    @include('partials.scripts')

    @stack('scripts')
</body>
</html>
