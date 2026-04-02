@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="sakai-card">
        <h2 class="sakai-title">My Skills</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($skills as $skill)
                <div class="p-6 rounded-lg border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-bold text-lg text-gray-800">{{ $skill->name }}</h3>
                        <span class="text-sm font-semibold text-blue-600">{{ $skill->level }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $skill->level === 'Beginner' ? '25%' : ($skill->level === 'Intermediate' ? '50%' : '75%') }}"></div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No skills found.</p>
            @endforelse
        </div>
    </div>

    <div class="sakai-card mt-8">
        <h2 class="sakai-title">Tech Stacks</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($techStacks as $category => $stacks)
                <div class="p-6 rounded-lg border border-gray-200">
                    <h3 class="font-bold text-xl text-gray-800 mb-4 capitalize">{{ str_replace('_', ' ', $category) }}</h3>
                    <div class="space-y-4">
                        @foreach($stacks as $stack)
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>{{ $stack->name }}</span>
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
