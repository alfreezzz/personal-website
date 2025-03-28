<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->query('token') === env('ADMIN_ACCESS_TOKEN')) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Unauthorized access!');
    }
}
