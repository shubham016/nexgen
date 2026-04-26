@extends('layouts.admin')

@section('title', 'Message - NEXGEN Admin')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fs-3 mb-1">Message from {{ $message->name }}</h1>
        <p class="mb-0 text-muted">{{ $message->created_at->format('d M Y, h:i A') }}</p>
    </div>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-light">
        <i class="ti ti-arrow-left me-1"></i> Back
    </a>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white"><h3 class="card-title mb-0">Message</h3></div>
            <div class="card-body">
                @if($message->subject)
                    <p class="fw-semibold mb-1">{{ $message->subject }}</p>
                @endif
                <p class="mb-0" style="white-space:pre-wrap;">{{ $message->message }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white"><h3 class="card-title mb-0">Sender Details</h3></div>
            <div class="card-body d-flex flex-column gap-3">
                <div><small class="text-muted text-uppercase fw-bold">Name</small><p class="mb-0">{{ $message->name }}</p></div>
                <div><small class="text-muted text-uppercase fw-bold">Email</small><p class="mb-0"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p></div>
                <div><small class="text-muted text-uppercase fw-bold">Phone</small><p class="mb-0">{{ $message->phone ?? '—' }}</p></div>
                <div>
                    <small class="text-muted text-uppercase fw-bold">Status</small>
                    <p class="mb-0">
                        <span class="badge bg-secondary bg-opacity-10 text-secondary">Read</span>
                    </p>
                </div>
            </div>
            <div class="card-footer bg-white d-flex gap-2">
                <a href="https://nexgenbuildtech.com:2096/roundcube/?_task=mail&_action=compose&_to={{ urlencode($message->email) }}&_subject={{ urlencode('Re: ' . ($message->subject ?: 'Your Enquiry')) }}"
                   target="_blank" class="btn btn-primary btn-sm">
                    <i class="ti ti-mail me-1"></i> Reply via Email
                </a>
                <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
                      onsubmit="return confirm('Delete this message?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-light btn-sm text-danger"><i class="ti ti-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
