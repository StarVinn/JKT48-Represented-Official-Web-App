<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageCacheMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Check if the request is for an image file in the public folder
        $path = $request->path();
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'bmp', 'ico'];

        foreach ($imageExtensions as $ext) {
            if (str_ends_with(strtolower($path), '.' . $ext)) {
                // Add cache headers for 30 days
                $response->headers->set('Cache-Control', 'public, max-age=2592000, immutable');
                $response->headers->set('Expires', gmdate('D, d M Y H:i:s', time() + 2592000) . ' GMT');
                break;
            }
        }

        return $response;
    }
}
