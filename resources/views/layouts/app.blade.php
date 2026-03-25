<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>@yield('title', 'NEX Gen - Complete Security Camera Solutions')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    @include('partials.styles')

    @stack('styles')
</head>
<body>
    <!-- Mobile Navigation -->
    <div class="mobn" id="mobn">
        <button class="clb" onclick="document.getElementById('mobn').classList.remove('open')">&times;</button>
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
