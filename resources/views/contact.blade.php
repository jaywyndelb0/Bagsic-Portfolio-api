@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Get in Touch</h2>
            <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full mb-6"></div>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto">Feel free to reach out to me for collaborations, projects, or just to say hi!</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-stretch">
            <!-- Left Side: Contact Details -->
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 flex items-center">
                        <i class="fas fa-id-card text-blue-600 mr-3"></i> Contact Details
                    </h3>
                    
                    <div class="space-y-8">
                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 shrink-0">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-1">Email</h4>
                                <p class="text-lg font-bold text-blue-600 break-all">{{ $profile->email ?? 'Not specified' }}</p>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 shrink-0">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-1">Location</h4>
                                <p class="text-lg font-bold text-gray-800">{{ $profile->location ?? 'Not specified' }}</p>
                                <p class="text-gray-500 text-sm mt-1">{{ $profile->address ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="mt-12 pt-10 border-t border-gray-50">
                    <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Connect with me</h4>
                    <div class="flex flex-wrap gap-3">
                        @forelse($socialLinks as $link)
                            <a href="{{ $link->url }}" target="_blank" class="bg-gray-50 text-gray-700 px-6 py-2.5 rounded-full font-bold text-sm hover:bg-blue-600 hover:text-white hover:shadow-lg hover:shadow-blue-100 transition-all border border-gray-100">
                                {{ $link->platform }}
                            </a>
                        @empty
                            <p class="text-gray-400 text-sm italic">No social links added yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right Side: Contact Form -->
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-8 flex items-center">
                    <i class="fas fa-paper-plane text-blue-600 mr-3"></i> Send a Message
                </h3>
                
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Your Name</label>
                        <input type="text" name="name" id="name" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-blue-50 focus:border-blue-600 focus:bg-white outline-none transition-all text-gray-800 placeholder-gray-400" placeholder="Enter your name" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-blue-50 focus:border-blue-600 focus:bg-white outline-none transition-all text-gray-800 placeholder-gray-400" placeholder="example@email.com" required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-700 mb-2">Your Message</label>
                        <textarea name="message" id="message" rows="5" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-blue-50 focus:border-blue-600 focus:bg-white outline-none transition-all text-gray-800 placeholder-gray-400" placeholder="What would you like to say?" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white font-extrabold py-4 rounded-2xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-100 flex items-center justify-center">
                        Send Message <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </button>
                </form>
                
                <div class="mt-8 p-4 bg-yellow-50 rounded-2xl border border-yellow-100 flex items-start space-x-3">
                    <i class="fas fa-info-circle text-yellow-600 mt-1"></i>
                    <p class="text-xs text-yellow-700 leading-relaxed font-medium">
                        Note: This form is currently for display only in this student project. Backend message handling is not implemented yet.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
