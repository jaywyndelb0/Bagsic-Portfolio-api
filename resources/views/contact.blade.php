@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Contact Info -->
        <div class="sakai-card">
            <h2 class="sakai-title">Contact Information</h2>
            <div class="space-y-6">
                <div class="flex items-center">
                    <i class="fas fa-envelope text-blue-600 mr-4"></i>
                    <a href="mailto:{{ $profile->email }}" class="text-lg text-gray-700 hover:text-blue-600">{{ $profile->email }}</a>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-map-marker-alt text-blue-600 mr-4"></i>
                    <span class="text-lg text-gray-700">{{ $profile->location }}</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-phone text-blue-600 mr-4"></i>
                    <span class="text-lg text-gray-700">{{ $profile->phone }}</span>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h3 class="sakai-title">Follow Me</h3>
                <div class="flex space-x-4">
                    @forelse($socialLinks as $link)
                        <a href="{{ $link->url }}" target="_blank" class="text-gray-500 hover:text-blue-600">
                            <i class="fab fa-{{ strtolower($link->platform) }} text-2xl"></i>
                        </a>
                    @empty
                        <p class="text-gray-500">No social links found.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="sakai-card">
            <h2 class="sakai-title">Send a Message</h2>
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Your Name</label>
                    <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="Enter your name" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="example@email.com" required>
                </div>
                <div>
                    <label for="message" class="block text-sm font-bold text-gray-700 mb-2">Your Message</label>
                    <textarea name="message" id="message" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="What would you like to say?" required></textarea>
                </div>
                <button type="submit" class="sakai-button w-full">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection
