@extends('layouts.main')

@section('title', 'Create Blog Category')
@section('breadcrumb-item', 'Blog')
@section('breadcrumb-item-active', 'New Category')
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

        <form action="{{ route('admin.blog-categories.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div id="category-form-card" class="card animate__animated animate__rollIn">
                <div class="card-header">
                    <h5>New Blog Category</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required>
                            <div class="invalid-feedback">
                                @error('name') {{ $message }} @else Please enter the category name. @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-secondary"
                       onclick="rollOutCard(event, this, 'category-form-card')">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Bootstrap validation
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

    // RollOut animation on cancel
    function rollOutCard(event, link, cardId = 'category-form-card') {
        event.preventDefault();
        const card = document.getElementById(cardId);
        if (!card) return;

        card.classList.remove('animate__rollIn', 'animate__zoomIn', 'animate__fadeInUp');
        card.classList.add('animate__animated', 'animate__rollOut');

        setTimeout(() => {
            window.location.href = link.href;
        }, 1000);
    }
</script>
@endsection
