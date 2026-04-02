@extends('layouts.app')

@section('content')
<section class="py-5 bg-white">
    <div class="container mt-5">
        <h2 class="section-title">My Skills</h2>
        <p class="lead text-muted mb-5">These are the technologies I've been learning and using in my projects.</p>

        <div class="row">
            @forelse($techStacks as $category => $stacks)
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="p-4 bg-light rounded-4 shadow-sm h-100 border border-1 border-light-subtle">
                    <h3 class="h5 mb-4 text-primary text-capitalize fw-bold border-bottom pb-2">{{ $category }}</h3>
                    <ul class="list-unstyled mb-0">
                        @foreach($stacks as $stack)
                        <li class="mb-3 d-flex align-items-center">
                            <span class="badge bg-primary me-2">&bull;</span>
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-semibold">{{ $stack->name }}</span>
                                    <small class="text-muted">{{ $stack->proficiency_level ?? 'Learning' }}</small>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @empty
            <p class="text-muted">No tech stacks found.</p>
            @endforelse
        </div>

        <div class="row mt-5">
            <h3 class="section-title">Other Skills</h3>
            <div class="d-flex flex-wrap gap-2">
                @forelse($skills as $skill)
                <div class="badge bg-light text-primary border border-primary p-3 rounded-pill">
                    {{ $skill->name }} ({{ $skill->level }})
                </div>
                @empty
                <p class="text-muted">No additional skills found.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
