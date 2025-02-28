<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }
        // if (Auth:: guard('admin') -> ) {
        //     # code...
        // }

        // Log::info(Auth::guard('admin')->check());

        return response() -> json([
            'message' => 'Unauthorized',
            'log' => Auth::guard('admin')->check(),
            'log2' => Auth::guard('admin')->user()
        ], 401);
    }
}
