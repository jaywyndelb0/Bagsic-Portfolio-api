@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <div class="sakai-card">
                <h2 class="sakai-title">About Me</h2>
                <p class="text-lg text-gray-600 leading-relaxed">{{ $about->about_me ?? 'I am a passionate student developer...' }}</p>
            </div>
            <div class="sakai-card">
                <h2 class="sakai-title">My Goals</h2>
                <p class="text-lg text-gray-600 leading-relaxed">{{ $about->future_goals ?? 'My goal is to continuously learn...' }}</p>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <div class="sakai-card">
                <h2 class="sakai-title">Education</h2>
                <div class="space-y-6">
                    @forelse($education as $edu)
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">{{ $edu->school_name }}</h3>
                            <p class="text-blue-600 font-semibold">{{ $edu->degree }}</p>
                            <p class="text-sm text-gray-500">{{ $edu->start_date ? $edu->start_date->format('Y') : 'N/A' }} - {{ $edu->is_current ? 'Present' : ($edu->end_date ? $edu->end_date->format('Y') : 'N/A') }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">No education records found.</p>
                    @endforelse
                </div>
            </div>
            <div class="sakai-card">
                <h2 class="sakai-title">Experience</h2>
                <div class="space-y-6">
                    @forelse($experience as $exp)
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">{{ $exp->title }}</h3>
                            <p class="text-blue-600 font-semibold">{{ $exp->organization ?? 'Personal Project' }}</p>
                            <p class="text-sm text-gray-500">{{ $exp->start_date ? $exp->start_date->format('M Y') : 'N/A' }} - {{ $exp->is_current ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : 'N/A') }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">No experience records found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
