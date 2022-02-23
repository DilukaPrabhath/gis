<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAccountant
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->user_role == '4'){
            return $next($request);
    }
    return redirect()->guest('login');
    }
}
