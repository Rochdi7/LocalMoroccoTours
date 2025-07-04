@extends('layouts.main')

@section('title', 'Edit Tour')
@section('breadcrumb-item', 'Tours')
@section('breadcrumb-item-active', 'Edit Tour')

@section('page-animation', 'animate__rollIn')

@section('css')
    <link rel="stylesheet" href="{{ asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="{{ asset('build/css/plugins/animate.min.css') }}">
@endsection

@section('content')
    @php
        function toCommaSeparated($value)
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

        function toNewlineSeparated($value)
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

        // Ensure variables are always strings:
        $highlights = (string) old('highlights', toNewlineSeparated($tour->highlights));
        $languages = (string) old('languages', toCommaSeparated($tour->languages));
        $included = (string) old('included', toCommaSeparated($tour->included));
        $excluded = (string) old('excluded', toCommaSeparated($tour->excluded));
        $itinerary = (string) old('itinerary', toNewlineSeparated($tour->itinerary));
    @endphp


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

            <form action="{{ route('admin.tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div id="tour-form-card" class="card animate__animated animate__rollIn">
                    <div class="card-header">
                        <h5>Edit Tour</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{-- Current Image Preview --}}
                            <div class="mb-3 col-md-12">
                                <label class="form-label d-block">Current Image</label>
                                @if ($tour->getFirstMediaUrl('tours'))
                                    <img src="{{ $tour->getFirstMediaUrl('tours') }}" alt="{{ $tour->title }}"
                                        class="rounded-3 img-thumbnail" style="max-width: 300px;">
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
                                <small class="text-muted d-block mt-1">
                                    Upload a new image to replace the current one. Leave empty to keep existing.
                                </small>
                            </div>

                            {{-- Title --}}
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" value="{{ old('title', $tour->title) }}"
                                    class="form-control @error('title') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    @error('title')
                                        {{ $message }}
                                    @else
                                        Please enter the tour title.
                                    @enderror
                                </div>
                            </div>

                            {{-- Duration --}}
                            <div class="mb-3 col-md-6">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="text" name="duration" value="{{ old('duration', $tour->duration) }}"
                                    class="form-control @error('duration') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    @error('duration')
                                        {{ $message }}
                                    @else
                                        Please specify duration.
                                    @enderror
                                </div>
                            </div>

                            {{-- Group Size --}}
                            <div class="mb-3 col-md-6">
                                <label for="group_size" class="form-label">Group Size</label>
                                <input type="number" name="group_size" value="{{ old('group_size', $tour->group_size) }}"
                                    class="form-control @error('group_size') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    @error('group_size')
                                        {{ $message }}
                                    @else
                                        Enter maximum group size.
                                    @enderror
                                </div>
                            </div>

                            {{-- Age Range --}}
                            <div class="mb-3 col-md-6">
                                <label for="age_range" class="form-label">Age Range</label>
                                <input type="text" name="age_range" value="{{ old('age_range', $tour->age_range) }}"
                                    class="form-control @error('age_range') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    @error('age_range')
                                        {{ $message }}
                                    @else
                                        Example: 10–65 yrs
                                    @enderror
                                </div>
                            </div>

                            {{-- Base Price --}}
                            <div class="mb-3 col-md-6">
                                <label for="base_price" class="form-label">Base Price</label>
                                <input type="number" step="0.01" name="base_price"
                                    value="{{ old('base_price', $tour->base_price) }}"
                                    class="form-control @error('base_price') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    @error('base_price')
                                        {{ $message }}
                                    @else
                                        Enter the base price.
                                    @enderror
                                </div>
                            </div>

                            {{-- Map Frame --}}
                            <div class="mb-3 col-md-12">
                                <label for="map_frame" class="form-label">Map Frame Embed Code (optional)</label>
                                <textarea name="map_frame" rows="5" class="form-control @error('map_frame') is-invalid @enderror">{{ old('map_frame', $tour->map_frame) }}</textarea>
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
                                <label for="category_id" class="form-label">Tour Category</label>
                                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                                    required>
                                    <option value="">Select category...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id', $tour->category_id) == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Location --}}
                            <div class="mb-3 col-md-6">
                                <label for="location_id" class="form-label">Location</label>
                                <select name="location_id" class="form-select @error('location_id') is-invalid @enderror"
                                    required>
                                    <option value="">Select location...</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}" @selected(old('location_id', $tour->location_id) == $location->id)>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('location_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Flags --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Flags</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="bestseller_flag" value="1"
                                        class="form-check-input" @checked(old('bestseller_flag', $tour->bestseller_flag))>
                                    <label class="form-check-label">Bestseller</label>
                                </div>
                                <div class="form-check form-switch mt-2">
                                    <input type="checkbox" name="free_cancellation_flag" value="1"
                                        class="form-check-input" @checked(old('free_cancellation_flag', $tour->free_cancellation_flag))>
                                    <label class="form-check-label">Free Cancellation</label>
                                </div>
                            </div>

                            {{-- Overview --}}
                            <div class="mb-3 col-md-12">
                                <label for="overview" class="form-label">Overview</label>
                                <textarea name="overview" rows="4" class="form-control @error('overview') is-invalid @enderror" required>{{ old('overview', $tour->overview) }}</textarea>
                                @error('overview')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Highlights --}}
                            <div class="mb-3 col-md-12">
                                <label for="highlights" class="form-label">Highlights (optional)</label>
                                <textarea name="highlights" rows="4" class="form-control @error('highlights') is-invalid @enderror">{{ $highlights }}</textarea>
                                @error('highlights')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Languages --}}
                            <div class="mb-3 col-md-12">
                                <label for="languages" class="form-label">Languages Spoken (optional)</label>
                                <textarea name="languages" rows="3" class="form-control @error('languages') is-invalid @enderror">{{ $languages }}</textarea>
                                <small class="text-muted">Separate languages with commas, e.g. English, French,
                                    Spanish.</small>
                                @error('languages')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Included --}}
                            <div class="mb-3 col-md-12">
                                <label for="included" class="form-label">Included Items</label>
                                <textarea name="included" rows="3" class="form-control @error('included') is-invalid @enderror">{{ $included }}</textarea>
                                <small class="text-muted">Separate items by comma, e.g. Transport, Guide, Meals.</small>
                                @error('included')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Excluded --}}
                            <div class="mb-3 col-md-12">
                                <label for="excluded" class="form-label">Excluded Items</label>
                                <textarea name="excluded" rows="3" class="form-control @error('excluded') is-invalid @enderror">{{ $excluded }}</textarea>
                                <small class="text-muted">Separate items by comma, e.g. Flights, Personal expenses.</small>
                                @error('excluded')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Itinerary --}}
                            <div class="mb-3 col-md-12">
                                <label for="itinerary" class="form-label">Itinerary</label>
                                <textarea name="itinerary" rows="5" class="form-control @error('itinerary') is-invalid @enderror">{{ $itinerary }}</textarea>
                                <small class="text-muted">Separate days by new lines, e.g. Day 1: Arrival\nDay 2:
                                    Sightseeing.</small>
                                @error('itinerary')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary"
                            onclick="rollOutCard(event, this, 'tour-form-card')">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Tour</button>
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

        function rollOutCard(event, link, cardId = 'tour-form-card') {
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
