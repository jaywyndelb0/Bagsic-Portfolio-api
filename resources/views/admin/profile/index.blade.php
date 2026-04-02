@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Admin Profile</h1>
        <p class="text-lg text-gray-600">Update your profile information and contact details.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
            @csrf
            @method('PUT')

            <!-- Profile Information Section -->
            <div class="border-b border-gray-200 pb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Profile Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2 flex flex-col items-center mb-6">
                        <div class="relative group">
                            @if($profile && $profile->profile_image)
                                <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile Image" class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg">
                            @else
                                <div class="w-32 h-32 bg-blue-100 rounded-full flex items-center justify-center border-4 border-white shadow-lg text-blue-300 text-4xl font-bold">
                                    {{ substr($profile->full_name ?? 'A', 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="mt-4 w-full max-w-xs text-center">
                            <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-2">Change Profile Picture</label>
                            <input type="file" name="profile_image" id="profile_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all cursor-pointer">
                        </div>
                    </div>

                    <div class="md:col-span-1">
                        <label for="full_name" class="block text-sm font-bold text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $profile->full_name ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all shadow-sm" required>
                    </div>

                    <div class="md:col-span-1">
                        <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Professional Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $profile->title ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all shadow-sm" required>
                    </div>

                    <div class="md:col-span-2">
                        <label for="bio" class="block text-sm font-bold text-gray-700 mb-2">Short Biography</label>
                        <textarea name="bio" id="bio" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all shadow-sm" required>{{ old('bio', $profile->bio ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Contact Details Section -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Contact Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $profile->email ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all shadow-sm">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $profile->phone ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all shadow-sm">
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-bold text-gray-700 mb-2">Location (City, Country)</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $profile->location ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all shadow-sm">
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-bold text-gray-700 mb-2">Full Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $profile->address ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all shadow-sm">
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end pt-6">
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-200 transform hover:-translate-y-0.5 active:translate-y-0">
                    Save All Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
