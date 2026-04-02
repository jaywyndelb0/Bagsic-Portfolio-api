@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="sakai-card">
        <h2 class="sakai-title">My Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
                <div class="rounded-lg border border-gray-200 hover:shadow-xl transition-shadow overflow-hidden">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $project->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ $project->github_url }}" target="_blank" class="text-blue-600 hover:underline">GitHub</a>
                            @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" class="text-green-600 hover:underline">Live Demo</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No projects found.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
