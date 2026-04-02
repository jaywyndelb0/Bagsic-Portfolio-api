@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <div class="sakai-card">
            <h2 class="sakai-title">Profile Information</h2>
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="full_name" class="block text-sm font-bold text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $profile->full_name ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" required>
                </div>
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $profile->title ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" required>
                </div>
                <div>
                    <label for="bio" class="block text-sm font-bold text-gray-700 mb-2">Bio</label>
                    <textarea name="bio" id="bio" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" required>{{ old('bio', $profile->bio ?? '') }}</textarea>
                </div>
                <div>
                    <label for="profile_image" class="block text-sm font-bold text-gray-700 mb-2">Profile Image</label>
                    <input type="file" name="profile_image" id="profile_image" class="w-full border border-gray-300 rounded-lg px-4 py-3">
                    @if($profile && $profile->profile_image)
                        <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile Image" class="mt-4 w-32 h-32 object-cover rounded-lg">
                    @endif
                </div>
                <button type="submit" class="sakai-button w-full">Update Profile</button>
            </form>
        </div>
    </div>
    <div>
        <div class="sakai-card">
            <h2 class="sakai-title">Contact Details</h2>
            <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $profile->email ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $profile->phone ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                </div>
                <div>
                    <label for="location" class="block text-sm font-bold text-gray-700 mb-2">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $profile->location ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                </div>
                <div>
                    <label for="address" class="block text-sm font-bold text-gray-700 mb-2">Address</label>
                    <input type="text" name="address" id="address" value="{{ old('address', $profile->address ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                </div>
                <button type="submit" class="sakai-button w-full">Update Contact</button>
            </form>
        </div>
    </div>
</div>
@endsection
