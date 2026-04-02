@extends('layouts.app')

@section('content')
<section class="py-5 bg-white">
    <div class="container mt-5">
        <h2 class="section-title">About Me</h2>
        <div class="row">
            <div class="col-lg-8">
                <p class="lead mb-4">{{ $about->about_me ?? 'I am a passionate student developer. Welcome to my personal portfolio where I showcase my journey in software development.' }}</p>
                
                <h3 class="h4 mt-5 mb-3 text-primary">My Goals</h3>
                <p>{{ $about->goals ?? 'My goal is to continuously learn and build innovative solutions that solve real-world problems.' }}</p>
            </div>
            <div class="col-lg-4">
                <div class="card p-4 border-light shadow-sm bg-light">
                    <h4 class="fw-bold mb-3">Key Highlights</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2 text-muted">🚀 Dedicated Learner</li>
                        <li class="mb-2 text-muted">💻 Passionate Developer</li>
                        <li class="mb-2 text-muted">🎓 Student Project Enthusiast</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <!-- Education Section -->
            <div class="col-md-6 mb-5">
                <h3 class="h4 border-bottom pb-2 mb-4">Education</h3>
                @forelse($education as $edu)
                <div class="mb-4 position-relative ps-4 border-start border-2 border-primary">
                    <h5 class="fw-bold mb-1">{{ $edu->school_name }}</h5>
                    <p class="text-primary small mb-2 fw-semibold">{{ $edu->degree }} | {{ $edu->start_date ? $edu->start_date->format('M Y') : 'N/A' }} - {{ $edu->is_current ? 'Present' : ($edu->end_date ? $edu->end_date->format('M Y') : 'N/A') }}</p>
                    <p class="text-muted">{{ $edu->description }}</p>
                </div>
                @empty
                <p class="text-muted">No education records found.</p>
                @endforelse
            </div>

            <!-- Experience Section -->
            <div class="col-md-6 mb-5">
                <h3 class="h4 border-bottom pb-2 mb-4">Experience</h3>
                @forelse($experience as $exp)
                <div class="mb-4 position-relative ps-4 border-start border-2 border-primary">
                    <h5 class="fw-bold mb-1">{{ $exp->title }}</h5>
                    <p class="text-primary small mb-2 fw-semibold">{{ $exp->organization ?? 'Personal Project' }} | {{ $exp->start_date ? $exp->start_date->format('M Y') : 'N/A' }} - {{ $exp->is_current ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : 'N/A') }}</p>
                    <p class="text-muted">{{ $exp->description }}</p>
                </div>
                @empty
                <p class="text-muted">No experience records found.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
