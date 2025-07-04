const mix = require('laravel-mix');

mix
    .styles([
        'resources/css/vendors.css',
        'resources/css/main.css'
    ], 'public/css/LocalMoroccoTours.css')

    .scripts([
        'resources/js/vendors.js',
        'resources/js/main.js'
    ], 'public/js/LocalMoroccoTours.js')

    .copyDirectory('resources/images', 'public/img');
