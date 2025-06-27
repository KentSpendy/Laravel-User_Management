<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = session('user');

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
