@extends('layouts.admin')

@section('title', 'Messages - NEXGEN Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fs-3 mb-1">Contact Messages</h1>
                <p class="mb-0">Enquiries submitted via the website contact form</p>
            </div>
            @if($newCount > 0)
                <span class="badge bg-danger fs-6 px-3 py-2">{{ $newCount }} New</span>
            @endif
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title mb-0">All Messages ({{ $messages->total() }})</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                        <tr class="{{ $msg->status === 'new' ? 'fw-semibold' : '' }}">
                            <td>{{ $messages->firstItem() + $loop->index }}</td>
                            <td>{{ $msg->name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->phone ?? '—' }}</td>
                            <td>{{ $msg->subject ? \Illuminate\Support\Str::limit($msg->subject, 40) : '—' }}</td>
                            <td>
                                @if($msg->status === 'new')
                                    <span class="badge bg-danger bg-opacity-10 text-danger">New</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary">Read</span>
                                @endif
                            </td>
                            <td class="text-muted" style="white-space:nowrap;">{{ $msg->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.messages.show', $msg) }}"
                                       class="btn btn-sm btn-light" title="View">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}"
                                          onsubmit="return confirm('Delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger" title="Delete">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">No messages yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>
            @if($messages->hasPages())
            <div class="card-footer bg-white">
                {{ $messages->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
