@extends('layouts.admin')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fw-bold text-dark">Skills Management</h1>
        <p class="text-muted small">Manage your core skills and expertise levels.</p>
    </div>
    <button type="button" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addSkillModal">
        ➕ Add New Skill
    </button>
</div>

<div class="card p-0 border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light border-0">
                <tr>
                    <th class="ps-4 border-0">Skill Name</th>
                    <th class="border-0">Level</th>
                    <th class="border-0">Description</th>
                    <th class="pe-4 border-0 text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="border-0">
                @forelse($skills as $skill)
                <tr>
                    <td class="ps-4 fw-bold text-dark">{{ $skill->name }}</td>
                    <td><span class="badge bg-primary rounded-pill px-3">{{ $skill->level }}</span></td>
                    <td class="text-muted small">{{ Str::limit($skill->description, 50) }}</td>
                    <td class="pe-4 text-end">
                        <button class="btn btn-light btn-sm rounded-pill px-3 me-2 border-0" data-bs-toggle="modal" data-bs-target="#editSkillModal{{ $skill->id }}">Edit</button>
                        <form action="{{ route('admin.skills.delete', $skill->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 border-0" onclick="return confirm('Delete this skill?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editSkillModal{{ $skill->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 rounded-4 shadow">
                            <div class="modal-header border-0 p-4 pb-0">
                                <h5 class="modal-title fw-bold">Edit Skill</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body p-4">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Skill Name</label>
                                        <input type="text" name="name" class="form-control rounded-3 border-light bg-light" value="{{ $skill->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Expertise Level</label>
                                        <input type="text" name="level" class="form-control rounded-3 border-light bg-light" value="{{ $skill->level }}" placeholder="e.g. Beginner, Intermediate, Expert" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Description</label>
                                        <textarea name="description" class="form-control rounded-3 border-light bg-light" rows="3">{{ $skill->description }}</textarea>
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
                    <td colspan="4" class="text-center py-5 text-muted">No skills found. Start adding some!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addSkillModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title fw-bold text-primary">➕ Add New Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.skills.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Skill Name</label>
                        <input type="text" name="name" class="form-control rounded-3 border-light bg-light" placeholder="e.g. PHP, Laravel, UI Design" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Expertise Level</label>
                        <input type="text" name="level" class="form-control rounded-3 border-light bg-light" placeholder="e.g. Beginner, Intermediate, Expert" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Description</label>
                        <textarea name="description" class="form-control rounded-3 border-light bg-light" rows="3" placeholder="Briefly describe your experience with this skill..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Add Skill</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
