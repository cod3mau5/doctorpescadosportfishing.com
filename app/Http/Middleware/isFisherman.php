<?php

namespace App\Http\Middleware;

use Closure,Auth;

class isFisherman
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
        return $next($request);
        if(Auth::user()->role == '2'){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
