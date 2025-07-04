@extends('layouts.main')

@section('title', 'Comment Details')
@section('breadcrumb-item', 'Blog')
@section('breadcrumb-item-active', 'Comment Thread')
@section('page-animation', 'animate__fadeIn')

@section('css')
    <link rel="stylesheet" href="{{ asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Comment on: {{ $postComment->post->title ?? '[Deleted Post]' }}</h5>
                <a href="{{ route('admin.post-comments.index') }}" class="btn btn-secondary btn-sm">← Back</a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Author:</strong>
                    {{ $postComment->user->name ?? $postComment->guest_name ?? 'Guest' }}
                    <br>
                    <strong>Email:</strong> {{ $postComment->guest_email ?? '-' }}
                    <br>
                    <strong>Submitted:</strong> {{ $postComment->created_at->format('Y-m-d H:i') }}
                </div>

                <div class="mb-3">
                    <strong>Title:</strong> {{ $postComment->comment_title ?? '—' }}
                    <br>
                    <strong>Body:</strong>
                    <div class="border rounded p-2 mt-2 bg-light">
                        {!! nl2br(e($postComment->comment_body)) !!}
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Status:</strong>
                    <span class="badge bg-{{ $postComment->is_approved ? 'success' : 'secondary' }}">
                        {{ $postComment->is_approved ? 'Approved' : 'Pending' }}
                    </span>
                </div>

                <div class="mt-4">
                    <form action="{{ $postComment->is_approved
                        ? route('admin.post-comments.unapprove', $postComment)
                        : route('admin.post-comments.approve', $postComment) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-primary">
                            {{ $postComment->is_approved ? 'Unapprove' : 'Approve' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.post-comments.destroy', $postComment) }}"
                          method="POST" class="d-inline"
                          onsubmit="return confirm('Delete this comment?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        @if ($replies->count())
        <div class="card mt-4 animate__animated animate__fadeInUp">
            <div class="card-header">
                <h6 class="mb-0">Replies ({{ $replies->count() }})</h6>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($replies as $reply)
                    <li class="list-group-item">
                        <strong>{{ $reply->user->name ?? $reply->guest_name ?? 'Guest' }}</strong>
                        <span class="text-muted small">– {{ $reply->created_at->diffForHumans() }}</span>
                        <div class="mt-2">{!! nl2br(e($reply->comment_body)) !!}</div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
