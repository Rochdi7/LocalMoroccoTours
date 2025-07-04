@extends('layouts.main')

@section('title', 'Edit Special Offer')
@section('breadcrumb-item', 'Marketing')
@section('breadcrumb-item-active', 'Edit Offer')
@section('page-animation', 'animate__fadeIn')

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

        <form action="{{ route('admin.special-offers.update', $specialOffer->id) }}" method="POST"
              enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div id="offer-edit-card" class="card animate__animated animate__fadeIn">
                <div class="card-header">
                    <h5>Edit Special Offer</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        {{-- Title --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $specialOffer->title) }}" required>
                            <div class="invalid-feedback">
                                @error('title') {{ $message }} @else Please provide a title. @enderror
                            </div>
                        </div>

                        {{-- Subtitle --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"
                                   value="{{ old('subtitle', $specialOffer->subtitle) }}" required>
                            <div class="invalid-feedback">
                                @error('subtitle') {{ $message }} @else Provide a subtitle. @enderror
                            </div>
                        </div>

                        {{-- Text --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Text</label>
                            <input type="text" name="text" class="form-control" value="{{ old('text', $specialOffer->text) }}">
                        </div>

                        {{-- Link --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Link</label>
                            <input type="url" name="link" class="form-control" value="{{ old('link', $specialOffer->link) }}">
                        </div>

                        {{-- Image --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Replace Image (optional)</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            <small class="text-muted">Current image: <code>{{ $specialOffer->image_path }}</code></small>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Order --}}
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', $specialOffer->order) }}">
                        </div>

                        {{-- Status --}}
                        <div class="mb-3 col-md-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input type="checkbox" name="is_active" class="form-check-input" value="1" id="is_active"
                                       {{ old('is_active', $specialOffer->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admin.special-offers.index') }}" class="btn btn-secondary"
                       onclick="rollOutCard(event, this, 'offer-edit-card')">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Offer</button>
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

    function rollOutCard(event, link, cardId = 'offer-edit-card') {
        event.preventDefault();
        const card = document.getElementById(cardId);
        if (!card) return;
        card.classList.remove('animate__fadeIn');
        card.classList.add('animate__animated', 'animate__fadeOutRight');
        setTimeout(() => {
            window.location.href = link.href;
        }, 1000);
    }
</script>
@endsection
