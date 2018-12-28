<?php
/**
 * Created by PhpStorm.
 * User: qian
 * Date: 2018/12/10
 * Time: 19:24
 */


if (!function_exists('success')) {
    /**
     * @param null $data
     *
     * @return array|null
     */
    function success($data = null)
    {
        return is_null($data)
            ? ['code' => 0, 'message' => 'success']
            : ((is_array($data) && empty($data))
                ? ['data' => []]
                : (array_has($data, 'data') ? $data : ['data' => $data]));
    }
}

if (!function_exists('error')) {
    /**
     * @param       $code
     * @param array $args
     *
     * @throws \App\Exceptions\BaseException
     */
    function error($code, $args = [])
    {
        $message = empty(config('code.' . $code)) ? '未知的错误' : config('code.' . $code);

        if (!empty($args)) {
            $message = vsprintf($message, $args);
        }

        throw new \App\Exceptions\BaseException($message, $code);
    }
}
