@extends('layouts.app')

@section('content')
<header class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold text-dark">Hi, I'm {{ $profile->full_name ?? 'Student' }}</h1>
        <p class="lead text-secondary mb-4">{{ $profile->title ?? 'Full Stack Developer' }}</p>
        <p class="text-muted mx-auto" style="max-width: 700px;">{{ $profile->bio ?? 'Welcome to my portfolio. I am passionate about creating clean and efficient web applications.' }}</p>
        <div class="mt-4">
            <a href="{{ route('projects') }}" class="btn btn-primary btn-lg me-3 px-5">View Projects</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-secondary btn-lg px-5">Contact Me</a>
        </div>
    </div>
</header>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Quick Overview</h2>
                <p>Welcome to my student developer portfolio! This site highlights my educational background, skills, and projects I've built. Feel free to explore and get in touch if you'd like to collaborate or learn more about my work.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><strong>Location:</strong> {{ $profile->location ?? 'Not specified' }}</li>
                    <li class="mb-2"><strong>Email:</strong> {{ $profile->email ?? 'Not specified' }}</li>
                    <li class="mb-2"><strong>Availability:</strong> Open for internships and projects</li>
                </ul>
            </div>
            <div class="col-lg-6 text-center">
                <div class="p-4 bg-light rounded-4 border border-1 border-light-subtle shadow-sm">
                    <h3 class="text-primary mb-3">Portfolio Stats</h3>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <h4 class="fw-bold">Dynamic</h4>
                            <p class="small text-muted">Powered by Laravel</p>
                        </div>
                        <div class="col-6 mb-3">
                            <h4 class="fw-bold">Responsive</h4>
                            <p class="small text-muted">Optimized for Mobile</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
