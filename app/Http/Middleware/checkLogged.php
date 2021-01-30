<?php

namespace App\Http\Middleware;

use Closure;

class checkLogged
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
        if (!\Auth::check()) {
            return redirect()->route('view.login');
        }
        return $next($request);
    }
}
