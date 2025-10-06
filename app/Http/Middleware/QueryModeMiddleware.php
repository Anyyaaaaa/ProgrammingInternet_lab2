<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class QueryModeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has('mode')) {
            abort(403, 'Mode parameter is required');
        }

        return $next($request);
    }
}
