<?php

namespace App\Http\Middleware;

use Closure;

class Roles
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
        if(auth()->user()->roles == 99){
            return $next($request);
        }
        return response()->json([
            "status" => false,
            "message" => "Access Denied"
        ], 200);;
    }
}