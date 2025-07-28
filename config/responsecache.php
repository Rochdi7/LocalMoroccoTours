<?php

return [

    /*
     * Determine if the response cache middleware should be enabled.
     */
    'enabled' => env('RESPONSE_CACHE_ENABLED', true),

    /*
     * The given class will determine if a request should be cached.
     * Replaced default with custom class that excludes admin/auth/ajax routes.
     */
    'cache_profile' => App\ResponseCache\CacheAllExceptAdmin::class,

    /*
     * Optionally, you can specify a header that will force a cache bypass.
     */
    'cache_bypass_header' => [
        'name' => env('CACHE_BYPASS_HEADER_NAME', null),
        'value' => env('CACHE_BYPASS_HEADER_VALUE', null),
    ],

    /*
     * Cache duration (default: 7 days).
     */
    'cache_lifetime_in_seconds' => (int) env('RESPONSE_CACHE_LIFETIME', 60 * 60 * 24 * 7),

    /*
     * Adds a header with the cache time to the response (enabled in debug mode).
     */
    'add_cache_time_header' => env('APP_DEBUG', false),

    /*
     * Name of the cache time header.
     */
    'cache_time_header_name' => env('RESPONSE_CACHE_HEADER_NAME', 'laravel-responsecache'),

    /*
     * Add header with cache age (optional, depends on cache_time_header).
     */
    'add_cache_age_header' => env('RESPONSE_CACHE_AGE_HEADER', false),

    /*
     * Name of the cache age header.
     */
    'cache_age_header_name' => env('RESPONSE_CACHE_AGE_HEADER_NAME', 'laravel-responsecache-age'),

    /*
     * Cache driver (default: file).
     */
    'cache_store' => env('RESPONSE_CACHE_DRIVER', 'file'),

    /*
     * Content replacers (e.g., CSRF token).
     */
    'replacers' => [
        \Spatie\ResponseCache\Replacers\CsrfTokenReplacer::class,
    ],

    /*
     * Optional tag for cache items.
     */
    'cache_tag' => '',

    /*
     * Hasher used to generate cache key.
     */
    'hasher' => \Spatie\ResponseCache\Hasher\DefaultHasher::class,

    /*
     * Serializer used to store cached responses.
     */
    'serializer' => \Spatie\ResponseCache\Serializers\DefaultSerializer::class,
];
