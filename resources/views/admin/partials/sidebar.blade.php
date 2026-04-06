<!-- SIDEBAR -->
<aside id="sidebar" class="sidebar">
    <div class="logo-area">
        <a href="{{ route('admin.dashboard') }}" class="d-inline-flex">
            <img src="{{ asset('images/logo.png') }}" alt="NEX Gen" width="40">
            <span class="logo-text ms-2 fs-5 fw-bold" style="color: #1a6dd4;">NEXGEN</span>
        </a>
    </div>
    <ul class="nav flex-column">
        <li class="px-4 py-2"><small class="nav-text">Main</small></li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="ti ti-home"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>

        <li>
            <a class="nav-link {{ request()->routeIs('admin.products.create') ? 'active' : '' }}"
                href="{{ route('admin.products.create') }}">
                <i class="ti ti-plus"></i>
                <span class="nav-text">Add Product</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.inventory') ? 'active' : '' }}"
                href="{{ route('admin.inventory') }}">
                <i class="ti ti-box-seam"></i>
                <span class="nav-text">Inventory</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
                href="{{ route('admin.categories.index') }}">
                <i class="ti ti-tag"></i>
                <span class="nav-text">Categories</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}"
                href="{{ route('admin.reports') }}">
                <i class="ti ti-receipt"></i>
                <span class="nav-text">Reports</span>
            </a>
        </li>

        <li class="px-4 pt-4 pb-2"><small class="nav-text">Website Content</small></li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.hero-cameras.*') ? 'active' : '' }}"
                href="{{ route('admin.hero-cameras.index') }}">
                <i class="ti ti-video"></i>
                <span class="nav-text">Hero Cameras</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.stats.*') ? 'active' : '' }}"
                href="{{ route('admin.stats.index') }}">
                <i class="ti ti-chart-bar"></i>
                <span class="nav-text">Why Choose Us</span>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"
                href="{{ route('admin.testimonials.index') }}">
                <i class="ti ti-message-star"></i>
                <span class="nav-text">Testimonials</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="{{ url('/') }}" target="_blank">
                <i class="ti ti-world"></i>
                <span class="nav-text">View Website</span>
            </a>
        </li>

        <li class="px-4 pt-4 pb-2"><small class="nav-text">Account</small></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                @csrf
                <a class="nav-link" href="#"
                    onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    <i class="ti ti-logout"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </form>
        </li>
    </ul>
</aside>