<?php

namespace App\Http\Middleware;

use Closure;

class Donor
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
        if($request->user()->role=='donor'){
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }
}
