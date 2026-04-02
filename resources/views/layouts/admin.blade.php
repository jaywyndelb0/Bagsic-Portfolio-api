<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Jay Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; }
        .sidebar { height: 100vh; background-color: #fff; border-right: 1px solid #eee; position: fixed; width: 250px; padding: 20px; box-shadow: 2px 0 5px rgba(0,0,0,0.02); }
        .main-content { margin-left: 250px; padding: 40px; }
        .nav-link { padding: 12px 15px; border-radius: 10px; color: #555; margin-bottom: 5px; font-weight: 500; transition: all 0.2s; }
        .nav-link:hover { background-color: #f0f7ff; color: #0d6efd; }
        .nav-link.active { background-color: #0d6efd; color: #fff; box-shadow: 0 4px 6px rgba(13, 110, 253, 0.2); }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .table { background: white; border-radius: 15px; overflow: hidden; }
        .table thead { background-color: #fcfcfc; color: #777; font-size: 13px; text-transform: uppercase; }
        .btn-action { width: 32px; height: 32px; padding: 0; line-height: 32px; text-align: center; border-radius: 8px; }
    </style>
</head>
<body>

    <div class="sidebar d-none d-lg-block">
        <div class="mb-5 text-center">
            <h4 class="fw-bold text-primary mb-0">Admin Panel</h4>
            <p class="text-muted small">Jay Portfolio v1.0</p>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
            <a class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" href="{{ route('admin.profile.index') }}">👤 Profile</a>
            <a class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}" href="{{ route('admin.about.index') }}">📝 About Me</a>
            <a class="nav-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}" href="{{ route('admin.skills.index') }}">⚡ Skills</a>
            <a class="nav-link {{ request()->routeIs('admin.tech-stacks.*') ? 'active' : '' }}" href="{{ route('admin.tech-stacks.index') }}">🛠️ Tech Stacks</a>
            <a class="nav-link {{ request()->routeIs('admin.education.*') ? 'active' : '' }}" href="{{ route('admin.education.index') }}">🎓 Education</a>
            <a class="nav-link {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}" href="{{ route('admin.experiences.index') }}">💼 Experience</a>
            <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">🚀 Projects</a>
            <a class="nav-link {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}" href="{{ route('admin.social-links.index') }}">🔗 Social Links</a>
        </nav>
        <div class="mt-auto pt-5 border-top position-absolute bottom-0 start-0 w-100 p-4">
            <div class="d-flex align-items-center mb-3">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">{{ substr(Auth::user()->name, 0, 1) }}</div>
                <div class="small fw-bold text-dark">{{ Auth::user()->name }}</div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 btn-sm rounded-pill">Sign Out</button>
            </form>
        </div>
    </div>

    <div class="main-content">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3 border-0 shadow-sm" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
