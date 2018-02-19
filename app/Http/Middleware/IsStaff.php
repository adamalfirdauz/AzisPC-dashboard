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
        if(Auth::user())
        {
            $status = (int) Auth::user()->status;
            if ($status < 3) 
            {
                return $next($request);
            }
            Auth::logout();
            return redirect('/login')->with('danger', 'Akses ditolak, anda tidak memiliki hak akses!');
        }
        return redirect('/login');
    }
}
