@extends('layouts.admin')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fw-bold text-dark">Tech Stacks Management</h1>
        <p class="text-muted small">List the specific programming languages and tools you use.</p>
    </div>
    <button type="button" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addTechStackModal">
        ➕ Add New Tech Stack
    </button>
</div>

<div class="card p-0 border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light border-0">
                <tr>
                    <th class="ps-4 border-0">Tech Name</th>
                    <th class="border-0">Category</th>
                    <th class="border-0">Proficiency</th>
                    <th class="pe-4 border-0 text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="border-0">
                @forelse($techStacks as $stack)
                <tr>
                    <td class="ps-4 fw-bold text-dark">{{ $stack->name }}</td>
                    <td class="text-capitalize small text-muted">{{ $stack->category }}</td>
                    <td><span class="badge bg-light text-success border border-success-subtle rounded-pill px-3">{{ $stack->proficiency_level ?? 'Learning' }}</span></td>
                    <td class="pe-4 text-end">
                        <button class="btn btn-light btn-sm rounded-pill px-3 me-2 border-0" data-bs-toggle="modal" data-bs-target="#editTechStackModal{{ $stack->id }}">Edit</button>
                        <form action="{{ route('admin.tech-stacks.delete', $stack->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 border-0" onclick="return confirm('Delete this tech stack?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editTechStackModal{{ $stack->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 rounded-4 shadow">
                            <div class="modal-header border-0 p-4 pb-0">
                                <h5 class="modal-title fw-bold">Edit Tech Stack</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.tech-stacks.update', $stack->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body p-4">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Tech Name</label>
                                        <input type="text" name="name" class="form-control rounded-3 border-light bg-light" value="{{ $stack->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Category</label>
                                        <select name="category" class="form-select rounded-3 border-light bg-light" required>
                                            <option value="programming language" {{ $stack->category == 'programming language' ? 'selected' : '' }}>Programming Language</option>
                                            <option value="framework" {{ $stack->category == 'framework' ? 'selected' : '' }}>Framework</option>
                                            <option value="database" {{ $stack->category == 'database' ? 'selected' : '' }}>Database</option>
                                            <option value="design tool" {{ $stack->category == 'design tool' ? 'selected' : '' }}>Design Tool</option>
                                            <option value="code editor" {{ $stack->category == 'code editor' ? 'selected' : '' }}>Code Editor</option>
                                            <option value="tool" {{ $stack->category == 'tool' ? 'selected' : '' }}>Tool</option>
                                            <option value="other" {{ $stack->category == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Proficiency Level</label>
                                        <input type="text" name="proficiency_level" class="form-control rounded-3 border-light bg-light" value="{{ $stack->proficiency_level }}">
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
                    <td colspan="4" class="text-center py-5 text-muted">No tech stacks found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addTechStackModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title fw-bold text-primary">➕ Add New Tech Stack</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.tech-stacks.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Tech Name</label>
                        <input type="text" name="name" class="form-control rounded-3 border-light bg-light" placeholder="e.g. PHP, MySQL, Figma" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Category</label>
                        <select name="category" class="form-select rounded-3 border-light bg-light" required>
                            <option value="programming language">Programming Language</option>
                            <option value="framework">Framework</option>
                            <option value="database">Database</option>
                            <option value="design tool">Design Tool</option>
                            <option value="code editor">Code Editor</option>
                            <option value="tool">Tool</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Proficiency Level</label>
                        <input type="text" name="proficiency_level" class="form-control rounded-3 border-light bg-light" placeholder="e.g. Advanced, Intermediate, Beginner">
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Add Tech Stack</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
