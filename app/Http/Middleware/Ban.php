<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Ban
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
        if(Auth::user()){   
            if(Auth::user()->banned == 1)
            {
                return redirect('/')->with('message', 'Contul dumneavoastra este dezactivat. Contactati administratorul pentru deblocare!');
            }else{
                return $next($request);
            }
        }
        return $next($request);
    }
}
