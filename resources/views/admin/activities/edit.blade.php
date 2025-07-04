@extends('layouts.main')

@section('title', 'Edit Activity')
@section('breadcrumb-item', 'Activities')
@section('breadcrumb-item-active', 'Edit Activity')
@section('page-animation', 'animate__fadeInUp')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')

    @php
        /**
         * Helper to turn array|json|string into comma-separated text.
         */
        function fieldToCommaString($value)
        {
            if (is_array($value)) {
                return implode(', ', $value);
            }
            if (is_string($value)) {
                $decoded = json_decode($value, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    return implode(', ', $decoded);
                }
                return $value;
            }
            return '';
        }

        /**
         * Helper to turn array|json|string into newline-separated text.
         */
        function fieldToNewlines($value)
        {
            if (is_array($value)) {
                return implode("\n", $value);
            }
            if (is_string($value)) {
                $decoded = json_decode($value, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    return implode("\n", $decoded);
                }
                return $value;
            }
            return '';
        }
    @endphp

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

            {{-- Form --}}
            <form action="{{ route('admin.activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div id="activity-form-card" class="card animate__animated animate__fadeInUp">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Activity</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{-- Current Image --}}
                            <div class="mb-3 col-md-12">
                                <label class="form-label d-block">Current Image</label>
                                @if ($activity->getFirstMediaUrl('activities'))
                                    <img src="{{ $activity->getFirstMediaUrl('activities') }}" alt="{{ $activity->title }}"
                                        class="img-thumbnail rounded-3" style="max-width: 300px;">
                                @else
                                    <p class="text-muted">No image uploaded yet.</p>
                                @endif
                            </div>

                            {{-- New Image Upload --}}
                            <div class="mb-3 col-md-12">
                                <label for="image" class="form-label">Upload New Image</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Upload a new image to replace the current one. Leave blank to keep
                                    existing.</small>
                            </div>

                            {{-- Title --}}
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $activity->title) }}" required>
                                <div class="invalid-feedback">
                                    @error('title')
                                        {{ $message }}
                                    @else
                                        Please enter a title.
                                    @enderror
                                </div>
                            </div>

                            {{-- Duration --}}
                            <div class="mb-3 col-md-6">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="text" name="duration"
                                    class="form-control @error('duration') is-invalid @enderror"
                                    value="{{ old('duration', $activity->duration) }}" required>
                                <div class="invalid-feedback">
                                    @error('duration')
                                        {{ $message }}
                                    @else
                                        Please enter duration.
                                    @enderror
                                </div>
                            </div>

                            {{-- Group Size --}}
                            <div class="mb-3 col-md-6">
                                <label for="group_size" class="form-label">Group Size</label>
                                <input type="number" name="group_size"
                                    class="form-control @error('group_size') is-invalid @enderror"
                                    value="{{ old('group_size', $activity->group_size) }}" required>
                                <div class="invalid-feedback">
                                    @error('group_size')
                                        {{ $message }}
                                    @else
                                        Max group size.
                                    @enderror
                                </div>
                            </div>

                            {{-- Age Range --}}
                            <div class="mb-3 col-md-6">
                                <label for="age_range" class="form-label">Age Range</label>
                                <input type="text" name="age_range"
                                    class="form-control @error('age_range') is-invalid @enderror"
                                    value="{{ old('age_range', $activity->age_range) }}" required>
                                <div class="invalid-feedback">
                                    @error('age_range')
                                        {{ $message }}
                                    @else
                                        Example: 10-50 yrs.
                                    @enderror
                                </div>
                            </div>

                            {{-- Base Price --}}
                            <div class="mb-3 col-md-6">
                                <label for="base_price" class="form-label">Base Price (MAD)</label>
                                <input type="number" step="0.01" name="base_price"
                                    class="form-control @error('base_price') is-invalid @enderror"
                                    value="{{ old('base_price', $activity->base_price) }}" required>
                                <div class="invalid-feedback">
                                    @error('base_price')
                                        {{ $message }}
                                    @else
                                        Enter price.
                                    @enderror
                                </div>
                            </div>

                            {{-- Map Frame --}}
                            <div class="mb-3 col-md-12">
                                <label for="map_frame" class="form-label">Map Frame Embed Code (optional)</label>
                                <textarea name="map_frame" rows="5" class="form-control @error('map_frame') is-invalid @enderror">{{ old('map_frame', $activity->map_frame) }}</textarea>
                                <small class="text-muted">
                                    Paste an embed iframe code, e.g.
                                    <code>&lt;iframe src="..." width="600" height="450" style="border:0;"
                                        allowfullscreen="" loading="lazy"&gt;&lt;/iframe&gt;</code>.
                                </small>
                                @error('map_frame')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Category --}}
                            <div class="mb-3 col-md-6">
                                <label for="category_id" class="form-label">Activity Category</label>
                                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                                    required>
                                    <option value="">Select category...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id', $activity->category_id) == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Flags --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label d-block">Flags</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="bestseller_flag"
                                        id="bestseller_flag" value="1" @checked(old('bestseller_flag', $activity->bestseller_flag))>
                                    <label class="form-check-label" for="bestseller_flag">Bestseller</label>
                                </div>
                                <div class="form-check form-switch mt-2">
                                    <input type="checkbox" class="form-check-input" name="free_cancellation_flag"
                                        id="free_cancellation_flag" value="1" @checked(old('free_cancellation_flag', $activity->free_cancellation_flag))>
                                    <label class="form-check-label" for="free_cancellation_flag">Free Cancellation</label>
                                </div>
                            </div>

                            {{-- Overview --}}
                            <div class="mb-3 col-md-12">
                                <label for="overview" class="form-label">Overview</label>
                                <textarea name="overview" rows="4" class="form-control @error('overview') is-invalid @enderror" required>{{ old('overview', $activity->overview) }}</textarea>
                                @error('overview')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Languages Spoken --}}
                            <div class="mb-3 col-md-12">
                                <label for="languages" class="form-label">Languages Spoken (comma-separated)</label>
                                <textarea name="languages" rows="3" class="form-control @error('languages') is-invalid @enderror">{{ old('languages', fieldToCommaString($activity->languages)) }}</textarea>
                                <small class="text-muted">Separate languages with commas, e.g. English, French,
                                    Spanish.</small>
                                @error('languages')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Highlights --}}
                            <div class="mb-3 col-md-12">
                                <label for="highlights" class="form-label">Highlights (comma-separated)</label>
                                <textarea name="highlights" rows="4" class="form-control @error('highlights') is-invalid @enderror">{{ old('highlights', fieldToCommaString($activity->highlights)) }}</textarea>
                                @error('highlights')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Included --}}
                            <div class="mb-3 col-md-12">
                                <label for="included" class="form-label">Included (comma-separated)</label>
                                <textarea name="included" rows="4" class="form-control @error('included') is-invalid @enderror">{{ old('included', fieldToCommaString($activity->included)) }}</textarea>
                                @error('included')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Excluded --}}
                            <div class="mb-3 col-md-12">
                                <label for="excluded" class="form-label">Excluded (comma-separated)</label>
                                <textarea name="excluded" rows="4" class="form-control @error('excluded') is-invalid @enderror">{{ old('excluded', fieldToCommaString($activity->excluded)) }}</textarea>
                                @error('excluded')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Itinerary --}}
                            <div class="mb-3 col-md-12">
                                <label for="itinerary" class="form-label">Itinerary (one item per line)</label>
                                <textarea name="itinerary" rows="6" class="form-control @error('itinerary') is-invalid @enderror">{{ old('itinerary', fieldToNewlines($activity->itinerary)) }}</textarea>
                                @error('itinerary')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary"
                            onclick="fadeOutCard(event, this, 'activity-form-card')">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Activity</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                const forms = document.getElementsByClassName('needs-validation');
                Array.prototype.forEach.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function fadeOutCard(event, link, cardId = 'activity-form-card') {
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
