@extends('layouts.app')

@section('content')
<header class="bg-white py-20 border-b border-gray-100">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <!-- Profile Picture Section -->
        <div class="mb-8 flex justify-center">
            @if(isset($profile->profile_image) && $profile->profile_image)
                <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile" class="w-48 h-48 rounded-full object-cover border-4 border-white shadow-xl">
            @else
                <div class="w-48 h-48 rounded-full bg-blue-100 border-4 border-white shadow-xl flex items-center justify-center">
                    <i class="fas fa-user text-blue-300 text-6xl"></i>
                </div>
            @endif
        </div>
        
        <h1 class="text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
            Hi, I'm <span class="text-blue-600">{{ $profile->full_name ?? 'Student' }}</span>
        </h1>
        <p class="text-2xl font-medium text-gray-600 mb-6">{{ $profile->title ?? 'Full Stack Developer' }}</p>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">{{ $profile->bio ?? 'Welcome to my portfolio. I am passionate about creating clean and efficient web applications.' }}</p>
        
        <div class="mt-10 flex justify-center space-x-4">
            <a href="{{ route('projects') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-200">View My Work</a>
            <a href="{{ route('contact') }}" class="bg-white text-gray-700 border-2 border-gray-200 px-8 py-3 rounded-full font-bold hover:border-blue-600 hover:text-blue-600 transition-all">Get In Touch</a>
        </div>
    </div>
</header>

<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-8 border-b-4 border-blue-600 inline-block pb-2">Quick Overview</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    Welcome to my student developer portfolio! This site highlights my educational background, skills, and projects I've built. Feel free to explore and get in touch if you'd like to collaborate or learn more about my work.
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="text-gray-700 font-medium">{{ $profile->location ?? 'Not specified' }}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <span class="text-gray-700 font-medium">{{ $profile->email ?? 'Not specified' }}</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-blue-600 mb-8">Portfolio Highlights</h3>
                <div class="grid grid-cols-2 gap-8">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-gray-900 mb-2">Dynamic</div>
                        <p class="text-gray-500 font-medium">Laravel Powered</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-gray-900 mb-2">Modern</div>
                        <p class="text-gray-500 font-medium">Tailwind Design</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-gray-900 mb-2">Secure</div>
                        <p class="text-gray-500 font-medium">Admin Dashboard</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-gray-900 mb-2">CRUD</div>
                        <p class="text-gray-500 font-medium">Fully Editable</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
