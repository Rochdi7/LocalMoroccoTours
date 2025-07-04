@extends('layouts.main')

@section('title', 'Edit Location')
@section('breadcrumb-item', 'Tours')
@section('breadcrumb-item-active', 'Edit Location')
@section('page-animation', 'animate__fadeInUp')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger animate__animated animate__shakeX">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.locations.update', $location->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div id="location-form-card" class="card animate__animated animate__fadeInUp">
                <div class="card-header">
                    <h5 class="mb-0">Edit Location</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        {{-- Name --}}
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Location Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $location->name) }}" required>
                            <div class="invalid-feedback">
                                @error('name') {{ $message }} @else Please enter a location name. @enderror
                            </div>
                        </div>

                        {{-- Parent Location --}}
                        <div class="mb-3 col-md-6">
                            <label for="parent_id" class="form-label">Parent Location</label>
                            <select name="parent_id" class="form-select">
                                <option value="">Choose parent location (optional)</option>
                                @foreach($parentLocations as $parent)
                                    @if($parent->id !== $location->id)
                                        <option value="{{ $parent->id }}"
                                            @selected(old('parent_id', $location->parent_id) == $parent->id)>
                                            {{ $parent->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        {{-- Description --}}
                        <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" rows="4"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $location->description) }}</textarea>
                            @error('description')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary"
                       onclick="fadeOutCard(event, this, 'location-form-card')">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Location</button>
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

    // Animated cancel
    function fadeOutCard(event, link, cardId = 'location-form-card') {
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
