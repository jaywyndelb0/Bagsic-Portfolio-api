@extends('layouts.admin')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fw-bold text-dark">Projects Management</h1>
        <p class="text-muted small">Showcase your student projects and experiments.</p>
    </div>
    <button type="button" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addProjectModal">
        ➕ Add New Project
    </button>
</div>

@if($errors->any())
<div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card p-0 border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light border-0">
                <tr>
                    <th class="ps-4 border-0">Project Name</th>
                    <th class="border-0">Image</th>
                    <th class="border-0">Technologies</th>
                    <th class="border-0">Status</th>
                    <th class="pe-4 border-0 text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="border-0">
                @forelse($projects as $project)
                <tr>
                    <td class="ps-4 fw-bold text-dark">{{ $project->name }}</td>
                    <td>
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="rounded-3" style="width: 40px; height: 40px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted small fw-bold" style="width: 40px; height: 40px;">-</div>
                        @endif
                    </td>
                    <td class="small text-muted">{{ Str::limit($project->technologies_used, 40) }}</td>
                    <td><span class="badge bg-light text-primary border border-primary-subtle rounded-pill px-3">{{ $project->status ?? 'Active' }}</span></td>
                    <td class="pe-4 text-end">
                        <button class="btn btn-light btn-sm rounded-pill px-3 me-2 border-0" data-bs-toggle="modal" data-bs-target="#editProjectModal{{ $project->id }}">Edit</button>
                        <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 border-0" onclick="return confirm('Delete this project?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content border-0 rounded-4 shadow">
                            <div class="modal-header border-0 p-4 pb-0">
                                <h5 class="modal-title fw-bold">Edit Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body p-4">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold text-secondary">Project Name</label>
                                            <input type="text" name="name" class="form-control rounded-3 border-light bg-light" value="{{ $project->name }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold text-secondary">Slug (unique)</label>
                                            <input type="text" name="slug" class="form-control rounded-3 border-light bg-light" value="{{ $project->slug }}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold text-secondary">Description</label>
                                        <textarea name="description" class="form-control rounded-3 border-light bg-light" rows="3" required>{{ $project->description }}</textarea>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold text-secondary">Technologies Used (comma separated)</label>
                                            <input type="text" name="technologies_used" class="form-control rounded-3 border-light bg-light" value="{{ $project->technologies_used }}" placeholder="e.g. Laravel, React, MySQL">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold text-secondary">Status</label>
                                            <input type="text" name="status" class="form-control rounded-3 border-light bg-light" value="{{ $project->status }}" placeholder="e.g. Completed, In Progress">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold text-secondary">GitHub URL</label>
                                            <input type="url" name="github_url" class="form-control rounded-3 border-light bg-light" value="{{ $project->github_url }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold text-secondary">Live Demo URL</label>
                                            <input type="url" name="live_url" class="form-control rounded-3 border-light bg-light" value="{{ $project->live_url }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold text-secondary">Project Image</label>
                                        <input type="file" name="image" class="form-control rounded-3 border-light bg-light">
                                        <small class="text-muted">Leave empty to keep current image.</small>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="featured" id="featuredEdit{{ $project->id }}" {{ $project->featured ? 'checked' : '' }}>
                                        <label class="form-check-label small fw-bold text-secondary" for="featuredEdit{{ $project->id }}">Featured Project</label>
                                    </div>
                                </div>
                                <div class="modal-footer border-0 p-4 pt-0">
                                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">No projects found. Add your first showcase project!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title fw-bold text-primary">➕ Add New Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-secondary">Project Name</label>
                            <input type="text" name="name" class="form-control rounded-3 border-light bg-light" placeholder="e.g. My Awesome Project" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-secondary">Slug (unique URL path)</label>
                            <input type="text" name="slug" class="form-control rounded-3 border-light bg-light" placeholder="e.g. my-awesome-project" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Description</label>
                        <textarea name="description" class="form-control rounded-3 border-light bg-light" rows="3" placeholder="Tell us about the project..." required></textarea>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-secondary">Technologies Used</label>
                            <input type="text" name="technologies_used" class="form-control rounded-3 border-light bg-light" placeholder="e.g. Laravel, React, MySQL">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-secondary">Status</label>
                            <input type="text" name="status" class="form-control rounded-3 border-light bg-light" placeholder="e.g. Completed, In Progress">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-secondary">GitHub URL</label>
                            <input type="url" name="github_url" class="form-control rounded-3 border-light bg-light" placeholder="https://github.com/...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-secondary">Live Demo URL</label>
                            <input type="url" name="live_url" class="form-control rounded-3 border-light bg-light" placeholder="https://...">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Project Image</label>
                        <input type="file" name="image" class="form-control rounded-3 border-light bg-light">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="featured" id="featuredAdd">
                        <label class="form-check-label small fw-bold text-secondary" for="featuredAdd">Featured Project</label>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Add Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
