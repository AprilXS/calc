<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // Your URIs
        'add',
        'sub',
        'mul',
        'div'
    ];

    // public function handle($request, Closure $next)
    // {
    //     // Bypassing CSRF check for all routes
    //     return $next($request);
    // }
}