<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
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
        /** 1- Necessary User Authenticate
         *  2- Role = he is Admin or moderator = (If Admin or moderator enter login dashboard)
         *    and Role = User (if he User enter login UI)
         */
        if(Auth::user() && Auth::user()->role === "admin") {
            return $next($request);          // do anything
        } elseif (Auth::user() && Auth::user()->role === "moderator") {
            return $next($request);          // do anything
        }else {
            return redirect()->route('login');
        }

    }
}
