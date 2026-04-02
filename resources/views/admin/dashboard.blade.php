@extends('layouts.admin')

@section('content')
<div class="p-6 mx-auto">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Welcome back, Admin!</h1>
        <p class="text-lg text-gray-600">Here's what's happening in your portfolio.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center">
                <div class="bg-blue-500 text-white rounded-full p-3">
                    <i class="fas fa-rocket text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-3xl font-bold">{{ $stats['projects'] }}</h3>
                    <p class="text-gray-600">Total Projects</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center">
                <div class="bg-green-500 text-white rounded-full p-3">
                    <i class="fas fa-bolt text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-3xl font-bold">{{ $stats['skills'] }}</h3>
                    <p class="text-gray-600">Skills Listed</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center">
                <div class="bg-yellow-500 text-white rounded-full p-3">
                    <i class="fas fa-graduation-cap text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-3xl font-bold">{{ $stats['education'] }}</h3>
                    <p class="text-gray-600">Education Entries</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center">
                <div class="bg-indigo-500 text-white rounded-full p-3">
                    <i class="fas fa-tools text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-3xl font-bold">{{ $stats['tech_stacks'] }}</h3>
                    <p class="text-gray-600">Tech Stacks</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h3 class="text-2xl font-bold mb-6">Quick Links</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('admin.projects.index') }}" class="bg-blue-600 text-white text-center py-4 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors flex items-center justify-center">
                <i class="fas fa-plus-circle mr-3"></i> Add New Project
            </a>
            <a href="{{ route('admin.skills.index') }}" class="bg-green-600 text-white text-center py-4 px-6 rounded-lg font-semibold hover:bg-green-700 transition-colors flex items-center justify-center">
                <i class="fas fa-plus-circle mr-3"></i> Add New Skill
            </a>
            <a href="{{ route('admin.profile.index') }}" class="bg-yellow-600 text-white text-center py-4 px-6 rounded-lg font-semibold hover:bg-yellow-700 transition-colors flex items-center justify-center">
                <i class="fas fa-edit mr-3"></i> Edit Profile
            </a>
        </div>
    </div>
</div>
@endsection
