<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard ,...$types)
    {

        if (Auth::guard($guard)->check() && in_array(Auth::guard($guard)->user()->type, $types)) {
            return $next($request);

        }


        return responseJson(0, __('api.notAuthenticated'));

    }
}
