<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ProductController@viewIndex');

Route::get('/create', 'ProductController@viewCreate');
Route::post('/create', 'ProductController@create');

Route::get('/update', 'ProductController@viewUpdate');
Route::post('/update', 'ProductController@update');
