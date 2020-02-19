<?php

namespace App\Http\Middleware;

use Closure;

class Compiler
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
        if (auth()->user()->is('compiler'))
            return $next($request);
        return redirect()->route('home');
    }
}
