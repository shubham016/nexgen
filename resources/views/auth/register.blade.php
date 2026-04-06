<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Sign Up - NEX Gen Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/nexgen_logo.png') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/main.css') }}">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100 py-5">
        <div class="card p-5 shadow-lg" style="max-width: 480px; width: 100%;">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="d-inline-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('images/nexgen_logo.png') }}" alt="NEX Gen" width="40">
                    <span class="fs-4 fw-bold" style="color: #1a6dd4;">NEX Gen</span>
                </a>
                <h3 class="fw-bold mb-1">Create Admin Account</h3>
                <p class="text-muted small">Fill in the form to get started</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Enter your full name"
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        placeholder="Enter your email"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                        autocomplete="new-password"
                        placeholder="Create a password (min. 8 characters)"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm your password"
                    >
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 mb-3">
                    <i class="ti ti-user-plus me-2"></i>Create Account
                </button>

                <!-- Login Link -->
                <p class="text-center text-muted small mb-0">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-primary fw-semibold">Sign in</a>
                </p>
            </form>

            <!-- Back to Website -->
            <div class="text-center mt-4 pt-3 border-top">
                <a href="{{ route('home') }}" class="text-muted small">
                    <i class="ti ti-arrow-left me-1"></i>Back to Website
                </a>
            </div>
        </div>
    </div>

    <script type="module" src="{{ asset('admin-assets/js/main.js') }}"></script>
</body>
</html>
