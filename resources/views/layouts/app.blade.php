<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->full_name ?? 'Student Portfolio' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                        {{ $profile->full_name ?? 'Portfolio' }}
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">About</a>
                    <a href="{{ route('skills') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Skills</a>
                    <a href="{{ route('projects') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Projects</a>
                    <a href="{{ route('contact') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Contact</a>
                    
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-5 py-2 rounded-full text-sm font-semibold hover:bg-blue-700 transition-all shadow-md">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="border-2 border-blue-600 text-blue-600 px-5 py-2 rounded-full text-sm font-semibold hover:bg-blue-50 transition-all">Login</a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="text-gray-500 hover:text-gray-600">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 px-4 pt-2 pb-6 space-y-2">
            <a href="{{ route('home') }}" class="block text-gray-600 hover:text-blue-600 font-medium py-2">Home</a>
            <a href="{{ route('about') }}" class="block text-gray-600 hover:text-blue-600 font-medium py-2">About</a>
            <a href="{{ route('skills') }}" class="block text-gray-600 hover:text-blue-600 font-medium py-2">Skills</a>
            <a href="{{ route('projects') }}" class="block text-gray-600 hover:text-blue-600 font-medium py-2">Projects</a>
            <a href="{{ route('contact') }}" class="block text-gray-600 hover:text-blue-600 font-medium py-2">Contact</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="block bg-blue-600 text-white px-4 py-2 rounded-lg text-center font-semibold">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block border-2 border-blue-600 text-blue-600 px-4 py-2 rounded-lg text-center font-semibold">Login</a>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-500">&copy; {{ date('Y') }} {{ $profile->full_name ?? 'Student' }}. Built with Laravel & Tailwind CSS.</p>
        </div>
    </footer>

</body>
</html>
