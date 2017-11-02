<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class autenticadoMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }

        return redirect('/login');
    }
}
