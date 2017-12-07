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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/register','UserController@register');
Route::post('/login','UserController@login');
Route::post('/sms','UserController@sms');
Route::post('/forgot','UserController@forgot');
Route::post('/carousel/add','CarouselController@add');
Route::delete('/carousel/del','CarouselController@del');
Route::get('/carousel/show','CarouselController@show');