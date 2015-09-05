<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Manage
{

    public function handle($request, Closure $next)
    {
        if (!is_manage()) {
            return redirect('/backend/login');
        }
        return $next($request);
    }
}
