const mix = require('laravel-mix');

// ✅ Compile & minify CSS
mix.styles([
    'public/assets/css/vendors.css',
    'public/assets/css/main.css',
], 'public/assets/css/LocalMoroccoTours.css').minify('public/assets/css/LocalMoroccoTours.css');

// ✅ Combine & minify JS
mix.scripts([
    'public/assets/js/vendors.js',
    'public/assets/js/main.js',
], 'public/assets/js/LocalMoroccoTours.js').minify('public/assets/js/LocalMoroccoTours.js');

// ✅ Optionally compile SASS if used
// mix.sass('resources/sass/app.scss', 'public/assets/css');

// ✅ Versioning (cache busting in production)
if (mix.inProduction()) {
    mix.version();
}
