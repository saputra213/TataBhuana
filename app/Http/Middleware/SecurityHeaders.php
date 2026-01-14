<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        $csp = "default-src 'self'; connect-src 'self' https:; img-src 'self' data: blob: https:; style-src 'self' https: 'unsafe-inline'; script-src 'self' https: 'unsafe-inline'; font-src 'self' https:; frame-src 'self' https://maps.google.com https://www.google.com";
        $response->headers->set('Content-Security-Policy', $csp);

        if ($request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        return $response;
    }
}
