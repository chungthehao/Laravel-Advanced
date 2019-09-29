<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogSize
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
    }

    public function terminate($request, $response)
    {
        //dd(123); // 'Ko tác dụng' gì, vì nó ko modify the response, nhưng thực ra là có chạy rồi!!

        Log::info($request->fullUrl(), [
            'size' => strlen($response->content())
        ]);
    }
}
