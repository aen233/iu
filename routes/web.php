<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'IndexController@index')->name('index');
Route::get('/doc/{name}', 'DocController@index')->name('doc');
Route::get('pdf', 'PdfController@index')->name('pdf');

Route::get('/', function () {
    return view('welcome');
});
