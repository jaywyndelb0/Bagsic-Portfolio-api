@extends('layouts.admin')

@section('content')
<div class="mb-5">
    <h1 class="fw-bold text-dark">Welcome back, Admin!</h1>
    <p class="text-muted">Here's what's happening in your portfolio.</p>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card p-4 h-100">
            <div class="text-primary h1 mb-2">🚀</div>
            <h3 class="fw-bold mb-0">{{ $stats['projects'] }}</h3>
            <p class="text-muted small mb-0">Total Projects</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 h-100">
            <div class="text-success h1 mb-2">⚡</div>
            <h3 class="fw-bold mb-0">{{ $stats['skills'] }}</h3>
            <p class="text-muted small mb-0">Skills Listed</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 h-100">
            <div class="text-warning h1 mb-2">🎓</div>
            <h3 class="fw-bold mb-0">{{ $stats['education'] }}</h3>
            <p class="text-muted small mb-0">Education Entries</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 h-100">
            <div class="text-info h1 mb-2">🛠️</div>
            <h3 class="fw-bold mb-0">{{ $stats['tech_stacks'] }}</h3>
            <p class="text-muted small mb-0">Tech Stacks</p>
        </div>
    </div>
</div>

<div class="card p-5 bg-white border-0">
    <h3 class="fw-bold mb-4">Quick Links</h3>
    <div class="row g-3">
        <div class="col-md-4">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-light w-100 py-3 text-start ps-4 rounded-4 border-0">
                <span class="me-2">➕</span> Add New Project
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.skills.index') }}" class="btn btn-light w-100 py-3 text-start ps-4 rounded-4 border-0">
                <span class="me-2">➕</span> Add New Skill
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.profile.index') }}" class="btn btn-light w-100 py-3 text-start ps-4 rounded-4 border-0">
                <span class="me-2">✏️</span> Edit Profile
            </a>
        </div>
    </div>
</div>
@endsection
