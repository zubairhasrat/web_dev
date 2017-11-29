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
    return view('index');
});

Route::get('/login',function(){
    return view('login');
});

Route::get('/register',function(){
    return view('register');
});
Route::get('/logedin',function(){
    return view('logedin');
});

Route::post('/login','Custom_Login@authenticateUser');
Route::post('/register','Custom_Login@register_user');
Route::post('/logout','Custom_Login@logout_user');