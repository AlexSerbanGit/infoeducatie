<?php

namespace App\Http\Middleware;

use Closure;

class VerifyRestaurantProfile
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
        if(Auth::user() && Auth::user() -> role_id == 3){
            return $next($request);
        } else return redirect()->back()->with('message', 'Nu poti accesa aceasta pagina');

        return $next($request);
    }
}
