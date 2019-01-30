<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        QueryException::class,
        BaseException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     *
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param Exception                $exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof BaseException
            || $exception instanceof HttpException
            || $exception instanceof ValidationException
            || $exception instanceof QueryException
        ) {
            return $this->error($exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * 自定义错误输出
     *
     * @param $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function error($exception)
    {
        $statusCode = 500;
        if ($exception instanceof ValidationException) {
            $code    = $exception->status;
            $message = current(current(array_values($exception->errors())));
        } else {
            $code    = $exception->getCode() ?: $exception->getStatusCode();
            $message = $exception->getMessage();
        }

        $response = [
            'id'      => md5(uniqid()),
            'code'    => $code,
            'status'  => $statusCode,
            'message' => $message,
            'error'   => 'ERROR',
        ];

        if ($exception instanceof BaseException && $exception->getData()) {
            $response['data'] = $exception->getData();
        }

        iuLog('error', 'Response Error: ', $response);

        return response()->json($response, $statusCode, [], 320);
    }
}
