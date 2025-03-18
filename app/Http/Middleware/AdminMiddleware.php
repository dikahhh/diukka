<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('User role: '. (Auth::check() ? Auth::user()->role : 'guest'));

        if (Auth::check() && Auth::user()->hasAnyRole(['admin', 'superadmin'])) {
            return $next($request);
        }        
        
        return redirect('/')->with('error', 'Anda tidak memiliki akses.');
    }
}

