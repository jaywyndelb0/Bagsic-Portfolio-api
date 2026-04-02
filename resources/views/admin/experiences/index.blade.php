@extends('layouts.admin')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fw-bold text-dark">Experience Management</h1>
        <p class="text-muted small">Manage your work history, internships, or student projects.</p>
    </div>
    <button type="button" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addExperienceModal">
        ➕ Add Experience
    </button>
</div>

<div class="card p-0 border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light border-0">
                <tr>
                    <th class="ps-4 border-0">Title</th>
                    <th class="border-0">Organization</th>
                    <th class="border-0">Type</th>
                    <th class="pe-4 border-0 text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="border-0">
                @forelse($experiences as $exp)
                <tr>
                    <td class="ps-4 fw-bold text-dark">{{ $exp->title }}</td>
                    <td class="small text-muted">{{ $exp->organization ?? 'Personal' }}</td>
                    <td><span class="badge bg-light text-primary border border-primary-subtle rounded-pill px-3">{{ $exp->type }}</span></td>
                    <td class="pe-4 text-end">
                        <button class="btn btn-light btn-sm rounded-pill px-3 me-2 border-0" data-bs-toggle="modal" data-bs-target="#editExperienceModal{{ $exp->id }}">Edit</button>
                        <form action="{{ route('admin.experiences.delete', $exp->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 border-0" onclick="return confirm('Delete this record?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editExperienceModal{{ $exp->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 rounded-4 shadow">
                            <div class="modal-header border-0 p-4 pb-0">
                                <h5 class="modal-title fw-bold">Edit Experience</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.experiences.update', $exp->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body p-4">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Job Title</label>
                                        <input type="text" name="title" class="form-control rounded-3 border-light bg-light" value="{{ $exp->title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Organization</label>
                                        <input type="text" name="organization" class="form-control rounded-3 border-light bg-light" value="{{ $exp->organization }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Type</label>
                                        <select name="type" class="form-select rounded-3 border-light bg-light" required>
                                            <option value="student project" {{ $exp->type == 'student project' ? 'selected' : '' }}>Student Project</option>
                                            <option value="school activity" {{ $exp->type == 'school activity' ? 'selected' : '' }}>School Activity</option>
                                            <option value="internship" {{ $exp->type == 'internship' ? 'selected' : '' }}>Internship</option>
                                            <option value="freelance" {{ $exp->type == 'freelance' ? 'selected' : '' }}>Freelance</option>
                                            <option value="personal learning" {{ $exp->type == 'personal learning' ? 'selected' : '' }}>Personal Learning</option>
                                            <option value="group project" {{ $exp->type == 'group project' ? 'selected' : '' }}>Group Project</option>
                                        </select>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold">Start Date</label>
                                            <input type="date" name="start_date" class="form-control rounded-3 border-light bg-light" value="{{ $exp->start_date ? $exp->start_date->format('Y-m-d') : '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold">End Date</label>
                                            <input type="date" name="end_date" class="form-control rounded-3 border-light bg-light" value="{{ $exp->end_date ? $exp->end_date->format('Y-m-d') : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="is_current" value="1" id="isCurrentExpEdit{{ $exp->id }}" {{ $exp->is_current ? 'checked' : '' }}>
                                        <label class="form-check-label small fw-bold" for="isCurrentExpEdit{{ $exp->id }}">I am currently working here</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Description</label>
                                        <textarea name="description" class="form-control rounded-3 border-light bg-light" rows="3" required>{{ $exp->description }}</textarea>
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
                    <td colspan="4" class="text-center py-5 text-muted">No experience records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addExperienceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title fw-bold text-primary">➕ Add Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.experiences.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Job Title</label>
                        <input type="text" name="title" class="form-control rounded-3 border-light bg-light" placeholder="e.g. Frontend Developer Intern" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Organization</label>
                        <input type="text" name="organization" class="form-control rounded-3 border-light bg-light" placeholder="e.g. Tech Solutions Inc.">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Type</label>
                        <select name="type" class="form-select rounded-3 border-light bg-light" required>
                            <option value="student project">Student Project</option>
                            <option value="school activity">School Activity</option>
                            <option value="internship">Internship</option>
                            <option value="freelance">Freelance</option>
                            <option value="personal learning">Personal Learning</option>
                            <option value="group project">Group Project</option>
                        </select>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-secondary">Start Date</label>
                            <input type="date" name="start_date" class="form-control rounded-3 border-light bg-light">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-secondary">End Date</label>
                            <input type="date" name="end_date" class="form-control rounded-3 border-light bg-light">
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_current" value="1" id="isCurrentExpAdd">
                        <label class="form-check-label small fw-bold text-secondary" for="isCurrentExpAdd">I am currently working here</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Description</label>
                        <textarea name="description" class="form-control rounded-3 border-light bg-light" rows="3" placeholder="Describe your roles and responsibilities..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Add Experience</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
