<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsDataEntry
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->user_role == '5'){
            return $next($request);
    }
    return redirect()->guest('login');
    }
}
