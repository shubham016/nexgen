<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'NEX Gen Admin - Inventory Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin-assets/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin-assets/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin-assets/images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('admin-assets/site.webmanifest') }}">

    <link rel="stylesheet" href="{{ asset('admin-assets/css/main.css') }}">
    @stack('styles')
</head>
<body>
    <div id="overlay" class="overlay"></div>

    @include('admin.partials.topbar')
    @include('admin.partials.sidebar')

    <!-- MAIN CONTENT -->
    <main id="content" class="content py-10">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    <script type="module" src="{{ asset('admin-assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
