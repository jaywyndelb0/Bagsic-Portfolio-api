@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">About Me</h2>
            <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid lg:grid-cols-3 gap-10">
            <!-- Left Side: About & Goals -->
            <div class="lg:col-span-2 space-y-8">
                <!-- About Me Card -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <i class="fas fa-user-circle text-blue-600 mr-3"></i> My Story
                    </h3>
                    <p class="text-gray-600 text-lg leading-relaxed italic">
                        "{{ $about->about_me ?? 'I am a passionate student developer. Welcome to my personal portfolio where I showcase my journey in software development.' }}"
                    </p>
                </div>

                <!-- My Goals Card -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <i class="fas fa-bullseye text-blue-600 mr-3"></i> My Goals
                    </h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{ $about->goals ?? 'My goal is to continuously learn and build innovative solutions that solve real-world problems.' }}
                    </p>
                </div>
            </div>

            <!-- Right Side: Key Highlights -->
            <div>
                <div class="bg-blue-600 p-8 rounded-3xl shadow-xl text-white sticky top-24">
                    <h3 class="text-2xl font-bold mb-8 flex items-center">
                        <i class="fas fa-star mr-3"></i> Key Highlights
                    </h3>
                    <ul class="space-y-6">
                        <li class="flex items-start">
                            <span class="bg-white/20 p-2 rounded-lg mr-4 mt-1"><i class="fas fa-rocket text-sm"></i></span>
                            <div>
                                <h4 class="font-bold text-lg">Dedicated Learner</h4>
                                <p class="text-blue-100 text-sm">Always exploring new tech</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-white/20 p-2 rounded-lg mr-4 mt-1"><i class="fas fa-code text-sm"></i></span>
                            <div>
                                <h4 class="font-bold text-lg">Passionate Developer</h4>
                                <p class="text-blue-100 text-sm">Building clean solutions</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-white/20 p-2 rounded-lg mr-4 mt-1"><i class="fas fa-graduation-cap text-sm"></i></span>
                            <div>
                                <h4 class="font-bold text-lg">Student Enthusiast</h4>
                                <p class="text-blue-100 text-sm">Active project contributor</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Grid: Education & Experience -->
        <div class="grid md:grid-cols-2 gap-10 mt-20">
            <!-- Education Section -->
            <div class="space-y-8">
                <div class="flex items-center space-x-4 mb-2">
                    <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600">
                        <i class="fas fa-university text-xl"></i>
                    </div>
                    <h3 class="text-3xl font-extrabold text-gray-900">Education</h3>
                </div>

                <div class="space-y-6">
                    @forelse($education as $edu)
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-blue-100 transition-colors">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900">{{ $edu->school_name }}</h4>
                                <p class="text-blue-600 font-semibold text-sm uppercase tracking-wider">{{ $edu->degree }}</p>
                            </div>
                            <span class="bg-gray-50 text-gray-500 text-xs font-bold px-3 py-1 rounded-full border border-gray-100">
                                {{ $edu->start_date ? $edu->start_date->format('Y') : 'N/A' }} - {{ $edu->is_current ? 'Present' : ($edu->end_date ? $edu->end_date->format('Y') : 'N/A') }}
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $edu->description }}</p>
                    </div>
                    @empty
                    <div class="text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
                        <p class="text-gray-400">No education records found.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Experience Section -->
            <div class="space-y-8">
                <div class="flex items-center space-x-4 mb-2">
                    <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600">
                        <i class="fas fa-briefcase text-xl"></i>
                    </div>
                    <h3 class="text-3xl font-extrabold text-gray-900">Experience</h3>
                </div>

                <div class="space-y-6">
                    @forelse($experience as $exp)
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-blue-100 transition-colors">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900">{{ $exp->title }}</h4>
                                <p class="text-blue-600 font-semibold text-sm uppercase tracking-wider">{{ $exp->organization ?? 'Personal Project' }}</p>
                            </div>
                            <span class="bg-gray-50 text-gray-500 text-xs font-bold px-3 py-1 rounded-full border border-gray-100">
                                {{ $exp->start_date ? $exp->start_date->format('M Y') : 'N/A' }} - {{ $exp->is_current ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : 'N/A') }}
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $exp->description }}</p>
                    </div>
                    @empty
                    <div class="text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
                        <p class="text-gray-400">No experience records found.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
