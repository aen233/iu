<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 只在本地开发环境启用 SQL 日志
        if (app()->environment('local')) {
            DB::listen(function ($query) {
//                $sql = vsprintf(str_replace("?", "'%s'", $query->sql), $query->bindings);
                $sql = Str::replaceArray('?', $query->bindings, $query->sql);
                iuLog('debug', 'sql: ', $sql, 'sql');
                iuLog('debug', 'sql.time: ', $query->time, 'sql');
                iuLog(PHP_EOL, 'sql');
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
