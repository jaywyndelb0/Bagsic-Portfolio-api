@extends('layouts.admin')

@section('content')
<div class="mb-5 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fw-bold text-dark">Social Links</h1>
        <p class="text-muted small">Manage your professional social profiles.</p>
    </div>
    <button type="button" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#addSocialLinkModal">
        ➕ Add Social Link
    </button>
</div>

<div class="card p-0 border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light border-0">
                <tr>
                    <th class="ps-4 border-0">Platform</th>
                    <th class="border-0">Username</th>
                    <th class="border-0">URL</th>
                    <th class="pe-4 border-0 text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="border-0">
                @forelse($socialLinks as $link)
                <tr>
                    <td class="ps-4 fw-bold text-dark">{{ $link->platform }}</td>
                    <td class="small text-muted">{{ $link->username ?? '-' }}</td>
                    <td class="small text-primary fw-semibold">{{ Str::limit($link->url, 40) }}</td>
                    <td class="pe-4 text-end">
                        <button class="btn btn-light btn-sm rounded-pill px-3 me-2 border-0" data-bs-toggle="modal" data-bs-target="#editSocialLinkModal{{ $link->id }}">Edit</button>
                        <form action="{{ route('admin.social-links.delete', $link->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 border-0" onclick="return confirm('Delete this link?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editSocialLinkModal{{ $link->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 rounded-4 shadow">
                            <div class="modal-header border-0 p-4 pb-0">
                                <h5 class="modal-title fw-bold">Edit Social Link</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('admin.social-links.update', $link->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body p-4">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Platform</label>
                                        <input type="text" name="platform" class="form-control rounded-3 border-light bg-light" value="{{ $link->platform }}" required placeholder="e.g. GitHub, LinkedIn">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Username</label>
                                        <input type="text" name="username" class="form-control rounded-3 border-light bg-light" value="{{ $link->username }}" placeholder="e.g. @jaywyndel">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Profile URL</label>
                                        <input type="url" name="url" class="form-control rounded-3 border-light bg-light" value="{{ $link->url }}" required placeholder="https://...">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActiveEdit{{ $link->id }}" {{ $link->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label small fw-bold" for="isActiveEdit{{ $link->id }}">Active</label>
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
                    <td colspan="4" class="text-center py-5 text-muted">No social links found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addSocialLinkModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title fw-bold text-primary">➕ Add Social Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.social-links.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Platform</label>
                        <input type="text" name="platform" class="form-control rounded-3 border-light bg-light" placeholder="e.g. GitHub, LinkedIn" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Username</label>
                        <input type="text" name="username" class="form-control rounded-3 border-light bg-light" placeholder="e.g. @jaywyndel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Profile URL</label>
                        <input type="url" name="url" class="form-control rounded-3 border-light bg-light" placeholder="https://..." required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActiveAdd" checked>
                        <label class="form-check-label small fw-bold text-secondary" for="isActiveAdd">Active</label>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Add Link</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
