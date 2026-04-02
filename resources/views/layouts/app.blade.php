<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->full_name ?? 'Student Portfolio' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .sakai-card { background-color: #ffffff; border-radius: 12px; padding: 2rem; box-shadow: 0 4px 25px 0 rgba(0,0,0,0.05); border: 1px solid #e9ecef; }
        .sakai-title { font-weight: 700; font-size: 1.25rem; color: #343a40; margin-bottom: 1.5rem; }
        .sakai-button { background-color: #0d6efd; color: #ffffff; font-weight: 700; padding: 0.75rem 1.5rem; border-radius: 8px; transition: background-color 0.3s; }
        .sakai-button:hover { background-color: #0b5ed7; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-3xl font-extrabold text-blue-600">
                        {{ $profile->full_name ?? 'Portfolio' }}
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-10">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-semibold text-lg transition-colors">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 font-semibold text-lg transition-colors">About</a>
                    <a href="{{ route('skills') }}" class="text-gray-700 hover:text-blue-600 font-semibold text-lg transition-colors">Skills</a>
                    <a href="{{ route('projects') }}" class="text-gray-700 hover:text-blue-600 font-semibold text-lg transition-colors">Projects</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 font-semibold text-lg transition-colors">Contact</a>
                    
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="sakai-button">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="sakai-button">Login</a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="text-gray-600 hover:text-gray-700">
                        <i class="fas fa-bars text-3xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 px-4 pt-4 pb-8 space-y-4">
            <a href="{{ route('home') }}" class="block text-gray-700 hover:text-blue-600 font-semibold py-2 text-lg">Home</a>
            <a href="{{ route('about') }}" class="block text-gray-700 hover:text-blue-600 font-semibold py-2 text-lg">About</a>
            <a href="{{ route('skills') }}" class="block text-gray-700 hover:text-blue-600 font-semibold py-2 text-lg">Skills</a>
            <a href="{{ route('projects') }}" class="block text-gray-700 hover:text-blue-600 font-semibold py-2 text-lg">Projects</a>
            <a href="{{ route('contact') }}" class="block text-gray-700 hover:text-blue-600 font-semibold py-2 text-lg">Contact</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="block sakai-button text-center">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block sakai-button text-center">Login</a>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen py-12">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-600 text-lg">&copy; {{ date('Y') }} {{ $profile->full_name ?? 'Student' }}. Inspired by Sakai.</p>
        </div>
    </footer>

</body>
</html>
