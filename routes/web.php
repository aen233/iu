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
Route::get('/doc/{name}', 'DocController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/info', 'TestController@info')->name('info');
Route::get('/db', 'TestController@db')->name('db');
Route::get('/redis', 'TestController@redis')->name('redis');
Route::get('/welcome', 'TestController@welcome')->name('welcome');
