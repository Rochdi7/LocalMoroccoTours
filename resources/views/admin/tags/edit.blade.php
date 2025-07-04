@extends('layouts.main')

@section('title', 'Edit Tag')
@section('breadcrumb-item', 'Blog')
@section('breadcrumb-item-active', 'Edit Tag')
@section('page-animation', 'animate__rollIn')

@section('css')
    <link rel="stylesheet" href="{{ asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="{{ asset('build/css/plugins/animate.min.css') }}">
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

        <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div id="tag-form-card" class="card animate__animated animate__rollIn">
                <div class="card-header">
                    <h5>Edit Tag</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tag Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $tag->name) }}" required>
                        <div class="invalid-feedback">
                            @error('name') {{ $message }} @else Please enter a tag name. @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary"
                       onclick="rollOutCard(event, this, 'tag-form-card')">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Tag</button>
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

    function rollOutCard(event, link, cardId = 'tag-form-card') {
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
