<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/home');
            } elseif (Auth::user()->role == 'nurse') {
                return redirect('/record');
            } else {
                return redirect('/record');
            }
        }

        return $next($request);
    }
}