<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class After
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
        $response = $next($request);

        // 执行动作
        if ($response instanceof JsonResponse) {
            $oriData = $response->getData();

            $message = [
                'code'    => 0,
                'message' => 'success',
            ];

            $data['data'] = ($oriData->data ?? []) ? $oriData->data : $oriData;

            if ($oriData->current_page ?? '') {
                $data['meta'] = [
                    'total'        => $oriData->total ?? 0,
                    'per_page'     => (int)$oriData->per_page ?? 0,
                    'current_page' => $oriData->current_page ?? 0,
                    'last_page'    => $oriData->last_page ?? 0
                ];
            }

            if ($oriData->meta ?? '') {
                $data['meta'] = [
                    'total'        => $oriData->meta->total ?? 0,
                    'per_page'     => (int)$oriData->meta->per_page ?? 0,
                    'current_page' => $oriData->meta->current_page ?? 0,
                    'last_page'    => $oriData->meta->last_page ?? 0
                ];
            }

            $temp = ($oriData) ? array_merge($message, $data) : $message;

            $response = $response->setData($temp);
            iuLog('debug', 'Response Success: ', $response->getData());
            iuLog(PHP_EOL);
        }

        return $response;
    }
}