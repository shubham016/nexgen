<!-- TOPBAR -->
@php
    $notifications = \App\Models\ContactMessage::where('status', 'new')
        ->latest()->take(5)->get();
    $notifCount = \App\Models\ContactMessage::where('status', 'new')->count();
@endphp
<nav id="topbar" class="navbar bg-white border-bottom fixed-top topbar px-3">
    <button id="toggleBtn" class="d-none d-lg-inline-flex btn btn-light btn-icon btn-sm">
        <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>

    <!-- MOBILE -->
    <button id="mobileBtn" class="btn btn-light btn-icon btn-sm d-lg-none me-2">
        <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>
    <div>
        <ul class="list-unstyled d-flex align-items-center mb-0 gap-1">
            <!-- Bell icon -->
            <li class="dropdown">
                <a class="position-relative btn-icon btn-sm btn-light btn rounded-circle" data-bs-toggle="dropdown"
                    aria-expanded="false" href="#" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-bell">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                    </svg>
                    @if($notifCount > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                            {{ $notifCount > 9 ? '9+' : $notifCount }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-0" style="min-width: 320px;">
                    <div class="px-3 py-2 border-bottom d-flex justify-content-between align-items-center">
                        <span class="fw-semibold small">Notifications</span>
                        @if($notifCount > 0)
                            <span class="badge bg-danger">{{ $notifCount }} new</span>
                        @endif
                    </div>
                    <ul class="list-unstyled p-0 m-0" style="max-height: 320px; overflow-y: auto;">
                        @forelse($notifications as $notif)
                        <li>
                            <a href="{{ route('admin.messages.show', $notif) }}" class="d-flex gap-3 px-3 py-2 border-bottom text-decoration-none text-dark {{ $notif->status === 'new' ? 'bg-primary bg-opacity-10' : '' }}">
                                <div class="icon-shape icon-sm bg-primary bg-opacity-10 text-primary rounded-circle flex-shrink-0 mt-1">
                                    <i class="ti ti-mail"></i>
                                </div>
                                <div class="flex-grow-1 small overflow-hidden">
                                    <div class="fw-semibold text-truncate">{{ $notif->name }}</div>
                                    <div class="text-muted text-truncate">{{ $notif->subject ?: $notif->message }}</div>
                                    <div class="text-secondary" style="font-size:11px;">{{ $notif->created_at->diffForHumans() }}</div>
                                </div>
                                @if($notif->status === 'new')
                                    <span class="badge bg-danger align-self-start mt-1" style="font-size:9px;">NEW</span>
                                @endif
                            </a>
                        </li>
                        @empty
                        <li class="px-3 py-4 text-center text-muted small">
                            <i class="ti ti-bell-off d-block mb-1" style="font-size:24px;"></i>
                            No new notifications
                        </li>
                        @endforelse
                    </ul>
                    <div class="px-3 py-2 text-center border-top">
                        <a href="{{ route('admin.messages.index') }}" class="text-primary small">View all messages</a>
                    </div>
                </div>
            </li>
            <!-- Dropdown -->
            <li class="ms-3 dropdown">
                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('admin-assets/images/nexgen_logo.png') }}" alt="" class="avatar avatar-sm rounded-circle" />
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0" style="min-width: 200px;">
                    <div>
                        <div class="d-flex gap-3 align-items-center border-dashed border-bottom px-3 py-3">
                            <img src="{{ asset('admin-assets/images/nexgen_logo.png') }}" alt="" class="avatar avatar-md rounded-circle" />
                            <div>
                                <h4 class="mb-0 small">Admin User</h4>
                                <p class="mb-0 small">@admin</p>
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column gap-1 small lh-lg">
                            <a href="{{ route('admin.dashboard') }}" class="">
                                <span>Dashboard</span>
                            </a>
                            <a href="{{ url('/') }}" class="" target="_blank">
                                <span>View Website</span>
                            </a>
                            <a href="#!" class="">
                                <span>Account Settings</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" id="topbarLogoutForm">
                                @csrf
                                <a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('topbarLogoutForm').submit();">
                                    <span>Logout</span>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
