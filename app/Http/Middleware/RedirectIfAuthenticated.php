<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        if (Auth::guard($guard)->check() && Auth::user()->type == 'user') {
//            return redirect('/home');
//        }
//        elseif (Auth::guard($guard)->check() && Auth::user()->type == 'admin') {
//            return redirect('/admin-dashboard');
//        }

        return $next($request);
    }
}
