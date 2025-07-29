<?php

namespace App\ResponseCache;

use Illuminate\Http\Request;
use Spatie\ResponseCache\CacheProfiles\CacheProfile;

class CacheAllExceptAdmin implements CacheProfile
{
    public function shouldCacheRequest(Request $request): bool
    {
        return $request->isMethod('get') &&
               !$request->is('admin/*') &&
               !$request->is('profile*') &&
               !$request->is('login') &&
               !$request->is('register') &&
               !$request->ajax();
    }

    public function useCacheNameSuffix(Request $request): string
    {
        return '';
    }

    public function useCacheLifetime(Request $request): \DateInterval
    {
        return \DateInterval::createFromDateString('7 days');
    }
}
