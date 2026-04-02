@extends('layouts.app')

@section('content')
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">My Skills</h2>
            <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full mb-6"></div>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto">These are the technologies and tools I've been learning and using in my projects.</p>
        </div>

        <!-- Tech Stacks Grouped by Category -->
        <div class="space-y-20">
            @forelse($techStacks as $category => $stacks)
            <div class="category-section">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 flex items-center capitalize">
                    <span class="w-2 h-8 bg-blue-600 rounded-full mr-4"></span>
                    {{ str_replace('_', ' ', $category) }}
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($stacks as $stack)
                    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-blue-100 transition-all duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $stack->name }}</h4>
                            <span class="bg-blue-50 text-blue-600 text-xs font-bold px-3 py-1 rounded-full border border-blue-100 uppercase tracking-wider">
                                {{ $stack->proficiency_level ?? 'Learning' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 leading-relaxed">{{ $stack->description ?? 'Experienced in building projects using this technology.' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @empty
            <div class="text-center py-12">
                <p class="text-gray-400 font-medium">No tech stacks found. Start adding your expertise!</p>
            </div>
            @endforelse
        </div>

        <!-- Other Additional Skills -->
        <div class="mt-32">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Additional Expertise</h3>
                <div class="w-16 h-1 bg-gray-200 mx-auto rounded-full mb-6"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($skills as $skill)
                <div class="bg-gray-50 p-5 rounded-xl border border-gray-100 text-center hover:bg-white hover:shadow-md transition-all">
                    <div class="font-bold text-gray-800 mb-1">{{ $skill->name }}</div>
                    <div class="text-xs text-blue-600 font-semibold uppercase tracking-tighter">{{ $skill->level }}</div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-400">No additional skills listed yet.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
