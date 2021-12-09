<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{


    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->user_role == '1'){
            return $next($request);
    }
    return redirect()->guest('login');
    }

}
