@extends('layouts.admin')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fw-bold text-dark">About Me Management</h1>
        <p class="text-muted small">Update your personal story and future goals.</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card p-5 border-0 shadow-sm">
            <form action="{{ route('admin.about.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="about_me" class="form-label small fw-bold text-secondary">About Me (Long Bio)</label>
                    <textarea class="form-control rounded-3 border-light bg-light" id="about_me" name="about_me" rows="8" required placeholder="Describe your journey, interests, and what drives you as a student developer...">{{ old('about_me', $about->about_me ?? '') }}</textarea>
                </div>

                <div class="mb-5">
                    <label for="future_goals" class="form-label small fw-bold text-secondary">Future Goals</label>
                    <textarea class="form-control rounded-3 border-light bg-light" id="future_goals" name="future_goals" rows="4" required placeholder="What are your short-term and long-term goals in the tech industry?">{{ old('future_goals', $about->future_goals ?? '') }}</textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill py-3 fw-bold shadow-sm">Update About Me</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card p-4 border-0 shadow-sm bg-primary text-white mb-4 rounded-4">
            <h5 class="fw-bold mb-3">Writing Tip</h5>
            <p class="small mb-0 opacity-75">Be authentic and talk about your learning process. Student portfolios stand out when you show your passion for problem-solving!</p>
        </div>
    </div>
</div>
@endsection
