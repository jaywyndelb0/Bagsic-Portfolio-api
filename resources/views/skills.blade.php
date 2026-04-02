@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- My Skills Section -->
    <div class="bg-white shadow-lg rounded-lg p-8 mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">My Skills</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($skills as $skill)
                @php
                    $width = match($skill->level) {
                        'Beginner' => '33%',
                        'Intermediate' => '66%',
                        default => '100%',
                    };
                @endphp
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-bold text-lg text-gray-800">{{ $skill->name }}</h3>
                        <span class="text-sm font-semibold text-blue-600">{{ $skill->level }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-blue-600 h-4 rounded-full" @style(['width' => $width])></div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No skills found.</p>
            @endforelse
        </div>
    </div>

    <!-- Tech Stacks Section -->
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Tech Stacks</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($techStacks as $category => $stacks)
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="font-bold text-xl text-gray-800 mb-4 capitalize">{{ str_replace('_', ' ', $category) }}</h3>
                    <div class="space-y-4">
                        @foreach($stacks as $stack)
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-700">{{ $stack->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No tech stacks found.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
