@extends('layouts.main')

@section('title', 'Edit Comment')
@section('breadcrumb-item', 'Blog')
@section('breadcrumb-item-active', 'Edit Comment')
@section('page-animation', 'animate__fadeIn')

@section('css')
<link rel="stylesheet" href="{{ asset('build/css/plugins/style.css') }}">
<link rel="stylesheet" href="{{ asset('build/css/plugins/animate.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit Comment</h5>
                <a href="{{ route('admin.post-comments.index') }}" class="btn btn-secondary btn-sm">← Back</a>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger animate__animated animate__shakeX">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.post-comments.update', $comment->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    {{-- Author Info (Guest) --}}
                    @if(is_null($comment->user_id))
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="guest_name" class="form-label">Guest Name</label>
                                <input type="text" name="guest_name" class="form-control" value="{{ old('guest_name', $comment->guest_name) }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="guest_email" class="form-label">Guest Email</label>
                                <input type="email" name="guest_email" class="form-control" value="{{ old('guest_email', $comment->guest_email) }}">
                            </div>
                        </div>
                    @endif

                    {{-- Title --}}
                    <div class="mb-3">
                        <label for="comment_title" class="form-label">Comment Title</label>
                        <input type="text" name="comment_title" class="form-control"
                               value="{{ old('comment_title', $comment->comment_title) }}">
                    </div>

                    {{-- Body --}}
                    <div class="mb-3">
                        <label for="comment_body" class="form-label">Comment Body *</label>
                        <textarea name="comment_body" class="form-control" rows="6" required>{{ old('comment_body', $comment->comment_body) }}</textarea>
                        <div class="invalid-feedback">Comment content is required.</div>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label for="is_approved" class="form-label">Approval Status</label>
                        <select name="is_approved" class="form-select">
                            <option value="0" @selected(!$comment->is_approved)>Pending</option>
                            <option value="1" @selected($comment->is_approved)>Approved</option>
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Bootstrap 5 validation
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            const forms = document.getElementsByClassName('needs-validation');
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
