<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->full_name ?? 'Student Portfolio' }}</title>
    <!-- Simple Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; color: #333; }
        .navbar { background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .footer { padding: 40px 0; background-color: #fff; border-top: 1px solid #dee2e6; margin-top: 60px; }
        .hero-section { padding: 100px 0; background-color: #fff; border-bottom: 1px solid #eee; }
        .section-title { margin-bottom: 40px; font-weight: bold; border-bottom: 2px solid #0d6efd; display: inline-block; padding-bottom: 10px; }
        .card { border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">{{ $profile->full_name ?? 'Portfolio' }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Me</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('skills') }}">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('projects') }}">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    @auth
                        <li class="nav-item ms-lg-3"><a class="btn btn-primary btn-sm rounded-pill px-3" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                    @else
                        <li class="nav-item ms-lg-3"><a class="btn btn-outline-primary btn-sm rounded-pill px-3" href="{{ route('login') }}">Admin Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p class="mb-0 text-muted">&copy; {{ date('Y') }} {{ $profile->full_name ?? 'Student' }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
