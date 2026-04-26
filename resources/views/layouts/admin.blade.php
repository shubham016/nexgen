<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'NEXGEN Admin - Inventory Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/nexgen_logo.png') }}?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/nexgen_logo.png') }}?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/nexgen_logo.png') }}?v=2">
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

    <script>
    (function () {
        const pollUrl = '{{ route('admin.notifications.poll') }}';
        let lastCount = {{ \App\Models\ContactMessage::where('status','new')->count() }};

        function updateBadge(count) {
            const badges = document.querySelectorAll('.notif-badge');
            badges.forEach(b => {
                if (count > 0) {
                    b.textContent = count > 9 ? '9+' : count;
                    b.classList.remove('d-none');
                } else {
                    b.classList.add('d-none');
                }
            });
        }

        function poll() {
            fetch(pollUrl)
                .then(r => r.json())
                .then(data => {
                    if (data.count !== lastCount) {
                        lastCount = data.count;
                        updateBadge(data.count);
                        // Reload dropdown list if new messages arrived
                        if (data.count > 0) {
                            const list = document.getElementById('notifList');
                            if (list) {
                                list.innerHTML = data.notifications.map(n => `
                                    <li>
                                        <a href="/admin/messages/${n.id}" class="d-flex gap-3 px-3 py-2 border-bottom text-decoration-none text-dark bg-primary bg-opacity-10">
                                            <div class="icon-shape icon-sm bg-primary bg-opacity-10 text-primary rounded-circle flex-shrink-0 mt-1">
                                                <i class="ti ti-mail"></i>
                                            </div>
                                            <div class="flex-grow-1 small overflow-hidden">
                                                <div class="fw-semibold text-truncate">${n.name}</div>
                                                <div class="text-muted text-truncate">${n.subject || n.message}</div>
                                            </div>
                                            <span class="badge bg-danger align-self-start mt-1" style="font-size:9px;">NEW</span>
                                        </a>
                                    </li>`).join('');
                            }
                        }
                    }
                })
                .catch(() => {});
        }

        setInterval(poll, 30000);
    })();
    </script>
</body>
</html>
