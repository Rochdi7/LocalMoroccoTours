<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use voku\helper\HtmlMin;

class MinifyHtml
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (
            app()->environment('production') &&
            $response instanceof Response &&
            str_contains($response->headers->get('Content-Type'), 'text/html')
        ) {
            $htmlMin = new HtmlMin();

            // Optional settings for stricter minification (enable if desired)
            $htmlMin->doRemoveComments(true);
            $htmlMin->doOptimizeViaHtmlDomParser(true);
            $htmlMin->doRemoveWhitespaceAroundTags(true);
            $htmlMin->doRemoveSpacesBetweenTags(true);
            $htmlMin->doRemoveOmittedHtmlTags(true);

            $minified = $htmlMin->minify($response->getContent());

            $response->setContent($minified);
        }

        return $response;
    }
}
