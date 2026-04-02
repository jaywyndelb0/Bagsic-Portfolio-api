@extends('layouts.admin')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fw-bold text-dark">Education Management</h1>
        <p class="text-muted small">Update your academic background.</p>
    </div>
    <button type="button" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addEducationModal">
        ➕ Add Education
    </button>
</div>

<div class="card p-0 border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light border-0">
                <tr>
                    <th class="ps-4 border-0">School</th>
                    <th class="border-0">Degree</th>
                    <th class="border-0">Period</th>
                    <th class="pe-4 border-0 text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="border-0">
                @forelse($education as $edu)
                <tr>
                    <td class="ps-4 fw-bold text-dark">{{ $edu->school_name }}</td>
                    <td class="small text-muted">{{ $edu->degree }}</td>
                    <td class="small">
                        {{ $edu->start_date ? $edu->start_date->format('Y') : 'N/A' }} - {{ $edu->is_current ? 'Present' : ($edu->end_date ? $edu->end_date->format('Y') : 'N/A') }}
                    </td>
                    <td class="pe-4 text-end">
                        <button class="btn btn-light btn-sm rounded-pill px-3 me-2 border-0" data-bs-toggle="modal" data-bs-target="#editEducationModal{{ $edu->id }}">Edit</button>
                        <form action="{{ route('admin.education.delete', $edu->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 border-0" onclick="return confirm('Delete this record?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editEducationModal{{ $edu->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 rounded-4 shadow">
                            <div class="modal-header border-0 p-4 pb-0">
                                <h5 class="modal-title fw-bold">Edit Education</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.education.update', $edu->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body p-4">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">School Name</label>
                                        <input type="text" name="school_name" class="form-control rounded-3 border-light bg-light" value="{{ $edu->school_name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Degree</label>
                                        <input type="text" name="degree" class="form-control rounded-3 border-light bg-light" value="{{ $edu->degree }}" required>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold">Start Date</label>
                                            <input type="date" name="start_date" class="form-control rounded-3 border-light bg-light" value="{{ $edu->start_date ? $edu->start_date->format('Y-m-d') : '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold">End Date</label>
                                            <input type="date" name="end_date" class="form-control rounded-3 border-light bg-light" value="{{ $edu->end_date ? $edu->end_date->format('Y-m-d') : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="is_current" value="1" id="isCurrentEdit{{ $edu->id }}" {{ $edu->is_current ? 'checked' : '' }}>
                                        <label class="form-check-label small fw-bold" for="isCurrentEdit{{ $edu->id }}">I am currently studying here</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Description</label>
                                        <textarea name="description" class="form-control rounded-3 border-light bg-light" rows="3">{{ $edu->description }}</textarea>
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
                    <td colspan="4" class="text-center py-5 text-muted">No education records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addEducationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title fw-bold text-primary">➕ Add Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.education.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">School Name</label>
                        <input type="text" name="school_name" class="form-control rounded-3 border-light bg-light" placeholder="e.g. North Davao College" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Degree</label>
                        <input type="text" name="degree" class="form-control rounded-3 border-light bg-light" placeholder="e.g. Bachelor of Science in IT" required>
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
                        <input class="form-check-input" type="checkbox" name="is_current" value="1" id="isCurrentAdd">
                        <label class="form-check-label small fw-bold text-secondary" for="isCurrentAdd">I am currently studying here</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Description</label>
                        <textarea name="description" class="form-control rounded-3 border-light bg-light" rows="3" placeholder="Major courses, achievements..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Add Education</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
