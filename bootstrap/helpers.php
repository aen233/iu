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

if (!function_exists('iuLog')) {
    /**
     * @param        $level
     * @param        $desc
     * @param array  $data
     * @param string $filename
     */
    function iuLog($level, $desc = '', $data = [], $filename = '')
    {
        $filename = $filename ?: date('Y/m/d/\h-H').'-iu';
        // 记录日志

        $dir = storage_path() . '/logs/' . $filename . '.log';
        if ($level == PHP_EOL) {
            file_put_contents($dir, PHP_EOL, FILE_APPEND);

            return;
        }
        $prefix = '[' . now() . '] ' . env('APP_ENV') . '.' . strtoupper($level) . ': ';

        if (!$data) {
            file_put_contents($dir, $prefix . $desc . PHP_EOL, FILE_APPEND);

            return;
        }
        //            JSON_UNESCAPED_UNICODE
        //            JSON_UNESCAPED_SLASHES
        file_put_contents(
            $dir,
            $prefix . $desc . json_encode($data, 320) . PHP_EOL .
            var_export($data, true) . PHP_EOL,
            FILE_APPEND
        );
    }
}
