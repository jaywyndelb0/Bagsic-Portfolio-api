@extends('layouts.app')

@section('content')
<section class="py-5 bg-white">
    <div class="container mt-5">
        <h2 class="section-title">Get in Touch</h2>
        <p class="lead text-muted mb-5">Feel free to reach out to me for collaborations, projects, or just to say hi!</p>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-5">
                <div class="p-5 bg-light rounded-4 shadow-sm h-100 border border-1 border-light-subtle text-center">
                    <h3 class="h4 mb-4 fw-bold text-primary">Contact Details</h3>
                    <p class="mb-4">You can reach me directly at:</p>
                    <div class="mb-5">
                        <div class="h5 fw-bold text-dark mb-1">Email</div>
                        <p class="text-primary fs-5 fw-semibold mb-4">{{ $profile->email ?? 'Not specified' }}</p>
                        
                        <div class="h5 fw-bold text-dark mb-1">Location</div>
                        <p class="text-secondary fs-6 mb-0">{{ $profile->location ?? 'Not specified' }}</p>
                        <p class="text-muted small">{{ $profile->address ?? '' }}</p>
                    </div>

                    <h4 class="h5 mb-4 fw-bold text-dark border-top pt-4">Social Profiles</h4>
                    <div class="d-flex justify-content-center gap-3">
                        @forelse($socialLinks as $link)
                            <a href="{{ $link->url }}" class="btn btn-outline-primary px-4 rounded-pill" target="_blank">{{ $link->platform }}</a>
                        @empty
                            <p class="text-muted small">No social links found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="p-5 bg-white rounded-4 shadow-sm border border-1 border-light-subtle h-100">
                    <h3 class="h4 mb-4 fw-bold text-dark">Send a Message</h3>
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Your Name</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0 px-4 rounded-4" id="name" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control form-control-lg bg-light border-0 px-4 rounded-4" id="email" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold">Your Message</label>
                            <textarea class="form-control form-control-lg bg-light border-0 px-4 py-3 rounded-4" id="message" name="message" rows="4" placeholder="How can I help you?" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill py-3 fw-bold">Send Message</button>
                        </div>
                    </form>
                    <p class="mt-4 text-center small text-muted">Note: This form is currently for display only in this student project.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
