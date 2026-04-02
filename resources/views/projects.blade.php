@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">My Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $project->name }}</h3>
                        <p class="text-gray-600 mb-4 h-24 overflow-hidden">{{ $project->description }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ $project->github_url }}" target="_blank" class="bg-gray-800 text-white px-4 py-2 rounded-md font-semibold hover:bg-gray-900 transition-colors">GitHub</a>
                            @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-700 transition-colors">Live Demo</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="md:col-span-2 lg:col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">No projects found.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
