@extends('layouts.main')

@section('title', 'Create Activity')
@section('breadcrumb-item', 'Activities')
@section('breadcrumb-item-active', 'New Activity')
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

            <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf

                <div id="activity-form-card" class="card animate__animated animate__rollIn">
                    <div class="card-header">
                        <h5>New Activity Form</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{-- ✅ Cover Image Upload --}}
                            <div class="mb-3 col-md-12">
                                <label for="image" class="form-label">Activity Cover Image</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">
                                    Upload a single main cover image for this activity. This will appear as the primary
                                    image on detail pages.
                                </small>
                            </div>

                            {{-- ✅ Cover Image Metadata --}}
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Cover Image Metadata</label>

                                <div class="mb-2">
                                    <label class="form-label">Alt Text</label>
                                    <input type="text" name="cover_alt"
                                        class="form-control @error('cover_alt') is-invalid @enderror"
                                        placeholder="E.g. People kayaking in river" value="{{ old('cover_alt') }}">
                                    @error('cover_alt')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">Title (optional)</label>
                                    <input type="text" name="cover_title"
                                        class="form-control @error('cover_title') is-invalid @enderror"
                                        placeholder="E.g. Kayaking Adventure" value="{{ old('cover_title') }}">
                                    @error('cover_title')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">Caption (optional)</label>
                                    <input type="text" name="cover_caption"
                                        class="form-control @error('cover_caption') is-invalid @enderror"
                                        placeholder="E.g. Exploring rivers in Marrakech"
                                        value="{{ old('cover_caption') }}">
                                    @error('cover_caption')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">Description (optional)</label>
                                    <textarea name="cover_description" rows="2" class="form-control @error('cover_description') is-invalid @enderror"
                                        placeholder="Detailed description of the cover image...">{{ old('cover_description') }}</textarea>
                                    @error('cover_description')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ✅ Gallery Images Upload --}}
                            <div class="mb-3 col-md-12">
                                <label for="gallery" class="form-label">Activity Gallery Images</label>
                                <input type="file" name="gallery[]" id="gallery" multiple
                                    class="form-control @error('gallery.*') is-invalid @enderror">
                                @error('gallery.*')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">
                                    Upload one or more additional images for the gallery. Recommended formats: JPG, PNG,
                                    WEBP.
                                </small>

                                {{-- ✅ Gallery Metadata Fields Container --}}
                                <div id="gallery-meta-container" class="mt-4"></div>
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
                                    value="{{ old('base_price') }}">

                                <div class="invalid-feedback">
                                    @error('base_price')
                                        {{ $message }}
                                    @else
                                        Enter base price.
                                    @enderror
                                </div>
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
                                <label for="category_id" class="form-label">Activity Category</label>
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
                                        id="bestseller_flag" value="1" @checked(old('bestseller_flag'))>
                                    <label class="form-check-label" for="bestseller_flag">Bestseller</label>
                                </div>
                                <div class="form-check form-switch mt-2">
                                    <input type="checkbox" class="form-check-input" name="free_cancellation_flag"
                                        id="free_cancellation_flag" value="1" @checked(old('free_cancellation_flag'))>
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

                            {{-- Languages Spoken --}}
                            <div class="mb-3 col-md-12">
                                <label for="languages" class="form-label">Languages Spoken (optional)</label>
                                <textarea name="languages" rows="3" class="form-control @error('languages') is-invalid @enderror">{{ old('languages') }}</textarea>
                                <small class="text-muted">Separate languages with commas, e.g. English, French,
                                    Spanish.</small>
                                @error('languages')
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
    <label class="form-label">Itinerary</label>
    <div id="itinerary-repeater">
        {{-- Start with 1 blank day --}}
        <div class="itinerary-day border rounded p-3 mb-3 bg-light position-relative">
            <div class="mb-2">
                <label class="form-label">Day Title</label>
                <input type="text" name="itinerary[0][title]" class="form-control" placeholder="e.g. Day 1: Arrival in Marrakech">
            </div>
            <div class="mb-2">
                <label class="form-label">Day Content (Multiple Paragraphs)</label>
                <textarea name="itinerary[0][content][]" rows="3" class="form-control" placeholder="Enter multiple paragraphs separated by new lines"></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 remove-day">Remove</button>
        </div>
    </div>

    <button type="button" class="btn btn-outline-primary btn-sm" id="add-itinerary-day">+ Add Day</button>
</div>


                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary"
                            onclick="rollOutCard(event, this, 'activity-form-card')">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Activity</button>
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

        function rollOutCard(event, link, cardId = 'activity-form-card') {
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
@section('scripts')
    @parent
    <script>
        document.getElementById('gallery').addEventListener('change', function(e) {
            const container = document.getElementById('gallery-meta-container');
            container.innerHTML = '';
            const files = e.target.files;

            Array.from(files).forEach((file, index) => {
                const div = document.createElement('div');
                div.classList.add('gallery-meta-item', 'mb-4', 'p-3', 'border', 'rounded', 'bg-light');

                div.innerHTML = `
                    <p class="fw-bold mb-2">Image: ${file.name}</p>

                    <div class="mb-2">
                        <label class="form-label">Alt Text</label>
                        <input type="text" name="gallery_alt[]" class="form-control" placeholder="E.g. Kayaking scene">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Title (optional)</label>
                        <input type="text" name="gallery_title[]" class="form-control" placeholder="E.g. Adventure Trip">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Caption (optional)</label>
                        <input type="text" name="gallery_caption[]" class="form-control" placeholder="E.g. Group paddling on the river.">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Description (optional)</label>
                        <textarea name="gallery_description[]" class="form-control" rows="2" placeholder="Detailed description of the image..."></textarea>
                    </div>
                `;

                container.appendChild(div);
            });
        });
    </script>

<script>
    let itineraryIndex = {{ isset($itinerary) ? count($itinerary) : 1 }};

    document.getElementById('add-itinerary-day').addEventListener('click', function () {
        const container = document.createElement('div');
        container.classList.add('itinerary-day', 'border', 'rounded', 'p-3', 'mb-3', 'bg-light', 'position-relative');

        container.innerHTML = `
            <div class="mb-2">
                <label class="form-label">Day Title</label>
                <input type="text" name="itinerary[${itineraryIndex}][title]" class="form-control">
            </div>
            <div class="mb-2">
                <label class="form-label">Day Content (Multiple Paragraphs)</label>
                <textarea name="itinerary[${itineraryIndex}][content][]" rows="3" class="form-control"></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 remove-day">Remove</button>
        `;

        document.getElementById('itinerary-repeater').appendChild(container);
        itineraryIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-day')) {
            e.target.closest('.itinerary-day').remove();
        }
    });
</script>
@endsection
