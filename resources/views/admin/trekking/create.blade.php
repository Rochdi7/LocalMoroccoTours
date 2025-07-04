@extends('layouts.main')

@section('title', 'Create Trekking')
@section('breadcrumb-item', 'Trekking')
@section('breadcrumb-item-active', 'New Trekking')
@section('page-animation', 'animate__rollIn')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/datepicker-bs5.min.css') }}">
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

            <form action="{{ route('admin.trekking.store') }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf

                <div id="trekking-form-card" class="card animate__animated animate__rollIn">
                    <div class="card-header">
                        <h5>New Trekking Form</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{-- Image upload --}}
                            <div class="mb-3 col-md-12">
                                <label for="image" class="form-label">Trekking Image</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Upload a main image for this trekking.</small>
                            </div>

                            {{-- Title --}}
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                    required>
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
                                    value="{{ old('duration') }}" required>
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
                                <input type="number" name="group_size"
                                    class="form-control @error('group_size') is-invalid @enderror"
                                    value="{{ old('group_size') }}" required>
                                <div class="invalid-feedback">
                                    @error('group_size')
                                        {{ $message }}
                                    @else
                                        Enter group size.
                                    @enderror
                                </div>
                            </div>

                            {{-- Age Range --}}
                            <div class="mb-3 col-md-6">
                                <label for="age_range" class="form-label">Age Range</label>
                                <input type="text" name="age_range"
                                    class="form-control @error('age_range') is-invalid @enderror"
                                    value="{{ old('age_range') }}" required>
                                <div class="invalid-feedback">
                                    @error('age_range')
                                        {{ $message }}
                                    @else
                                        Example: 18-50 yrs.
                                    @enderror
                                </div>
                            </div>

                            {{-- Base Price --}}
                            <div class="mb-3 col-md-6">
                                <label for="base_price" class="form-label">Base Price (MAD)</label>
                                <input type="number" step="0.01" name="base_price"
                                    class="form-control @error('base_price') is-invalid @enderror"
                                    value="{{ old('base_price') }}" required>
                                <div class="invalid-feedback">
                                    @error('base_price')
                                        {{ $message }}
                                    @else
                                        Enter base price.
                                    @enderror
                                </div>
                            </div>

                            {{-- Difficulty Level --}}
                            <div class="mb-3 col-md-6">
                                <label for="difficulty_level" class="form-label">Difficulty Level</label>
                                <select name="difficulty_level"
                                    class="form-select @error('difficulty_level') is-invalid @enderror" required>
                                    <option value="">Select difficulty...</option>
                                    @foreach (['Easy', 'Moderate', 'Hard', 'Expert'] as $level)
                                        <option value="{{ $level }}" @selected(old('difficulty_level') == $level)>
                                            {{ $level }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('difficulty_level')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Max Altitude --}}
                            <div class="mb-3 col-md-6">
                                <label for="max_altitude" class="form-label">Max Altitude (m)</label>
                                <input type="number" name="max_altitude"
                                    class="form-control @error('max_altitude') is-invalid @enderror"
                                    value="{{ old('max_altitude') }}">
                                @error('max_altitude')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Map Frame --}}
                            <div class="mb-3 col-md-12">
                                <label for="map_frame" class="form-label">Map Frame Embed Code (optional)</label>
                                <textarea name="map_frame" rows="5" class="form-control @error('map_frame') is-invalid @enderror">{{ old('map_frame') }}</textarea>
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
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                                    required>
                                    <option value="">Select category...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
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
                                <label class="form-check-label d-block">Flags</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="bestseller_flag"
                                        value="1" id="bestseller_flag" @checked(old('bestseller_flag'))>
                                    <label class="form-check-label" for="bestseller_flag">Bestseller</label>
                                </div>
                                <div class="form-check form-switch mt-2">
                                    <input type="checkbox" class="form-check-input" name="free_cancellation_flag"
                                        value="1" id="free_cancellation_flag" @checked(old('free_cancellation_flag'))>
                                    <label class="form-check-label" for="free_cancellation_flag">Free Cancellation</label>
                                </div>
                            </div>

                            {{-- Overview --}}
                            <div class="mb-3 col-md-12">
                                <label for="overview" class="form-label">Overview</label>
                                <textarea name="overview" rows="4" class="form-control @error('overview') is-invalid @enderror" required>{{ old('overview') }}</textarea>
                                @error('overview')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Highlights --}}
                            <div class="mb-3 col-md-12">
                                <label for="highlights" class="form-label">Highlights</label>
                                <textarea name="highlights" rows="4" class="form-control @error('highlights') is-invalid @enderror">{{ old('highlights') }}</textarea>
                                @error('highlights')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Languages (new) --}}
                            <div class="mb-3 col-md-12">
                                <label for="languages" class="form-label">Languages Spoken</label>
                                <textarea name="languages" rows="3" class="form-control @error('languages') is-invalid @enderror">{{ old('languages') }}</textarea>
                                <small class="text-muted">Separate languages by commas, e.g. English, French,
                                    Spanish.</small>
                                @error('languages')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Included --}}
                            <div class="mb-3 col-md-12">
                                <label for="included" class="form-label">Included Items</label>
                                <textarea name="included" rows="3" class="form-control @error('included') is-invalid @enderror">{{ old('included') }}</textarea>
                                <small class="text-muted">Separate items by comma, e.g. Guide, Meals, Transport.</small>
                                @error('included')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Excluded --}}
                            <div class="mb-3 col-md-12">
                                <label for="excluded" class="form-label">Excluded Items</label>
                                <textarea name="excluded" rows="3" class="form-control @error('excluded') is-invalid @enderror">{{ old('excluded') }}</textarea>
                                <small class="text-muted">Separate items by comma, e.g. Flights, Travel insurance.</small>
                                @error('excluded')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Itinerary --}}
                            <div class="mb-3 col-md-12">
                                <label for="itinerary" class="form-label">Itinerary</label>
                                <textarea name="itinerary" rows="5" class="form-control @error('itinerary') is-invalid @enderror">{{ old('itinerary') }}</textarea>
                                <small class="text-muted">Separate days by new lines, e.g. Day 1: Arrival\nDay 2: Trek to
                                    Base Camp.</small>
                                @error('itinerary')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('admin.trekking.index') }}" class="btn btn-secondary"
                            onclick="rollOutCard(event, this, 'trekking-form-card')">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Trekking</button>
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

        function rollOutCard(event, link, cardId = 'trekking-form-card') {
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
