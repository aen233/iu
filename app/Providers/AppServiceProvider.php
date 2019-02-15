<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {

//            iuLog('debug', 'sql.pre: ', $query->sql, 'sql');
//            iuLog('debug', 'sql.bindings: ', $query->bindings, 'sql');

            $sql = vsprintf(str_replace("?", "'%s'", $query->sql), $query->bindings);
            iuLog('debug', 'sql: ', $sql, 'sql');

            iuLog('debug', 'sql.time: ', $query->time, 'sql');
            iuLog(PHP_EOL, 'sql');
        });
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
