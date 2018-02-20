<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class IsAdmin
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
            if ($status == 1) 
            {
                return $next($request);
            }
            return redirect('/')->with('danger', 'Akses ditolak, anda tidak memiliki otoritas untuk mengakses halaman tersebut.');
        }
        return redirect('/login')->with('danger', 'Anda belum login, silahkan login terlebih dahulu.');
    }
}
