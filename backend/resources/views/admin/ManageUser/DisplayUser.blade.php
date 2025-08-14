<x-app-layout>
    <div class="container-fluid py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">User Details</h1>
            <a href="/" class="btn btn-primary">Back to Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Verification</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge {{ $user->role === 'mechanic' ? 'bg-warning text-dark' : 'bg-primary' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if(optional($user->verification)->status === 'approved')
                                            <span class="badge bg-info text-dark">Verified</span>
                                        @elseif(optional($user->verification)->status === 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif(optional($user->verification)->status === 'rejected')
                                            <span class="badge bg-danger text-white">Rejected</span>
                                        @else
                                            <span class="badge bg-light text-dark">Not Verified</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->verification && $user->verification->status === 'pending')
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approveModal{{ $user->id }}">
                                                Review
                                            </button>
                                            
                                            <!-- Approve Confirmation Modal -->
                                            <div class="modal fade" id="approveModal{{ $user->id }}" tabindex="-1" aria-labelledby="approveModalLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content border-0 shadow">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title" id="approveModalLabel{{ $user->id }}">Verify User: {{ $user->name }}</h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-4">
                                                                <div class="col-md-6">
                                                                    <div class="card h-100 border-0 shadow-sm">
                                                                        <div class="card-header bg-light">
                                                                            <h6 class="mb-0">User Information</h6>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="mb-2">
                                                                                <span class="text-muted small">Name:</span>
                                                                                <p class="mb-0">{{ $user->name }}</p>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <span class="text-muted small">Email:</span>
                                                                                <p class="mb-0">{{ $user->email }}</p>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <span class="text-muted small">Phone:</span>
                                                                                <p class="mb-0">{{ $user->phone ?? 'N/A' }}</p>
                                                                            </div>
                                                                            <div>
                                                                                <span class="text-muted small">Role:</span>
                                                                                <span class="badge {{ $user->role === 'mechanic' ? 'bg-warning text-dark' : 'bg-primary' }}">
                                                                                    {{ ucfirst($user->role) }}
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="card h-100 border-0 shadow-sm">
                                                                        <div class="card-header bg-light">
                                                                            <h6 class="mb-0">Verification Details</h6>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="mb-2">
                                                                                <span class="text-muted small">Document Type:</span>
                                                                                <p class="mb-0">{{ $user->verification->type ?? 'N/A' }}</p>
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <span class="text-muted small">Document Number:</span>
                                                                                <p class="mb-0">{{ $user->verification->document_number ?? 'N/A' }}</p>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <span class="text-muted small">Document Image:</span>
                                                                                @if($user->verification->document_image ?? false)
                                                                                    <div class="mt-2">
                                                                                        <img src="{{ asset('storage/' . $user->verification->document_image) }}" 
                                                                                             class="img-thumbnail" 
                                                                                             style="max-height: 100px; cursor: pointer" 
                                                                                             onclick="window.open('{{ asset('storage/' . $user->verification->document_image) }}', '_blank')">
                                                                                    </div>
                                                                                @else
                                                                                    <p class="mb-0 text-danger">No document uploaded</p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="remarks{{ $user->id }}" class="form-label">Remarks (Optional)</label>
                                                                <textarea class="form-control" id="remarks{{ $user->id }}" name="remarks" rows="3" placeholder="Add any additional remarks here..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-top">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                <i class="fas fa-times me-1"></i> Cancel
                                                            </button>
                                                            <form action="{{ route('admin.user.saveVerification') }}" method="POST" class="mb-0">
                                                                @csrf
                                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                                <input type="hidden" name="status" value="approved">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fas fa-check-circle me-1"></i> Approve
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('admin.user.saveVerification') }}" method="POST" class="mb-0">
                                                                @csrf
                                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                                <input type="hidden" name="status" value="rejected">
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="fas fa-times-circle me-1"></i> Reject
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-muted">No Actions</span>
                                        @endif
                                    </td>
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>