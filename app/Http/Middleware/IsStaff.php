<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;


class IsStaff
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
        $status = (int) Auth::user()->status;
        if (Auth::user() &&  $status < 3) {
            return $next($request);
        }
        Auth::logout();
        // Session::flush();
        return redirect('/login');
    }
}
