<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class Logging
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
        Log::info(
            $request->fullUrl(),
            [
                'method' => $request->method(),
                'inputs' => $request->all()
            ]
        );

        return $next($request);
    }
}
