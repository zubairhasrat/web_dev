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
/* to show all list */

Route::get('/','PageController@index');

/* add new task */
 Route::resource('/tasks','TaskController');
/* delete an existing tasks */
