@extends('layouts.app')

@section('content')
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">My Projects</h2>
            <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full mb-6"></div>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto">A showcase of the student projects and experiments I've worked on during my learning journey.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($projects as $project)
            <div class="group bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                <!-- Project Image -->
                <div class="relative h-64 overflow-hidden">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $project->name }}">
                    @else
                        <div class="w-full h-full bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-project-diagram text-blue-200 text-5xl"></i>
                        </div>
                    @endif
                    @if($project->featured)
                        <div class="absolute top-4 right-4 bg-blue-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">
                            Featured
                        </div>
                    @endif
                </div>

                <!-- Project Content -->
                <div class="p-8 flex flex-col flex-grow">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">{{ $project->name }}</h3>
                    <p class="text-gray-500 mb-6 leading-relaxed flex-grow">{{ Str::limit($project->description, 120) }}</p>
                    
                    <!-- Technologies -->
                    <div class="flex flex-wrap gap-2 mb-8">
                        @if($project->technologies_used)
                            @foreach(explode(',', $project->technologies_used) as $tech)
                                <span class="bg-gray-50 text-gray-600 text-xs font-bold px-3 py-1.5 rounded-lg border border-gray-100">
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    
                    <!-- Links -->
                    <div class="flex items-center space-x-4 pt-6 border-t border-gray-50">
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="flex items-center text-gray-700 hover:text-blue-600 font-bold transition-colors">
                                <i class="fab fa-github mr-2 text-xl"></i> Code
                            </a>
                        @endif
                        @if($project->live_url)
                            <a href="{{ $project->live_url }}" target="_blank" class="flex items-center text-blue-600 hover:text-blue-700 font-bold transition-colors">
                                <i class="fas fa-external-link-alt mr-2 text-lg"></i> Demo
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-folder-open text-gray-300 text-3xl"></i>
                </div>
                <p class="text-xl text-gray-400 font-medium">No projects to show yet. Check back soon!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
