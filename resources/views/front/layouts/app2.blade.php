<!-- app2.blade.php -->
<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <title>LocalMoroccoTours</title>
</head>

<body>
    <div class="preloader js-preloader">
        <div class="preloader__wrap">
            <div class="preloader__icon">
                <img src="{{ asset('assets/images/icon/favicon.svg') }}" alt="Preloader Icon" width="41"
                    height="31">
            </div>

        </div>
        <div class="preloader__title">LocalMoroccoTours</div>
    </div>

    <div class="tourPagesSidebar" data-x="tourPagesSidebar" data-x-toggle="-is-active">
        <div class="tourPagesSidebar__overlay"></div>
        <div class="tourPagesSidebar__content">
            <div class="tourPagesSidebar__header d-flex items-center justify-between">
                <div class="text-20 fw-500">All filters</div>

                <button class="button -dark-1 size-40 rounded-full bg-light-1" data-x-click="tourPagesSidebar">
                    <i class="icon-cross text-10"></i>
                </button>
            </div>
        </div>
    </div>

    <button class="toTopButton js-top-button">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- SVG paths for to top button -->
        </svg>
    </button>

    <main>
        @include('front.partials._header2')

        @yield('content')

        @include('front.partials._footer2')

    </main>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

    {{-- Corrected JS paths and syntax --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/favorites.js') }}"></script>
    <script>
        console.log('typeof jQuery:', typeof jQuery);
    </script>

    <style>
        .js-favorite-btn.is-favorited {

            color: red;
        }

        .js-favorite-btn.is-favorited i {
            color: #ff4d4d;
        }
    </style>
</body>

</html>
