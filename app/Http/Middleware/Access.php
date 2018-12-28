<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class Access
{
    /**
     * 记录访问日志
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('Request Url: ' . $request->url());
        Log::debug('Request Method: ' . $request->method());
        Log::debug('Request Params: ', $request->all());

        return $next($request);
    }
}