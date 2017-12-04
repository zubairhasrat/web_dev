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

Route::get('/','Custom_Login@index');
Route::get('/login','Custom_Login@login');
Route::get('/register','Custom_Login@register');

Route::get('/home', 'HomeController@index');
Route::post('/login','Custom_Login@authenticateUser');
Route::post('/register','Custom_Login@register_user');
Route::get('/logout','Custom_Login@logout_user');