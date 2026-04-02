@extends('layouts.admin')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fw-bold text-dark">Profile Management</h1>
        <p class="text-muted small">Update your basic information and contact details.</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card p-5 border-0 shadow-sm">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-5 flex items-center space-x-6">
                    <div class="shrink-0">
                        @if($profile && $profile->profile_image)
                            <img class="h-24 w-24 object-cover rounded-full ring-4 ring-blue-50" src="{{ asset('storage/' . $profile->profile_image) }}" alt="Current profile photo">
                        @else
                            <div class="h-24 w-24 rounded-full bg-blue-100 flex items-center justify-center text-blue-300">
                                <i class="fas fa-user text-3xl"></i>
                            </div>
                        @endif
                    </div>
                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" name="profile_image" class="block w-full text-sm text-slate-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-blue-50 file:text-blue-700
                          hover:file:bg-blue-100
                        "/>
                    </label>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label for="full_name" class="form-label small fw-bold text-secondary">Full Name</label>
                        <input type="text" class="form-control form-control-lg rounded-3 border-light bg-light" id="full_name" name="full_name" value="{{ old('full_name', $profile->full_name ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="title" class="form-label small fw-bold text-secondary">Job Title</label>
                        <input type="text" class="form-control form-control-lg rounded-3 border-light bg-light" id="title" name="title" value="{{ old('title', $profile->title ?? '') }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="bio" class="form-label small fw-bold text-secondary">Biography</label>
                    <textarea class="form-control rounded-3 border-light bg-light" id="bio" name="bio" rows="4" required>{{ old('bio', $profile->bio ?? '') }}</textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label for="location" class="form-label small fw-bold text-secondary">Location</label>
                        <input type="text" class="form-control form-control-lg rounded-3 border-light bg-light" id="location" name="location" value="{{ old('location', $profile->location ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label small fw-bold text-secondary">Email Address</label>
                        <input type="email" class="form-control form-control-lg rounded-3 border-light bg-light" id="email" name="email" value="{{ old('email', $profile->email ?? '') }}">
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <label for="phone" class="form-label small fw-bold text-secondary">Phone Number</label>
                        <input type="text" class="form-control form-control-lg rounded-3 border-light bg-light" id="phone" name="phone" value="{{ old('phone', $profile->phone ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label small fw-bold text-secondary">Full Address</label>
                        <input type="text" class="form-control form-control-lg rounded-3 border-light bg-light" id="address" name="address" value="{{ old('address', $profile->address ?? '') }}">
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill py-3 fw-bold shadow-sm">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card p-4 border-0 shadow-sm bg-primary text-white mb-4 rounded-4">
            <h5 class="fw-bold mb-3">Live Preview Info</h5>
            <p class="small mb-0 opacity-75">This information is used across the home and contact pages of your portfolio.</p>
        </div>
        <div class="card p-4 border-0 shadow-sm bg-white rounded-4">
            <h5 class="fw-bold mb-3">Status</h5>
            <div class="d-flex align-items-center">
                <div class="bg-success rounded-circle me-2" style="width: 10px; height: 10px;"></div>
                <span class="small fw-semibold text-success">Profile Online</span>
            </div>
        </div>
    </div>
</div>
@endsection
