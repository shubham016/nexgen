<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Reset Password - NEXGEN Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/nexgen_logo.png') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/main.css') }}">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card p-5 shadow-lg" style="max-width: 420px; width: 100%;">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="d-inline-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('images/nexgen_logo.png') }}" alt="NEX Gen" width="40">
                    <span class="fs-4 fw-bold" style="color: #1a6dd4;">NEXGEN</span>
                </a>
                <h3 class="fw-bold mb-1">Reset Password</h3>
                <p class="text-muted small">Enter your new password below.</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $request->email) }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                        autocomplete="new-password"
                        placeholder="Enter new password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm new password"
                    >
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="ti ti-lock-check me-2"></i>Reset Password
                </button>
            </form>

            <div class="text-center mt-4 pt-3 border-top">
                <a href="{{ route('login') }}" class="text-muted small">
                    <i class="ti ti-arrow-left me-1"></i>Back to Login
                </a>
            </div>
        </div>
    </div>

    <script type="module" src="{{ asset('admin-assets/js/main.js') }}"></script>
</body>
</html>
