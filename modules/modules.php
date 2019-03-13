<?php
Route::get('{modules}/doc/{name}', Common\Http\Handlers\DocHandler::class);
Route::get('{modules}/log', Common\Http\Handlers\LogHandler::class);

Route::prefix('blog')
    ->namespace('Blog\Http\Controllers')
    ->group(base_path('modules/Blog/routes.php'));
Route::prefix('shop')
    ->namespace('Shop\Http\Controllers')
    ->group(base_path('modules/Shop/routes.php'));
