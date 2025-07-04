@extends('layouts.main')

@section('title', 'Edit Trekking Category')
@section('breadcrumb-item', 'Trekking')
@section('breadcrumb-item-active', 'Edit Category')
@section('page-animation', 'animate__fadeInUp')

@section('css')
    <link rel="stylesheet" href="{{ asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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

        <form action="{{ route('admin.trekking-categories.update', $trekkingCategory->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div id="trekking-form-card" class="card animate__animated animate__fadeInUp">
                <div class="card-header">
                    <h5 class="mb-0">Edit Trekking Category</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $trekkingCategory->name) }}" required>
                        <div class="invalid-feedback">
                            @error('name') {{ $message }} @else Please enter a category name. @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admin.trekking-categories.index') }}" class="btn btn-secondary"
                       onclick="fadeOutCard(event, this, 'trekking-form-card')">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Category</button>
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

    function fadeOutCard(event, link, cardId = 'trekking-form-card') {
        event.preventDefault();
        const card = document.getElementById(cardId);
        if (!card) return;
        card.classList.remove('animate__fadeInUp');
        card.classList.add('animate__animated', 'animate__fadeOutDown');
        setTimeout(() => {
            window.location.href = link.href;
        }, 800);
    }
</script>
@endsection
