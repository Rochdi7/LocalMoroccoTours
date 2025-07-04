@extends('layouts.main')

@section('title', 'Leave a Comment')
@section('breadcrumb-item', 'Blog')
@section('breadcrumb-item-active', 'New Comment')

@section('css')
<link rel="stylesheet" href="{{ asset('build/css/plugins/style.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">

        <div class="card mt-4">
            <div class="card-header">
                <h5>Leave a Comment on: {{ $post->title }}</h5>
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

                <form action="{{ route('post-comments.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="parent_id" value="{{ $parentId ?? '' }}">

                    @guest
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="guest_name" class="form-label">Your Name</label>
                                <input type="text" name="guest_name" class="form-control" value="{{ old('guest_name') }}" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="guest_email" class="form-label">Email</label>
                                <input type="email" name="guest_email" class="form-control" value="{{ old('guest_email') }}" required>
                            </div>
                        </div>
                    @endguest

                    <div class="mb-3">
                        <label for="comment_title" class="form-label">Comment Title (optional)</label>
                        <input type="text" name="comment_title" class="form-control" value="{{ old('comment_title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="comment_body" class="form-label">Comment *</label>
                        <textarea name="comment_body" rows="5" class="form-control" required>{{ old('comment_body') }}</textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
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
