<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class BanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->ban) {
            Auth::logout();
            return redirect()->route('loginForm')->with('status', 'Ви забанені');
        }
        return $next($request);
        
    }
}
