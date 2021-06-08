<?php

namespace App\Http\Middleware;

use Closure;

class CheckStablishment
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
        // dd(Auth()->user()->stablishment->id);

        if(Auth()->user()->stablishment)
        {
            $stablishment = Auth()->user()->stablishment;

            return redirect()->route('stablishments.edit', compact('stablishment'));
        }
        return $next($request);
    }
}
