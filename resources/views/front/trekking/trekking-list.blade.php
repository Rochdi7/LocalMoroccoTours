@extends('front.layouts.app2')

@section('content')
    <section data-anim="fade" class="hero -type-1 -min">
        <div class="hero__bg">
            <img src="{{ asset('assets/images/hero/toubkal-summit-hiker-atlas-mountains-morocco.webp') }}"
                alt="Hiker standing on rocky summit of Mount Toubkal overlooking the dramatic ridges of Morocco’s Atlas Mountains under a bright blue sky."
                title="Mount Toubkal Summit View — Trekking the High Atlas Mountains in Morocco">

            <img src="{{ asset('assets/img/hero/1/shape.svg') }}" alt="decorative shape">
        </div>

        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="hero__content">
                        <h1 class="hero__title">
                            Trek the Majestic Atlas Mountains
                        </h1>

                        <p class="hero__text">
                            Conquer breathtaking peaks and explore rugged trails in Morocco’s High Atlas. Experience
                            unforgettable trekking adventures led by expert guides.
                        </p>

                        <form method="GET" action="{{ route('front.trekking.index') }}">
                            <div class="mt-30">
                                <div class="searchForm -type-1 -col-2">
                                    <div class="searchForm__form">

                                        {{-- CATEGORY DROPDOWN --}}
                                        <div class="searchFormItem js-select-control js-form-dd">
                                            <div class="searchFormItem__button" data-x-click="category">
                                                <div class="searchFormItem__icon size-50 rounded-12 border-1 flex-center">
                                                    <i class="text-20 icon-pin"></i>
                                                </div>
                                                <div class="searchFormItem__content">
                                                    <h5>Category</h5>
                                                    <div class="js-select-control-chosen">
                                                        {{ $trekkingCategories->firstWhere('id', request('categories')[0] ?? null)?->name ?? 'Search trekking types' }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="searchFormItemDropdown -location" data-x="category"
                                                data-x-toggle="is-active">
                                                <div class="searchFormItemDropdown__container">
                                                    <div class="searchFormItemDropdown__list scroll-bar-1">
                                                        @foreach ($trekkingCategories as $category)
                                                            <div class="searchFormItemDropdown__item">
                                                                <button type="button" class="js-select-control-button"
                                                                    data-id="{{ $category->id }}"
                                                                    data-name="{{ $category->name }}"
                                                                    data-target="trekkingCategoryInput">
                                                                    <span
                                                                        class="js-select-control-choice">{{ $category->name }}</span>
                                                                    <span>Activity Type</span>
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- HIDDEN CATEGORY INPUT --}}
                                        <input type="hidden" name="categories[]" id="trekkingCategoryInput"
                                            value="{{ request('categories')[0] ?? '' }}">

                                        {{-- CUSTOM GROUP SIZE ONLY --}}
                                        <div class="searchFormItem js-form-dd">
                                            <div class="searchFormItem__button" data-x-click="group_size">
                                                <div class="searchFormItem__icon size-50 rounded-12 border-1 flex-center">
                                                    <i class="text-20 icon-users"></i>
                                                </div>
                                                <div class="searchFormItem__content">
                                                    <h5>Group Size</h5>
                                                    <div class="js-select-control-chosen">
                                                        {{ request('group_size') ?? 'Enter group size range' }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="searchFormItemDropdown -group_size" data-x="group_size"
                                                data-x-toggle="is-active">
                                                <div class="searchFormItemDropdown__container">
                                                    <div class="searchFormItemDropdown__list scroll-bar-1">
                                                        <div class="mt-10 p-10">
                                                            <label class="text-14 fw-500 mb-5">Custom Group Size</label>
                                                            <div class="d-flex gap-10">
                                                                <input type="number" class="form-control"
                                                                    id="customMinGroupSize" placeholder="Min"
                                                                    min="1">
                                                                <input type="number" class="form-control"
                                                                    id="customMaxGroupSize" placeholder="Max"
                                                                    min="1">
                                                            </div>
                                                            <button type="button" id="applyCustomGroupSize"
                                                                class="mt-10 button -sm -accent-1 text-white">
                                                                Apply
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Hidden input for group_size --}}
                                        <input type="hidden" name="group_size" id="groupSize"
                                            value="{{ request('group_size') }}">

                                    </div>

                                    <div class="searchForm__button">
                                        <button type="submit" class="button -dark-1 bg-accent-1 text-white">
                                            <i class="icon-search text-16 mr-10"></i>
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Handle category dropdown
                                document.querySelectorAll('.js-select-control-button').forEach(btn => {
                                    btn.addEventListener('click', function(e) {
                                        e.preventDefault();

                                        let id = btn.getAttribute('data-id');
                                        let name = btn.getAttribute('data-name');
                                        let targetId = btn.getAttribute('data-target');

                                        if (targetId) {
                                            document.getElementById(targetId).value = id;
                                            btn.closest('.searchFormItem').querySelector('.js-select-control-chosen')
                                                .textContent = name;
                                            btn.closest('[data-x]').classList.remove('is-active');
                                        }
                                    });
                                });

                                // Handle custom group size only
                                const applyBtn = document.getElementById('applyCustomGroupSize');
                                if (applyBtn) {
                                    applyBtn.addEventListener('click', function() {
                                        let min = document.getElementById('customMinGroupSize').value;
                                        let max = document.getElementById('customMaxGroupSize').value;

                                        if (min === "" && max === "") return;

                                        let value = min && max ? `${min} - ${max}` : (min ? `${min}+` : `${max}+`);

                                        // update hidden field
                                        document.getElementById('groupSize').value = value;

                                        // update label shown in dropdown button
                                        let chosen = document.querySelector('[data-x="group_size"]')
                                            .closest('.searchFormItem')
                                            .querySelector('.js-select-control-chosen');
                                        if (chosen) {
                                            chosen.textContent = value + ' people';
                                        }

                                        // close dropdown
                                        document.querySelector('[data-x="group_size"]').classList.remove('is-active');
                                    });
                                }

                                // Remove empty hidden inputs before submit
                                let form = document.querySelector('form');
                                if (form) {
                                    form.addEventListener('submit', function() {
                                        ['trekkingCategoryInput', 'groupSize'].forEach(id => {
                                            let input = document.getElementById(id);
                                            if (input && input.value.trim() === "") {
                                                input.remove();
                                            }
                                        });
                                    });
                                }
                            });
                        </script>



                        <!-- hidden SEO text -->
                        <div style="display: none;">
                            Hiker standing on rocky summit of Mount Toubkal overlooking the dramatic ridges of Morocco’s
                            Atlas Mountains under a bright blue sky.
                        </div>
                        <div style="display: none;">
                            Experience trekking adventures in Morocco’s High Atlas Mountains, including Mount Toubkal, North
                            Africa’s highest peak. Explore stunning landscapes, panoramic vistas, and challenging trails
                            perfect for adventure seekers.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section data-anim-wrap class="layout-pt-md layout-pb-xl">
        <div class="container">
            <div class="row">
                <div data-anim-child="slide-up" class="col-xl-3 col-lg-4">
                    <div class="lg:d-none">
                        <div class="sidebar -type-1 overflow-hidden rounded-12">
                            <form method="GET" action="{{ route('front.trekking.index') }}">

                                <div class="sidebar__content">

                                    <!-- Tour type -->
                                    <div class="sidebar__item">
                                        <h5 class="text-18 fw-500">Tour Type</h5>
                                        <div class="pt-15">
                                            <div class="d-flex flex-column y-gap-15">
                                                @foreach ($trekkingCategories as $index => $category)
                                                    <div class="category-item {{ $index >= 5 ? 'd-none' : '' }}">
                                                        <div class="d-flex items-center">
                                                            <div class="form-checkbox">
                                                                <input type="checkbox" name="categories[]"
                                                                    value="{{ $category->id }}"
                                                                    {{ in_array($category->id, request()->input('categories', [])) ? 'checked' : '' }}>
                                                                <div class="form-checkbox__mark">
                                                                    <div class="form-checkbox__icon">
                                                                        <!-- your SVG icon -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="lh-11 ml-10">{{ $category->name }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            @if (count($trekkingCategories) > 5)
                                                <a href="#" id="seeMoreCategories"
                                                    class="d-flex text-15 fw-500 text-accent-2 mt-15">
                                                    See More
                                                </a>
                                            @endif
                                        </div>

                                    </div>

                                    <!-- Filter price -->
                                    <div class="sidebar__item">
                                        <div class="accordion -simple-2 js-accordion">
                                            <div class="accordion__item js-accordion-item-active">
                                                <div class="accordion__button mb-10 d-flex items-center justify-between">
                                                    <h5 class="text-18 fw-500">Filter Price</h5>

                                                    <div class="accordion__icon flex-center">
                                                        <i class="icon-chevron-down"></i>
                                                        <i class="icon-chevron-down"></i>
                                                    </div>
                                                </div>

                                                <div class="accordion__content">
                                                    <div class="pt-15">
                                                        <div class="js-price-rangeSlider">
                                                            <div class="px-5">
                                                                <input type="hidden" name="price[0]"
                                                                    class="js-lower-input"
                                                                    value="{{ request('price.0', $minPrice) }}">
                                                                <input type="hidden" name="price[1]"
                                                                    class="js-upper-input"
                                                                    value="{{ request('price.1', $maxPrice) }}">

                                                                <div class="js-slider" data-min="{{ $minPrice }}"
                                                                    data-max="{{ $maxPrice }}"
                                                                    data-start-lower="{{ request('price.0', $minPrice) }}"
                                                                    data-start-upper="{{ request('price.1', $maxPrice) }}">
                                                                </div>
                                                            </div>

                                                            <div class="d-flex justify-between mt-20">
                                                                <div>
                                                                    <span>Price:</span>
                                                                    <span
                                                                        class="fw-500 js-lower">{{ request('price.0', $minPrice) }}</span>
                                                                    <span> - </span>
                                                                    <span
                                                                        class="fw-500 js-upper">{{ request('price.1', $maxPrice) }}</span>
                                                                </div>
                                                                <div class="fw-500">
                                                                    Filter
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Duration -->
                                    <div class="sidebar__item">
                                        <h5 class="text-18 fw-500">Duration</h5>
                                        <div class="pt-15">
                                            <div class="d-flex flex-column y-gap-15">
                                                @foreach ($durations as $duration)
                                                    <div>
                                                        <div class="d-flex items-center">
                                                            <div class="form-checkbox">
                                                                <input type="checkbox" name="duration[]"
                                                                    value="{{ $duration }}"
                                                                    {{ in_array($duration, request('duration', [])) ? 'checked' : '' }}>
                                                                <div class="form-checkbox__mark">
                                                                    <div class="form-checkbox__icon">
                                                                        <!-- your SVG icon -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="lh-11 ml-10">{{ $duration }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Rating -->
                                    <div class="sidebar__item">
                                        <h5 class="text-18 fw-500">Rating</h5>
                                        <div class="pt-15">
                                            <div class="d-flex flex-column y-gap-15">
                                                @foreach (range(5, 1) as $stars)
                                                    <div class="d-flex">
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" name="ratings[]"
                                                                value="{{ $stars }}"
                                                                {{ in_array($stars, request('ratings', [])) ? 'checked' : '' }}>
                                                            <div class="form-checkbox__mark">
                                                                <div class="form-checkbox__icon">
                                                                    <!-- your SVG icon -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex x-gap-5 ml-10">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i
                                                                    class="flex-center icon-star {{ $i <= $stars ? 'text-yellow-2' : 'text-light-6' }} text-13"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Specials -->
                                    <div class="sidebar__item">
                                        <h5 class="text-18 fw-500">Specials</h5>
                                        <div class="pt-15">
                                            <div class="d-flex flex-column y-gap-15">
                                                @php
                                                    $specials = [
                                                        [
                                                            'key' => 'free_cancellation',
                                                            'label' => 'Free Cancellation',
                                                        ],
                                                        [
                                                            'key' => 'bestseller',
                                                            'label' => 'Bestseller',
                                                        ],
                                                    ];

                                                    $selectedSpecials = request('specials', []);
                                                @endphp



                                                @foreach ($specials as $special)
                                                    <div>
                                                        <div class="d-flex items-center">
                                                            <div class="form-checkbox">
                                                                <input type="checkbox" name="specials[]"
                                                                    value="{{ $special['key'] }}"
                                                                    {{ in_array($special['key'], $selectedSpecials) ? 'checked' : '' }}>
                                                                <div class="form-checkbox__mark">
                                                                    <div class="form-checkbox__icon">
                                                                        <!-- your SVG icon -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="lh-11 ml-10">{{ $special['label'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="mt-30">
                                        <button type="submit" class="button -accent-1 w-100"
                                            style="display: block; background-color: #ff5722; color: #fff; padding: 10px 20px; border: none; border-radius: 4px;">
                                            Apply Filters
                                        </button>
                                    </div>


                                </div>

                            </form>


                        </div>
                    </div>

                    <div class="accordion d-none mb-30 lg:d-flex js-accordion">
                        <div class="accordion__item col-12">
                            <button class="accordion__button button -dark-1 bg-light-1 px-25 py-10 border-1 rounded-12">
                                <i class="icon-sort-down mr-10 text-16"></i>
                                Filter
                            </button>

                            <div class="accordion__content">
                                <div class="pt-20">
                                    <div class="sidebar -type-1 overflow-hidden rounded-12">
                                        <div class="sidebar__header bg-accent-1">
                                            <div class="text-15 text-white fw-500">When are you traveling?</div>

                                            <div class="mt-10">
                                                <div class="searchForm -type-1 -col-1 -narrow">
                                                    <div class="searchForm__form">
                                                        <div
                                                            class="searchFormItem js-select-control js-form-dd js-calendar">
                                                            <div class="searchFormItem__button" data-x-click="calendar">
                                                                <div class="pl-calendar d-flex items-center">
                                                                    <i class="icon-calendar text-20 mr-15"></i>
                                                                    <div>
                                                                        <span class="js-first-date">Add dates</span>
                                                                        <span class="js-last-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="searchFormItemDropdown -calendar"
                                                                data-x="calendar" data-x-toggle="is-active">
                                                                <div class="searchFormItemDropdown__container">

                                                                    <div
                                                                        class="searchMenu-date -searchForm js-form-dd js-calendar-el">
                                                                        <div class="searchMenu-date__field shadow-2"
                                                                            data-x-dd="searchMenu-date"
                                                                            data-x-dd-toggle="-is-active">
                                                                            <div class="bg-white rounded-4">
                                                                                <div
                                                                                    class="elCalendar js-calendar-el-calendar">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form method="GET" action="{{ route('front.trekking.index') }}">

                                            <div class="sidebar__content">

                                                <!-- Tour type -->
                                                <div class="sidebar__item">
                                                    <h5 class="text-18 fw-500">Tour Type</h5>
                                                    <div class="pt-15">
                                                        <div class="d-flex flex-column y-gap-15">
                                                            @foreach ($trekkingCategories as $index => $category)
                                                                <div
                                                                    class="category-item {{ $index >= 5 ? 'd-none' : '' }}">
                                                                    <div class="d-flex items-center">
                                                                        <div class="form-checkbox">
                                                                            <input type="checkbox" name="categories[]"
                                                                                value="{{ $category->id }}"
                                                                                {{ in_array($category->id, request()->input('categories', [])) ? 'checked' : '' }}>
                                                                            <div class="form-checkbox__mark">
                                                                                <div class="form-checkbox__icon">
                                                                                    <!-- your SVG icon -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="lh-11 ml-10">{{ $category->name }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        @if (count($trekkingCategories) > 5)
                                                            <a href="#" id="seeMoreCategories"
                                                                class="d-flex text-15 fw-500 text-accent-2 mt-15">
                                                                See More
                                                            </a>
                                                        @endif
                                                    </div>

                                                </div>

                                                <!-- Filter price -->
                                                <div class="sidebar__item">
                                                    <div class="accordion -simple-2 js-accordion">
                                                        <div class="accordion__item js-accordion-item-active">
                                                            <div
                                                                class="accordion__button mb-10 d-flex items-center justify-between">
                                                                <h5 class="text-18 fw-500">Filter Price</h5>

                                                                <div class="accordion__icon flex-center">
                                                                    <i class="icon-chevron-down"></i>
                                                                    <i class="icon-chevron-down"></i>
                                                                </div>
                                                            </div>

                                                            <div class="accordion__content">
                                                                <div class="pt-15">
                                                                    <div class="js-price-rangeSlider">
                                                                        <div class="px-5">
                                                                            <input type="hidden" name="price[0]"
                                                                                class="js-lower-input"
                                                                                value="{{ request('price.0', $minPrice) }}">
                                                                            <input type="hidden" name="price[1]"
                                                                                class="js-upper-input"
                                                                                value="{{ request('price.1', $maxPrice) }}">

                                                                            <div class="js-slider"
                                                                                data-min="{{ $minPrice }}"
                                                                                data-max="{{ $maxPrice }}"
                                                                                data-start-lower="{{ request('price.0', $minPrice) }}"
                                                                                data-start-upper="{{ request('price.1', $maxPrice) }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="d-flex justify-between mt-20">
                                                                            <div>
                                                                                <span>Price:</span>
                                                                                <span
                                                                                    class="fw-500 js-lower">{{ request('price.0', $minPrice) }}</span>
                                                                                <span> - </span>
                                                                                <span
                                                                                    class="fw-500 js-upper">{{ request('price.1', $maxPrice) }}</span>
                                                                            </div>
                                                                            <div class="fw-500">
                                                                                Filter
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Duration -->
                                                <div class="sidebar__item">
                                                    <h5 class="text-18 fw-500">Duration</h5>
                                                    <div class="pt-15">
                                                        <div class="d-flex flex-column y-gap-15">
                                                            @foreach ($durations as $duration)
                                                                <div>
                                                                    <div class="d-flex items-center">
                                                                        <div class="form-checkbox">
                                                                            <input type="checkbox" name="duration[]"
                                                                                value="{{ $duration }}"
                                                                                {{ in_array($duration, request('duration', [])) ? 'checked' : '' }}>
                                                                            <div class="form-checkbox__mark">
                                                                                <div class="form-checkbox__icon">
                                                                                    <!-- your SVG icon -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="lh-11 ml-10">{{ $duration }}</div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Rating -->
                                                <div class="sidebar__item">
                                                    <h5 class="text-18 fw-500">Rating</h5>
                                                    <div class="pt-15">
                                                        <div class="d-flex flex-column y-gap-15">
                                                            @foreach (range(5, 1) as $stars)
                                                                <div class="d-flex">
                                                                    <div class="form-checkbox">
                                                                        <input type="checkbox" name="ratings[]"
                                                                            value="{{ $stars }}"
                                                                            {{ in_array($stars, request('ratings', [])) ? 'checked' : '' }}>
                                                                        <div class="form-checkbox__mark">
                                                                            <div class="form-checkbox__icon">
                                                                                <!-- your SVG icon -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex x-gap-5 ml-10">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            <i
                                                                                class="flex-center icon-star {{ $i <= $stars ? 'text-yellow-2' : 'text-light-6' }} text-13"></i>
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Specials -->
                                                <div class="sidebar__item">
                                                    <h5 class="text-18 fw-500">Specials</h5>
                                                    <div class="pt-15">
                                                        <div class="d-flex flex-column y-gap-15">
                                                            @php
                                                                $specials = [
                                                                    [
                                                                        'key' => 'free_cancellation',
                                                                        'label' => 'Free Cancellation',
                                                                    ],
                                                                    [
                                                                        'key' => 'bestseller',
                                                                        'label' => 'Bestseller',
                                                                    ],
                                                                ];

                                                                $selectedSpecials = request('specials', []);
                                                            @endphp


                                                            @foreach ($specials as $special)
                                                                <div>
                                                                    <div class="d-flex items-center">
                                                                        <div class="form-checkbox">
                                                                            <input type="checkbox" name="specials[]"
                                                                                value="{{ $special['key'] }}"
                                                                                {{ in_array($special['key'], $selectedSpecials) ? 'checked' : '' }}>
                                                                            <div class="form-checkbox__mark">
                                                                                <div class="form-checkbox__icon">
                                                                                    <!-- your SVG icon -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="lh-11 ml-10">{{ $special['label'] }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Submit button -->
                                                <div class="mt-30">
                                                    <button type="submit" class="button -accent-1 w-100"
                                                        style="display: block; background-color: #ff5722; color: #fff; padding: 10px 20px; border: none; border-radius: 4px;">
                                                        Apply Filters
                                                    </button>
                                                </div>


                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div data-anim-child="slide-up delay-2" class="col-xl-9 col-lg-8">
                    <div class="row y-gap-5 justify-between">
                        <div class="col-auto">
                            <div>{{ $trekkings->total() }} results</div>
                        </div>

                        <div class="col-auto">
                            <div class="dropdown -type-2 js-dropdown js-form-dd" data-main-value="">
                                <div class="dropdown__button js-button">
                                    <span>Sort by: </span>
                                    <span class="js-title">{{ request('sort_by', 'Featured') }}</span>
                                    <i class="icon-chevron-down"></i>
                                </div>

                                <div class="dropdown__menu js-menu-items">
                                    <a href="{{ route('front.trekking.index', ['sort_by' => 'price_low_high']) }}"
                                        class="dropdown__item {{ request('sort_by') == 'price_low_high' ? 'is-active' : '' }}">Low</a>
                                    <a href="{{ route('front.trekking.index', ['sort_by' => 'price_high_low']) }}"
                                        class="dropdown__item {{ request('sort_by') == 'price_high_low' ? 'is-active' : '' }}">High</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row y-gap-30 pt-30">
                        @foreach ($trekkings as $trek)
                            <div class="col-12">
                                <div class="tourCard -type-2">
                                    <div class="tourCard__image">
                                        <img src="{{ $trek->getFirstMediaUrl('trekking') ?: asset('img/default-tour.jpg') }}"
                                            alt="{{ $trek->title }}">

                                        @if ($trek->discount > 0)
                                            <div class="tourCard__badge">
                                                <div class="bg-accent-1 rounded-12 text-white lh-11 text-13 px-15 py-10">
                                                    {{ $trek->discount }} % OFF
                                                </div>
                                            </div>
                                        @endif

                                        <button class="tourCard__favorite js-favorite-btn" data-id="{{ $trek->slug }}"
                                            data-type="trekking"
                                            style="position: absolute; bottom: -17px; right: 10px; width: 35px; height: 35px; border-radius: 50%; background: white; display: flex; justify-content: center; align-items: center; box-shadow: 0px 10px 40px rgba(0,0,0,0.05); z-index: 2;">
                                            <i class="icon-heart"></i>
                                        </button>
                                    </div>

                                    <div class="tourCard__content">
                                        <div class="tourCard__location">
                                            <i class="icon-pin"></i>
                                            {{ $trek->location->name ?? 'Marrakech' }}
                                        </div>

                                        <h3 class="tourCard__title mt-5">
                                            <span>{{ $trek->title }}</span>
                                        </h3>

                                        <div class="d-flex items-center mt-5">
                                            <div class="d-flex items-center x-gap-5">
                                                @php
                                                    $rating = round($trek->avg_rating);
                                                @endphp

                                                <div class="d-flex items-center x-gap-5">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $rating)
                                                            <i class="icon-star text-yellow-2 text-12"></i>
                                                        @else
                                                            <i class="icon-star text-light-2 text-12"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>

                                            <div class="text-14 ml-10">
                                                <span class="fw-500">{{ number_format($trek->avg_rating, 1) }}</span>
                                                ({{ $trek->reviews_count }})
                                            </div>
                                        </div>

                                        <p class="tourCard__text mt-5">
                                            {{ Str::limit($trek->overview, 100) }}
                                        </p>

                                        <div class="row x-gap-20 y-gap-5 pt-30">
                                            @if ($trek->bestseller_flag)
                                                <div class="col-auto">
                                                    <div class="text-14 text-accent-1">
                                                        <i class="icon-price-tag mr-10"></i>
                                                        Best Price Guarantee
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($trek->free_cancellation_flag)
                                                <div class="col-auto">
                                                    <div class="text-14">
                                                        <i class="icon-check mr-10"></i>
                                                        Free Cancellation
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tourCard__info">
                                        <div>
                                            <div class="d-flex items-center text-14">
                                                <i class="icon-clock mr-10"></i>
                                                {{ $trek->duration }}
                                            </div>

                                            <div class="tourCard__price">
                                                <div>${{ number_format($trek->base_price, 2) }}</div>

                                                <div class="d-flex items-center">
                                                    From <span
                                                        class="text-20 fw-500 ml-5">${{ number_format($trek->discounted_base_price, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('front.trekking.show', $trek->slug) }}"
                                            class="button -outline-accent-1 text-accent-1">
                                            View Details
                                            <i class="icon-arrow-top-right ml-10"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="d-flex justify-center flex-column mt-60">
                        <div class="pagination justify-center">
                            @if ($trekkings->currentPage() > 1)
                                <a href="{{ $trekkings->previousPageUrl() }}"
                                    class="pagination__button button -accent-1 mr-15 -prev">
                                    <i class="icon-arrow-left text-15"></i>
                                </a>
                            @endif

                            <div class="pagination__count">
                                @foreach ($trekkings->getUrlRange(1, $trekkings->lastPage()) as $page => $url)
                                    @if ($page == $trekkings->currentPage())
                                        <a href="#" class="is-active">{{ $page }}</a>
                                    @else
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    @endif
                                @endforeach
                            </div>

                            @if ($trekkings->hasMorePages())
                                <a href="{{ $trekkings->nextPageUrl() }}"
                                    class="pagination__button button -accent-1 ml-15 -next">
                                    <i class="icon-arrow-right text-15"></i>
                                </a>
                            @endif
                        </div>

                        <div class="text-14 text-center mt-20">
                            Showing results {{ $trekkings->firstItem() }}-{{ $trekkings->lastItem() }} of
                            {{ $trekkings->total() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let btn = document.getElementById('seeMoreCategories');
            if (btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.category-item.d-none').forEach(el => {
                        el.classList.remove('d-none');
                    });
                    btn.style.display = 'none';
                });
            }
        });
    </script>

@endsection
