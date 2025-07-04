@extends('layouts.main')

@section('title', 'Edit Blog Post')
@section('breadcrumb-item', 'Blog')
@section('breadcrumb-item-active', 'Edit Post')
@section('page-animation', 'animate__rollIn')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/animate.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        @if ($errors->any())
            <div class="alert alert-danger animate__animated animate__shakeX">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div id="post-form-card" class="card animate__animated animate__rollIn">
                <div class="card-header">
                    <h5>Edit Blog Post</h5>
                </div>

                <div class="card-body">
                    <div class="row">

                        {{-- Title --}}
                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $post->title) }}" required>
                            <div class="invalid-feedback">
                                @error('title') {{ $message }} @else Please enter a title. @enderror
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="draft" @selected(old('status', $post->status) == 'draft')>Draft</option>
                                <option value="published" @selected(old('status', $post->status) == 'published')>Published</option>
                            </select>
                        </div>

                        {{-- Category --}}
                        <div class="mb-3 col-md-6">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                <option value="">Select category...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tags --}}
                        <div class="mb-3 col-md-6">
                            <label for="tags" class="form-label">Tags</label>
                            <select name="tags[]" class="form-select" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" @selected(collect(old('tags', $post->tags->pluck('id')))->contains($tag->id))>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Featured Image Upload --}}
                        <div class="mb-3 col-md-12">
                            <label for="featured_image" class="form-label">Featured Image</label>
                            <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
                            @error('featured_image')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                            {{-- Display current image --}}
                            @if ($post->getFirstMediaUrl('featured_image'))
                                <div class="mt-3">
                                    <p class="mb-1">Current Image:</p>
                                    <img src="{{ $post->getFirstMediaUrl('featured_image', 'thumb') }}" 
                                         alt="Featured Image" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @endif
                        </div>

                        {{-- Excerpt --}}
                        <div class="mb-3 col-md-12">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
                        </div>

                        {{-- Content --}}
                        <div class="mb-3 col-md-12">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" rows="6" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $post->content) }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary"
                       onclick="rollOutCard(event, this, 'post-form-card')">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            const forms = document.getElementsByClassName('needs-validation');
            Array.prototype.forEach.call(forms, function (form) {
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

    function rollOutCard(event, link, cardId = 'post-form-card') {
        event.preventDefault();
        const card = document.getElementById(cardId);
        if (!card) return;
        card.classList.remove('animate__rollIn');
        card.classList.add('animate__animated', 'animate__rollOut');
        setTimeout(() => {
            window.location.href = link.href;
        }, 1000);
    }
</script>
@endsection
