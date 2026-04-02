@extends('layouts.app')

@section('content')
<section class="py-5 bg-white">
    <div class="container mt-5">
        <h2 class="section-title">My Projects</h2>
        <p class="lead text-muted mb-5">A showcase of the student projects and experiments I've worked on.</p>

        <div class="row g-4">
            @forelse($projects as $project)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border border-light-subtle rounded-4">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top rounded-top-4" alt="{{ $project->name }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top rounded-top-4 bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-muted h4 fw-bold">No Image</span>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold mb-3">{{ $project->name }}</h3>
                        <p class="text-muted small mb-4">{{ Str::limit($project->description, 100) }}</p>
                        
                        <div class="mb-4">
                            @if($project->technologies_used)
                                @foreach(explode(',', $project->technologies_used) as $tech)
                                    <span class="badge bg-light text-primary border border-primary-subtle me-1">{{ trim($tech) }}</span>
                                @endforeach
                            @endif
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" class="btn btn-sm btn-outline-dark px-3 rounded-pill" target="_blank">GitHub</a>
                            @endif
                            @if($project->live_url)
                                <a href="{{ $project->live_url }}" class="btn btn-sm btn-primary px-3 rounded-pill" target="_blank">Live Demo</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted h5">No projects found.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
