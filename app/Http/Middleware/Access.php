<?php

namespace App\Http\Middleware;

use Closure;

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
        iuLog('debug', 'Request Url: ' . $request->url());
        iuLog('debug', 'Request Method: ' . $request->method());
        iuLog('debug', 'Request Params: ', $request->all());
        iuLog(PHP_EOL);

        return $next($request);
    }
}