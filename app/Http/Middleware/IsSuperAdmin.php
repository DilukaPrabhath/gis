<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsSuperAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->user_role == '6'){
            return $next($request);
    }
    return redirect()->guest('login');
    }

}
