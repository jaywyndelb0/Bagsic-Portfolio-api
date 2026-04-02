<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Jay Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Segoe UI', sans-serif; }
        .login-card { width: 100%; max-width: 400px; padding: 40px; border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); background: white; }
        .btn-login { padding: 12px; border-radius: 12px; font-weight: bold; background-color: #0d6efd; border: none; }
        .btn-login:hover { background-color: #0b5ed7; }
        .form-control { padding: 12px 15px; border-radius: 10px; background-color: #f8f9fa; border: 1px solid #eee; }
        .form-control:focus { box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1); border-color: #0d6efd; }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Admin Login</h2>
            <p class="text-muted small">Access your portfolio dashboard</p>
        </div>

        @if($errors->any())
        <div class="alert alert-danger small rounded-3 mb-4">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('login.perform') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label small fw-bold text-secondary">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="admin@example.com" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label small fw-bold text-secondary">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>
            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label small text-muted" for="remember">Remember me</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-login">Sign In</button>
            </div>
        </form>
        
        <div class="mt-5 text-center">
            <a href="{{ route('home') }}" class="text-decoration-none small text-muted">← Back to Portfolio</a>
        </div>
    </div>

</body>
</html>
