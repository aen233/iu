<?php

use Illuminate\Support\Facades\Route;

Route::prefix('blog')
    ->namespace('Blog\Http\Controllers')
    ->group(base_path('modules/Blog/routes.php'));

Route::prefix('shop')
    ->namespace('Shop\Http\Controllers')
    ->group(base_path('modules/Shop/routes.php'));
